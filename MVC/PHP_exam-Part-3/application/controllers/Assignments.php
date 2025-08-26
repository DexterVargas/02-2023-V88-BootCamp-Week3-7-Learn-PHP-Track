<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assignments extends CI_Controller {
	/**
	 * load all the assignement from the database
	 * load the main/index page. 
	 * displayed all the assignment by default
	 * owner: dexter
	 */
	public function index(){
		$this->load->view("index");
	}
	/**
	 * every click on showmore, method will fetch more 5 rows from the database
	 * Alsi the title page of the browser will change on how many pages displayed
	 * owner: dexter
	 */
	public function show_assignments_by_filter(){
		$search_box = $this->input->post();
		$result["assignments"] = $this->assignment->fetch_assignments_by_filter($search_box);
		$this->load->view("partials/assignments", $result);
	}
}