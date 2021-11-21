<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Webinfo extends CI_Controller 

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

        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
                $this->db->where('id',1)->update('webinfo',$_POST);
                $this->session->set_flashdata('msg', 'Info Successfully updated');
                return redirect('admin/webinfo');
        }
        else
        {
            $data['webinfo']=$this->db->where('id',1)->get('webinfo')->row_array();
            $this->load->view('admin/webinfo',$data);
        }

    }


}

