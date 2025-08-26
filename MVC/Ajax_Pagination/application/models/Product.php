<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Model {
		/**
	 * --------------------------------Default Load-----------------------------------------------
	 */
	public function fetch_all(){
		return $this->db->query("SELECT * FROM products 
									ORDER BY price asc")->result_array();
	}

	public function fetch_all_pagination($id = null){
		$fetch_all_result = $this->fetch_all();
		//$result['products']=
		$limit = 5;
		//to display current page
		if($id !=null){
			$page = $id;
		}else{
			$page = 0;
		}
		//number of pages
		$start_of_page = (($page-1)*$limit)<0?0:($page-1)*$limit;
		//$start_of_page = 10;
		$pages = intval(ceil(count($fetch_all_result)/$limit));
		//insert into array to pass in controller
		$result['table_control']['startof_page']= $start_of_page;
		$result['table_control']['pages'] = $pages;


		$this->session->sess_destroy();
		$this->session->set_userdata('page',TRUE);
		//load query with limit
		$result['products'] = $this->db->query("SELECT * FROM products 
									ORDER BY price asc LIMIT ?,?;", 
									array($start_of_page,$limit))->result_array();
		return $result;
	}


	/**
	 * --------------------------------FILTER-----------------------------------------------
	 */
	public function filter_search($name){
		//$table_control = $this->table_control($name['page']);
		$table_control = $this->table_control();
		$filter_name = "%".$this->security->xss_clean($name['name'])."%";
		$filter_price = $this->security->xss_clean($name['product_price']);
		$filter_min = $this->security->xss_clean($name['min']);
		$filter_max = $this->security->xss_clean($name['max']);
		if ($filter_min==''){
			$filter_min = $table_control['min'];
		}
		if ($filter_max==''){
			$filter_max = $table_control['max'];
		}
			$query = "SELECT * FROM products 
						WHERE name like ? 
						AND price between ? and ? 
						ORDER BY price {$filter_price};";
			$values = array($filter_name,$filter_min,$filter_max);

			//$result['products'] = $this->db->query($query,$values)->result_array();
			$this->db->query($query,$values)->result_array();
			$this->session->set_userdata('filter_query',$this->db->last_query());

			return $this->filter_search_pagination();
	}


	public function filter_search_pagination($id = null){
		if ($this->input->post()==null) {
		}
		$filter_query = $this->session->userdata('filter_query');
		$filter_search_result = $this->db->query($filter_query)->result_array();	
		$limit = 5;
		//to display current page
		if($id !=null){
			$page = $id;
		}else{
			$page = 0;
		}
		//number of pages
		$start_of_page = (($page-1)*$limit)<0?0:($page-1)*$limit;
		//$start_of_page = 10;
		$pages = intval(ceil(count($filter_search_result)/$limit));
		//insert into array to pass in controller
		$result['table_control']['startof_page']= $start_of_page;
		$result['table_control']['pages'] = $pages;
		//retrieve the save filtration query
		$this->session->unset_userdata('page');

		//load query with limit
		$query = rtrim($filter_query, ';')." LIMIT ?,?;";
		//var_dump($query);
		$result['products'] = $this->db->query($query,array($start_of_page,$limit))->result_array();

		return $result;
	}

	public function table_control(){
		$result =  $this->db->query("SELECT MIN(price) as min , 
									MAX(price) as max,
									count(*) as count 
									from products;")->row_array();
		return $result;
	}
}