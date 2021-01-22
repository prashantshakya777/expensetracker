<?php
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user by UserId
     */
    function get_user($UserId)
    {
        return $this->db->get_where('user',array('UserId'=>$UserId))->row_array();
    }
        
    /*
     * Get all user
     */
    function get_all_user()
    {
        $this->db->order_by('UserId', 'desc');
        return $this->db->get('user')->result_array();
    }
        
    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('user',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($UserId,$params)
    {
        $this->db->where('UserId',$UserId);
        return $this->db->update('user',$params);
    }
    
    /*
     * function to delete user
     */
    function delete_user($UserId)
    {
        return $this->db->delete('user',array('UserId'=>$UserId));
    }
}
