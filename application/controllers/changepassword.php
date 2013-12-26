<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Changepassword extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
		$this->load->model('users');
		$this->load->model('cart_items');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in')) {
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$data['cart_items']=$this->cart_items->get_number_of_items($this->session->userdata('cart_id'));
			$data['cart_sum']=$this->cart_items->get_sum($this->session->userdata('cart_id'));
			$this->load->view('changepassword',$data);
		}else{
			redirect('index','refresh');
		}
	}
	
	function save(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('old-password', 'Old password', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_password');
		$this->form_validation->set_rules('password', 'New password', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_email|callback_check_new_password');
		$this->form_validation->set_rules('re-password', 'Retype new password', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_new_repassword');
		
		if ($this->form_validation->run() == TRUE){
			$user_id=$this->session->userdata('user_id');
			$password=$this->input->post('password');
				
			$userdata=array(
				'password'=>$password
				);
				
			$this->db->where('user_id', $user_id);
			$this->db->update('users', $userdata);
			redirect('myprofile', 'refresh');
		}
		else{
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$data['cart']=2;
			$this->load->view('changepassword',$data);
		}
	}
	
	function check_password(){
		$password = $this->input->post('old-password');
		$db_password=$this->users->get_password($this->session->userdata('user_id'));
		if(sha1($password)==$db_password){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_password', 'Wrong password!');
			return FALSE;
		}
	}
	
	function check_new_password(){
		$password = $this->input->post('password');
		if(preg_match("/^[a-zA-Z0-9]{3,20}$/",$password)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_new_password', 'Invalid password!');
			return FALSE;
		}
	}
	
	function check_new_repassword(){
		$password = $this->input->post('password');
		$repassword = $this->input->post('re-password');
		if(preg_match("/^[a-zA-Z0-9]{3,20}$/",$repassword) && $password==$repassword){
			return TRUE;
		}elseif($password!=$repassword){
			$this->form_validation->set_message('check_new_repassword', 'Passwords do not match!');
			return FALSE;
		}else{
			$this->form_validation->set_message('check_new_repassword', 'Invalid password!');
			return FALSE;
		}
	}
	
	
}