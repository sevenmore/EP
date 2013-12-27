<?php
Class Users extends CI_Model {
	function getAll($user_id){
		$this->db->select('user_id, name, surname, address, city, post, email, phone, emso');
		$this->db->from('users');
		$this->db->where('user_id', $user_id);
		
		$query=$this->db->get();
		return $query->row();
	}
	
	function getSellers(){
		$this->db->select('user_id, name, surname, active');
		$this->db->from('users');
		$this->db->where('role', 1);
		
		$query=$this->db->get();
		return $query->result();
	}
	
	function getUsers(){
		$this->db->select('user_id, name, surname, active');
		$this->db->from('users');
		$this->db->where('role', 0);
		
		$query=$this->db->get();
		return $query->result();
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
	
	function check_active($email){
		$this->db->select('active');
		$this->db->from('users');
		$this->db->where('email', $email);
		
		$query=$this->db->get();
		return $query->row()->active;
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
	
	function delete_user($user_id){
		$this->db->where('user_id', $user_id);
	    $this->db->delete('users');
	}
	
	function activate_user($user_id){
		$this->db->where('user_id', $user_id);
		$this->db->set('active', 1);
		$this->db->update('users'); 
	}
	
	function deactivate_user($user_id){
		$this->db->where('user_id', $user_id);
		$this->db->set('active', 0);
		$this->db->update('users'); 
	}
} 
?>