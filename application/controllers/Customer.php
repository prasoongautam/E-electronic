<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $x=$this->session->userdata('kumar');
        if(empty($x))
        {
            return redirect(base_url('signin'),'refresh');
        }
    }

    public function customer_profile()
    {
        $this->load->view('my_profile');
    }

    public function update_customer_profile()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
             $x=$this->session->userdata('kumar');
            if($_FILES['image']['name']!='')
            {
            $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

            $journalName = str_replace(' ', '_', $_FILES['image']['name']);

            $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);

            $config['file_name'] = time() . $jname.'.'.$ext;

            $config['upload_path'] = './uploads/profile/';

            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';

            $this->upload->initialize($config);

            $this->upload->do_upload('image');

                $_POST['profile'] = $config['file_name'];
            }
            unset($_POST['email']);
            if($x['mobile']!='')
            {
               unset($_POST['mobile']); 
            }
            
            $this->db->where('id',$x['id'])->update('customers',$_POST);
            $data=$this->db->where('id',$x['id'])->get('customers')->row_array();
            $array = array(
                'kumar' => $data
            );
            
            $this->session->set_userdata( $array );
            $this->session->set_flashdata('msg', 'Profile Successfully Updated');
            return redirect(base_url('customer-profile'),'refresh');
        }
    }

    public function change_password()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
            $data=$this->session->userdata('kumar');
            if($data['password']==md5($_POST['old_password']))
            {
                if($_POST['password']==$_POST['confirm_password'])
                {
                    unset($_POST['old_password']);
                    unset($_POST['confirm_password']);
                    $_POST['password']=md5($_POST['customers']);
                    $this->db->where('id',$data['id'])->update('customers',$_POST);
                    $data1=$this->db->where('id',$data['id'])->get('customers')->row_array();
            $array = array(
                'kumar' => $data1
            );
            
            $this->session->set_userdata( $array );
                    $this->session->set_flashdata('msg', 'Password Successfully Updated');
                    return redirect(base_url('my_profile'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Password and Confirm Password is not Correct');
                    return redirect(base_url('change_password'),'refresh');
                }
            }
            else
            {
                $this->session->set_flashdata('err', 'Old Password is not Correct');
                return redirect(base_url('change_password'),'refresh');
            }
        }
        else
        {
            $this->load->view('change_password');
        }        
        
    }

    public function my_order()
    {
        $data=$this->session->userdata('kumar');
        $data1['orders']=$this->db->select('orders.order_id,orders.order_date,orders.delivery,orders.status,payments.paymentType,payments.amount,payments.payment_status,payments.payment_details,address.*,coupon_used.coupon')->from('orders')->join('address','orders.order_id=address.order_id')->join('payments','orders.order_id=payments.order_id')->join('coupon_used','orders.order_id=coupon_used.order_id','left')->where('orders.user_id',$data['id'])->order_by('orders.id','desc')->get()->result_array();
        //print_r($data1);exit;
        $this->load->view('my_order',$data1);
    }

    public function order_detail($order_id='')
    {
        $data=$this->session->userdata('kumar');
        $data1['orders']=$this->db->select('orders.order_id,orders.products,orders.order_date,orders.delivery,orders.status,payments.paymentType,payments.amount,payments.payment_status,payments.payment_details,address.*,coupon_used.coupon')->from('orders')->join('address','orders.order_id=address.order_id')->join('payments','orders.order_id=payments.order_id')->join('coupon_used','orders.order_id=coupon_used.order_id','left')->where('orders.user_id',$data['id'])->where('orders.order_id',$order_id)->order_by('orders.id','desc')->get()->row_array();
        $this->load->view('order_detail',$data1);
    }
    
}
