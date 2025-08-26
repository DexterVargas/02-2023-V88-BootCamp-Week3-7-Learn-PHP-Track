<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order extends CI_Model {
  public function fetch_all(){
    return $this->db->query("SELECT * FROM orders")->result_array();
  }
  public function create($new_order){
    $xss_filtered = $this->security->xss_clean($new_order['order']);
    $query = "INSERT INTO orders (`order`) VALUES (?)";
    $values = array( $xss_filtered);
    return $this->db->query($query, $values);
  }
}