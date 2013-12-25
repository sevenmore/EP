<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editsellers extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
		$this->load->model('users');
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in')) {
			$data['name']=$this->session->userdata('name');
			$data['role']=$this->session->userdata('role');
			$data['sellers']=$this->users->getSellers();
			$this->load->view('editsellers',$data);
		}else{
			redirect('index','refresh');
		}
	}
	
	function delete(){
		$user_id = $this->input->post('delete');
		$this->users->delete_user($user_id);
	    redirect('editsellers','refresh');
	}
	
	function activate(){
		$user_id = $this->input->post('activate');
		$this->users->activate_user($user_id);
	    redirect('editsellers','refresh');
	}
	
	function deactivate(){
		$user_id = $this->input->post('deactivate');
		$this->users->deactivate_user($user_id);
	    redirect('editsellers','refresh');
	}
	
	function edit(){
		$user_id = $this->input->post('edit');
		$data['edit']=$this->users->getAll($user_id);
		$data['name']=$this->session->userdata('name');
		$data['role']=$this->session->userdata('role');
		$this->load->view('editseller',$data);
	}
}