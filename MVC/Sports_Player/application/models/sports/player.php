<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Player extends CI_Model {
    /**
     * Model search method. Upon user request for search and filtered search
     * Takes player_info as parameter. This parameter is from the POST data pass thru form
     * $query_string - this variable will serve as agent to hold the string of query. 
     * $gender  -this variable will get if the parameter contain search for gender F or M
     * $sports -this variable will get the search or filtered search for sport from the parameter. 
     */
    function search_all_players($player_info){
        $query_string = '';
        $gender = [];
        $sports = [];
        /**
         * Loop thru parameter to get necessary search data from the user. 
         * M/F for gender. 
         * 1~5 for basketball, volleyball, baseball, soccer and football respectively
         */
        foreach($player_info as $values){
            if($values =='M' || $values =='F'){
                $gender[]=$values;
            }
            if(intval($values)){
                $sports[]=$values;
            }
        }
        /**
         * condition if the input['name'] or the search textbox is empty or not
         * even empty the search will continue
         */
        if($player_info['name'] !=''){
            $query_string = ' name LIKE "%' . $player_info['name'].'%"';
        }
        /**
         * count the array gender. if the count is two or the user search both M and F, will ofset the query syntax for count of 2
         * Check if the $query_string is empty. If empty it means that the textbox [name] is blank.
         * if $query_string is blank will not add AND into the sql query
         * used explode() function to convert the array into string
         */
        if(count($gender)==1){
            if(!empty($query_string)){
                $query_string =$query_string .' AND gender="'.implode($gender).'"';  
            }else{
                $query_string =$query_string .' gender="'.implode($gender).'"'; 
            }
        }
        /**
         * check if the array sports is empty. 
         * Check if the $query_string is empty. If empty it means that the textbox [name] and the gender filter search are both offseted.
         * if $query_string is blank will not add AND into the sql query
         * used explode(", ", array) function to convert the array into string with separated into comma
         */
        if(!empty($sports)){
            if(!empty($query_string)){
                $query_string =$query_string . ' AND sport_id IN ('. (count($sports)>=2 ? implode(", ", $sports):implode($sports)).')';
            }else{
                $query_string =$query_string .'sport_id IN ('. (count($sports)>1?implode(", ", $sports):implode($sports)).')';
            }
        }
        //var_dump($query_string);
        /**
         * This will execute all the added query from the name , gender , sports.
         * ex. $query_string: ' name="Village88 Player1" AND gender="F" AND sport_id IN (1, 2, 3, 4, 5)'
         * the $query_string above will join the $this->db->query("SELECT * FROM player WHERE to make a valid complete SQL query
         * ex. SELECT * FROM player WHERE name="Village88 Player1" AND gender="F" AND sport_id IN (1, 2, 3, 4, 5);
         */
        return $this->db->query("SELECT * FROM player WHERE {$query_string}")->result_array();
       //return $this->db->query("SELECT * FROM player WHERE ? ;", array($query_string))->result_array();
        
    }
    /**
     * By default this method will load when visiting the index.php
     */
    function get_all_players(){
        return $this->db->query("SELECT * FROM player")->result_array();
    }
}
?>