<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Model {
    
    /*  DOCU: This function returns all user messages.
        Owner: 
    */
    public function get_messages(){
        $query = 'SELECT messages.id AS message_id, message AS message_content, 
        messages.created_at AS message_date, CONCAT(first_name," ",last_name) AS message_sender_name 
        FROM messages LEFT JOIN users on messages.user_id=users.id 
        ORDER BY messages.created_at DESC';

        return $this->db->query($query)->result_array();
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

        $query = 'INSERT INTO messages(user_id, message, created_at, updated_at) VALUES (?, ?, ?, ?)';
        $values = array(
            $this->security->xss_clean($this->session->userdata('user_id')), 
            $this->security->xss_clean($post['message_input']),
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s')); 
        
        $this->db->query($query, $values);
    }
}
