<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assignments extends CI_Controller {
	/**
	 * call model to fecth all assignments from database
	 * by default it will display 5 row data per page
	 * owner: dexter
	 */
	public function index(){
		$result["assignments"] = $this->assignment->fetch_all_assignments();
		//to compute the remaining rows to display
		$this->load->view("index", $result);
	}
	/**
	 * every click on showmore, method will fetch more 5 rows from the database
	 * Alsi the title page of the browser will change on how many pages displayed
	 * owner: dexter
	 */
	public function show_more_assignments($pagecount = null){
		if ($pagecount!=null) {
			$result["assignments"] = $this->assignment->fetch_assignments_by_five($pagecount);
			$result["pagecount"] = count($result["assignments"]);
			//to compute the remaining rows to display
			$result['total_row'] = $this->assignment->count_all_assignments();
			//var_dump($result);
			$this->load->view("index", $result);
		}
	}
}


