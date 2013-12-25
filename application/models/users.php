<?php
Class Users extends CI_Model {
	function getAll($user_id){
		$this->db->select('user_id, name, surname, address, city, post, email, phone');
		$this->db->from('users');
		$this->db->where('user_id', $user_id);
		
		$query=$this->db->get();
		return $query->row();
	}
	
	function email($email) {
		$this->db->select('user_id, email');
		$this->db->from('users');
		$this->db->where('email', $email);
		
		$query=$this->db->get();
		return $query->num_rows();
	}
	
	function self_email($email,$user_id) {
		$this->db->select('user_id, email');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('user_id !=', $user_id);
		
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
		$this->db->select('email, password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', sha1($password));
		
		$query=$this->db->get();
		return $query->num_rows();
	}
	
	function get_role($email){
		$this->db->select('role');
		$this->db->from('users');
		$this->db->where('email', $email);
		
		$query=$this->db->get();
		return $query->row()->role;
	}
	
	function get_password($user_id) {
		$this->db->select('user_id, password');
		$this->db->from('users');
		$this->db->where('user_id', $user_id);
		
		$query=$this->db->get();
		return $query->row()->password;
    }
} 
?>