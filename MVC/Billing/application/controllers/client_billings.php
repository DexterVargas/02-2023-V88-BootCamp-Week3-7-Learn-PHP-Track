<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_Billings extends CI_Controller {

	public function index(){
		/*Full the data from database. the default data range to be displayed is within 2011 data*/
		$this->load->model("billing/Client_Billing"); 
        $show_result['data'] = $this->Client_Billing->get_all_billings();
		/*After getting the query result from the database. I will call the view_index method to load the index.php view page.
		   The query result will serve as an argument/parameter from of the index_view method*/
		$this->index_view($show_result);
	}
	public function index_view($result){
		/*Loads the index.php, also passing the array/query result. 
		The view page will use the result to load the default/fetch date*/
		$this->load->view('billing/index', $result);
	}
	public function fetch_data(){
		/*recieve the data passed from the form. Validate using xss_clean.
		Will pass the post() data ['date_from'] and ['date_to'] to model class.
		Model class will pullout the data from database and will return the result. 
		The result then will pass to index_view method as arument/parameter*/
		if($this->input->post('date_from')=='' || $this->input->post('date_to')==''){
			redirect(base_url());
		}else{
			$range_date = $this->security->xss_clean($this->input->post());
			$this->load->model('billing/Client_Billing');
			$query_result['data'] = $this->Client_Billing->get_fetch_data($range_date);
			$this->index_view($query_result);//
		}
		
	}
}
