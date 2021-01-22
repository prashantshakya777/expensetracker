<?php
class Expense_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get expense by ExpenseId
     */
    function get_expense($ExpenseId)
    {
        return $this->db->get_where('expense',array('ExpenseId'=>$ExpenseId))->row_array();
    }
        
    /*
     * Get all expense
     */
    function get_all_expense()
    {
        $this->db->order_by('ExpenseId', 'desc');
        return $this->db->get('expense')->result_array();
    }
        
    /*
     * function to add new expense
     */
    function add_expense($params)
    {
        $this->db->insert('expense',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update expense
     */
    function update_expense($ExpenseId,$params)
    {
        $this->db->where('ExpenseId',$ExpenseId);
        return $this->db->update('expense',$params);
    }
    
    /*
     * function to delete expense
     */
    function delete_expense($ExpenseId)
    {
        return $this->db->delete('expense',array('ExpenseId'=>$ExpenseId));
    }
}
