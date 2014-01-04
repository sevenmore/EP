<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifysignup extends CI_Controller {

	function __construct(){
		parent::__construct();
                $this->load->helper('https');
                use_ssl();
		$this->load->model('users');
	}

	function index(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_name');
		$this->form_validation->set_rules('surname', 'Surname', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_surname');
		$this->form_validation->set_rules('address', 'Address', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_address');
		$this->form_validation->set_rules('city', 'City', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_city');
		$this->form_validation->set_rules('post', 'Post', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_post');
		$this->form_validation->set_rules('email', 'Email', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_email|callback_check_email_available');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_phone');
		$this->form_validation->set_rules('password', 'Password', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_password');
		$this->form_validation->set_rules('repassword', 'Re-Password', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_repassword');
		if ($this->form_validation->run() == TRUE){
			$name=$this->input->post('name');
			$surname=$this->input->post('surname');
			$address=$this->input->post('address');
			$city=$this->input->post('city');
			$post=$this->input->post('post');
			$email=$this->input->post('email');
			$phone=$this->input->post('phone');
			$password=sha1($this->input->post('password'));
				
			$userdata=array(
				'name'=>$name,
				'surname'=>$surname,
				'address'=>$address,
				'city'=>$city,
				'post'=>$post,
				'email'=>$email,
				'phone'=>$phone,
				'password'=>$password,
				'role'=>0,
				'active'=>0
				);
			$this->db->insert('users', $userdata);
			//$this->load->view('main');
			$this->session->set_userdata('logged_in', 1);
			$this->session->set_userdata('email', $email);
			redirect('main', 'refresh');
		}
		else{
			$this->load->view('signup');
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
		//query the database
		$result = $this->users->email($email);
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
	
	function check_password(){
		$password = $this->input->post('password');
		if(preg_match("/^[a-zA-Z0-9]{3,20}$/",$password)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_password', 'Invalid password!');
			return FALSE;
		}
	}
	
	function check_repassword(){
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		if(preg_match("/^[a-zA-Z0-9]{3,20}$/",$repassword) || $password==$repassword){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_repassword', 'Passwords do not match!');
			return FALSE;
		}
	}	
}
?>