<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editprofile extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
		$this->load->model('users');
		$this->load->model('cart_items');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in')) {
			$attributes=$this->users->getAll($this->session->userdata('user_id'));
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$data['cart_items']=$this->cart_items->get_number_of_items($this->session->userdata('cart_id'));
			$data['cart_sum']=$this->cart_items->get_sum($this->session->userdata('cart_id'));
			$data['name']=$attributes->name;
			$data['surname']=$attributes->surname;
			$data['address']=$attributes->address;
			$data['city']=$attributes->city;
			$data['post']=$attributes->post;
			$data['email']=$attributes->email;
			$data['phone']=$attributes->phone;
		
			$this->load->view('editprofile',$data);
		}else{
			redirect('index','refresh');
		}
	}
	
	function save(){	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_name');
		$this->form_validation->set_rules('surname', 'Surname', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_surname');
		$this->form_validation->set_rules('address', 'Address', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_address');
		$this->form_validation->set_rules('city', 'City', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_city');
		$this->form_validation->set_rules('post', 'Post', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_post');
		$this->form_validation->set_rules('email', 'Email', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_email|callback_check_email_available');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_phone');
		
		if ($this->form_validation->run() == TRUE){
			$user_id=$this->session->userdata('user_id');
			$name=$this->input->post('name');
			$surname=$this->input->post('surname');
			$address=$this->input->post('address');
			$city=$this->input->post('city');
			$post=$this->input->post('post');
			$email=$this->input->post('email');
			$phone=$this->input->post('phone');
				
			$userdata=array(
				'name'=>$name,
				'surname'=>$surname,
				'address'=>$address,
				'city'=>$city,
				'post'=>$post,
				'email'=>$email,
				'phone'=>$phone
				);
				
			$this->db->where('user_id', $user_id);
			$this->db->update('users', $userdata);
			redirect('myprofile', 'refresh');
		}
		else{
			$attributes=$this->users->getAll($this->session->userdata('user_id'));
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$data['cart']=2;
			$data['name']=$attributes->name;
			$data['surname']=$attributes->surname;
			$data['address']=$attributes->address;
			$data['city']=$attributes->city;
			$data['post']=$attributes->post;
			$data['email']=$attributes->email;
			$data['phone']=$attributes->phone;
			
			$this->load->view('editprofile',$data);
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
	
	function check_surname(){
		$surname = $this->input->post('surname');
		if(preg_match("/^[a-zA-Z\s]{2,20}$/",$surname)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_surname', 'Invalid surname!');
			return FALSE;
		}
	}
	
	function check_address(){
		$address = $this->input->post('address');
		if(preg_match("/^[a-zA-Z0-9_\s]{4,20}$/",$address)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_address', 'Invalid address!');
			return FALSE;
		}
	}
	
	function check_city(){
		$city = $this->input->post('city');
		if(preg_match("/^[a-zA-Z\s]{2,20}$/",$city)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_city', 'Invalid city!');
			return FALSE;
		}
	}
	
	function check_post(){
		$post = $this->input->post('post');
		if(preg_match("/^[0-9]{2,6}$/",$post)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_post', 'Invalid post number!');
			return FALSE;
		}
	}
	
	function check_email(){
		$email = $this->input->post('email');
		if(preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/",$email)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_email', 'Invalid email!');
			return FALSE;
		}
	}
	
	function check_email_available(){
		$email = $this->input->post('email');
		$user_id=$this->session->userdata('user_id');
		$result = $this->users->self_email($email,$user_id);
		if($result == 0){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_email_available','Email already registered!');
			return FALSE;
		}
	}
	
	function check_phone(){
		$phone = $this->input->post('phone');
		if(preg_match("/^(070|051|050|041|040|031)[\s-]?[0-9]{3}[\s-]?[0-9]{3}$/",$phone)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_phone', 'Invalid phone number!');
			return FALSE;
		}
	}
}