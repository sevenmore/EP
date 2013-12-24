<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
		$this->load->model('users');
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
		/*$search = trim($this->input->post('searchbar'));
		$query = $this->tasks->getTaskByName($search);
		$count = $query->num_rows();
		  
		if($count > 0) {
			foreach($query->result() as $row){
				//echo $row->name.': '.$row->priority.'<br/>';
				//echo anchor('overview', $row->name.': '.$row->priority);
				//echo '<br/>';
				echo '<label>'.$row->name.': '.$row->priority.'</label>';
				if($row->completed == 1){
					echo ' - <span style="color:green; font-weight:bold;">DONE</span>';
				}elseif(strtotime(date('Y-m-d')) > strtotime($row->deadline) && $row->completed == 0){
					echo ' - <span style="color:red; font-weight:bold;">FAILED</span>';
				}else{
					echo ' - <span style="color:#FFCC00; font-weight:bold;">PENDING</span>';
				}
				echo '<br/>';
			}
		}else {*/
			echo "<label>No result found !</label>";
		//}
	}
}