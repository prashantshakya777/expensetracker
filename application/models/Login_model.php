<?php
class Login_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }
    function can_login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('user');

        //SELECT * FROM users WHERE username = '$username' AND password = '$password'
        if($query->num_rows() > 0)
        {
            $row = $this->db->get_where('user', array('email' => $email, 'password' => $password))->row();
            return $row->UserId;
        }
        else
        {
            return false;
        }
    }
}
