<?php
class Welcome extends CI_Controller{
    function __construct()
    {
	parent::__construct();
	 $this->load->model('User_model');
     if($this->session->userdata('email') == '')
        {
            redirect('login/login');
        }
             $this->load->model('GenricModel');

    }

    function index()
    {
    $lastDate = $this->GenricModel->singlequery('select ExpenseDate From expense order by ExpenseDate DESC limit 1');
         $data['ld']= $lastDate; 
         //var_dump($data['ld']);die;
        $userid = $this->session->userdata('userid');
        $data['users'] = $this->User_model->get_user($userid);
		$data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }
	function changepassword()
    {
	$userid = $this->session->userdata('userid');
        $data['users'] = $this->User_model->get_user($userid);
        $data['_view'] = 'main/changepassword';
        $this->load->view('layouts/main', $data);
    }
	function updatepassword()
    {
            if (isset($_POST) && count($_POST) > 0) {

             $UserId = $this->input->post('UserId');
             $Password = $this->input->post('Password');
			 
			$this->db->set('Password', $Password);
                $this->db->where('UserId',$UserId);
                $this->db->update('user');

                redirect('welcome/index');
            }
    }
	function userprofile()
    {
        $userid = $this->session->userdata('userid');
        $data['users'] = $this->User_model->get_user($userid);

        $data['_view'] = 'main/userprofile';
        $this->load->view('layouts/main', $data);
    }
	function changeprofile()
    {
        $userid = $this->session->userdata('userid');
        $data['users'] = $this->User_model->get_user($userid);

        $data['_view'] = 'main/changeprofile';
        $this->load->view('layouts/main', $data);
    }
	 function editprofile($UserId)
    {
        // check if the user exists before trying to edit it
        $data['users'] = $this->User_model->get_user($UserId);

        if(isset($data['users']['UserId']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {

                $a= $_FILES['userfile']['name'];
                if($a != '') {
                    $b = explode(" ", $a);
                    $filename = implode("_", $b);
                }
                else {
                    $filename= $this->input->post('Photo');
                }

                $params = array(
                    'FullName' => $this->input->post('FullName'),
                    'Email' => $this->input->post('Email'),
                    'Description'=>$this->input->post('description'),
                    'Photo' => $filename
                );
            if($a != '') {
                $config['upload_path'] = './images/userimages/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 100;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('userfile')) {
                    $this->User_model->update_user($UserId, $params);
                    $error = array('error' => "Updated Successfully");
                    $this->session->set_flashdata('msg', $error);
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);

                    $data['_view'] = 'welcome/editprofile';
                    $this->load->view('layouts/main', $data);
                }
            }
            else{
                $this->User_model->update_user($UserId, $params);
                $error = array('error' => "Updated Successfully");
                $this->session->set_flashdata('msg', $error);
                redirect($_SERVER['HTTP_REFERER']);
            }

            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    }
}
