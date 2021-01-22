<?php
class Expense extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
         if($this->session->userdata('email') == '')
        {
            redirect('login/login');
        }
        $this->load->model('Expense_model');
        $this->load->model('User_model'); 
		$this->load->model('GenricModel');
        } 

    /*
     * Listing of expense
     */
    function index()
    {
    
        $userid = $this->session->userdata('userid');
        $data['users'] = $this->User_model->get_user($userid);
        $data['expense'] = $this->GenricModel->query('select * from expense where UserId='.$userid);
        //var_dump( $data['expense']);die;
        $data['_view'] = 'expense/index';
        $this->load->view('layouts/main',$data);
    }


    function datewisereport()
    {
      
       $lastDashboardDate = $this->GenricModel->singlequery('select ExpenseDate From expense order by ExpenseDate DESC ');
        $userid = $this->session->userdata('userid');
        $data['users'] = $this->User_model->get_user($userid);
        if(isset($_POST) && count($_POST) > 0)
        {
            $fromdate = $this->input->post('FromDate');
            $todate = $this->input->post('ToDate');
            $data['frmdate'] =  $fromdate;
            $data['todate'] = $todate;
            $sql = 'SELECT e.*, u.FullName FROM expense e 
            LEFT JOIN user u ON u.UserId = e.UserId 
            where e.ExpenseDate>="'.$fromdate.'" and e.ExpenseDate<="'.$todate.'" and u.UserId='.$userid.' Order By e.ExpenseDate DESC';
        }
        else
        {
            $sql = 'SELECT e.*, u.FullName FROM expense e 
            LEFT JOIN user u ON u.UserId = e.UserId 
            where e.ExpenseDate="'.$lastDashboardDate['ExpenseDate'].'" and u.UserId='.$userid.' ORDER BY e.ExpenseDate DESC';
            $data['frmdate'] =  '';
            $dat['todate'] = '';
        }
        //echo $sql;
        $data['expense'] = $this->GenricModel->query($sql);
        //var_dump($data['expense']);die;
          $userid = $this->session->userdata('userid');
        $data['users'] = $this->User_model->get_user($userid);
        //$data['expense'] = $this->GenricModel->query('select * from expense where UserId='.$userid);
        //var_dump( $data['expense']);die;
        $data['_view'] = 'expense/datewisereport';
        $this->load->view('layouts/main',$data);
       
    }
    /*
     * Adding a new expense
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'Item' => $this->input->post('Item'),
				'Amount' => $this->input->post('Amount'),
				'UserId' => $this->input->post('UserId'),
                'ExpenseDate' => $this->input->post('ExpenseDate'),
				
            );

            $userid = $this->session->userdata('userid');
            $data['users'] = $this->User_model->get_user($userid);
            $expense_id = $this->Expense_model->add_expense($params);
            redirect('expense/index');
        }
        else
        {       
	        $userid = $this->session->userdata('userid');
	        $data['users'] = $this->User_model->get_user($userid);
            $data['_view'] = 'expense/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a expense
     */
    function edit($ExpenseId)
    {   
        // check if the expense exists before trying to edit it
        $data['expense'] = $this->Expense_model->get_expense($ExpenseId);
        
        if(isset($data['expense']['ExpenseId']))
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

                $this->Expense_model->update_expense($ExpenseId,$params);            
                redirect('expense/index');
            }
            else
            {
				$userid = $this->session->userdata('userid');
				$data['users'] = $this->User_model->get_user($userid);
                $data['_view'] = 'expense/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The expense you are trying to edit does not exist.');
    } 

    /*
     * Deleting expense
     */
    function remove($ExpenseId)
    {
        $expense = $this->Expense_model->get_expense($ExpenseId);

        // check if the expense exists before trying to delete it
        if(isset($expense['ExpenseId']))
        {
            $this->Expense_model->delete_expense($ExpenseId);
            redirect('expense/index');
        }
        else
            show_error('The expense you are trying to delete does not exist.');
    }
    
}