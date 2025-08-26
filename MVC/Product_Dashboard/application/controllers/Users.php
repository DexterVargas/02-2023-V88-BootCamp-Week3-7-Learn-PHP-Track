<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller {


    /*  DOCU: This function is triggered by default which displays the sign in/wall page.
        Owner: Karen
    */
    public function index(){
        //$this->session->sess_destroy();
        //$this->load->view('users/index');

        $current_user_id = $this->session->userdata('user_id');
        
        if(!$current_user_id){ 
            $this->load->view('users/index');
        } 
        else {
            if($current_user_id==1){ 
                //redirect("dashboard/admin"); 
                redirect("products/admin"); 
            }else {
              //redirect("dashboard");  
                redirect("products"); 
            }
        }
    }
    /**
     * 
     */
    public function register_link(){
        
        $current_user_id = $this->session->userdata('user_id');
        
        if(!$current_user_id){ 
            $this->load->view('users/register');
        } 
        else {
            if($current_user_id==1){ 
                //redirect("dashboard/admin"); 
                redirect("products/admin"); 
            } 
            else {
              //redirect("dashboard");  
                redirect("products"); 
            }
        }
    }
    public function edit(){
        
        $current_user_id = $this->session->userdata('user_id');
        $user['user'] = $this->user->get_user_by_id($current_user_id);
        if(!$current_user_id){ 
           redirect(base_url());
        }else{
           //redirect(base_url('users/edit'));
           $this->load->view('users/edit-user',$user);
        }
    }

    public function edit_info_process(){
        $form_data = $this->input->post();
        $result = $this->user->validate_user_updates($form_data);

        if($result != 'success'){
            $this->session->set_flashdata('user_update_errors',$result);
        }else{
            $form_data = $this->input->post();
            $this->user->update_user($form_data);
            
            $this->session->set_flashdata('user_update_success','Successfully updated user information.');
            
        }
        redirect(base_url('users/edit'));
    }


    public function edit_pass_process(){
        $form_data = $this->input->post();
        $result = $this->user->validate_user_password($form_data);

        if($result != 'success'){
            $this->session->set_flashdata('user_update_pass_errors',$result);
        }else{
            $form_data = $this->input->post();
            $this->user->update_user_password($form_data);
            
            $this->session->set_flashdata('user_update_pass_success','Successfully updated password.');
            
        }
        redirect(base_url('users/edit'));
    }


    /**
     * 
     */
    public function signin_link(){
     
        $current_user_id = $this->session->userdata('user_id');
        
        if(!$current_user_id){ 
            $this->load->view('users/login');
        } 
        else {
            if($current_user_id==1){ 
                //redirect("dashboard/admin"); 
                redirect("products/admin"); 
            } 
            else {
              //redirect("dashboard");  
                redirect("products"); 
            }
        }
    }




    //----------------------------------signup
    public function process_register(){
        
        $email = $this->input->post('email');
        
        $result = $this->user->validate_registration($email);

        if($result != null){
            $this->session->set_flashdata('input_errors',$result);
            redirect('register');
        }else{
            $form_data = $this->input->post();
            $this->user->create_user($form_data);
            
            $new_user = $this->user->get_user_by_email($form_data['email']);
            $this->session->set_userdata(array('user_id' => $new_user["id"], 'name'=>$new_user['first_name'] . ' ' . $new_user['last_name'] ));
            if($new_user['id'] ==1){
                //redirect("dashboard/admin"); 
                redirect("products/admin"); 
            }else{
                //redirect("dashboard"); 
                redirect("products"); 
            }
        }
    }


    //----------------------------------signin
    public function process_signin(){
        
        $form_data = $this->input->post();
        
        $result = $this->user->validate_signin_form($form_data);


        if($result != 'success'){
            $this->session->set_flashdata('input_errors',$result);
            redirect('signin');
        }else{

            $email = $this->input->post('login_email');

            $user = $this->user->get_user_by_email($email);
               
            $result = $this->user->validate_signin_match($user, $this->input->post('login_password'));

            if($result == "success"){
                $this->session->set_userdata(array('user_id' => $user["id"], 'name'=>$user['first_name'] . ' ' . $user['last_name'] ));
                if($user['id'] ==1){
                //redirect("dashboard/admin"); 
                redirect("products/admin"); 
                }else{
                //redirect("dashboard"); 
                redirect("products"); 
                }
            }
            else{
                $this->session->set_flashdata('input_errors', $result);
                redirect('signin');
            }

        }
    }


    public function logoff(){
        $this->session->sess_destroy();
        redirect(base_url());   
    }







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