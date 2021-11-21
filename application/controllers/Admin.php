<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    public function index() 
    {
      
       $this->load->view('login');
    }
    public function login() 
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
            $_POST['password']=($_POST['password']);
            $row=$this->db->where($_POST)->get('users')->num_rows();
            log_message('info', $row);
            log_message('info', $_POST['password']);
            if($row==0)
            {
                $this->session->set_flashdata('err', 'Please Enter Correct Credentials');
                return redirect(base_url('admin'),'refresh');
            }
            else
            {
                $data=$this->db->where($_POST)->get('users')->row_array();
                $array = array(
                    'iletsadmin' => $data
                );
                
                $this->session->set_userdata( $array );
                return redirect(base_url('admin/dashboard'),'refresh');
            }
        }
        else
        {
            $this->session->set_flashdata('err', 'Please Try Again');
            return redirect(base_url('admin'),'refresh');
        }
    }
    public function logout() {
        session_destroy();
        return redirect('admin', 'refresh');
    }
    public function dashboard() 
    {
        if(!check_login())
        {
            return redirect('welcome', 'refresh');
        }
        $data=$this->session->userdata('iletsadmin');
        if($data['role']==1)
        {
            $this->load->view('dashboard');
        }
        
    }
    public function profile() {
        if(!check_login())
        {
            return redirect('welcome', 'refresh');
        }
        $data['admin'] = $this->session->userdata('iletsadmin');
        $this->load->view('profile', $data);
    }
    public function change_pass() {
        if(!check_login())
        {
            return redirect('welcome', 'refresh');
        }
        $this->load->view('change_pass');
    }
    public function save_password() {
        $x = $this->session->userdata('iletsadmin');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('change_pass');
        } else {
            $password = md5($this->input->post('password'));
            if ($this->db->where('email', $x['email'])->update('users', array('password' => $password))) {
                $this->session->set_flashdata('msg', 'Password Updated Successfully');
                return redirect(base_url('profile'), 'refresh');
            } else {
                $this->session->set_flashdata('err', 'Password Not Updated Please Try Again');
                return redirect(base_url('profile'), 'refresh');
            }
        }
    }
    
 
}
