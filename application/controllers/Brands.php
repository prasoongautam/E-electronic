<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Brands extends CI_Controller 

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

        $query=$this->db->select('brands.*')->from('brands')->order_by('id','desc')->limit(20,($page))->get();

        $num_rows=$this->db->order_by('id', 'desc')->get('brands')->num_rows();

        $data['brands']=$query->result_array();

        $data['links']=$this->pagi->pagination1('admin/brands',$num_rows,20);

        $this->load->view('admin/brands/index',$data);

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
         $this->form_validation->set_rules('url', 'URL', 'required|is_unique[brands.url]');

            if ($this->form_validation->run() == FALSE) 

             { 

                 $this->load->view('admin/brands/add');

             } 

             else 

             { 

               

                $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

                     $journalName = str_replace(' ', '_', $_FILES['image']['name']);

                     $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);

                $config['file_name'] = time() . $jname.'.'.$ext;

                $config['upload_path'] = './uploads/brands/';

                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';

                $this->upload->initialize($config);

                $this->upload->do_upload('image');

                $_POST['image'] = $config['file_name'];

                if($this->db->insert('brands',$_POST))

                {

                    $this->session->set_flashdata('msg', 'brands Successfully Added');

                    return redirect(base_url('admin/brands'),'refresh');

                }

                else

                {

                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');

                    return redirect(base_url('admin/brands/add'),'refresh');

                }

             } 

        }

        else

        {

            $this->load->view('admin/brands/add');

        }

    }



    public function edit($id='')

    {

        if ($this->input->server('REQUEST_METHOD') == 'POST') 

        {

            $string = str_replace(' ', '-', $_POST['url']);  

                 $_POST['url']=preg_replace('/[^A-Za-z0-9\-]/', '', $string); 

                 $cat=$this->db->where('id',$id)->get('brands')->row_array();
        $this->load->helper(array('form'));

         $this->load->library('form_validation');

         $this->form_validation->set_rules('name', 'Name', 'required'); 
 if($cat['url']==$_POST['url'])

             {

                $this->form_validation->set_rules('url', 'URL', 'required'); 

             }

             else

             {

                $this->form_validation->set_rules('url', 'URL', 'required|is_unique[brands.url]'); 

             }

         

            if ($this->form_validation->run() == FALSE) 

             { 

                 $data['brands']=$this->db->where('id',$id)->get('brands')->row_array();

                 $this->load->view('admin/brands/edit',$data);

             } 

             else 

             { 

               

                if($_FILES['image']['name']!='')

                {

                    $ext=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

                     $journalName = str_replace(' ', '_', $_FILES['image']['name']);

                     $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);

                $config['file_name'] = time() . $jname.'.'.$ext;

                $config['upload_path'] = './uploads/brands/';

                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';

                $this->upload->initialize($config);

                $this->upload->do_upload('image');

                $_POST['image'] = $config['file_name'];

                }

                if($this->db->where('id',$id)->update('brands',$_POST))

                {

                    $this->session->set_flashdata('msg', 'brands Successfully Added');

                    return redirect(base_url('admin/brands'),'refresh');

                }

                else

                {

                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');

                    return redirect(base_url('admin/brands/edit/'.$id),'refresh');

                }

             }

        }

        else

        {

            $data['brands']=$this->db->where('id',$id)->get('brands')->row_array();

            $this->load->view('admin/brands/edit',$data);

        }

    }



    public function view($id='')

    {

         $data['brands']=$this->db->where('id',$id)->get('brands')->row_array();

         $this->load->view('admin/brands/view',$data);

    }



    public function delete($id='')

    {

        if($this->db->where('id',$id)->delete('brands'))

        {

            $this->session->set_flashdata('msg', 'Success Deleted brands');

        }

        else

        {

            $this->session->set_flashdata('err', 'Please try After Sometimes...');

        }

        return redirect(base_url('admin/brands'),'refresh');

    }



}

