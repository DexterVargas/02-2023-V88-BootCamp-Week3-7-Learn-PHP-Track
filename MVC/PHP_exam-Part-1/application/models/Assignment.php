<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assignment extends CI_Model {
	/**
	 * fetch all data from table database
	 * by default limit display by 5/page 
	 * owner: dexter
	 */
	public function fetch_all_assignments(){
		return $this->db->query("SELECT * FROM assignments LIMIT 5")->result_array();
	}
	/**
	 * trigger every time the user click the show more button
	 * every click means it will add up 5 move roows to the page
	 * owner: dexter
	 */
	public function fetch_assignments_by_five($limit){
		return $this->db->query("SELECT * FROM assignments LIMIT ?;", array(intVal($limit)))->result_array();
	}
	/**
	 * this method will count all the assignments.
	 * made this in order to know the remaining rows to display. 
	 * so that not every time the user click show more display only the remaining is less than the 5 rows in each click
	 * owner
	 */
	public function count_all_assignments(){
		return $this->db->query("select COUNT(*) as count from assignments;")->row_array();
	}
}