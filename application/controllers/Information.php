<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller 
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
        $query=$this->db->select('information.*')->from('information')->order_by('id','desc')->get();
        $data['information']=$query->result_array();
        $this->load->view('admin/information/index',$data);
    }

    public function add()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
         $this->load->helper(array('form'));
         $this->load->library('form_validation');
            
             $this->form_validation->set_rules('title', 'Title', 'required'); 
            
            if ($this->form_validation->run() == FALSE) 
             { 
                 $this->load->view('admin/information/add');
             } 
             else 
             {
                 $string = str_replace(' ', '-', $_POST['title']); // Replaces all spaces with hyphens.

   $_POST['url']= preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
                if($this->db->insert('information',$_POST))
                {
                    $this->session->set_flashdata('msg', 'information Successfully Added');
                    return redirect(base_url('admin/information'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                    return redirect(base_url('admin/information/add'),'refresh');
                }
             } 
        }
        else
        {
            $this->load->view('admin/information/add');
        }
    }

    public function edit($id='')
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
        $this->load->helper(array('form'));
         $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required'); 
           
            if ($this->form_validation->run() == FALSE) 
             { 
                 $data['information']=$this->db->where('id',$id)->get('information')->row_array();
                 $this->load->view('admin/information/edit',$data);
             } 
             else 
             { 
                
                                 $string = str_replace(' ', '-', $_POST['title']); // Replaces all spaces with hyphens.

   $_POST['url']= preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
                if($this->db->where('id',$id)->update('information',$_POST))
                {
                    $this->session->set_flashdata('msg', 'information Successfully Added');
                    return redirect(base_url('admin/information'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                    return redirect(base_url('admin/information/edit/'.$id),'refresh');
                }
             }
        }
        else
        {
            $data['information']=$this->db->where('id',$id)->get('information')->row_array();
            $this->load->view('admin/information/edit',$data);
        }
    }

    public function view($id='')
    {
         $data['information']=$this->db->select('*')->from('information')->where('id',$id)->get()->row_array();
         $this->load->view('admin/information/view',$data);
    }

    

    public function delete($id='')
    {
        if($this->db->where('id',$id)->delete('information'))
        {
            $this->session->set_flashdata('msg', 'Success Deleted information');
        }
        else
        {
            $this->session->set_flashdata('err', 'Please try After Sometimes...');
        }
        return redirect(base_url('admin/information'),'refresh');
    }

}
