<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cart extends CI_Model {
    function get_all_products(){
        return $this->db->query("SELECT * FROM products")->result_array();
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