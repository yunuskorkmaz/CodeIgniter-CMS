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

    public function get_hiyarar(){
        $result =  $this->db->order_by("parent_id")->get("categorys")->result();
        $tree = array();
        foreach ($result as  $item)
        {
            if($item->parent_id == 0){
                $tree[$item->id] = $item;
            }
            else{
                $tree[$item->parent_id]->subitems[] = $item;
            }
        }

        return $tree;
    }

    public function get_category_id($id){
        return  $this->db->where("id",$id)->get("categorys")->row();
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

    public  function edit_category($id,$data){
        $this->db->where("id",$id)->update("categorys",$data);
    }
    public function  delete($id){
        $this->db->delete('categorys', array('id' => $id));
    }
}