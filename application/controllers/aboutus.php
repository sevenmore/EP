<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aboutus extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
    } 
	 
	public function index(){
		if($this->session->userdata('logged_in')) {
			$data['cart']=2;
			$data['name']=$this->session->userdata('name');
			$this->load->view('aboutus',$data);
		}else{
			redirect('index','refresh');
		}
	}
}