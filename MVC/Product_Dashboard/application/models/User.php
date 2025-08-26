<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model {
    public function validate_signin_form($form_data){
        $this->form_validation->set_error_delimiters('<p id="error">','</p>');
        $this->form_validation->set_rules("login_email", "email", "trim|required");
        $this->form_validation->set_rules("login_password", "password", "trim|required");

        if(!$this->form_validation->run()){
            return validation_errors();
        }else{
            return "success";
        }        
    }
    

    public function validate_user_updates($form_data){
        $this->form_validation->set_error_delimiters('<p id="error">','</p>');
        $this->form_validation->set_rules("first_name", "first_name", "trim|required|min_length[3]|max_length[45]");
        $this->form_validation->set_rules("last_name", "last_name", "trim|required|min_length[3]|max_length[45]");

        if(!$this->form_validation->run()){
            return validation_errors();
        }else{
            return "success";
        }        
    }
    function update_user($user_data){  
        $query = "UPDATE `users` 
                    SET `first_name` = ?, `last_name` = ?, `updated_at` = ? 
                    WHERE (`id` = ?);";
        $values = array(
            $this->security->xss_clean($user_data['first_name']), 
            $this->security->xss_clean($user_data['last_name']), 
            date('Y-m-d H:i:s'),
            $this->security->xss_clean($this->session->userdata('user_id')));    
        return $this->db->query($query, $values);
    }

    
    public function validate_user_password($form_data){
        $this->form_validation->set_error_delimiters('<p id="error">','</p>');
        $this->form_validation->set_rules("old_password", "old password", "trim|required");
        $this->form_validation->set_rules("password", "new password", "trim|required|min_length[8]|max_length[45]|matches[confirm_password]");
        $this->form_validation->set_rules("confirm_password", "password", "trim|required|min_length[8]|max_length[45]|matches[password]");

        if(!$this->form_validation->run()){
            return validation_errors();
        }else{
            $user = $this->get_user_by_id($this->session->userdata('user_id'));
            $encrypted_password = md5($this->security->xss_clean($form_data['old_password']).''.$user['salt']);
       
            if($user && $user['password'] == $encrypted_password) {
                return "success";
            }else {
                return "Incorrect old password.";
            }
        }       
    }


    function update_user_password($user_data){  
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $encrypted_password = md5($user_data["password"] . '' . $salt);

        $query = "UPDATE `users` 
                    SET `password` = ?, `salt` = ?, `updated_at` = ? 
                    WHERE (`id` = ?);";
        $values = array(
            $this->security->xss_clean($encrypted_password),
            $salt, 
            date('Y-m-d H:i:s'),
            $this->security->xss_clean($this->session->userdata('user_id')));    
        return $this->db->query($query, $values);
    }




    function validate_signin_match($user, $password){                  
        $encrypted_password = md5($this->security->xss_clean($password).''.$user['salt']);
       
        if($user && $user['password'] == $encrypted_password) {
            return "success";
        }
        else {
            return "Incorrect email/password.";
        }
    }

    function validate_registration($email){
        $this->form_validation->set_error_delimiters('<p id="error">','</p>');
        $this->form_validation->set_rules("first_name", "first_name", "trim|required|min_length[3]|max_length[45]");
        $this->form_validation->set_rules("last_name", "last_name", "trim|required|min_length[3]|max_length[45]");
        $this->form_validation->set_rules("email", "email", "trim|required|valid_email");
        $this->form_validation->set_rules("password", "password", "trim|required|min_length[8]|max_length[45]|matches[confirm-password]");
        $this->form_validation->set_rules("confirm-password", "password", "trim|required|min_length[8]|max_length[45]|matches[password]");
        
        if(!$this->form_validation->run()){
            return validation_errors();
        }else if($this->get_user_by_email($email)){
            return "Email already taken.";
        }
    }
    

    function create_user($user){  
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $encrypted_password = md5($user["password"] . '' . $salt);
        $query = "INSERT INTO users (first_name, last_name, email, password,salt, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($user['first_name']), 
            $this->security->xss_clean($user['last_name']), 
            $this->security->xss_clean($user['email']), 
            $this->security->xss_clean($encrypted_password),
            $salt,
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s'));     
        return $this->db->query($query, $values);
    }


    function get_user_by_email($email){ 
        $query = "SELECT * FROM users WHERE email=?";
        return $this->db->query($query, $this->security->xss_clean($email))->result_array()[0];
    }
    function get_user_by_id($id){ 
        $query = "SELECT * FROM users WHERE id=?";
        return $this->db->query($query, $id)->result_array()[0];
    }
    







    //____________________________Custom Validation____________________________________//
    public function validate_name($str){
        //firstname/lastname numeric
        $this->load->helper(array('form', 'url','security'));

        $this->load->library('form_validation');
        $searchfirst_name = $str;
        $counter = 0;
        for ($isNumeric=0;$isNumeric <strlen($searchfirst_name);$isNumeric++) { 
            if (ctype_digit($searchfirst_name[$isNumeric])) {
                $counter+=1;
            }
        }
        if($counter>0){
            $this->form_validation->set_message('validate_name','The %s field cannot contain numeric characters!');
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function validate_email($str){
        // // email
            $this->load->model("users/User"); 
            $show_result_email = $this->User->get_user_by_email($str); //check if existing
            if (!empty($show_result_email)) {
                $this->form_validation->set_message('validate_email','The {field} already used/exist. Use another email.');
                return FALSE;
            }else{
                return TRUE;
            }         
    }

}
?>