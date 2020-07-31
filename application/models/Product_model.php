<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public function get_all_products()
    {
        $query = $this->db->get('produits');
        return $query->result();
    }

    public function get_new_products()
    {
        $this->db->order_by('produits.created', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get('produits');

        return $query->result();
    }

    public function get_top_rated_products()
    {

        $this->db->order_by('produits.rate', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get('produits');

        return $query->result();
    }

    public function get_popular_products()
    {
        $this->db->order_by("rate", "DESC");
        $this->db->limit(4);
        $query = $this->db->get("produits");

        return $query->result();
    }

    public function get_best_selling_products()
    {

        $this->db->order_by('(produits.quatityTotale) - (produits.quantity)', 'ASC');
        $this->db->limit(4);
        $query = $this->db->get('produits');

        return $query->result();
    }

    public function get_men_products()
    {
        $config["per_page"] = 10;
        $config["num_links"] = 3;
        $config["full_tag_open"] = "<ul class='pagination mb-0'>";
        $config["full_tag_close"] = "</ul>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["next_tag_open"] = "<li class='page-item'>";
        $config["next_tag_close"] = "<li>";
        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "<li>";

        $config["base_url"] = base_url() . "produits/index/p";
        $config["total_rows"] = $this->db->get("produits")->num_rows();

        $this->pagination->initialize($config);
        $query = $this->db->get('produits', $config["per_page"], $this->uri->segment(4));
        return $query->result_array();
    }
    public function get_filtred_products()
    {
        $min = $this->input->post("priceLow");
        $max = $this->input->post("priceHigh");
        $config["per_page"] = 2;
        $config["num_links"] = 3;
        $config["full_tag_open"] = "<ul class='pagination mb-0'>";
        $config["full_tag_close"] = "</ul>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["next_tag_open"] = "<li class='page-item'>";
        $config["next_tag_close"] = "<li>";
        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "<li>";
        $config["base_url"] = base_url() . "produits/filtred/index/p";
        $config["total_rows"] = $this->db->where("price >= $min and price <= $max")->get("produits")->num_rows();
        $this->pagination->initialize($config);

        $this->db->where("price >= $min and price <= $max");
        $query = $this->db->get('produits', $config["per_page"], $this->uri->segment(5));

        return $query->result_array();
    }

    function get_single_product($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get("produits");
        return $query->row_array();
    }
    function get_comments($id)
    {
        $this->db->where("idProduit", $id);
        $this->db->where("approval", 1);
        $query = $this->db->get("commentaires");
        return $query->result_array();
    }

    function add_comments($id)
    {
        $review = $this->input->post("review");
        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $rating = $this->input->post("rating");

        $data = array(
            "name" => $name,
            "rate " => $rating,
            "content" => $review,
            "idProduit" => $id,
        );
        return $this->db->insert("commentaires", $data);
    }

    function get_all_comments()
    {
        $this->db->join("produits", "commentaires.idProduit = produits.id ");
        $query = $this->db->get("commentaires");

        return $query->result_array();
    }
    function approve_comment($id)
    {

        $data = array(
            'approval' => 1
        );
        $this->db->where('content', $id);
        $this->db->update('commentaires', $data);

        return true;
    }
    function delete_comment($id)
    {
        $this->db->where('content', $id);
        $this->db->delete('commentaires');

        return true;
    }

    function add_product($images)
    {
        $title = $this->input->post("productTitle");
        $type = explode(" ", $this->input->post("productCategory"))[0];
        $category = explode(" ", $this->input->post("productCategory"))[1];
        $reference = $this->input->post("reference");
        $price = $this->input->post("price");
        $rate = $this->input->post("eval");
        $qty = $this->input->post("qty");
        $description = $this->input->post("description");

        $data = array(
            "title" => $title,
            "type " => $type,
            "category" => $category,
            "rate" => $rate,
            "description" => $description,
            "images" => $images,
            "price" => $price,
            "quantity" => $qty,
            "reference" => $reference,

        );
        return $this->db->insert("produits", $data);
    }


    function delete_product($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("produits");
        return true;
    }

    function edit_product($id, $images)
    {
        $title = $this->input->post("productTitle");
        $type = explode(" ", $this->input->post("productCategory"))[0];
        $category = explode(" ", $this->input->post("productCategory"))[1];
        $reference = $this->input->post("reference");
        $price = $this->input->post("price");
        $rate = $this->input->post("eval");
        $qty = $this->input->post("qty");
        $description = $this->input->post("description");

        $data = array(
            "title" => $title,
            "type " => $type,
            "category" => $category,
            "rate" => $rate,
            "description" => $description,
            "price" => $price,
            "quantity" => $qty,
            "reference" => $reference,
            "images" => $images

        );
        $this->db->where("id", $id);
        $this->db->update("produits", $data);
        return true;
    }
}
