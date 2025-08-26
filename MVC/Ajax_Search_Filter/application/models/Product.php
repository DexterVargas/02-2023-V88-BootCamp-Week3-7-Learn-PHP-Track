<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Model {
	public function fetch_all(){
		return $this->db->query("SELECT * FROM products 
									ORDER BY price asc")->result_array();
	}
	public function filter_search($name){
		//var_dump($name);
		$filter_name = "%".$this->security->xss_clean($name['name'])."%";
		$filter_price = $this->security->xss_clean($name['product_price']);
		$filter_min = $this->security->xss_clean($name['min']);
		$filter_max = $this->security->xss_clean($name['max']);
		$min_max = $this->min_max();
		if ($filter_min==''){
			$filter_min = $min_max['min'];
		}
		if ($filter_max==''){
			$filter_max = $min_max['max'];
		}
		return $this->db->query("SELECT * FROM products 
									WHERE name like ? 
									AND price between ? and ? 
									ORDER BY price {$filter_price};", 
									array($filter_name,$filter_min,$filter_max))->result_array();
	}
	public function min_max(){
		return $this->db->query("SELECT MIN(price) as min , 
									MAX(price) as max 
									from products;")->row_array();
	}
}