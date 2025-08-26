<?php 
class Users extends CI_Controller{
	//4
	public function index(){
		$this->load->view('users/index');
	}
	//5
	public function new(){
		$this->load->view('users/new');
	}
	//6
	public function create(){
		if ($this->input->post()){
			echo "This feature is comming soon.";
		} else{
			redirect('http://localhost/View_Exercices/users/');
		}
	}
	//7 
	public function count(){
		 if($this->session->userdata('count')){
		 	$counter = $this->session->userdata('count');
			$counter++;
			$this->session->set_userdata('count',$counter);
		 }else{
			$this->session->set_userdata('count',1);
		 }
		 echo $this->session->userdata('count');
	}
	//8
	public function reset(){
		 $this->session->set_userdata('count',0);
		 echo $this->session->userdata('count');
	}
	//9 is route settings
	//10 and 11
	public function say($any,$num=null){
        if(isset($num)){
			$data['num'] = $num;
		}
		$data['say'] =$any;
		$this->load->view('users/say',$data);
	}
	//12
	public function mprep()
	{
		 $view_data = array(
			  'name' => "Michael Choi",
			  'age'  => 40,
			  'location' => "Seattle, WA",
			  'hobbies' => array( "Basketball", "Soccer", "Coding", "Teaching", "Kdramas","anime","Teach")
		  );
		  $this->load->view('users/mprep', $view_data);
	}

}

?>