<?php 
class Cart extends CI_Model {
    function get_all_products(){
        return $this->db->query("SELECT * FROM products")->result_array();
    }
    function get_cart_products($items){
        return $this->db->query("SELECT * FROM products WHERE id IN ? ", array($items))->result_array();
    }
    // function get_user_by_id($id){
    //     return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
    // }
}
?>