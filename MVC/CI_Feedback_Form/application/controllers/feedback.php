<?php 
class Feedback extends CI_Controller{
	public function index(){
		$this->load->view('feedback/index');
	}
	public function create(){
		if ($this->input->post('email')){
			echo "This feature is comming soon.";
		} else{
			redirect('/users');
		}
		// $user_form['first_name'] = $this->input->post('first_name');
		// $user_form['last_name'] = $this->input->post('last_name');
		// $user_form['email'] = $this->input->post('email');
		// echo "Welcome " . $user_form['first_name'] . " " . $user_form['last_name'];
		// echo "<br>Email " . $user_form['email'];
	}
	public function process(){
		$feedback_form['name'] = $this->input->post('name');
		$feedback_form['course'] = $this->input->post('course');
		$feedback_form['score'] = $this->input->post('score');
		$feedback_form['reason'] = $this->input->post('reason');
		$this->load->view('feedback/result',$feedback_form);
	}
}

?>