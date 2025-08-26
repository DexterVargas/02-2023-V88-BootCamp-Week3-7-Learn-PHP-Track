<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Socials extends CI_Controller {

    /*  DOCU: This function is triggered by default to render the Wall page.
        This loads all messages with comments from all users.
        Owner: 
    */


    public function socials($product_id){
        $current_user_id = $this->session->userdata('user_id');
        $data_list= $this->product->get_product_by_id($product_id);
        if(!$current_user_id){ 
            redirect(base_url());
        }else{
            $msg = $this->product_social->get_messages_by_product_id($product_id);
            //var_dump($msg);
            $all_msg_comments_from_product = array();
             foreach($msg as $msg_by_user){
                    /**
                     * change the time format of the comment date
                     * invoke time_stamp() function
                     */
                $msg_by_user['message_date'] = $this->time_stamp($msg_by_user['message_date']);
                $all_comments_of_msg= $this->product_social->get_comments_by_message_id($msg_by_user['message_id']);
                    /**
                     * loop to change the time format of the comment date
                     * invoke time_stamp() function
                     */
                    foreach( $all_comments_of_msg as $key => $comment_time){
                        $all_comments_of_msg[$key]['comment_date'] = $this->time_stamp( $comment_time['comment_date']);
                    }
                /**
                 * make key value pairs for all comments
                 * for every message_id: gets all comments from that id and store to $msg_by_user["comments"]
                 */
                $msg_by_user["comments"] = $all_comments_of_msg;
                $all_msg_comments_from_product[] = $msg_by_user;
            }
            
                //var_dump($all_msg_comments_from_product);
            $master_data = array('product' => $data_list,'all_msg_comments' =>  $all_msg_comments_from_product);
            $this->load->view('products_social/product-social-index',$master_data);
            //$this->load->view('products/dashboard-admin');
        }
    }

    public function time_stamp($datetime){
            /**
             * get the interval time of 2 given dates
             * $datetime is the created_at date from the database
             */
            $date_time_created  = new DateTime("$datetime");
            $current_date_time = new DateTime("now");
            $intvl = $date_time_created->diff($current_date_time);
            //var_dump($intvl);
            if ($intvl->s || $intvl->s ==0){
                $time_interval= $intvl->s . ' seconds ago';
            }
            if($intvl->i){
                $time_interval = $intvl->i . ' minute/s ago';
            }
            if($intvl->h){
                $time_interval = $intvl->h . ' hour/s ago';
            }
            if($intvl->d){
                $time_interval = $intvl->d . ' day/s ago';
            }
            if($intvl->d > 7){
                $time_interval = date('l jS \of F Y h:i:s A', strtotime(str_replace('-','/', $datetime)));
            }
                return $time_interval;
    }

    /*  DOCU: This function is responsible to validate and add the message from any user to the database.
        Owner: 
    */
    public function add_message(){
            
        $result = $this->product_social->validate_message($this->input->post());
            var_dump($this->input->post());
        if($result != 'success'){
            $this->session->set_flashdata('social_input_errors', $result);
        }else{
            $this->product_social->add_message($this->input->post());
        }
        redirect(base_url('products/show/'.$this->input->post('prod_id')));
    }

    /*  DOCU: This function is responsible to validate and add the comment from any user to the database.
        Owner: 
    */
    public function add_comment(){
        $result = $this->product_social->validate_comment($this->input->post());

        if($result != 'success'){
            $this->session->set_flashdata('social_input_errors', validation_errors());
        }
        else{
            $this->product_social->add_comment($this->input->post());
        }
        redirect(base_url('products/show/'.$this->input->post('prod_id')));
    }
}