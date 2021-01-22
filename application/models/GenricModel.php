<?php
class GenricModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function get_all($table, $orderby="",$direction="",$limitEnd=0,$limitstart=0){
        $this->db->from($table);
        if($limitEnd > 0)
        {
            $this->db->limit($limitEnd,$limitstart);
        }
        if($orderby){
            $this->db->order_by($orderby,$direction);
            }
        $query = $this->db->get();
        $result = $query->result_array() ;
        return $result;
    }
    function get_ddl_asc($table,$fields){
        $this->db->select($fields);
        $this->db->from($table);
        $query = $this->db->get();
        $result =  $query->result_array() ;
        return $result;
    }
     function get_selectedfield($table,$fields,$where){
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        $result =  $query->result_array() ;
        return $result;
    }
    function get_by_Id($table,$where,$id)
    {
        $this->db->from($table);
        $this->db->where($where,$id);
        $query = $this->db->get();
        $result =  $query->row_array();
        return $result;
    }
    function get_news_Id($table,$where,$id)
    {
        $this->db->from($table);
        $this->db->where($where,$id);
        //$this->db->where('NewsID',12);
        $query = $this->db->get();
        $result = $query->result_array() ;
        return $result;
    }
    function get_parent_Id($table,$field,$where,$id)
    {
        $this->db->from($table);
        $this->db->where($where,$id);
        $query = $this->db->get();
        $resultArray =  $query->row_array();
        $result=$resultArray[$field];
        return $result;
    }
    function getName($table,$fields,$where,$id){
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where($where,$id);
        $query = $this->db->get();
        $resultArray =  $query->row_array();
        $result=$resultArray[$fields];
        return $result;
    }
    function get_where($table,$where,$id,$orderby="",$direction="",$limitEnd=0,$limitstart=0)
    {
        $this->db->from($table);
        $this->db->where($where,$id);
        if($limitEnd > 0)
        {
            $this->db->limit($limitEnd,$limitstart);
        }
        if($orderby){
            $this->db->order_by($orderby,$direction);
            }
        $query = $this->db->get();
        $result =  $query->result_array() ;
        return $result;
    }
function get_singlerowwhere($table,$where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        $result=$query->row_array();
      //  $result =  $query->result_array() ;
        return $result;
    }
    function get_multiplerowwhere($table,$where,$orderby="",$direction="",$limitEnd=0,$limitstart=0)
    {
        $this->db->from($table);
        $this->db->where($where);
        if($limitEnd > 0)
        {
            $this->db->limit($limitEnd,$limitstart);
        }
        if($orderby){
            $this->db->order_by($orderby,$direction);
        }
        $query = $this->db->get();
        //$result=$query->row_array();
        $result =  $query->result_array() ;
        return $result;
    }
    function add($table,$data)
    {
        $this->db->insert($table, $data);         
        return $this->db->insert_id();      
    }
    function addgetId($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
        {
          return $this->db->insert_id();
        }
        return 0;       
    }
    function getlastid($table, $data){
     //$id=0;
       $this->db->insert($table, $data);
        $id =  $this->db->insert_id();
     //   echo $id;
if ($id!=0)
        {
            return $id;
        }
        return $id;   
        }
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        return FALSE;       
    }
    function editmultiplecondition($table,$data,$fieldID){
        $this->db->where($fieldID);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        return FALSE;       
    }
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;        
    }   
    function deletebyid($table,$Id)
    {
        return $this->db->delete('$table',$id);
    }
    function get_ID_back($table, $data)
    {
        $this->db->insert($table, $data);
        $a=$this->db->insert_id();        
        if ($this->db->affected_rows() == '1')
        {
            return $a;
        }
        return FALSE;       
    }
    function query($qry)
    {
        $query=$qry;
        $result=$this->db->query($query);
        return $result->result_array();
    }
    function singlequery($qry)
        {
            $query=$qry;
            $result=$this->db->query($query);
            return $result->row_array();
        }
    function editquery($qry)
    {
        $query=$qry;
        $result=$this->db->query($query);
        return 1;
    }
    function truncate($qry)
        {
            $query=$qry;
            $result=$this->db->query($query);
            //return $result->row_array();
        }
    function count($table){
        return $this->db->count_all($table);
    }
    function user($username,$password)
    {
        $login_qry = ("select * from tbl_admin where admin_name = '$username' && admin_password = '$password' ");
        $query=$this->db->query($login_qry); 
        $result=$query->row_array(); 
        return $result;
    }
    public function get_report_by_category($category){
        $this->db->order_by('id', 'DESC');
        $this->db->where('report_category', $category);
        $query = $this->db->get('report');
      //  echo $this->db->last_query();
        return $query->result();
    }
}