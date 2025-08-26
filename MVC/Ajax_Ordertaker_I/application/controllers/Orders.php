<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Orders extends CI_Controller {

  public function index_html(){
    $result["orders"] = $this->Order->fetch_all();
    $this->load->view("partials/orders", $result);
  }
  public function create(){
    $new_order = $this->input->post();
    $this->Order->create($new_order);
    $result["orders"] = $this->Order->fetch_all();
    $this->load->view("partials/orders", $result);
  }
  public function index(){
    $this->load->view('index');
  }


  /**
   * methods for non AJAX browser
   * view->index-non-ajay.php
   */
  public function create_no_ajax(){
    $new_order = $this->input->post();
    $this->Order->create($new_order);
    redirect('/');
  }
  public function index_no_ajax(){
    echo 'index_no_ajax loaded';
    $result["orders"] = $this->Order->fetch_all();
    $this->load->view("index-non-ajax", $result);
  }
}