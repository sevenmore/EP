<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aboutus extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
                $this->load->helper('https');
                use_ssl();
		$this->load->model('cart_items');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in') && $this->session->userdata("role") == 0) {
			$data['cart']=2;
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$data['cart_items']=$this->cart_items->get_number_of_items($this->session->userdata('cart_id'));
			$data['cart_sum']=$this->cart_items->get_sum($this->session->userdata('cart_id'));
			$this->load->view('aboutus',$data);
		}else{
			redirect('index','refresh');
		}
	}
}