<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('items');
		$this->load->model('cart_items');
    }
	public function index(){
		$data['items']=$this->items->getItems();
		$data['cart']=2;
		$data['name']=$this->session->userdata('name');
		$this->load->view('shop',$data);
	}
	
	function save(){
		$item_id = $this->input->post('item_id');
		$this->cart_items->add_item($item_id);
		redirect('shop','refresh');
	}
}