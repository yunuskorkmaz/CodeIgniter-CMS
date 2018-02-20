<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 15.02.2018
 * Time: 18:09
 */

class Image_model extends CI_Model
{
    public $uploadDir = "upload";

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function upload($inputname= "image"){
        ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');
        $config['upload_path']          = getcwd()."/". $this->uploadDir."/";
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($inputname))
        {
            $error = $this->upload->display_errors();
            unset($_SESSION["error"]);
            $_SESSION["error"] = $error;
        }
        else
        {
            $data = $this->upload->data();
            $this->_db_insert_about($data["file_name"]);

        }
    }

    public function delete_about_image($id){
       $image =  $this->db->where("id",$id)->get("images")->row();

       if(unlink(getcwd()."/". $this->uploadDir."/".$image->file)){
           $this->_db_delete_about($id);
       }
    }

    private function  _db_delete_about($id){
        $this->db->delete('images', array('id' => $id));
    }
    private function _db_insert_about($data){
        $this->db->insert("images",array(
            "file" => $data,
            "about" => 1
        ));
    }

    public function get_about(){
        return $this->db->select("*")->from("images")->where("about","1")->get()->result();
    }
}