<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Model {

    /*  DOCU: This function returns all user comments depending on passed message id value.
        Owner: 
    */
    public function get_comments_from_message_id($message_id){
        $safe_message_id = $this->security->xss_clean($message_id);

        $query = "SELECT comments.message_id, 
            CONCAT(first_name,' ',last_name) AS comment_sender_name, 
            comment AS comment_content, comments.created_at AS comment_date 
            FROM comments LEFT JOIN users on comments.user_id=users.id 
            WHERE comments.message_id=? ORDER BY 4";
        
        return $this->db->query($query, $safe_message_id)->result_array();
    }

}