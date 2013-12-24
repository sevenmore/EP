<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prodaja extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
		$this->load->model('users');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in')) {
			$user_id=$this->users->get_attributes($this->session->userdata('email'))->user_id;
			$name=$this->users->get_attributes($this->session->userdata('email'))->name;
			$this->session->set_userdata('user_id', $user_id);
			$this->session->set_userdata('name', $name);
			$data['name']=$this->session->userdata('name');
			$this->load->view('prodaja',$data);
		}else{
			redirect('index','refresh');
		}
	}
	
	function logout(){
		$this->session->unset_userdata('user_id');
		$this->session->sess_destroy();
		redirect('index', 'refresh');
	}
}