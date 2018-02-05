<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 03.02.2018
 * Time: 16:04
 */

class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function CheckAuth(){
        if(isset($_SESSION["user_id"])){
            return true;
        }
        else{
            return false;
        }
    }

    function dologin(){
        if($_POST){
            $name =  $_POST["username"];
            $pass = $_POST["password"];


            $query =  $this->db->query("select * from users where kadi = '$name' and sifre = '$pass'");
            $row =$query->result();
            if(count($row) > 0){

                $_SESSION["user_id"] = $row[0]->id;
                $_SESSION["name"] = $row[0]->adSoyad;
                $_SESSION["username"] = $row[0]->kadi;
                return true;
            }
            else{
                return false;
            }

        }
    }
}