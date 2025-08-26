<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assignments extends CI_Controller {
	/**
	 * call model to fecth all assignments from database
	 * by default it will displayall the data in a single page
	 * owner: dexter
	 */
	public function index(){
		$result["assignments"] = $this->assignment->fetch_all_assignments();
		$result["pagecount"] = count($result["assignments"]);
		$this->load->view("index", $result);
	}
	/**
	 * every click on showmore, method will fetch more 5 rows from the database
	 * Alsi the title page of the browser will change on how many pages displayed
	 * owner: dexter
	 */
	public function show_assignments_by_filter(){
		//$this->output->enable_profiler(true);
		$search_box = $this->input->post();
		$result["assignments"] = $this->assignment->fetch_assignments_by_filter($search_box);
		$result["pagecount"] = count($result["assignments"]);
		$this->load->view("index", $result);
	}
}