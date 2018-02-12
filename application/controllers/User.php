<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 28.01.2018
 * Time: 21:11
 */

class User extends CI_Controller
{
    public function Index()
    {
        $this->load->model("User_model",'user',true);
        $data["users"] = $this->user->GetUsers();

        $this->template('User/Index',$data);
    }

    public function add(){
        if($_POST){
            $error = array();
            $data["error"]= $error;

            if(empty($_POST["name"])){
                $error[] = "İsim alanı boş geçilemez";
            }
            if(empty($_POST["kadi"])){
                $error[] = "Kullanıcı adı alanı boş geçilemez";
            }
            if(empty($_POST["email"])){
                $error[] = "Eposta alanı boş geçilemez";
            }
            if(empty($_POST["pass"])){
                $error[] = "Şifre alanı boş geçilemez";
            }

            if(count($error) == 0){
                $insert = array(
                    'adSoyad' => $_POST["name"],
                    'kadi' => $_POST["kadi"],
                    'eposta' => $_POST["email"],
                    'sifre' => $_POST["pass"]
                );
                $this->load->model("User_model","user");
                $this->user->AddUser($insert);
            }
        }

            redirect("User/");

    }
}