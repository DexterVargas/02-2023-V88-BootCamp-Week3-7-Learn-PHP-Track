<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Student');
        $this->load->model('Course');
    }
    public function index(){
        $student = new Student(); 
        $student->load_extension('array');
        $students= $student->include_related('course', 'name')->get();
        $result['data']= $students->all_to_array();
        $student_courses = array();
        foreach($students as $course){
            $student_courses[]= $course->course_name;
        }
        $course = new Course();
        $result['courses'] =  $course->get()->all_to_array();
        $result['student_courses']= $student_courses;
        $this->load->view('index',$result); 
        //var_dump($result);

    }

    public function add_new_student(){
        //$this->output->enable_profiler(TRUE); //enables the profiler
        $student = new Student();
        //var_dump($this->input->post());
		$student->last_name=$this->security->xss_clean($this->input->post('last_name'));
		$student->first_name=$this->security->xss_clean($this->input->post('first_name'));
		$student->classification=$this->security->xss_clean($this->input->post('classification'));
        $student->course_id=$this->security->xss_clean($this->input->post('course'));
        $student->gender=$this->security->xss_clean($this->input->post('gender'));
        $student->created_at=date('Y-m-d H:i:s');
        $student->save();
        //var_dump($student);
        redirect(base_url());
        //$this->index();
    }
    public function edit($id){
        $course = new Course();
        $course->load_extension('array');
        $result['courses'] =  $course->get()->all_to_array();
        $result['id'] = $id;
        $student = new Student(); 
        $student->load_extension('array');
        $students= $student->where('id',$id)->get();
        $result['data']= $students->all_to_array();
         $this->load->view('edit',$result);
    }
    public function edit_process($id){
        //$this->output->enable_profiler(TRUE); //enables the profiler
        $student = new Student();
        //var_dump($this->input->post());
        $student->db->where('id', $id);
        $form_data['last_name']=$this->security->xss_clean($this->input->post('last_name'));
        $form_data['first_name']=$this->security->xss_clean($this->input->post('first_name'));
        $form_data['classification']=$this->security->xss_clean($this->input->post('classification'));
        $form_data['course_id']=$this->security->xss_clean($this->input->post('course'));
        $form_data['gender']=$this->security->xss_clean($this->input->post('gender'));
        $form_data['updated_at']=date('Y-m-d H:i:s');
        $student->update( $form_data);
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
