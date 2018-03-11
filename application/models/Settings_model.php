<?php
/**
 * Created by PhpStorm.
 * User: yunus
 * Date: 10.02.2018
 * Time: 14:52
 *  @property setting $Settings_model
 */

class Settings_model extends CI_Model
{
    public $option_attr = "component";
    public $option_value = "value";


    public $site_title  = "site_title";
    public $site_desc   = "site_description";
    public $site_keys   = "site_keywords";


    public $site_adres      = "adres";
    public $site_telefon    = "telefon";
    public $site_mail       = "eposta";
    public $site_haftaici   = "haftaici_calisma_saati";
    public $site_haftasonu  = "haftasonu_calisma_saati";

    public $site_abouttitle = "about_title";
    public $site_abouttext = "about_text";

    public function aboutpattern(){
        return  array(
            "abouttitle" =>  $this->site_abouttitle,
            "abouttext" => $this->site_abouttext
        );
    }

    function __construct()
    {
        parent::__construct();
        $this->load->database();


    }





    public  function delete_social_network($id){
        $this->db->delete('social_network', array('id' => $id));
    }
    public function get_social_network($id = ""){

        if($id == ""){
            return $this->db->get("social_network")->result();
        }
        else{
            return $this->db
                ->select("*")
                ->from("social_network")
                ->where("id", $id)
                ->get()->row();

        }

    }

    public function insert_network($postdata){
        return $this->db->insert("social_network",$postdata);
    }

    public function update_network($postdata,$id){

        foreach ($postdata as $key => $value) {
            $this->db->set($key, $value);
            $this->db->where("id",$id);
            $this->db->update('social_network');
        }
    }

    public function get($columnarray){
        $result = array();

        foreach ($columnarray as $key => $value) {
            $row =  $this->db
                    ->select("*")
                    ->from("settings")
                    ->where($this->option_attr,$value)
                    ->get()->row();

            $result[$key] = $row->value;
        }
        return $result;
    }

    public function get_contact_info(){
        $getdata = array(
            "adres" => $this->site_adres,
            "telefon" => $this->site_telefon,
            "mail" => $this->site_mail,
            "haftaici" => $this->site_haftaici,
            "haftasonu" => $this->site_haftasonu
        );

        $result = array();
        foreach ($getdata as $key => $value){
            $row = $this->db
                ->select("*")
                ->from("settings")
                ->where($this->option_attr,$value)
                ->get()
                ->row();
            $result[$key] = $row->value;
        }
        return $result;
    }

    public function update_site_info($postdata){


        foreach ($postdata as $key => $value) {
            $this->db->set($this->option_value, $value);
            $this->db->where($this->option_attr,$key);
            $this->db->update('settings');
        }


    }

    public function get_site_info()
    {
        $title = $this->db
            ->select("*")
            ->from("settings")
            ->where($this->option_attr,$this->site_title)
            ->get()
            ->row();

        $descretion = $this->db
            ->select("*")
            ->from("settings")
            ->where($this->option_attr,$this->site_desc)
            ->get()
            ->row();

        $keys = $this->db
            ->select("*")
            ->from("settings")
            ->where($this->option_attr,$this->site_keys)
            ->get()
            ->row();


        return array(
            'title' => $title->value,
            'desc' =>  $descretion->value,
            'keys' =>  $keys->value,
        );

    }

    function addReferance($data){
        $this->db->insert("referance",$data);
    }

    function referans(){


       $referance = $this->db->select("r.id,r.name,c.name as kategori")->from("referance as r")->join("categorys as c","r.category_id =c.id")->get()->result();



//            $row = array();
//        echo '<html><body><table>';
//            for ($i =0;$i<count($urunler);$i++){
//
//                if($i%count($result)-1 != 0){
//                    echo '<tr>';
//                }
//
//                foreach ($result as $item) {
//                    echo '<td>';
//                    if($urunler[$i]->category == $item->id){
//                        echo $urunler[$i]->name;
//                    }
//                    echo '</td>';
//                }
//
//                if($i%count($result)-1 != 0){
//                    echo '<tr>';
//                }
//
//            }
//            echo '</table></body></html>'
//            ;


        $out = $referance;

        return $out;
    }

    function editReferance($data,$id){
        $this->db->where("id",$id)->update("referance",$data);
    }

    function get_ref($id){
        return $this->db->where("id",$id)->get("referance")->row();
    }

    function refdelete($id){
        $this->db->delete('referance', array('id' => $id));
    }

    function editTrendText($data){
        foreach ($data as $key => $value){
            $this->db->set("value",$value)->where("component",$key)->update("settings");
        }
    }

    function getmainpage(){
        $getdata = array(
            "trendtitle" => "trendtitle",
            "trendtext" => "trendtext",
            "footertext" => "footertext"
        );

        $result = array();
        foreach ($getdata as $key => $value){
            $row = $this->db->where("component",$value)->get("settings")->row();
            $result[$key] = $row->value;
        }
        return $result;
    }
    function editFooter($data){
        foreach ($data as $key => $value){
            $this->db->set("value",$value)->where("component",$key)->update("settings");
        }
    }


}