<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    /*  DOCU: This function retrieves user information filtered by email.
        Owner: Karen
    */
    function get_user_by_email($email)
    { 
        $query = "SELECT * FROM users WHERE email=?";
        return $this->db->query($query, $this->security->xss_clean($email))->result_array()[0];
    }

    /*  DOCU: This function inserts new user info upon registration.
        Owner: Karen
    */
    function create_user($user)
    {                                                                          //added created and updated
        $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($user['first_name']), 
            $this->security->xss_clean($user['last_name']), 
            $this->security->xss_clean($user['email']), 
            md5($this->security->xss_clean($user["password"])),
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s')); 
        
        return $this->db->query($query, $values);
    }

    /*  DOCU: This function checks if all required fields were filled up.
        Owner: Karen
    */
    function validate_signin_form() {
       
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if(!$this->form_validation->run()) {
            return validation_errors();
        } 
        else {
            return "success";
        }
    }
    
    /*  DOCU: This function contains simple condition to match database record and user input in password.
        Owner: Karen
    */
    function validate_signin_match($user, $password) 
    {                       //addedd md5
        $hash_password =  md5($this->security->xss_clean($password));

        if($user && $user['password'] == $hash_password) {
            return "success";
        }
        else {
            return "Incorrect email/password.";
        }
    }

    /*  DOCU: This function checks required input fields and if unique email.
        Owner: Karen
    */
    function validate_registration($email) 
    {
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');        
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else if($this->get_user_by_email($email)) {
            return "Email already taken.";
        }
    }

}

?>