<?php
class Income extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
         if($this->session->userdata('email') == '')
        {
            redirect('login/login');
        }
        $this->load->model('Income_model');
        $this->load->model('User_model');
        $this->load->model('GenricModel');
        
		} 

    /*
     * Listing of income
     */
    function index()
    {
         $userid = $this->session->userdata('userid');
        $data['users'] = $this->User_model->get_user($userid);
        $data['income'] = $this->GenricModel->query('Select * from income where UserId='.$userid);
        
        $data['_view'] = 'income/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new income
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'Amount' => $this->input->post('Amount'),
				'UserId' => $this->input->post('UserId'),
                'AddedDate' => $this->input->post('AddedDate'),
				
            );
            $userid = $this->session->userdata('userid');
            $data['users'] = $this->User_model->get_user($userid);
            $income_id = $this->Income_model->add_income($params);
            redirect('income/index');
        }
        else
        {       
	        $userid = $this->session->userdata('userid');
	        $data['users'] = $this->User_model->get_user($userid);
            $data['_view'] = 'income/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a income
     */
    function edit($incomeId)
    {   
        // check if the income exists before trying to edit it
        $data['income'] = $this->Income_model->get_income($incomeId);
        
        if(isset($data['income']['incomeId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'Company' => $this->input->post('Company'),
					'FullName' => $this->input->post('FullName'),
					'Phone' => $this->input->post('Phone'),
					'Address' => $this->input->post('Address'),
					'Email' => $this->input->post('Email'),
					'Comment' => $this->input->post('Comment'),
                );

                $this->Income_model->update_income($incomeId,$params);            
                redirect('income/index');
            }
            else
            {
				$userid = $this->session->userdata('userid');
				$data['users'] = $this->User_model->get_user($userid);
                $data['_view'] = 'income/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The income you are trying to edit does not exist.');
    } 

    /*
     * Deleting income
     */
    function remove($incomeId)
    {
        $income = $this->Income_model->get_income($incomeId);

        // check if the income exists before trying to delete it
        if(isset($income['incomeId']))
        {
            $this->Income_model->delete_income($incomeId);
            redirect('income/index');
        }
        else
            show_error('The income you are trying to delete does not exist.');
    }
    
}