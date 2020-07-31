<?php 
defined('BASEPATH') or exit('No direct script access allowed');

    class Coupons_model extends CI_Model{
        
        function get_coupons(){
            $query = $this->db->get("coupons");
            return $query->result_array();
        }

        function add_coupons(){
            $insta = $this->input->post("insta");
            $code = $this->input->post("code");
            $reduction = $this->input->post("reduction");
            $expiration = $this->input->post("expiration");


            $data = array(
                "insta" => $insta,
                "couponsCle" => $code,
                "reduction" => $reduction,
                "expiration" => $expiration,

            );
            return $this->db->insert("coupons",$data);
         
        }
        function delete_coupons($id){
            $this->db->where("id",$id);
            $this->db->delete("coupons");
            return true;
        }
    }
