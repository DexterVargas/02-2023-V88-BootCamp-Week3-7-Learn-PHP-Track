<?php 
class Main extends CI_Controller{
    public function index(){
        echo "I am Main Class";
    }
    //View Exercises. No.1
	public function world(){
		$this->load->view('main/world');
	}
    //View Exercises. No.2 and No.3
    public function ninjas($num=null){
        if(isset($num)){
            $data['num'] = $num;
            $this->load->view('main/ninjas',$data);
        }else{
            $this->load->view('main/ninjas');
        }
	}
}
?>