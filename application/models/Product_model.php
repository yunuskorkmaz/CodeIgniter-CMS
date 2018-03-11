<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 17.02.2018
 * Time: 16:43
 */

class Product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_product($id){
        $result =  $this->db->where("id",$id)->get("products")->row();
        if(!empty($result)){
            return $result;
        }
        else{
            return null;
        }
    }

    public function changefav($id,$to){
        $data = array(
            'fav' => $to,
        );

        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    public function changetrend($id,$to){

        $control = $this->db->where('trend',$to)->get("products")->row();
        if(!empty($control)){
            $this->db->where("id",$control->id)->update("products",array('trend'=>"0"));
        }
        $data = array(
            'trend' => $to,
        );
        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    public function get_list($query =""){
        return $this->db->query("SELECT p.*,c.name as categoryname FROM products as p inner JOIN categorys as c on p.category= c.id order by  id DESC ,trend DESC ")->result();
    }

    function  editproduct($data,$id){
        if($data["image"] != ""){
            $urun =  $this->db->where("id",$id)->get("products")->row();

            $image = $this->upload_image($data["image"]);

            $config['image_library'] = 'gd2';
            $config['source_image'] = getcwd()."/upload/product/".$image["data"];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['height']         = 250;
            $config['master_dim']         = 'height';
            
            $this->load->library('image_lib', $config);

            $this->image_lib->resize();

            if(!isset($image["error"])){
                $data["image"] = $image["data"];
                unlink(getcwd()."/upload/product/".$urun->image);

                $ext = explode('.',$urun->image);
                $ext = end($ext);
                $imagename =  rtrim($urun->image,".".$ext)."_thumb.".$ext;
                unlink(getcwd()."/upload/product/".$imagename);
            }else{
                unset($data["image"]);
            }
        }else{
            unset($data["image"]);
        }

        $this->db->where("id",$id)->update("products",$data);

    }

    function delete($id){
        $urun = $this->db->select("image,id")->where("id",$id)->get("products")->row();
        if(!empty($urun)){
            unlink(getcwd()."/upload/product/".$urun->image);
            $this->db->delete('products', array('id' => $id));
        }
    }

    function addproduct($data){
        if($data["image"] != "" or !empty($data["image"])){
          $result = $this->upload_image($data["image"]);

          if(!isset($result["error"])){

                $config['image_library'] = 'gd2';
                $config['source_image'] = getcwd()."/upload/product/".$result["data"];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                
                $this->load->library('image_lib', $config);

               $this->image_lib->resize();



              $data["image"] =  $result["data"];
              $this->db->insert("products",$data);
              $result["data"] = $this->db->insert_id();

          }

          return $result;
        }
    }

    private  function upload_image($name= "image"){
        ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');
        $config['upload_path']          = getcwd()."/upload/product/";
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000000;

        $this->load->library('upload', $config);


        $result = array();

        if ( ! $this->upload->do_upload($name))
        {
            $error = $this->upload->display_errors();

            $result["error"] = $error;
        }
        else
        {
            $data = $this->upload->data();
            $result["data"] = ($data["file_name"]);

        }

        return $result;
    }

}