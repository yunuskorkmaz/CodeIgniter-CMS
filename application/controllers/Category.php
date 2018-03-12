<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 27.02.2018
 * Time: 15:55
 */

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        parent::SessionControl();
    }
    public function Index(){
        $this->load->model("Category_model","kategori");
        $data["category_all"] = $this->kategori->get_hiyarar();
        $data["category_main"] = $this->kategori->get_category_main();
        $this->template("Product/CategoryIndex",$data);
    }

    public function edit($id = ""){
        if($id != ""){

            if($_POST){
                $data = array(
                    "name" => trim($_POST["name"]),
                    "parent_id" => trim($_POST["parent"])
                );

                $this->load->model("Category_model","kategori");
                $this->kategori->edit_category($id,$data);
                redirect("category");
            }
            $this->load->model("Category_model","kategori");
            $data["cat"] = $this->kategori->get_category_id($id);
            $data["category_main"] = $this->kategori->get_category_main();
            $this->template("Product/CategoryEdit",$data);


        }else{
            redirect($_SERVER["HTTP_REFERER"]);
        }

    }

    public function  delete($id){
        $this->load->model("Category_model","kategori");
        $this->kategori->delete($id);
        redirect($_SERVER["HTTP_REFERER"]);
    }
}