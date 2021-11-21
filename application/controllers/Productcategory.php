<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productcategory extends CI_Controller 
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
        $query=$this->db->select('c.*,p.name as parent')->from('productcategory as c')->join('productcategory as p','c.parent_id=p.id','left')->order_by('id','desc')->get();
        $data['productcategory']=$query->result_array();
        $this->load->view('admin/productcategory/index',$data);
    }

    public function add()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
         $this->load->helper(array('form'));
         $this->load->library('form_validation');
           $string = str_replace(' ', '-', $_POST['url']);  
                 $_POST['url']=preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
             $this->form_validation->set_rules('name', 'Name', 'required'); 
             $this->form_validation->set_rules('parent_id', 'Parent ID', 'required');
             $this->form_validation->set_rules('url', 'URL', 'required|is_unique[productcategory.url]');
            if ($this->form_validation->run() == FALSE) 
             { 
                 $this->load->view('admin/productcategory/add');
             } 
             else 
             {

                if($_FILES['image']['name']!='')
                {
                    $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                    $journalName = str_replace(' ', '_', $_FILES['image']['name']);
                    $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);
                $config['file_name'] = time() . $jname.'.'.$ext;
                $config['upload_path'] = './uploads/productcategory/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $_POST['image'] = $config['file_name'];
                } 

                if($_FILES['icon']['name']!='')
                {
                    $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                    $journalName = str_replace(' ', '_', $_FILES['icon']['name']);
                    $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);
                $config['file_name'] = time() . $jname.'.'.$ext;
                $config['upload_path'] = './uploads/productcategory/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
                $this->upload->initialize($config);
                $this->upload->do_upload('icon');
                $_POST['icon'] = $config['file_name'];
                }

                if($this->db->insert('productcategory',$_POST))
                {
                    $this->session->set_flashdata('msg', 'productcategory Successfully Added');
                    return redirect(base_url('admin/productcategory'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                    return redirect(base_url('admin/productcategory/add'),'refresh');
                }
             } 
        }
        else
        {
            $this->load->view('admin/productcategory/add');
        }
    }

    public function edit($id='')
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
        $this->load->helper(array('form'));
         $this->load->library('form_validation');
         $string = str_replace(' ', '-', $_POST['url']);  
                 $_POST['url']=preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
                 $cat=$this->db->where('id',$id)->get('productcategory')->row_array();
             $this->form_validation->set_rules('name', 'Name', 'required'); 
             $this->form_validation->set_rules('parent_id', 'Parent ID', 'required');
             if($cat['url']==$_POST['url'])
             {
                $this->form_validation->set_rules('url', 'URL', 'required'); 
             }
             else
             {
                $this->form_validation->set_rules('url', 'URL', 'required|is_unique[productcategory.url]'); 
             }
            if ($this->form_validation->run() == FALSE) 
             { 
                 $data['productcategory']=$this->db->where('id',$id)->get('productcategory')->row_array();
                 $this->load->view('admin/productcategory/edit',$data);
             } 
             else 
             { 
                 if(!isset($_POST['offer']))
                 {
                    $_POST['offer']='';
                    $_POST['percentage']=0;
                 }
                if($_FILES['image']['name']!='')
                {
                    $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                    $journalName = str_replace(' ', '_', $_FILES['image']['name']);
                    $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);
                $config['file_name'] = time() . $jname.'.'.$ext;
                $config['upload_path'] = './uploads/productcategory/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $_POST['image'] = $config['file_name'];
                } 

                if($_FILES['icon']['name']!='')
                {
                    $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                    $journalName = str_replace(' ', '_', $_FILES['icon']['name']);
                    $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);
                $config['file_name'] = time() . $jname.'.'.$ext;
                $config['upload_path'] = './uploads/productcategory/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';
                $this->upload->initialize($config);
                $this->upload->do_upload('icon');
                $_POST['icon'] = $config['file_name'];
                }

                if($this->db->where('id',$id)->update('productcategory',$_POST))
                {
                    $this->session->set_flashdata('msg', 'productcategory Successfully Added');
                    return redirect(base_url('admin/productcategory'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');
                    return redirect(base_url('admin/productcategory/edit/'.$id),'refresh');
                }
             }
        }
        else
        {
            $data['productcategory']=$this->db->where('id',$id)->get('productcategory')->row_array();
            $this->load->view('admin/productcategory/edit',$data);
        }
    }

    public function view($id='')
    {
         $data['productcategory']=$this->db->select('c.*,p.name as parent')->from('productcategory as c')->join('productcategory as p','c.parent_id=p.id','left')->where('c.id',$id)->get('productcategory')->row_array();
         $this->load->view('admin/productcategory/view',$data);
    }

    public function delete($id='')
    {
        if($this->db->where('id',$id)->delete('productcategory'))
        {
            $this->session->set_flashdata('msg', 'Success Deleted productcategory');
        }
        else
        {
            $this->session->set_flashdata('err', 'Please try After Sometimes...');
        }
        return redirect(base_url('admin/productcategory'),'refresh');
    }

}
