<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();

        $x=$this->session->userdata('iletsadmin');
        if( $x['role']!=1)
        {
            return redirect('admin', 'refresh');
        }
    }


    public function index()
	{
        //$page =(isset($_GET['page'])) ? $_GET['page'] : 0;
        $data['file'] = $this->db->select('files.*')->from('files')->get()->result_array();
        //$data['links']=$this->pagi->pagination1('admin/news',$num_rows,20);
        $this->load->view('Files/view', $data);
	}


	public function addCatalog(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			// print_r($_POST);
			// exit;
			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('title', 'Catalaog', 'required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('Files/add');
			}else{
				$journalName = str_replace(' ', '_', $_FILES['file']['name']);
				$config['file_name'] = time() . $journalName;
				$config['upload_path'] = './uploads/file/';
				$config['allowed_types'] = 'pdf|PDF|doc|DOC';
				$this->load->library('upload');
				$this->upload->initialize($config);
				$this->upload->do_upload('file');
				$_POST['file'] = $config['file_name'];
				if($this->db->insert('files', $_POST)){
					$this->session->set_flashdata('msg', 'Successfully Added');
					return redirect(base_url('view-file'), 'refresh');
				}else{
					$this->session->set_flashdata('err', 'Please try Again After Sometimes');
					return redirect(base_url('add-catalog'), 'refresh');
				}
			}
		}
		else{
			$this->load->view('Files/add');
		}
	}

	public function delcatist($id){
		if($this->db->where('id', $id)->delete('files')){
			$this->session->set_flashdata('msg', 'Delete Successfully');
		}else{
			$this->session->set_flashdata('err', 'Please Try After Sometimes..');
		}
		return redirect(base_url('view-file'), 'refresh');
	}

	public function viewpricelist()
	{
        //$page =(isset($_GET['page'])) ? $_GET['page'] : 0;
        $data['file'] = $this->db->select('pricelist.*')->from('pricelist')->get()->result_array();
        //$data['links']=$this->pagi->pagination1('admin/news',$num_rows,20);
        $this->load->view('Files/view-pricelist', $data);
	}

	public function addPriceList(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			// print_r($_POST);
			// exit;
			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('title', 'Price-List', 'required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('Files/price-list');
			}else{
				$journalName = str_replace(' ', '_', $_FILES['file']['name']);
				$config['file_name'] = time() . $journalName;
				$config['upload_path'] = './uploads/file/';
				$config['allowed_types'] = 'pdf|PDF|doc|DOC';
				$this->load->library('upload');
				$this->upload->initialize($config);
				$this->upload->do_upload('file');
				$_POST['file'] = $config['file_name'];
				if($this->db->insert('pricelist', $_POST)){
					$this->session->set_flashdata('msg', 'Successfully Added');
					return redirect(base_url('view-pricelist'), 'refresh');
				}else{
					$this->session->set_flashdata('err', 'Please try Again After Sometimes');
					return redirect(base_url('add-pricelist'), 'refresh');
				}
			}
		}
		else{
			$this->load->view('Files/price-list');
		}
	}

	public function delpricelist($id){
		if($this->db->where('id', $id)->delete('pricelist')){
			$this->session->set_flashdata('msg', 'Delete Successfully');
		}else{
			$this->session->set_flashdata('err', 'Please Try After Sometimes..');
		}
		return redirect(base_url('view-pricelist'), 'refresh');
	}

	public function viewFilePage(){
		$data['file'] = $this->db->select('files.*')->from('files')->get()->result_array();
		$this->load->view('files',$data);
	}

}