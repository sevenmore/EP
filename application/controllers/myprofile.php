<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myprofile extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
                $this->load->helper('https');
                use_ssl();
		$this->load->model('users');
		$this->load->model('cart_items');
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
			$data['cart_items']=$this->cart_items->get_number_of_items($this->session->userdata('cart_id'));
			$data['cart_sum']=$this->cart_items->get_sum($this->session->userdata('cart_id'));
			
			$this->load->view('myprofile',$data);
		}else{
			redirect('index','refresh');
		}
	}
}