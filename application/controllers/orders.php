<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
                $this->load->helper('https');
                use_ssl();
		$this->load->model('carts');
		$this->load->model('cart_items');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in') && $this->session->userdata("role") == 1) {
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$data['orders']=$this->carts->get_ready_orders();
			$this->load->view('orders',$data);
		}else{
			redirect('index','refresh');
		}
	}
	
	function approve(){
		$cart_id = $this->input->post('cart_id');
		$userdata=array(
			'status'=>'approved'
		);
			
		$this->db->where('cart_id', $cart_id);
		$this->db->update('carts', $userdata);
		redirect('orders', 'refresh');
	}
	
	function reject(){
		$cart_id = $this->input->post('cart_id');
		$userdata=array(
			'status'=>'rejected'
		);
			
		$this->db->where('cart_id', $cart_id);
		$this->db->update('carts', $userdata);
		redirect('orders', 'refresh');
	}
	
	function cancel(){
		$cart_id = $this->input->post('cart_id');
		$userdata=array(
			'status'=>'canceled'
		);
			
		$this->db->where('cart_id', $cart_id);
		$this->db->update('carts', $userdata);
		redirect('orders', 'refresh');
	}
}