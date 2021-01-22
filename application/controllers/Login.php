<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('id'))
        {
            redirect('private_area');
        }
        $this->load->model('Login_Model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

    public function login()
    {
        $data['_view'] = '/login/index';
        $this->load->view('layouts/main1',$data);
    }
    function login_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run())
        {
            //true
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            //model function
            $this->load->model('Login_Model');
            $userid = $this->Login_Model->can_login($email, $password);
            if(isset($userid) && $userid != false)
            {

                $session_data = array(
                    'email'     =>     $email,
                    'userid'    =>  $userid
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'login/enter');
            }
            else
            {
                $this->session->set_flashdata('error', 'Invalid Email and Password');
                redirect(base_url() . 'login/login');
            }
        }
        else
        {
            //false
            $this->login();
        }
    }
    function enter(){
        if($this->session->userdata('email') != '')
        {
//            $email = $this->session->userdata('email');
//            $userid = $this->session->userdata('userid');


            redirect(base_url() . 'welcome');
        }
        else
        {
            redirect(base_url() . 'login/login');
        }
    }
    function logout()
    {
        $this->session->unset_userdata('email');
        redirect(base_url() . 'login/login');
    }
}

