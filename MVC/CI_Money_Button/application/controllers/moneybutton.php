<?php 
class Moneybutton extends CI_Controller{
    public function index(){
		$this->session->set_userdata('gamelogs',array());
		$this->session->set_userdata('chances',10);
        	$this->session->set_userdata('money',500);
		$this->load->view('moneybutton/index');
    }
	public function process(){
		$oldlogs = $this->session->userdata('gamelogs');
		$risk = array(  'low' => array('Low Risk', rand(-25,100)),
						'moderate' => array('Moderate Risk', rand(-100,1000)),
						'high' => array('High Risk', rand(-500,2500)),
						'severe' => array('Severe Risk', rand(-3000,5000)) );

		if ($this->input->post('risk')){
			if($this->session->userdata('chances') && $this->session->userdata('money') > 0){
				$chances = $this->session->userdata('chances');
				$chances--;
				$risk_name = $risk[$this->input->post('risk')][0];
				$risk_money = $risk[$this->input->post('risk')][1];
				$current_money = $this->session->userdata('money') + $risk_money;

				$this->session->set_userdata('money', $current_money);
				$this->session->set_userdata('chances', $chances);

				$game_logs = gmdate("[m/d/Y h:i A]") . ': You push "'.$risk_name.'". Value is '.$risk_money.'. Your current money now is '. $current_money. ' with '. $this->session->userdata('chances'). ' chance(s) left';
				array_push($oldlogs,$game_logs);
				$this->session->set_userdata('gamelogs',$oldlogs);
				
			}else{
				$game_logs = '**********GAME OVER!***********';
				array_push($oldlogs,$game_logs);
				$this->session->set_userdata('gamelogs',$oldlogs);
			}

		}else{
			$this->session->set_userdata('chances',10);
			$this->session->set_userdata('money',500);
			$this->session->set_userdata('gamelogs',array());
		}
			$this->load->view('moneybutton/index');
	}
}
?>