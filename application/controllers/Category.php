<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 27.02.2018
 * Time: 15:55
 */

class Category extends CI_Controller
{
    public function Index(){
        $this->load->model("Category_model","kategori");
        $data["category_all"] = $this->kategori->get_category_all();
        $data["category_main"] = $this->kategori->get_category_main();
        $this->template("Product/CategoryIndex",$data);
    }
}