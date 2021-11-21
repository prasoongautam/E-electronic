<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends CI_Controller 
{
        function __construct() 
        {
            parent::__construct();
            $this->load->database();
           $x=$this->session->userdata('iletsadmin');
        if( $x['role']!=1)
        {
            return redirect('admin', 'refresh');
        }
        }

        public function new_orders()
        {
            $data['orders']=$this->db->select('orders.order_id,orders.order_date,payments.paymentType,payments.amount,customers.email,customers.mobile')->from('orders')->join('customers','orders.user_id=customers.id')->join('payments','orders.order_id=payments.order_id')->where('orders.status','Pending')->order_by('orders.id','desc')->get()->result_array();
            $this->load->view('admin/orders/order_new',$data);
        }

        public function processing_orders()
        {
             $data['orders']=$this->db->select('orders.order_id,orders.order_date,payments.paymentType,payments.amount,customers.email,customers.mobile')->from('orders')->join('customers','orders.user_id=customers.id')->join('payments','orders.order_id=payments.order_id')->where('orders.status','Processing')->order_by('orders.id','desc')->get()->result_array();
             $this->load->view('admin/orders/order_processing',$data);
        }

        public function cancelled_orders()
        {
            $data['orders']=$this->db->select('orders.order_id,orders.order_date,payments.paymentType,payments.amount,customers.email,customers.mobile')->from('orders')->join('customers','orders.user_id=customers.id')->join('payments','orders.order_id=payments.order_id')->where('orders.status','Cancelled')->order_by('orders.id','desc')->get()->result_array();
             $this->load->view('admin/orders/order_cancel',$data);
        }

        public function completed_orders()
        {
            $data['orders']=$this->db->select('orders.order_id,orders.order_date,payments.paymentType,payments.amount,customers.email,customers.mobile')->from('orders')->join('customers','orders.user_id=customers.id')->join('payments','orders.order_id=payments.order_id')->where('orders.status','Completed')->order_by('orders.id','desc')->get()->result_array();
             $this->load->view('admin/orders/order_completed',$data);
        }

        public function send_email($order_id)
        {
            if ($this->input->server('REQUEST_METHOD') == 'POST') 
            {

                $subject="Kumar Electronics Order ID ".$order_id;
                $data1['msg']=$_POST['content'];
                 $data=$this->db->select('*')->from('orders')->join('address','orders.order_id=address.order_id')->where('orders.order_id',$order_id)->get()->row_array()['email'];
                 $msg=$this->load->view('mailer/default',$data1,true);
                send_mail($data,$msg,$subject);
                $this->session->set_flashdata('msg', 'Message Successfully Delivered To Customer');
                return redirect(base_url('admin/orders/processing-orders'),'refresh');

            }
            else
            {
                $data['order_id']=$order_id;
                $this->load->view('admin/orders/send_email',$data);
            }
        }

        public function completed($order_id='')
        {
            if ($this->input->server('REQUEST_METHOD') == 'POST') 
            {
                date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                 $_POST['delivery']=date('Y:m:d H:i:s');
                $_POST['status']='Completed';

                $data1['orders']=$this->db->select('orders.order_id,orders.products,orders.order_date,orders.delivery,orders.status,payments.paymentType,payments.amount,payments.payment_status,payments.payment_details,address.*,coupon_used.coupon')->from('orders')->join('address','orders.order_id=address.order_id')->join('payments','orders.order_id=payments.order_id')->join('coupon_used','orders.order_id=coupon_used.order_id','left')->where('orders.order_id',$order_id)->order_by('orders.id','desc')->get()->row_array();
            $data1['status']="Your Order Delivered Successfully";
            $subject="Order Status ".$order_id;
             $msg=$this->load->view('mailer/order_mail',$data1,true);
                send_mail($data1['orders']['email'],$msg,$subject);
                $this->db->where('order_id',$order_id)->update('orders',$_POST);
                $this->session->set_flashdata('msg', 'Order Completed Successfully');
                return redirect(base_url('admin/orders/completed-orders'),'refresh');
            }
            else
            {
                   $data['order_id']=$order_id;
                $this->load->view('admin/orders/completed_reason',$data); 
            }
        }

        public function view($order_id='')
        {
            $data['orders']=$this->db->select('orders.order_id,orders.order_date,payments.paymentType,payments.amount,payments.payment_status,payments.payment_details,address.*,coupon_used.coupon,customers.email as useremail,customers.mobile,customers.name')->from('orders')->join('customers','orders.user_id=customers.id')->join('payments','orders.order_id=payments.order_id')->join('address','orders.order_id=address.order_id')->join('coupon_used','orders.order_id=coupon_used.order_id','left')->where('orders.order_id',$order_id)->get()->row_array();
            unset($data['orders']['id']);
            //echo $this->db->last_query();exit;
            $this->load->view('admin/orders/view_order',$data);
        }

        public function cancel($order_id='')
        {
            if ($this->input->server('REQUEST_METHOD') == 'POST') 
            {
                $_POST['status']='Cancelled';
                $this->db->where('order_id',$order_id)->update('orders',$_POST);
                $this->session->set_flashdata('msg', 'OrderCancelled Successfully');
                return redirect(base_url('admin/orders/cancel-orders'),'refresh');
            }
            else
            {
                $data['order_id']=$order_id;
                $this->load->view('admin/orders/cancel_order',$data);
            }
        }

        public function approve_order($order_id='')
        {
            $data1['orders']=$this->db->select('orders.order_id,orders.products,orders.order_date,orders.delivery,orders.status,payments.paymentType,payments.amount,payments.payment_status,payments.payment_details,address.*,coupon_used.coupon')->from('orders')->join('address','orders.order_id=address.order_id')->join('payments','orders.order_id=payments.order_id')->join('coupon_used','orders.order_id=coupon_used.order_id','left')->where('orders.order_id',$order_id)->order_by('orders.id','desc')->get()->row_array();
            $data1['status']="Your Order Successfully Approved";
            $subject="Order Status ".$order_id;
             $msg=$this->load->view('mailer/order_mail',$data1,true);
                send_mail($data1['orders']['email'],$msg,$subject);
               
            $this->db->where('order_id',$order_id)->update('orders',['status'=>'Processing']);
            $this->session->set_flashdata('msg', 'Order Approve Successfully');
            return redirect(base_url('admin/orders/processing-orders'),'refresh');
        }

        public function delete($id='')
        {
            if($this->db->where('id',$id)->delete('orders'))
            {
             $this->session->set_flashdata('msg', 'Success Deleted orders');
            }
            else
            {
             $this->session->set_flashdata('err', 'Please try After Sometimes...');
            }
            return redirect(base_url('admin/orders'),'refresh');
        }
}