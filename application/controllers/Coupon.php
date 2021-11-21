<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller 
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

    public function index()
    {
        $page =(isset($_GET['page'])) ? $_GET['page'] : 0;
        $query=$this->db->select('coupon.*')->from('coupon')->order_by('id','desc')->limit(20,($page))->get();
        $num_rows=$this->db->order_by('id', 'desc')->get('coupon')->num_rows();
        $data['coupon']=$query->result_array();
        $data['links']=$this->pagi->pagination1('admin/coupon',$num_rows,20);
        $this->load->view('admin/coupon/index',$data);
    }

    public function add()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
         $this->load->helper(array('form'));
         $this->load->library('form_validation');
         $this->form_validation->set_rules('coupon', 'Coupon', 'required|is_unique[coupon.coupon]'); 
            if ($this->form_validation->run() == FALSE) 
             { 
                 $this->load->view('admin/coupon/add');
             } 
             else 
             {                
                $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                     $journalName = str_replace(' ', '_', $_FILES['image']['name']);
                     $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);
                $config['file_name'] = time() . $jname.'.'.$ext;
                $config['upload_path'] = './uploads/coupon/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $_POST['image'] = $config['file_name'];
                if($this->db->insert('coupon',$_POST))
                {
                    $this->session->set_flashdata('msg', 'coupon Successfully Added');
                    return redirect(base_url('admin/coupon'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                    return redirect(base_url('admin/coupon/add'),'refresh');
                }
             } 
        }
        else
        {
            $this->load->view('admin/coupon/add');
        }
    }

    public function edit($id='')
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
         $this->load->helper(array('form'));
         $this->load->library('form_validation');
         $coup=$this->db->where('id',$id)->get('coupon')->row_array();
         if($coup['coupon']==$_POST['coupon'])
         {
         $this->form_validation->set_rules('coupon', 'Coupon', 'required');
        }else
        $this->form_validation->set_rules('coupon', 'Coupon', 'required|is_unique[coupon.coupon]');

            if ($this->form_validation->run() == FALSE) 
             { 
                 $data['coupon']=$this->db->where('id',$id)->get('coupon')->row_array();
                 $this->load->view('admin/coupon/edit',$data);
             } 
             else 
             { 
               
                if($_FILES['image']['name']!='')
                {
                    $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                     $journalName = str_replace(' ', '_', $_FILES['image']['name']);
                     $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);
                $config['file_name'] = time() . $jname.'.'.$ext;
                $config['upload_path'] = './uploads/coupon/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $_POST['image'] = $config['file_name'];
                }
                if($this->db->where('id',$id)->update('coupon',$_POST))
                {
                    $this->session->set_flashdata('msg', 'coupon Successfully Added');
                    return redirect(base_url('admin/coupon'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                    return redirect(base_url('admin/coupon/edit/'.$id),'refresh');
                }
             }
        }
        else
        {
            $data['coupon']=$this->db->where('id',$id)->get('coupon')->row_array();
            $this->load->view('admin/coupon/edit',$data);
        }
    }

    public function view($id='')
    {
         $data['coupon']=$this->db->where('id',$id)->get('coupon')->row_array();
         $this->load->view('admin/coupon/view',$data);
    }

    public function delete($id='')
    {
        if($this->db->where('id',$id)->delete('coupon'))
        {
            $this->session->set_flashdata('msg', 'Success Deleted coupon');
        }
        else
        {
            $this->session->set_flashdata('err', 'Please try After Sometimes...');
        }
        return redirect(base_url('admin/coupon'),'refresh');
    }

}
