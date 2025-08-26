<?php 
class Bookmark extends CI_Model {
    function get_all_bookmark(){
        return $this->db->query("SELECT * FROM bookmarks")->result_array();
    }
    function get_bookmark_by_id($id){
        return $this->db->query("SELECT * FROM bookmarks WHERE id = ?", array($id))->row_array();
    }
    function add_bookmark($bookmark){
        $query = "INSERT INTO `bookmarks` (`name`, `url`, `folder`, `created_at`, `updated_at`) 
                    VALUES (?,?,?,?,?)";
        $values = array($bookmark['name'],$bookmark['url'],$bookmark['folder'],date("Y-m-d, H:i:s"),date("Y-m-d, H:i:s")); 
        return $this->db->query($query, $values);
    }
    function delete_bookmark($id){
       return $this->db->delete('bookmarks',array('id' => $id));
    }
}
?>