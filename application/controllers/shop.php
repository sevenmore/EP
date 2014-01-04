<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {

	function __construct(){
		parent::__construct();
                $this->load->helper('https');
                use_ssl();
		$this->load->model('items');
		$this->load->model('cart_items');
    }
	public function index(){
            if($this->session->userdata('logged_in') && $this->session->userdata("role") == 0) {
		$data['items']=$this->items->getItems();
		$data['name']=$this->session->userdata('name');
		$data['role']=$this->session->userdata('role');
		$data['cart_items']=$this->cart_items->get_number_of_items($this->session->userdata('cart_id'));
		$data['cart_sum']=$this->cart_items->get_sum($this->session->userdata('cart_id'));
		$this->load->view('shop',$data);
            }else{
                redirect('index','refresh');
            }
	}
	
	function add(){
		$item_id = $this->input->post('item_id');
		$cart_id = $this->session->userdata('cart_id');
		
		$already=$this->cart_items->already_in($cart_id, $item_id);
		if(!$already){
			$userdata=array(
				'cart_id'=>$cart_id,
				'item_id'=>$item_id
				);
			$this->db->insert('cart_items', $userdata);
		}
		redirect('shop','refresh');
	}
}