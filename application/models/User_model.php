<?php

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get($id){
        return $this->db->where("id",$id)->get("users")->row();
    }

    function delete($id){
        $this->db->delete("users",array("id" => $id));
    }

    function edit($data,$id){
        $this->db->where("id",$id)->update("users",$data);
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