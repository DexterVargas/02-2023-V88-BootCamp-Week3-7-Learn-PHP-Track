<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Model {


    function get_all_products(){
        return $this->db->query("SELECT * FROM products")->result_array();
    }

    function get_product_by_id($id){
        return $this->db->query("SELECT * FROM products WHERE id = ?", array($id))->row_array();
    }

    function validate_product_registration(){
        $this->form_validation->set_error_delimiters('<p id="error">','</p>');
        $this->form_validation->set_rules("name", "product name", "trim|required");
        $this->form_validation->set_rules("desc", "description", "trim|required");
        $this->form_validation->set_rules("price", "price", "trim|required");
        $this->form_validation->set_rules("stock", "stock", "trim|required");
        
        if(!$this->form_validation->run()){
            return validation_errors();
        }else{
            return "success";
        }
    }

    function add_new_product($product_data){  
       
        $query = "INSERT INTO products (user_id, name, description, price,stock, created_at, updated_at) 
                    VALUES (?,?,?,?,?,?,?)";
        $values = array(
            $this->session->userdata('user_id'),
            $this->security->xss_clean($product_data['name']), 
            $this->security->xss_clean($product_data['desc']), 
            $this->security->xss_clean($product_data['price']), 
            $this->security->xss_clean($product_data['stock']), 
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s'));     
        return $this->db->query($query, $values);
    }

    function update_product($product_data){  
        //var_dump($product_data);
        $query = "UPDATE `products` 
                    SET `name` = ?, `description` = ?, `price` = ?, `stock` = ?, `updated_at` = ? 
                    WHERE (`id` = ?);";
        $values = array(
            $this->security->xss_clean($product_data['name']), 
            $this->security->xss_clean($product_data['desc']), 
            $this->security->xss_clean($product_data['price']), 
            $this->security->xss_clean($product_data['stock']), 
            date('Y-m-d H:i:s'),
            $this->security->xss_clean($product_data['id']));    
            //var_dump($this->db->query($query, $values));
        return $this->db->query($query, $values);
    }

    function delete_product($id){
        return $this->db->delete('products',array('id' => $this->security->xss_clean($id)));
     }

    function get_cart_products($items){//session cart
        $get_id = array();
        foreach($items as $id =>$value){
            $get_id[] = $id;
        }
        //result of the product containing the id's from the session cart
        $query_result= $this->db->query("SELECT * FROM products WHERE id IN ? ", array($get_id))->result_array();
            //compute total
            $total = 0;
            foreach($query_result as $value){ 
                foreach($items as $id =>$stock){ //this will loop to get session stock * query_result[price] to get subtotal to each cart
                    if($value['id'] == $id){
                        $subtotal = $value['price'] * $stock;
                        $total +=$subtotal;
                    }	
                }
            }
        $this->session->set_userdata('total',$total);    
        return $query_result;
    }


}
?>