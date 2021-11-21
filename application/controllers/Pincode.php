<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pincode extends CI_Controller 
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
        $query=$this->db->select('pincodes.*')->from('pincodes')->order_by('id','desc')->get();
        $data['pincodes']=$query->result_array();
        $this->load->view('admin/pincodes/index',$data);
    }

    public function add()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
         $this->load->helper(array('form'));
         $this->load->library('form_validation');
            
             $this->form_validation->set_rules('pin', 'PIN CODE', 'required'); 
             $this->form_validation->set_rules('price', 'Shipping Charge', 'required');
            
            if ($this->form_validation->run() == FALSE) 
             { 
                 $this->load->view('admin/pincodes/add');
             } 
             else 
             {

                if($this->db->insert('pincodes',$_POST))
                {
                    $this->session->set_flashdata('msg', 'Pincodes Successfully Added');
                    return redirect(base_url('admin/pincodes'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                    return redirect(base_url('admin/pincodes/add'),'refresh');
                }
             } 
        }
        else
        {
            $this->load->view('admin/pincodes/add');
        }
    }

    public function edit($id='')
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
        $this->load->helper(array('form'));
         $this->load->library('form_validation');
             $this->form_validation->set_rules('pin', 'PIN CODE', 'required'); 
             $this->form_validation->set_rules('price', 'Price', 'required');
           
            if ($this->form_validation->run() == FALSE) 
             { 
                 $data['pincodes']=$this->db->where('id',$id)->get('pincodes')->row_array();
                 $this->load->view('admin/pincodes/edit',$data);
             } 
             else 
             { 
                

                if($this->db->where('id',$id)->update('pincodes',$_POST))
                {
                    $this->session->set_flashdata('msg', 'pincodes Successfully Added');
                    return redirect(base_url('admin/pincodes'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                    return redirect(base_url('admin/pincodes/edit/'.$id),'refresh');
                }
             }
        }
        else
        {
            $data['pincodes']=$this->db->where('id',$id)->get('pincodes')->row_array();
            $this->load->view('admin/pincodes/edit',$data);
        }
    }

    public function view($id='')
    {
         $data['pincodes']=$this->db->select('pincodes')->from('pincodes')->where('id',$id)->get('')->row_array();
         $this->load->view('admin/pincodes/view',$data);
    }

    

    public function delete($id='')
    {
        if($this->db->where('id',$id)->delete('pincodes'))
        {
            $this->session->set_flashdata('msg', 'Success Deleted pincodes');
        }
        else
        {
            $this->session->set_flashdata('err', 'Please try After Sometimes...');
        }
        return redirect(base_url('admin/pincodes'),'refresh');
    }

}
