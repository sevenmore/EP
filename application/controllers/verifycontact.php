<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifycontact extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('users');
	}

	function index(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|htmlspecialchars|stripslashes|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|htmlspecialchars|stripslashes|callback_check_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|htmlspecialchars|stripslashes|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|htmlspecialchars|stripslashes|required');
		if ($this->form_validation->run() == TRUE){
			redirect('contact', 'refresh');
		}
		else{
			$data['cart']=2;
			$data['name']=$this->session->userdata('name');
			$this->load->view('contact',$data);
		}
	}
	
	function check_email(){
		$email = $this->input->post('email');
		if(preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/",$email)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_email', 'Invalid email!');
			return FALSE;
		}
	}	
}

?>