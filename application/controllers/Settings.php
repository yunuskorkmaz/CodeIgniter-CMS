<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 08.02.2018
 * Time: 17:40
 */

class Settings extends CI_Controller
{
    public function Index(){

        $this->template("Settings/Index");
    }

    public function contact(){
        $this->load->model("Settings_model","setting");
        if($_POST){

            $postdata =  array(
                $this->setting->site_adres => trim($_POST["adres"]),
                $this->setting->site_telefon => trim($_POST["telefon"]),
                $this->setting->site_mail => trim($_POST["eposta"]),
                $this->setting->site_haftaici => trim($_POST["saatler-pzt-cuma"]),
                $this->setting->site_haftasonu => trim($_POST["saatler-cumartesi"]),
            );

            $this->setting->update_site_info($postdata);

        }
        $data["variable"] =  $this->setting->get_contact_info();

        $this->template("Settings/Contact",$data);
    }

    public function site_setting(){
        $this->load->model("Settings_model","setting");
        if($_POST){
            $error = [];


            $postdata = array(
            $this->setting->site_title => trim($_POST["sitetitle"]),
            $this->setting->site_desc => trim($_POST["sitedescription"]),
            $this->setting->site_keys => trim($_POST["sitekeywords"])
            );
            if(($postdata[$this->setting->site_title]) == null){

                $error[] = "Site Başlığı Boş Geçilemez";

            }

            if(count($error) < 1){
                $this->setting->update_site_info($postdata);
            }

            $data["error"] = $error;
        }

        $data["variables"] = $this->setting->get_site_info();


        $this->template("Settings/Site_Settings",$data);

    }

    public function socialdelete($id){
        if(!empty($id) or $id != ""){
            $this->load->model("Settings_model","setting");
            $this->setting->delete_social_network($id);
        }
        redirect("settings/social");

    }

    public function socialedit($id)
    {

        if(!empty($id) or $id != ""){
            $this->load->model("Settings_model","setting");
            $error =array();
            if($_POST){
                $postdata = array(
                    "network_name" => trim($_POST["name"]),
                    "network_url" => trim($_POST["url"]),
                    "network_icon" => trim($_POST["icon"])
                );

                foreach ($postdata as $key => $value) {
                    if($value == null or empty($value)){
                        $error[] = "$key boş geçilemez";
                    }
                }

                if(count($error) < 1){
                    $this->setting->update_network($postdata,$id);
                }
            }

            $data["data"]= $this->setting->get_social_network($id);
            $this->template("Settings/SocialEdit",$data);
        }else{
            redirect("settings/social");
        }
    }

    public function social(){
        $this->load->model("Settings_model","setting");
            $error = array();
        if($_POST){
            $postdata = array(
                "network_name" => trim($_POST["name"]),
                "network_url" => trim($_POST["url"]),
                "network_icon" => trim($_POST["icon"])
            );
            foreach ($postdata as $key => $value) {
                if($value == null or empty($value)){
                    $error[] = "$key boş geçilemez";
                }
            }

            if(count($error) < 1){
                $this->setting->insert_network($postdata);
            }

        }
        $data["data"] = $this->setting->get_social_network();
        $data["error"] = $error;
        $this->template("Settings/Social",$data);



    }
}