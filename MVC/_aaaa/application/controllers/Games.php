<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Games extends CI_Controller {
  public function index()
  {
    $this->load->view('index');
  }
  public function search() {


    $game_id = str_replace(' ', '', $this->input->post('user_input'));
    $url = "https://www.freetogame.com/api/game?id=".$game_id;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	//curl_setopt($ch, CURLOPT_FAILONERROR, true); 
    $data = curl_exec($ch);
    $info = curl_getinfo($ch);



	if (curl_errno($ch)) {
		$error_msg = curl_error($ch);
	}
	//echo $error_msg;
    curl_close($ch);
    print_r($data);
  }
}