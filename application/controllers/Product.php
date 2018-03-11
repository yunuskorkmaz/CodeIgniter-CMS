<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 17.02.2018
 * Time: 15:00
 */

class Product extends CI_Controller
{
    public function Index(){
        $this->load->model("Product_model","urun");
        $data["products"] =  $this->urun->get_list();
        $this->template("Product/Index",$data);
    }

    public function changefav($id,$to){
        $this->load->model("Product_model","urun");
        $this->urun->changefav($id,$to);
//        redirect($_SERVER["HTTP_REFERER"]);
    }
    public function changetrend($id,$to){
        $this->load->model("Product_model","urun");
        $this->urun->changetrend($id,$to);
        redirect($_SERVER["HTTP_REFERER"]);
    }

    public function delete($id){
        if(!empty($id)){
            $this->load->model("Product_model","urun");
            $this->urun->delete($id);
        }
//            redirect($_SERVER["HTTP_REFERER"]);

    }

    public function Edit($id){
        if(!empty($id)){
            $this->load->model("Product_model","urun");
            $urun = $this->urun->get_product($id);

            if($urun != null){
                $this->load->model("Category_model","kategori");

                $data["category_all"] = $this->kategori->get_category_all();
                $data["urun"] = $urun;


                $this->template("Product/Edit",$data);
            }else{
//                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
    }

    public function editProduct($id){
        if($_POST){
            $postdata = array(
                "name"=> trim($_POST["adi"]),
                "code" => trim($_POST["kod"]),
                "category" => trim($_POST["parent"]),
                "stock" => (isset($_POST["stok"])) == 1 ? 1: 0,
                "fav" => (isset($_POST["tercih"])) == 1 ? 1: 0,
                "trend" => trim($_POST["trend"]),
                "image" => empty($_FILES["image"]["tmp_name"]) == false ? 'image' : '',
                "descreption" => trim($_POST["aciklama"]),
                "seo_keyw" => trim($_POST["seo_keyw"]),
                "seo_desc" => trim($_POST["seo_desc"])
            );


            $this->load->model("Product_model","urun");

            $data["result"] = $this->urun->editproduct($postdata,$id);
//            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    public function addProduct(){

        if($_POST){
            $postdata = array(
                "name"=> trim($_POST["adi"]),
                "code" => trim($_POST["kod"]),
                "category" => trim($_POST["parent"]),
                "stock" => (isset($_POST["stok"])) == 1 ? 1: 0,
                "fav" => (isset($_POST["tercih"])) == 1 ? 1: 0,
                "trend" => trim($_POST["trend"]),
                "image" => "image",
                "descreption" => trim($_POST["aciklama"]),
                "seo_keyw" => trim($_POST["seo_keyw"]),
                "seo_desc" => trim($_POST["seo_desc"])
            );

            $this->load->model("Product_model","urun");

            $data["result"] = $this->urun->addproduct($postdata);



        }


        $this->load->model("Category_model","kategori");
        $data["category_all"] = $this->kategori->get_category_all();
        $data["category_main"] = $this->kategori->get_category_main();
        $this->template("Product/AddProduct",$data);
    }

    public function addCategory(){
        if($_POST){
            $data = array(
                "name" => trim($_POST["name"]),
                "parent_id" => trim($_POST["parent"])
            );

            $this->load->model("Category_model","kategori");
            $this->kategori->add_category($data);

        }
//        redirect($_SERVER["HTTP_REFERER"]);
    }
}