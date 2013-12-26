<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Additem extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
		$this->load->model('items');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in')) {
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');		
			$this->load->view('additem',$data);
		}else{
			redirect('index','refresh');
		}
	}
	
	function save(){	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_name');
		$this->form_validation->set_rules('category', 'Category', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_category');
		$this->form_validation->set_rules('price', 'Price', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_price');
		$this->form_validation->set_rules('photo', 'Photo', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_photo');
		
		if ($this->form_validation->run() == TRUE){
			$name=$this->input->post('name');
			$category=$this->input->post('category');
			$price=$this->input->post('price');
			$photo=$this->input->post('photo');
				
			$userdata=array(
				'name'=>$name,
				'category'=>$category,
				'price'=>$price,
				'photo'=>$photo,
				'active'=>1
				);
				
			$this->db->insert('items', $userdata);
			redirect('editshop', 'refresh');
		}
		else{
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$this->load->view('additem',$data);
		}
	}
	
	function check_name(){
		$name = $this->input->post('name');
		if(preg_match("/^[a-zA-Z\s]{2,20}$/",$name)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_name', 'Invalid name!');
			return FALSE;
		}
	}
	
	function check_category(){
		$category = $this->input->post('category');
		if(preg_match("/^(Running|Casual|Summer)$/",$category)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_category', 'Invalid category!');
			return FALSE;
		}
	}
	
	function check_price(){
		$price = $this->input->post('price');
		if(preg_match("/^[0-9]{1,3}$/",$price)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_price', 'Invalid price!');
			return FALSE;
		}
	}
	
	function check_photo(){
		$photo = $this->input->post('photo');
		if(preg_match("/^(\/shoes\/)[a-zA-Z0-9_-]{2,30}(\.jpg|\.png|\.jpeg)$/",$photo)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_photo', 'Invalid photo!');
			return FALSE;
		}
	}
}