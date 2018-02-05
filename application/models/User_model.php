<?php

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function GetUsers()
    {
        $query = $this->db->get("users");
        return $query->result();

    }

    public function AddUser($insert){
        $query = $this->db->insert("users",$insert);
    }
}

?>