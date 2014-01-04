<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm extends CI_Controller {
	 
	function __construct() {
                //var_dump($_SERVER['SSL_CLIENT_CERT']);
		parent::__construct();
                $this->load->helper('https');
                use_ssl();
		$this->load->model('users');
                
    } 
	 
	public function index(){
            if($this->session->userdata('logged_in') && $this->session->userdata("role") == 2) {                    
                    
                if (!isset($_SERVER['REDIRECT_SSL_CLIENT_CERT'])) 
                    redirect('index','refresh');
                
                $cert_data = openssl_x509_parse($_SERVER['REDIRECT_SSL_CLIENT_CERT']);

                $cert_o = $cert_data['subject']['O'];
                $cert_ou = $cert_data['subject']['OU'];
                $cert_cn = $cert_data['subject']['CN'];
                $cert_emailAddress = $cert_data['subject']['emailAddress'];
                
                

                $user_id=$this->users->get_attributes($this->session->userdata('email'))->user_id;
                $name=$this->users->get_attributes($this->session->userdata('email'))->name;
                $email=$this->users->get_attributes($this->session->userdata('email'))->email;
                
                if(!($cert_o == "SuperShop" && $cert_ou == "Administrator" && $cert_emailAddress == $email && $cert_cn == $name))
                    redirect('adm/logout','refresh');
                
                $this->session->set_userdata('user_id', $user_id);
                $this->session->set_userdata('name', $name);
                $data['name']=$this->session->userdata('name');
                $this->load->view('adm',$data);

                
                
            }else{
                    redirect('index','refresh');
            }
	}
	
	function logout(){
            $this->session->unset_userdata('user_id');
            $this->session->sess_destroy();
            redirect('index', 'refresh');
	}
}