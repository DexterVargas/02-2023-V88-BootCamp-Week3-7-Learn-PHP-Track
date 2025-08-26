<?php
class Contacts extends CI_Controller {
    public function index(){
        // //$this->output->enable_profiler(TRUE); //enables the profiler
        $this->load->model("contacts/Contact"); //loads the model
        $contact['data'] = $this->Contact->get_all_contact();  //gets all the records
        $this->load->view('contacts/index',$contact);
    }
    public function show($id){
        $this->load->model("contacts/Contact"); //loads the model
        $show_id = $id;
        $show = $this->Contact->get_contact_by_id($show_id); 
        $this->load->view('contacts/show',$show);
    }
    public function edit($id){
        $this->load->model("contacts/Contact"); 
        $show_id = $id;
        $show = $this->Contact->get_contact_by_id($show_id);
        $this->load->view('contacts/edit',$show);
    }
    public function destroy(){
        $this->load->model("contacts/Contact");
        $id = $this->input->post('id');
        $this->Contact->delete_contact($id);
        $this->session->set_flashdata('delete','Successfully Deleted.');
        redirect(base_url());;
    }
    public function new(){
        $this->load->view('contacts/new');
    }
    public function update($id){
        //validation start here
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<label id="error">','</label>');
        $this->form_validation->set_rules("name", "Name", "trim|required|min_length[8]|max_length[255]|callback_validate_name");
        $this->form_validation->set_rules("contact_number", "contact number", "trim|required|exact_length[11]|numeric|callback_validate_contact_number");
        if($this->form_validation->run() == FALSE){
            $this->load->model("contacts/Contact"); 
            $show_id = $id;
            $show = $this->Contact->get_contact_by_id($show_id);
            $this->load->view('contacts/edit',$show);
        }else{
            $name = $this->input->post('name');
            $contact_number = $this->input->post('contact_number');
            $this->load->model("contacts/Contact");
            $user_details = array("name" => $name,
                                  "contact_number" =>$contact_number,
                                  "created_at" =>date("Y-m-d, H:i:s")); 
            $this->Contact->update_contact_by_id($id, $user_details);
            $this->session->set_flashdata('update','Successfully Updated.');
            redirect(base_url());
        }
    }
    public function create(){
        //validation start here
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<label id="error">','</label>');
        $this->form_validation->set_rules("name", "Name", "trim|required|min_length[8]|max_length[255]|callback_validate_name");
		$this->form_validation->set_rules("contact_number", "contact number", "trim|required|exact_length[11]|numeric|callback_validate_contact_number");
        if($this->form_validation->run() == FALSE){
            $this->load->view('contacts/new');
        }else{
			$name = $this->input->post('name');
			$contact_number = $this->input->post('contact_number');
			$this->load->model("contacts/Contact");
			$user_details = array("name" => $name,
								"contact_number" =>$contact_number); 
			$add_user = $this->Contact->add_contact($user_details);
			if($add_user === TRUE){
                $this->session->set_flashdata('create','New contact successfully created.');
				redirect(base_url());
			}else{

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

    public function validate_contact_number($str){
        // // contact number
            if (substr($str,0, 2)!='09') {
                $this->form_validation->set_message('validate_contact_number','Invalid {field} format. Check mobile preffix.');
                return FALSE;
            }else{
                return TRUE;
            }         
    }

}
?>