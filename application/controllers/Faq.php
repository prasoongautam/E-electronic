<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller 
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
        $query=$this->db->select('faq.*')->from('faq')->order_by('id','desc')->limit(20,($page))->get();
        $num_rows=$this->db->order_by('id', 'desc')->get('faq')->num_rows();
        $data['faq']=$query->result_array();
        $data['links']=$this->pagi->pagination1('admin/faq',$num_rows,20);
        $this->load->view('admin/faq/index',$data);
    }

    public function add()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
         $this->load->helper(array('form'));
         $this->load->library('form_validation');
         $this->form_validation->set_rules('question', 'Question', 'required');
         $this->form_validation->set_rules('answer', 'Answer', 'required'); 
            if ($this->form_validation->run() == FALSE) 
             { 
                 $this->load->view('admin/faq/add');
             } 
             else 
             { 
               
               
                if($this->db->insert('faq',$_POST))
                {
                    $this->session->set_flashdata('msg', 'faq Successfully Added');
                    return redirect(base_url('admin/faq'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                    return redirect(base_url('admin/faq/add'),'refresh');
                }
             } 
        }
        else
        {
            $this->load->view('admin/faq/add');
        }
    }

    public function edit($id='')
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
        $this->load->helper(array('form'));
         $this->load->library('form_validation');
          $this->form_validation->set_rules('question', 'Question', 'required');
         $this->form_validation->set_rules('answer', 'Answer', 'required');  
         
            if ($this->form_validation->run() == FALSE) 
             { 
                 $data['faq']=$this->db->where('id',$id)->get('faq')->row_array();
                 $this->load->view('admin/faq/edit',$data);
             } 
             else 
             { 
               
                
                if($this->db->where('id',$id)->update('faq',$_POST))
                {
                    $this->session->set_flashdata('msg', 'faq Successfully Added');
                    return redirect(base_url('admin/faq'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                    return redirect(base_url('admin/faq/edit/'.$id),'refresh');
                }
             }
        }
        else
        {
            $data['faq']=$this->db->where('id',$id)->get('faq')->row_array();
            $this->load->view('admin/faq/edit',$data);
        }
    }

    public function view($id='')
    {
         $data['faq']=$this->db->where('id',$id)->get('faq')->row_array();
         $this->load->view('admin/faq/view',$data);
    }

    public function delete($id='')
    {
        if($this->db->where('id',$id)->delete('faq'))
        {
            $this->session->set_flashdata('msg', 'Success Deleted faq');
        }
        else
        {
            $this->session->set_flashdata('err', 'Please try After Sometimes...');
        }
        return redirect(base_url('admin/faq'),'refresh');
    }

}
