<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public  function  yunus(){
        echo  "asdasd    ";
    }
	public function index()
	{
	    echo  "asdasd";
	    exit();
	    //$this->load->model('Auth_model','auth');
//        $this->template();
//	    if($this->auth->CheckAuth()){
//            $this->template();
//        }
//        else{
//	        redirect('/welcome/login/');
//        }


	}

	function dologin(){
        $this->load->model('Auth_model','auth');
        echo  $this->auth->dologin();
        redirect("/welcome/index");

    }

    public function logout(){
	    unset($_SESSION["user_id"]);
	    unset($_SESSION["name"]);
	    unset($_SESSION["username"]);
	    unset($_SESSION);
	    redirect("welcome");
    }

	public function Login()
    {
        echo "sadasd";
//        $this->load->view("_theme/Login/login");
    }
}
