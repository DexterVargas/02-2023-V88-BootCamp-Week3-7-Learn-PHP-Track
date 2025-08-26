<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Games extends CI_Controller {
  public function index()
  {
    echo 'here na me index';
    $this->load->view('index');
  }
  public function search(){
    echo 'click na una';
    var_dump($this->input->post('user_input'));

    $game_id = str_replace(' ', '', $this->input->post('user_input'));
    $url = "https://www.freetogame.com/api/game?id=".$game_id;
    echo $url;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $data = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    print_r($data);
    echo 'click na end of code na';
  }
}
//end of Games controller