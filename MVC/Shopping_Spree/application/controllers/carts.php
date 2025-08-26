<?php
class Carts extends CI_Controller {
    public function index(){
        $this->load->view('shopping/index');
    }
    public function catalog(){
        $this->load->model("shopping/Cart"); 
        $show_result_product['data'] = $this->Cart->get_all_products(); //check if existing
        $this->load->view('shopping/catalog',$show_result_product);
    }
    public function cart(){
        if($this->session->userdata('cart')){
            $get_id = array();
            $items = $this->session->userdata('cart');
            foreach($items as $id =>$value){
                $get_id[] = $id;
            }
            $this->load->model("shopping/Cart"); 
            $show_result_product['data'] = $this->Cart->get_cart_products($get_id); //check if existing
            //compute total
            $total = 0;
            foreach($show_result_product as $value){
                foreach($value as $key => $val){
                    foreach($items as $id =>$stock){
                        if($val['id'] == $id){
                            $subtotal = $val['price'] * $stock;
                            $total +=$subtotal;
                        }	
                    }
                }
            }
            $this->session->set_userdata('total',$total);
            $this->load->view('shopping/cart',$show_result_product);
        }else{
            $this->session->unset_userdata('total');
            $this->session->unset_userdata('current_cart');
            $this->load->view('shopping/cart');
        }
    }

    public function billing(){
        $this->load->view('shopping/billing');
    }

    public function addcart(){
        //$this->session->unset_userdata('cart');
        $cart = array();
        $item_buy= intval($this->input->post('item_buy'));
        $item_id = $this->input->post('item_id');
       //if session cart exist
        if(($this->session->userdata('cart'))){
            $session_cart = $this->session->userdata('cart');
            //i will extract the old session and store in array
            foreach($session_cart as $id =>$value){
                $cart[$id] = $value;
            }
        }else{ //Add new data to session
            $new_item = array($item_id =>$item_buy);
            $this->session->set_userdata('cart', $new_item );
        }
        //check if to-add $item_id already exist in the session
        if(!empty($cart[$item_id])){    //if exist. session value + to-buy-stock
           $add = $cart[$item_id]+$item_buy;
           $cart[$item_id] = $add;
           $this->session->set_userdata('cart', $cart );//set the array into the sesssion cart
        }else{
            $cart[$item_id] = $item_buy;
            $this->session->set_userdata('cart', $cart );//set the array into the sesssion cart
        }
        if($this->session->userdata('cart')){
            $current_cart_count = count($this->session->userdata('cart'));//set cart item total//
            $this->session->set_userdata('current_cart', $current_cart_count ); //set to session the cart total
        }      
        //var_dump($this->session->userdata('cart'));
        $this->session->set_flashdata('success_action','Success! Item added to cart.');
        $this->load->model("shopping/Cart"); 
        $show_result_product['data'] = $this->Cart->get_all_products(); //check if existing
        $this->load->view('shopping/catalog',$show_result_product);
    }

    public function remove_from_cart(){
        //$this->session->unset_userdata('cart');
        $cart = array();
        $item_id = $this->input->post('id');
        $session_cart = $this->session->userdata('cart');
        //i will extract the old session and store in array
        foreach($session_cart as $id =>$value){
            if($item_id==$id){
                continue;
            }else{
                $cart[$id] = $value;  
            }
        }
        $this->session->set_userdata('cart', $cart );//set the array into the sesssion cart
        if($this->session->userdata('cart')){
            $current_cart_count = count($this->session->userdata('cart'));//set cart item total//
            $this->session->set_userdata('current_cart', $current_cart_count ); //set to session the cart total
        }      
        //var_dump($this->session->userdata('cart'));
        $this->session->set_flashdata('success_delete','Successfully deleted the item from cart.');
        redirect(base_url('store/cart'));
    }
}
?>