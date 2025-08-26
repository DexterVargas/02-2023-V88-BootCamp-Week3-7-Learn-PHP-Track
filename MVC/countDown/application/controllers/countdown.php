<?php 
class Countdown extends CI_Controller{

    public function main(){
		$mydateTimeZone = new DateTime("now", new DateTimeZone('Asia/Manila') ) ;
		$timestamp = (strtotime("tomorrow"))-(strtotime("now"));
		$current_date = $mydateTimeZone->format('M d, Y');
		$date_time = array('date' =>$current_date,
							'time' =>$timestamp);
    	$this->load->view('countdown/index',$date_time);
    }
}
?>