<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assignment extends CI_Model {
	/**
	 * fetch all data from table database
	 * by default limit display by 5/page 
	 * owner: dexter
	 */
	public function fetch_all_assignments(){
		return $this->db->query("SELECT * FROM assignments")->result_array();
	}
	/**
	 * trigger every time the user click the update button
	 * it will filter the search choise of the user
	 * owner: dexter
	 */
	public function fetch_assignments_by_filter($form_data){
		$search_query = $this->base_query();
		$values = array();
		if (!empty($form_data)) {
			/**
			 * check if track is selected.. if none load all assignments
			 */
			if ($form_data['track'] !='') {
				$search_query .= "WHERE `track` = ? ";
				$values[] = $form_data['track'];
			}else{
				$search_query .= "WHERE `track` <> ? ";
				$values[] = '';
			}
			/**
			 * if both easy and intermediate if check or uncheck, will not execute
			 * execute only base on conditions
			 * owner: dexter
			 */
			if (!empty($form_data['easy']) && empty($form_data['intermediate'])) {
				$search_query .= "HAVING `level` IN ( ?)";
				$values[] = $form_data['easy'];
			}
			if (empty($form_data['easy']) && !empty($form_data['intermediate'])) {
				$search_query .= "HAVING `level` IN ( ? )";
				$values[] = $form_data['intermediate'];
			}
		}
		return $this->db->query($search_query, $values)->result_array();
	}
	/**
	 * this will serve as my base query for the search query
	 * owner: dexter
	 */
	public function base_query(){
		return "SELECT * FROM assignments ";
	}
}