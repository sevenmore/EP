<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editshop extends CI_Controller {

	function __construct(){
		parent::__construct();
                $this->load->helper('https');
                use_ssl();
		$this->load->model('items');
		$this->load->model('cart_items');
    }
	public function index(){
            if($this->session->userdata('logged_in') && $this->session->userdata("role") == 1) {
		$data['items']=$this->items->getItems();
		$data['cart']=2;
		$data['name']=$this->session->userdata('name');
		$this->load->view('editshop',$data);
            }else{
                redirect('index','refresh');
            }
	}
	
	//function delete(){
	//	$item_id = $this->input->post('delete');
	//	$this->items->delete_item($item_id);
	//	$this->cart_items->delete_item($item_id);
	//    redirect('editshop','refresh');
	//}
	
	function activate(){
		$item_id = $this->input->post('activate');
		$this->items->activate_item($item_id);
	    redirect('editshop','refresh');
	}
	
	function deactivate(){
		$item_id = $this->input->post('deactivate');
		$this->items->deactivate_item($item_id);
	    redirect('editshop','refresh');
	}
	
	function edit(){
		$item_id = $this->input->post('item_id');
		$data['edit']=$this->items->get_item($item_id);
		$data['name']=$this->session->userdata('name');
		$data['role']=$this->session->userdata('role');
		$this->load->view('edititem',$data);
	}
}