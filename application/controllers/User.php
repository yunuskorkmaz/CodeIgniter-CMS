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

    public function delete($id){
        if(!empty($id)){
            if ($id != 1) {
                $this->load->model("User_model", 'user');
                $this->user->delete($id);

                redirect($_SERVER["HTTP_REFERER"]);

            }
        }
    }

    public function edit($id){
        if(!empty($id)){
            $this->load->model("User_model","user");
            if($_POST){
                $postdata = array(
                    'adSoyad' => $_POST["name"],
                    'kadi' => $_POST["kadi"],
                    'eposta' => $_POST["email"]
                );
                if(isset($_POST["pass"])){
                    $postdata["sifre"] = $_POST["pass"];
                }

                $this->user->edit($postdata,$id);
            }


            $this->load->model("User_model","user");
            $data["user"] =$this->user->get($id);
            $this->template("User/Edit",$data);

        }
        else{
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }
}