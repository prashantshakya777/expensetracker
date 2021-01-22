<?php
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    /*
     * Listing of user
     */
    function index()
    {
        $data['user'] = $this->User_model->get_all_user();
		$userid = $this->session->userdata('userid');
        $data['users'] = $this->User_model->get_user($userid);
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main1',$data);
    }

    /*
     * Adding a new user
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
           
            $params = array(
                'FullName' => $this->input->post('FullName'),
                'Email' => $this->input->post('Email'),
                'Password' => $this->input->post('Password'),
               
            );
			//var_dump($params);die;
           
                $user_id = $this->User_model->add_user($params);
                redirect('user/add');
        }
            else
            {
                $userid = $this->session->userdata('userid');
                $data['users'] = $this->User_model->get_user($userid);
                $data['_view'] = 'user/add';
                $this->load->view('layouts/main1',$data);
            }
    }

    /*
     * Editing a user
     */
    function edit($UserId)
    {
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($UserId);

        if(isset($data['user']['UserId']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'FullName' => $this->input->post('FullName'),
                    'Email' => $this->input->post('Email'),
                    'Password' => $this->input->post('Password'),
                );

                $this->User_model->update_user($UserId,$params);
                redirect('user/index');
            }
            else
            {
				
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main12',$data);
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    }

    /*
     * Deleting user
     */
    function remove($UserId)
    {
        $user = $this->User_model->get_user($UserId);

        // check if the user exists before trying to delete it
        if(isset($user['UserId']))
        {
            $this->User_model->delete_user($UserId);
            redirect('user/index');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }

}

