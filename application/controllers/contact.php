<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in')) {
			$data['cart']=2;
			$data['name']=$this->session->userdata('name');
			$this->load->view('contact',$data);
		}else{
			redirect('index','refresh');
		}
	}
}