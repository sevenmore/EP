<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
                $this->load->helper('https');
                use_ssl();
		$this->load->model('users');
		$this->load->model('items');
		$this->load->model('carts');
		$this->load->model('cart_items');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in') && $this->session->userdata("role") == 0) {
			$user_id=$this->users->get_attributes($this->session->userdata('email'))->user_id;
			$name=$this->users->get_attributes($this->session->userdata('email'))->name;
			$this->session->set_userdata('user_id', $user_id);
			$this->session->set_userdata('name', $name);
			$cart=$this->carts->get_current_cart($this->session->userdata('user_id'));
			if(!$cart){
				$userdata=array(
					'user_id'=>$this->session->userdata('user_id'),
					'status'=>'open'
				);
				$this->db->insert('carts', $userdata);
			}
			$cart_id=$this->carts->get_current_cart($this->session->userdata('user_id'))->cart_id;
			$this->session->set_userdata('cart_id', $cart_id);
			$data['cart']=$this->session->userdata('cart_id');
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$data['cart_items']=$this->cart_items->get_number_of_items($this->session->userdata('cart_id'));
			$data['cart_sum']=$this->cart_items->get_sum($this->session->userdata('cart_id'));
			$this->load->view('main',$data);
		}else{
			redirect('index','refresh');
		}
	}
	
	function logout(){
		$this->session->unset_userdata('user_id');
		$this->session->sess_destroy();
		redirect('index', 'refresh');
	}
	
	function proces(){		
		$search = trim($this->input->post('searchbar'));
		$query = $this->items->getItemsByName($search);
		$count = $query->num_rows();
		  
		if($count > 0) {
			foreach($query->result() as $row){
				echo '<label>'.$row->name.': '.$row->price.'&euro;</label>';
				echo '<br/>';
			}
		}else {
			echo "<label>No result found !</label>";
		}
	}
}