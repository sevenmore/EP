<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myprofile extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
		$this->load->model('users');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in')) {
			$attributes=$this->users->getAll($this->session->userdata('user_id'));
			$data['name']=$attributes->name;
			$data['surname']=$attributes->surname;
			$data['address']=$attributes->address;
			$data['city']=$attributes->city;
			$data['post']=$attributes->post;
			$data['email']=$attributes->email;
			$data['phone']=$attributes->phone;
			$data['role']=$this->session->userdata('role');
			$data['cart']=2;
			
			$this->load->view('myprofile',$data);
		}else{
			redirect('index','refresh');
		}
	}
}