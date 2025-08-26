<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order extends CI_Model {
  public function fetch_all(){
    return $this->db->query("SELECT * FROM orders")->result_array();
  }
  public function create($new_order){
    $xss_filtered = $this->security->xss_clean($new_order['order']);
    $query = "INSERT INTO orders (`order`,`created_at`,`updated_at`) VALUES (?,NOW(),NOW())";
    $values = array($xss_filtered);
    return $this->db->query($query, $values);
  }
  public function delete($id){
    //$xss_filtered = $this->security->xss_clean($order['order']);
    $query = "DELETE FROM orders WHERE id= ?";
    $values = array($id);
    return $this->db->query($query, $values);
  }

  public function update($id,$form_data){
    //$xss_filtered = $this->security->xss_clean($order['order']);
    $query = "UPDATE orders SET `order` = ? , `updated_at` = NOW() WHERE `id`= ?";
    $values = array( $form_data['order'],intVal($id));
    return $this->db->query($query, $values);
  }
}