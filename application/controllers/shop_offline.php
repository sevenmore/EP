<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop_offline extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('items');
    }
	public function index(){
		$data['items']=$this->items->getItems();
		$this->load->view('shop_offline',$data);
	}
}