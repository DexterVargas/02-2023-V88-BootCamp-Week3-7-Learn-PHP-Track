<?php
class Users extends CI_Controller {
    public function index(){
        if($this->session->userdata('user_id')){
            $this->load->view('users/main');
        }else{
        $this->load->view('users/index');            
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
    //_______________________VALIDATE LOGIN_________________________
    public function validate_login($str){
        $password = $this->input->post('login_password');
        $this->load->model("users/User"); 
        $show_result_email = $this->User->get_user_by_email($str); 
        $show_result_number = $this->User->get_user_by_number($str); 
        if($show_result_email){
            $encrypted_password = md5($password.''.$show_result_email['salt']);
			if ($show_result_email['password']==$encrypted_password) {
                $this->session->set_userdata('user_id', $show_result_email['id']);
                $this->session->set_userdata('user_first_name', $show_result_email['first_name']);
                $this->session->set_userdata('user_last_name', $show_result_email['last_name']);
                $this->session->set_userdata('user_contact_number', $show_result_email['contact_number']);
                return TRUE;
			}else{
                $this->session->set_flashdata('login_error','Incorrect password used for email ' .$show_result_email['email']. '. Please try again!');
                $this->session->set_userdata('failed_login',date("Y-m-d, H:i:s"));
                return FALSE;
			}
        }elseif($show_result_number){
            $encrypted_password = md5($password.''.$show_result_number['salt']);
			if ($show_result_number['password']==$encrypted_password) {
                $this->session->set_userdata('user_id', $show_result_number['id']);
                $this->session->set_userdata('user_first_name', $show_result_number['first_name']);
                $this->session->set_userdata('user_last_name', $show_result_number['last_name']);
                $this->session->set_userdata('user_contact_number', $show_result_number['contact_number']);
                return TRUE;
			}else{
				$this->session->set_flashdata('login_error','Incorrect password used for number ' .$show_result_number['contact_number']. '. Please try again!');
                $this->session->set_userdata('failed_login',date("Y-m-d, H:i:s"));
                return FALSE;
			}
        }else{
            $this->session->set_flashdata('login_error','Email address/Mobile number does not exist. Please check again.Please check again!');
            return FALSE;
        }
    }


    public function login(){
        $str = $this->input->post('login_user');
        if(!$this->validate_login($str)){
            redirect(base_url());
        }else{
            $this->load->view('users/main');
        }
    }
    public function create(){
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<label id="error">','</label>');
        $this->form_validation->set_rules("first_name", "first name", "trim|required|min_length[3]|max_length[45]|callback_validate_name");
        $this->form_validation->set_rules("last_name", "last name", "trim|required|min_length[3]|max_length[45]|callback_validate_name");
        $this->form_validation->set_rules("contact_number", "contact number", "trim|required|exact_length[11]|numeric|callback_validate_contact_number");
        $this->form_validation->set_rules("email", "email add", "trim|required|valid_email|callback_validate_email");
        $this->form_validation->set_rules("password", "password", "trim|required|min_length[8]|max_length[45]|callback_validate_password_match");
        $this->form_validation->set_rules("confirm-password", "password", "trim|required|min_length[8]|max_length[45]|callback_validate_password_match");
        if($this->form_validation->run() == FALSE){
            $this->load->view('users/index');
        }else{
            //var_dump($this->input->post());
			$first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
			$contact_number = $this->input->post('contact_number');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $encrypted_password = md5($password . '' . $salt);
			$this->load->model("users/User");
			$user_details = array("first_name" => $first_name,
                                "last_name" => $last_name,
                                "contact_number" => $contact_number,
                                "email" => $email,
                                "password" => $encrypted_password,
                                "salt" => $salt); 
			$add_user = $this->User->add_user($user_details);
			if($add_user === TRUE){
                $this->session->set_flashdata('create_success','New user successfully created.');
				redirect(base_url());
			}else{
                $this->session->set_flashdata('create_failed','Failed to create user.');
                $this->load->view('users/index');
            }
        }
    }
    //____________________________Custom Validation____________________________________//
    public function validate_name($str){
        //firstname/lastname numeric
        $searchfirst_name = $str;
        $counter = 0;
        for ($isNumeric=0;$isNumeric <strlen($searchfirst_name);$isNumeric++) { 
            if (ctype_digit($searchfirst_name[$isNumeric])) {
                $counter+=1;
            }
        }
        if($counter>0){
            $this->form_validation->set_message('validate_name','The {field} field cannot contain numeric characters!');
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function validate_password_match($str){
        // //password match
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        if ($str !== $password && $str !== $confirm_password) {
            $this->form_validation->set_message('validate_password_match','The {field} field is not match!');
            return FALSE;
        }else{
            return TRUE;
        }         
    }
    public function validate_contact_number($str){
        // // contact number
            $this->load->model("users/User"); 
            $show_result_number = $this->User->get_user_by_number($str); //check if existing
            if (!empty($show_result_number)) {
                $this->form_validation->set_message('validate_contact_number','The {field} already used/exist. Use another number.');
                return FALSE;
            }elseif (substr($str,0, 2)!='09') {
                $this->form_validation->set_message('validate_contact_number','Invalid {field} format. Check mobile preffix.');
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