<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_offline extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
                $this->load->helper('https');
                use_ssl(FALSE);
    } 
	 
	public function index()
	{
		$this->load->view('contact_offline');
	}
}