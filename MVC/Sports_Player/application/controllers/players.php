<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Players extends CI_Controller {
    /**
     * Seach method, triggered every request search of the user. will search into the Model
     * Sanitizedthe post data submitted from form.
     */
    public function search_player(){
        //var_dump($this->input->post());
        if(count($this->input->post())==1 && $this->input->post('name')==''){
            redirect(base_url());
        }else{
        /**Clean form post data with xss_clean and also html_escape which check for <> inserted  */
        $player_info = $this->security->xss_clean(html_escape($this->input->post()));

        /**Will load the model to download the result i the database. 
         * sanitized $player_info will serve as param or argument for the search_all_players method
         */
        $this->load->model('sports/Player');
        $result['players'] = $this->Player->search_all_players($player_info);
        /**call index_view method to view the index.php
         * @result is the query result by the search_all_player method. This will serve as param or argument*/
        $this->index_view($result);
        }
    }
    /**
     * default load for the firsttime . 
     * will load index.php 
     * By default it will load the players from the database using get_all_players method from Model
     * call index_view method to view the index.php
     */
    public function index(){
        $this->load->model("sports/Player"); 
        $query_result_player['players'] = $this->Player->get_all_players(); //check if existing
        $this->index_view($query_result_player);
    }
    /**
     * Method use to view the view page index.php
     * this method will also serve as the view method for the search executed by the user.
     * This is for viewing method only
     */
    public function index_view($arr){
        $this->load->view('sports/index',$arr);
    }
}
?>