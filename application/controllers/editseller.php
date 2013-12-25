<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editseller extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
		$this->load->model('users');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in')) {
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$this->load->view('editseller',$data);
		}else{
			redirect('index','refresh');
		}
	}
	
	function save(){	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_name');
		$this->form_validation->set_rules('surname', 'Surname', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_surname');
		$this->form_validation->set_rules('emso', 'EMSO', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_emso');
		$this->form_validation->set_rules('email', 'Email', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_email|callback_check_email_available');
		$this->form_validation->set_rules('password', 'Password', 'trim|htmlspecialchars|stripslashes|xss_clean|callback_check_password');
		
		if ($this->form_validation->run() == TRUE){
			$user_id=$this->input->post('user_id');
			$name=$this->input->post('name');
			$surname=$this->input->post('surname');
			$emso=$this->input->post('emso');
			$email=$this->input->post('email');
			$password=sha1($this->input->post('password'));
			
			if(strcmp($this->input->post('password'),'')!=0){
				$userdata=array(
					'name'=>$name,
					'surname'=>$surname,
					'emso'=>$emso,
					'email'=>$email,
					'password'=>$password
				);
			}else{
				$userdata=array(
					'name'=>$name,
					'surname'=>$surname,
					'emso'=>$emso,
					'email'=>$email
				);
			}
			
			$this->db->where('user_id', $user_id);
			$this->db->update('users', $userdata);
			if($this->session->userdata('role')==1){
				redirect('editsellers', 'refresh');
			}else{
				redirect('editusers', 'refresh');
			}
		}
		else{
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$user_id=$this->input->post('user_id');
			$data['edit']=$this->users->getAll($user_id);
			$this->load->view('editseller',$data);
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
	
	function check_emso(){
		$emso = $this->input->post('emso');
		if(preg_match("/^[0-9]{13}$/",$emso)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_emso', 'Invalid emso!');
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
		$user_id=$this->input->post('user_id');
		$result = $this->users->self_email($email,$user_id);
		if($result == 0){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_email_available','Email already registered!');
			return FALSE;
		}
	}
	
	function check_password(){
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		if((preg_match("/^[a-zA-Z0-9]{3,20}$/",$password) || strcmp($password,'')==0) && $password==$repassword){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_password', 'Passwords do not match!');
			return FALSE;
		}
	}
}