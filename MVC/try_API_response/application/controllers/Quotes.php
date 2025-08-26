<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Quotes extends CI_Controller {
//   public function __construct()
//   {
//     parent::__construct();
//     $this->load->model("Quote");
//   }
  public function index_html()
  {
    echo'here ako index_html';
    $result["quotes"] = $this->Quote->fetch_all();
    $this->load->view("partials/quotes", $result);
  }
  public function create()
  {
    echo'here ako create';
    $new_quote = $this->input->post();
    $this->Quote->create($new_quote);
    $result["quotes"] = $this->Quote->fetch_all();
    $this->load->view("partials/quotes", $result);
  }
  public function index()
  {
    $this->load->view('index');
  }
}