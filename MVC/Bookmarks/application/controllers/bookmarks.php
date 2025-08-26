<?php
class Bookmarks extends CI_Controller {
    public function index(){
        $this->load->library("form_validation");
        //$this->output->enable_profiler(TRUE); //enables the profiler
        $this->load->model("bookmarks/Bookmark"); //loads the model
        $bookmark['data'] = $this->Bookmark->get_all_bookmark();  //gets all the records
        $this->load->view('bookmarks/index',$bookmark);
    }
    public function add(){
        $this->load->model("bookmarks/Bookmark"); //loads the model
        $bookmark['data'] = $this->Bookmark->get_all_bookmark();  //gets all the records
        //validation start here
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name", "Name", "trim|required|min_length[3]|max_length[255]");
		$this->form_validation->set_rules("url", "URL Name", "trim|required|valid_url");
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('bookmarks/index',$bookmark);
        }
        else
        {
			$name = $this->input->post('name');
			$url = $this->input->post('url');
			$folder = $this->input->post('folder');
			$this->load->model("bookmarks/Bookmark");
			$bookmark_details = array("name" => $name,
											"url" =>$url,
											"folder" => $folder); //or you can adjust this as non-array
			$add_bookmark = $this->Bookmark->add_bookmark($bookmark_details);
			if($add_bookmark === TRUE) {
				//echo "Bookmark is added!";
				redirect(base_url());
			}
        }
    }
    public function delete_confirmation($id){
           $this->load->model("bookmarks/Bookmark"); //loads the model
           $data_list_id = $id;
           $data_list = $this->Bookmark->get_bookmark_by_id($data_list_id); 
           $this->load->view('bookmarks/destroy',$data_list);
    }
    public function delete(){
        $this->load->model("bookmarks/Bookmark");
        $id = $this->input->post('id');
        $this->Bookmark->delete_bookmark($id);
        redirect(base_url());
    }
}
?>