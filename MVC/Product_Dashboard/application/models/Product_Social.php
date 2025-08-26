<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_Social extends CI_Model {

    // public function get_messages_and_comments_by_id($id){
    //     $query_result= $this->db->query("SELECT * FROM products WHERE id IN ? ", array($id))->result_array();
    // }
    public function get_messages_by_product_id($id){
        return $this->db->query("SELECT messages.product_id as prod_id, messages.id AS message_id, 
                                    messages.message AS message_content, 
                                    messages.created_at AS message_date, 
                                    CONCAT(first_name,' ',last_name) AS message_sender_name 
                                    FROM messages 
                                    LEFT JOIN users on messages.user_id=users.id 
                                    WHERE messages.product_id = ?
                                    ORDER BY message_date DESC ;", array($id))->result_array();

    }

    public function get_comments_by_message_id($id){
        return $this->db->query("SELECT comments.message_id as message_id,  
                                    comments.comment AS comment_content, 
                                    comments.created_at AS comment_date, 
                                    CONCAT(first_name,' ',last_name) AS comment_sender_name 
                                    FROM comments 
                                    LEFT JOIN users on comments.user_id=users.id 
                                    WHERE comments.message_id = ?
                                    ORDER BY comment_date ASC;", array($id))->result_array();
    }

    /*  DOCU: This function validates the required comment input.
        Owner: 
    */
    public function validate_comment(){
        $this->form_validation->set_error_delimiters('<p id="error">','</p>');
        $this->form_validation->set_rules('comment_input', 'Comment', 'required');

        if(!$this->form_validation->run()){
            return validation_errors();
        }else{
            return "success";
        }
    }

    /*  DOCU: This function inserts new comment to the database that depends on a message id.
        Owner: 
    */
    public function add_comment($post){
        $query = 'INSERT INTO comments(user_id, message_id, comment, created_at, updated_at) VALUES (?, ?, ?, ?, ?)';
        $values = array($this->security->xss_clean($this->session->userdata('user_id')),
                    $this->security->xss_clean(intVal($post['message_id'])), 
                    $this->security->xss_clean($post['comment_input']),
                    date('Y-m-d H:i:s'),
                    date('Y-m-d H:i:s'));  
        
        $this->db->query($query, $values);
    }
    
    /*  DOCU: This function validates the required message input.
        Owner: 
    */
    public function validate_message(){
        $this->form_validation->set_error_delimiters('<p id="error">','</p>');
        $this->form_validation->set_rules('message_input', 'Message', 'required');

        if(!$this->form_validation->run()){
            return validation_errors();
        }else {
            return 'success';
        }
    }

    /*  DOCU: This function inserts new message from a user to the database.
        Owner: 
    */
                    
    public function add_message($post){

        $query = 'INSERT INTO messages(user_id, product_id,  message, created_at, updated_at) VALUES (?, ?, ?, ?, ?)';
        $values = array(
            $this->security->xss_clean($this->session->userdata('user_id')),
            $this->security->xss_clean(intVal($post['prod_id'])),  
            $this->security->xss_clean($post['message_input']),
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s')); 
        
        $this->db->query($query, $values);
    }


}