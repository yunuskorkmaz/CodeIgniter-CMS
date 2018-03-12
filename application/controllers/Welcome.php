<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{

	    $this->template();
	    $this::SessionControl();


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

       $this->load->view("_theme/Login/login");
    }
}
