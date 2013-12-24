<?php
Class Users extends CI_Model {
	function email($email) {
		$this->db->select('user_id, email');
		$this->db->from('users');
		$this->db->where('email', $email);
		
		$query=$this->db->get();
		return $query->num_rows();
	}
	
	function get_attributes($email){
		$this->db->select('user_id, name, email');
		$this->db->from('users');
		$this->db->where('email', $email);
		
		$query=$this->db->get();
		return $query->row();
	}
	
	function check_password($email,$password){
		$this->db->select('user_id, email, password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', sha1($password));
		
		$query=$this->db->get();
		return $query->num_rows();
	}
} 
?>