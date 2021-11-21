<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller 

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

        $query=$this->db->select('slider.*')->from('slider')->order_by('id','desc')->limit(20,($page))->get();

        $num_rows=$this->db->order_by('id', 'desc')->get('slider')->num_rows();

        $data['slider']=$query->result_array();

        $data['links']=$this->pagi->pagination1('admin/slider',$num_rows,20);

        $this->load->view('admin/slider/index',$data);

    }



    public function add($id='')

    {

        if ($this->input->server('REQUEST_METHOD') == 'POST') 

        {

         $this->load->helper(array('form'));

         $this->load->library('form_validation');

         $this->form_validation->set_rules('type', 'Type', 'required'); 

            if ($this->form_validation->run() == FALSE) 

             { 

                 $this->load->view('admin/slider');

             } 

             else 

             { 

               

                $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

                     $journalName = str_replace(' ', '_', $_FILES['image']['name']);

                     $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);

                $config['file_name'] = time() . $jname.'.'.$ext;

                $config['upload_path'] = './uploads/slider/';

                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';

                $this->upload->initialize($config);

                $this->upload->do_upload('image');

                $_POST['image'] = $config['file_name'];

                if($this->db->insert('slider',$_POST))

                {

                    $this->session->set_flashdata('msg', 'slider Successfully Added');

                    return redirect(base_url('admin/slider'),'refresh');

                }

                else

                {

                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');

                    return redirect(base_url('admin/slider'),'refresh');

                }

             } 

        }

        else

        {
            $data['type']=$this->uri->segment(3);
            $data['redirect_id']=$id;
            $this->load->view('admin/slider/add',$data);

        }

    }



    public function edit($id='')

    {

        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
                if($_FILES['image']['name']!='')

                {

                    $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

                     $journalName = str_replace(' ', '_', $_FILES['image']['name']);

                     $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);

                $config['file_name'] = time() . $jname.'.'.$ext;

                $config['upload_path'] = './uploads/slider/';

                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';

                $this->upload->initialize($config);

                $this->upload->do_upload('image');

                $_POST['image'] = $config['file_name'];

                }

                if($this->db->where('id',$id)->update('slider',$_POST))

                {

                    $this->session->set_flashdata('msg', 'slider Successfully Added');

                    return redirect(base_url('admin/slider'),'refresh');

                }

                else

                {

                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');

                    return redirect(base_url('admin/slider/edit/'.$id),'refresh');

                }

             }
        else

        {

            $data['slider']=$this->db->where('id',$id)->get('slider')->row_array();

            $this->load->view('admin/slider/edit',$data);

        }

    }



    public function view($id='')

    {

         $data['slider']=$this->db->where('id',$id)->get('slider')->row_array();

         $this->load->view('admin/slider/view',$data);

    }



    public function delete($id='')

    {

        if($this->db->where('id',$id)->delete('slider'))

        {

            $this->session->set_flashdata('msg', 'Success Deleted slider');

        }

        else

        {

            $this->session->set_flashdata('err', 'Please try After Sometimes...');

        }

        return redirect(base_url('admin/slider'),'refresh');

    }



}

