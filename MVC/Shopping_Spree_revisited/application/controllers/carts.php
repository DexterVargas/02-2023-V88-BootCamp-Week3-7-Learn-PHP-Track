<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Carts extends CI_Controller {
    //loads index.php
    public function index(){
        if($this->session->userdata('current_cart')){
            $cart['data']= $this->session->userdata('current_cart');
            $this->load->view('shopping/index',$cart);
        }else{
            $this->load->view('shopping/index');
        }  
    }
    //loads the billing.php
    public function billing(){
        if($this->session->userdata('current_cart')){
            $cart['data']= $this->session->userdata('current_cart');
            $this->load->view('shopping/billing',$cart);
        }else{
            $this->load->view('shopping/billing');
        }  
    }
    //loads the items/cart items in the session('cart')
    public function cart(){
        if($this->session->userdata('cart')){
            $this->load->model("shopping/Cart"); //load model method
            $query_result_product['products'] = $this->Cart->get_cart_products($this->session->userdata('cart')); 
            //add session to query result
            $query_result_product['data']= $this->session->userdata('current_cart');//count of item in the cart, unique only
            $query_result_product['items'] = $this->session->userdata('cart');//items in the cart
            $query_result_product['total'] = $this->session->userdata('total'); //grand total of the cart
            $query_result_product['success_delete'] = $this->session->flashdata('success_delete','Successfully deleted the item from cart.');
            //call method view
            $this->cart_view($query_result_product);
        }else{
            $this->session->unset_userdata('total');
            $this->session->unset_userdata('current_cart');
            $this->cart_view();
            //redirect(base_url('shopping_cart_view/'));
        }
    }
    //loads shopping_cart.php
    public function cart_view($arr = null){
        if(isset($arr)){
            $this->load->view('shopping/shopping_cart',$arr);
        }else{
            $this->load->view('shopping/shopping_cart');
        }
    }
    //adds the items in the session('cart')
    public function addcart(){
        //$this->session->unset_userdata('cart');
        $cart = array();
        $item_buy= html_escape(intval($this->input->post('item_buy')));
        $item_buy = $this->security->xss_clean($item_buy);
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
        
        $this->load->model("shopping/Cart"); 
        $query_result_product['products'] = $this->Cart->get_all_products(); //check if existing
        $query_result_product['action_flash']=$this->session->set_flashdata('success_action','Success! Item added to cart.');
        $query_result_product['data']= $this->session->userdata('current_cart');//count of item in the cart, unique only
        //call view method   
        $this->catalog_view($query_result_product);
    }
    //loads the products from database
    public function catalog(){
        $this->load->model("shopping/Cart"); 
        $query_result_product['products'] = $this->Cart->get_all_products(); //check if existing
        $query_result_product['data']= $this->session->userdata('current_cart');
        $query_result_product['action_flash']= $this->session->flashdata('success_action');
        //call method view 
        $this->catalog_view($query_result_product);
    }
    //loads catalog.php
    public function catalog_view($arr){
        $this->load->view('shopping/catalog',$arr);
    }
    public function remove_from_cart(){
        //$this->session->unset_userdata('cart');
        $cart = array();
        $item_id = html_escape($this->input->post('id'));
        $item_id = $this->security->xss_clean($item_id);
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
        redirect(base_url('shopping_cart'));
    }
}
?>