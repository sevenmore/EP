<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct(){
		parent::__construct();
                $this->load->helper('https');
                use_ssl(FALSE);
		$this->load->model('items');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$data['items']=$this->items->getItems();
		$this->load->view('index',$data);
                if($this->session->userdata("user_id")){
                    $role = $this->session->userdata("role");
                    if($role == 2){
                        $url = $_SERVER['SERVER_NAME'] . '/adm';
                        redirect('https://' . $url, 'location', 301 );
                    } else if($role == 1){
                        $url = $_SERVER['SERVER_NAME'] . '/prodaja';
                        redirect('https://' . $url, 'location', 301 );
                    } else {
                        $url = $_SERVER['SERVER_NAME'] . '/main';
                        redirect('https://' . $url, 'location', 301 );
                    }
                    //redirect('main','refresh');
                }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */