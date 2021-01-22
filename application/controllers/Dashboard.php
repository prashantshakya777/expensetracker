<?php
 
class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
         if($this->session->userdata('email') == '')
        {
            redirect('login/login');
        }
			 $this->load->model('User_model');
        
    }

    function index()
    {
       
        $userid = $this->session->userdata('userid');
        $data['users'] = $this->User_model->get_user($userid);
		$data['_view'] = 'dashboard';
        $this->load->view('layouts/main2',$data);
    }
}
