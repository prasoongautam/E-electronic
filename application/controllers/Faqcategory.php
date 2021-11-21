<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faqcategory extends CI_Controller 
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
        $query=$this->db->select('faqcategory.*')->from('faqcategory')->order_by('id','desc')->limit(20,($page))->get();
        $num_rows=$this->db->order_by('id', 'desc')->get('faqcategory')->num_rows();
        $data['faqcategory']=$query->result_array();
        $data['links']=$this->pagi->pagination1('admin/faqcategory',$num_rows,20);
        $this->load->view('admin/faqcategory/index',$data);
    }

    public function add()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
         $this->load->helper(array('form'));
         $this->load->library('form_validation');
         $this->form_validation->set_rules('name', 'Name', 'required'); 
            if ($this->form_validation->run() == FALSE) 
             { 
                 $this->load->view('admin/faqcategory/add');
             } 
             else 
             { 
               
              
                if($this->db->insert('faqcategory',$_POST))
                {
                    $this->session->set_flashdata('msg', 'faqcategory Successfully Added');
                    return redirect(base_url('admin/faqcategory'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                    return redirect(base_url('admin/faqcategory/add'),'refresh');
                }
             } 
        }
        else
        {
            $this->load->view('admin/faqcategory/add');
        }
    }

    public function edit($id='')
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
        $this->load->helper(array('form'));
         $this->load->library('form_validation');
         $this->form_validation->set_rules('name', 'Name', 'required'); 
         
            if ($this->form_validation->run() == FALSE) 
             { 
                 $data['faqcategory']=$this->db->where('id',$id)->get('faqcategory')->row_array();
                 $this->load->view('admin/faqcategory/edit',$data);
             } 
             else 
             { 
               
                if($this->db->where('id',$id)->update('faqcategory',$_POST))
                {
                    $this->session->set_flashdata('msg', 'faqcategory Successfully Added');
                    return redirect(base_url('admin/faqcategory'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                    return redirect(base_url('admin/faqcategory/edit/'.$id),'refresh');
                }
             }
        }
        else
        {
            $data['faqcategory']=$this->db->where('id',$id)->get('faqcategory')->row_array();
            $this->load->view('admin/faqcategory/edit',$data);
        }
    }

    public function view($id='')
    {
         $data['faqcategory']=$this->db->where('id',$id)->get('faqcategory')->row_array();
         $this->load->view('admin/faqcategory/view',$data);
    }

    public function delete($id='')
    {
        if($this->db->where('id',$id)->delete('faqcategory'))
        {
            $this->session->set_flashdata('msg', 'Success Deleted faqcategory');
        }
        else
        {
            $this->session->set_flashdata('err', 'Please try After Sometimes...');
        }
        return redirect(base_url('admin/faqcategory'),'refresh');
    }

}
