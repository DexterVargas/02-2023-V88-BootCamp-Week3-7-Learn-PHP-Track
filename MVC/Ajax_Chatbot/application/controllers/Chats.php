<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chats extends CI_Controller {
	public function chat_bot(){
		//Setup my input/chat and Request to simsimi URL chatbot
		$user_input = $this->security->xss_clean($this->input->post('my_chat'));
		$my_chat = array("utext" =>$user_input,'lang'=>'en');
		$this->load->view("partials/my-chat", $my_chat);
		$this->session->set_flashdata('chat',$my_chat);
		//$this->request_simsimi($my_chat);
	}
	public function request_simsimi(){
		//encode my chat to send to simsimi
		$post_my_chat = json_encode($this->session->flashdata('chat'));
		//setup my header
		$header = array();
		$header[] = 'Content-Type:application/json';
		$header[] = 'X-Api-Key:N8za51XiuM-j9cuF2KVxqJBFyu4-PcJAI4bGdCqN';
		//setup Post Request Curl
		// $url = "https://wsapi.simsimi.com/190410/talk";
		$url = "dummy";
		$ch = curl_init();
		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => $post_my_chat,
			CURLOPT_HTTPHEADER => $header,
			CURLOPT_CONNECTTIMEOUT => 30,
			CURLOPT_FOLLOWLOCATION =>1,
			CURLOPT_SSL_VERIFYPEER => FALSE,
			CURLOPT_FAILONERROR => TRUE);
		curl_setopt_array($ch,$options);
		//Send Request to simsimi URL chatbot also check for errors
		$result = curl_exec($ch);
		$info = curl_getinfo($ch);
		if (curl_errno($ch)) {
			$error_msg = curl_error($ch);//echo $error_msg;
		}
		//close Curl initialization
		curl_close($ch);
		//Get RESPONSE and convert JSON using json_decode
		$result = json_decode($result);		
		// $data = json_decode(json_encode($result),true);
		// $this->load->view("partials/simi-chat", $data);
		$result = array( 
		'status' => 200,
		'statusMessage' => 'Ok', 
		'request' => 
		  array (
			'utext' =>'hello',
			'lang' => 'en'),
		'atext' =>  'Hi. There!' . rand(1,10) ,
		'lang' => 'en' );
		$this->load->view("partials/simi-chat", $result);	
	}
	public function index(){
		$this->load->view('index');
	}

}


