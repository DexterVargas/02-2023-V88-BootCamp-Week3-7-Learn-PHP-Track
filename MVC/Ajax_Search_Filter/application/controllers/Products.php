<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends CI_Controller {

	public function index_html(){
		$result["products"] = $this->product->fetch_all();
		$this->load->view("partials/products", $result);
	}
	public function filter_search(){
		//$this->output->enable_profiler(true);
		$search_box = $this->input->post();
		$result['products'] = $this->product->filter_search($search_box);
		$this->load->view("partials/products", $result);
	}
	public function index(){
		$this->load->view('index');
	}

	/**
	 * methods for non AJAX browser
	 * view->index-non-ajay.php
	 */
	public function index_no_ajax(){
		echo 'index_no_ajax loaded';
		$result["products"] = $this->product->fetch_all();
		$this->load->view("index-non-ajax", $result);
	}
	public function filter_search_no_ajax(){
		//$this->output->enable_profiler(true);
		$search_box = $this->input->post();
		$result['products'] = $this->product->filter_search($search_box);
		$this->load->view("index-non-ajax", $result);
	}
}


