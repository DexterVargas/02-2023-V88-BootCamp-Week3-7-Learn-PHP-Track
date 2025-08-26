<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends CI_Controller {

	public function index_html(){
		$result= $this->product->fetch_all_pagination();
		//var_dump($result);
		$this->load->view("partials/products", $result);
	}
	public function paginate($id){
		$result = $this->product->fetch_all_pagination($id);
		$this->load->view("partials/products", $result);
	}
///////////////////////////////////



	public function filter_search(){
		//$this->output->enable_profiler(true);
		$search_box = $this->input->post();
		//var_dump($this->input->post());
		//var_dump($search_box);
		$result= $this->product->filter_search($search_box);
		//var_dump($result);
		$this->load->view("partials/products", $result);
	}

	public function filter_search_paginate($id){
		//$this->output->enable_profiler(true);
		$result= $this->product->filter_search_pagination($id);
		$this->load->view("partials/products", $result);
	}

////////////////////////////////////////



	public function index(){
		$this->load->view('index');
	}


	//---------------------------------------NON-AJAX------------------------------------//
	/**
	 * methods for non AJAX browser
	 * view->index-non-ajay.php
	 */
	public function index_no_ajax(){
		//echo 'index_no_ajax loaded';
		$result= $this->product->fetch_all_pagination();
		$this->load->view("index-non-ajax", $result);
	}

	public function pagination_no_ajax($id){
		$result = $this->product->fetch_all_pagination($id);
		$this->load->view("index-non-ajax", $result);

	}

	/**
	 * Filtration method for non AJAX
	 */
	public function filter_search_no_ajax(){
		//$this->output->enable_profiler(true);
		$search_box = $this->input->post();
		$result= $this->product->filter_search($search_box);
		$this->load->view("index-non-ajax", $result);
	}
	public function filter_search_no_ajax_($id){
		//$this->output->enable_profiler(true);
		$result= $this->product->filter_search_pagination($id);
		$this->load->view("index-non-ajax", $result);
	}





}


