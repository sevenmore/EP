<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Previousorders extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
		$this->load->model('carts');
		$this->load->model('cart_items');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in')) {
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$data['cart_items']=$this->cart_items->get_number_of_items($this->session->userdata('cart_id'));
			$data['cart_sum']=$this->cart_items->get_sum($this->session->userdata('cart_id'));
			$data['previous_carts']=$this->carts->get_previous_carts($this->session->userdata('user_id'));
			$this->load->view('previousorders',$data);
		}else{
			redirect('index','refresh');
		}
	}
}