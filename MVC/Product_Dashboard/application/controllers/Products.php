<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function index(){
        $current_user_id = $this->session->userdata('user_id');
        
        if(!$current_user_id){ 
            redirect(base_url());
        }else{
            $form_data['products'] = $this->product->get_all_products(); 
            //var_dump($form_data['products']);
            if($current_user_id==1){ 
                $this->load->view('products/dashboard-admin',$form_data);
            } 
            else {
                $this->load->view('products/dashboard',$form_data);  
            }
        }
        
    }
    public function admin(){
        $current_user_id = $this->session->userdata('user_id');
        
        if(!$current_user_id){ 
            redirect(base_url());
        }else{
            $form_data['products'] = $this->product->get_all_products(); 
            //var_dump($form_data['products']);
            if($current_user_id==1){ 
                   $this->load->view('products/dashboard-admin',$form_data);
            } 
            else {
                $this->load->view('products/dashboard',$form_data);  
            }
        }
     
    }

    public function create(){
        
        $current_user_id = $this->session->userdata('user_id');
        
        if(!$current_user_id){ 
            redirect(base_url());
        } 
        else {
            if($current_user_id==1){ 
                $this->load->view('products/new');
            } 
            else {
                $form_data['products'] = $this->product->get_all_products();
                $this->load->view('products/dashboard',$form_data); 
            }
        }
    }

    public function process_create(){
         
        $result = $this->product->validate_product_registration();

        if($result != 'success'){
            $this->session->set_flashdata('product_input_errors',$result);
            redirect(base_url('products/new'));
        }else{
            $form_data = $this->input->post();
            $this->product->add_new_product($form_data);
            
            $this->session->set_flashdata('product_input_success','Successfully added new product.');
            //redirect(base_url('dashboard/admin'));
            redirect(base_url('products/admin'));
        }
    }


    public function edit($id){

        $current_user_id = $this->session->userdata('user_id');

        if(!$current_user_id){ 
            redirect(base_url());
        } 
        else {
            if($current_user_id==1){ 
                $show['product'] = $this->product->get_product_by_id($id);
                $this->load->view('products/edit',$show);
            } 
            else {
                $form_data['products'] = $this->product->get_all_products();
                $this->load->view('products/dashboard',$form_data); 
            }
        }

    }

    public function process_edit(){
         
        $result = $this->product->validate_product_registration();

        if($result != 'success'){
            $this->session->set_flashdata('product_input_errors',$result);
            redirect(base_url('products/edit/'.$this->input->post('id')));
        }else{
            $form_data = $this->input->post();
            var_dump($form_data);
            $this->product->update_product($form_data);
            
            $this->session->set_flashdata('product_input_success','Successfully updated the product.');
            //redirect(base_url('dashboard/admin'));
            redirect(base_url('products/admin'));
        }
    }


    public function delete_confirm($id){
        $data_list = $this->product->get_product_by_id($id);
        $this->load->view('products/destroy',$data_list);
    }

    public function delete(){
        $id = $this->input->post('id');
        $this->product->delete_product($id);
        $this->session->set_flashdata('product_input_success','Successfully Deleted.');
        redirect(base_url());;
    }

}
