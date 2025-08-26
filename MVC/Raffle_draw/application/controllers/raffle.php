<?php 
class Raffle extends CI_Controller{
    public function index(){
    	$this->load->view('raffle/index');
		$this->session->set_userdata('count',10);
    }
	public function process(){
		if ($this->session->userdata('count')){
			$counter = $this->session->userdata('count');
			$counter--;
			$this->session->set_userdata('count',$counter);
    	}else{
			$this->session->set_userdata('count',10);
		}
		$this->load->view('raffle/index');
	}
}
?>