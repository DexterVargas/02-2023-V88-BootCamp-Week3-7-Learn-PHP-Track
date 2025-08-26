<?php 
class User extends CI_Model {
    function get_all_contact(){
        return $this->db->query("SELECT * FROM users")->result_array();
    }
    function get_user_by_number($number){
        return $this->db->query("SELECT * FROM users WHERE contact_number = ?", array($number))->row_array();
    }
    function get_user_by_email($email){
        return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
    }
    function get_user_by_id($id){
        return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
    }
    function add_user($user_details){
        $query = "INSERT INTO `users` (`first_name`,`last_name`, `contact_number`,`email`,`password`,`salt`,`created_at`, `updated_at`) 
                    VALUES (?,?,?,?,?,?,?,?)";
        $values = array($user_details['first_name'],$user_details['last_name'],$user_details['contact_number'],$user_details['email'],$user_details['password'],$user_details['salt'],date("Y-m-d, H:i:s"),date("Y-m-d, H:i:s")); 
        return $this->db->query($query, $values);
    }
    function update_contact_by_id($id, $user_details){
        $this->db->where('id', $id);
        $this->db->update('users', $user_details);
    }
    function delete_contact($id){
       return $this->db->delete('users',array('id' => $id));
    }
}
?>