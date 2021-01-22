<?php
class Income_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get income by IncomeId
     */
    function get_income($IncomeId)
    {
        return $this->db->get_where('income',array('IncomeId'=>$IncomeId))->row_array();
    }
        
    /*
     * Get all income
     */
    function get_all_income()
    {
        $this->db->order_by('IncomeId', 'desc');
        return $this->db->get('income')->result_array();
    }
        
    /*
     * function to add new income
     */
    function add_income($params)
    {
        $this->db->insert('income',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update income
     */
    function update_income($IncomeId,$params)
    {
        $this->db->where('IncomeId',$IncomeId);
        return $this->db->update('income',$params);
    }
    
    /*
     * function to delete income
     */
    function delete_income($IncomeId)
    {
        return $this->db->delete('income',array('IncomeId'=>$IncomeId));
    }
}
