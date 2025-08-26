<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Student');
    }
    public function index(){
        $student = new Student(); 
        // $student->load_extension('array');
        // $students = $student->get_iterated();
        // $result['data'] = $students->all_to_array();
        // $this->load->view('index',$result);
        // var_dump($students->get());
        $result= $student->get();
        $this->load->view('index',$result);
    }

    public function add_new_student(){
        //$this->output->enable_profiler(TRUE); //enables the profiler
        $student = new Student();
        //var_dump($this->input->post());
		$student->last_name=$this->input->post('last_name');
		$student->first_name=$this->input->post('first_name');
		$student->classification=$this->input->post('classification');
        $student->gender=$this->input->post('gender');
        $student->created_at=date('Y-m-d H:i:s');
        $student->save();
        //var_dump($student);
        redirect(base_url());
    }
    
    public function delete_by_id($id){
        //$this->output->enable_profiler(TRUE); //enables the profiler
        $student = new Student();
        $student->db->where('id',$id);
        $student->get();
        //var_dump( $student);
        $student->delete();
        redirect(base_url());
    }

}
