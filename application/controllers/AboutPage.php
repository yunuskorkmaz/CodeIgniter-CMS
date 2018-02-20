<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 15.02.2018
 * Time: 16:39
 */

class AboutPage extends CI_Controller
{
    public $model;



    public function Index(){

        $this->load->model("Settings_model","setting");
        $this->model = $this->setting;

        $data = array();

        if($_POST){
            $postdata = array(
                $this->model->site_abouttitle => trim($_POST["abouttitle"]),
                $this->model->site_abouttext => trim($_POST["abouttext"])
            );

            $this->model->update_site_info($postdata);
        }

        $data["data"] =($this->model->get($this->model->aboutpattern()));

        $this->load->model("Image_model","image");
        $data["images"] = $this->image->get_about();


        $this->template("Pages/About",$data);
    }

    public function imageupload(){
        if($_FILES){
            $this->load->model("Image_model","image");
            $this->image->upload("image");
        }

        redirect(base_url("aboutpage"));
    }

    public function imagedelete($id){
        if(!empty($id) or $id != ""){
            $this->load->model("Image_model","image");
            $this->image->delete_about_image($id);
        }
        redirect("aboutpage");
    }
}