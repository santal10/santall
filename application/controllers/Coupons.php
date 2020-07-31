<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coupons extends CI_Controller
{
    function addCoupons(){
        $this->coupons_model->add_coupons();
        redirect(base_url()."dashboard/ecommerce_coupons_list");
    }
    function deleteCoupons($id){
        $this->coupons_model->delete_coupons($id);
    }
}