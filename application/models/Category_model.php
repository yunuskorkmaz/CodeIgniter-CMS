<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 17.02.2018
 * Time: 15:26
 */

class Category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_category_all(){
        return  $this->db->get("categorys")->result();
    }
    public function get_category_main(){
       return  $this->db->where("parent_id","0")->get("categorys")->result();
    }

    public function add_category($data){
        return $this->db->insert("categorys",$data);
    }
}