<?php
Class Carts extends CI_Model {
	function get_current_cart($user_id){
		$this->db->select('cart_id, user_id, status');
		$this->db->from('carts');
		$this->db->where('user_id', $user_id);
		$this->db->where('status', 'open');
		
		$query=$this->db->get();
		if($query->num_rows() == 0){
			return FALSE;
		}else{
			return $query->row();
		}
	}
} 
?>