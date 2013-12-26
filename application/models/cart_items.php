<?php
Class Cart_items extends CI_Model {
	function get_item($item_id){
		$this->db->select('user_id, name, surname, address, city, post, email, phone, emso');
		$this->db->from('users');
		$this->db->where('user_id', $user_id);
		
		$query=$this->db->get();
		return $query->row();
	}
} 
?>