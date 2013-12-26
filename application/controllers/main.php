<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
		$this->load->model('users');
		$this->load->model('items');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in')) {
			$user_id=$this->users->get_attributes($this->session->userdata('email'))->user_id;
			$name=$this->users->get_attributes($this->session->userdata('email'))->name;
			$this->session->set_userdata('user_id', $user_id);
			$this->session->set_userdata('name', $name);
			$data['cart']=2;
			$data['name']=$this->session->userdata('name');
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