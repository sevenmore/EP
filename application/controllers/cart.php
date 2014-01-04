<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
                $this->load->helper('https');
                use_ssl();
		$this->load->model('users');
		$this->load->model('cart_items');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in') && $this->session->userdata("role") == 0) {
			$user_id=$this->users->get_attributes($this->session->userdata('email'))->user_id;
			$name=$this->users->get_attributes($this->session->userdata('email'))->name;
			$this->session->set_userdata('user_id', $user_id);
			$this->session->set_userdata('name', $name);
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$data['cart_items']=$this->cart_items->get_number_of_items($this->session->userdata('cart_id'));
			$data['cart_sum']=$this->cart_items->get_sum($this->session->userdata('cart_id'));
			$data['cart_content']=$this->cart_items->get_cart_content($this->session->userdata('cart_id'));
			$this->load->view('cart',$data);
		}else{
			redirect('index','refresh');
		}
	}
	
	function remove(){
		$item_id = $this->input->post('item_id');
		$cart_id=$this->session->userdata('cart_id');
		
		$this->cart_items->delete_from_cart($cart_id,$item_id);
		
		redirect('cart','refresh');
	}
}