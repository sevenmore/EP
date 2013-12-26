<?php
Class Cart_items extends CI_Model {

	function get_sum($cart_id){
		$this->db->select_sum('price');
		$this->db->from('cart_items');
		$this->db->where('cart_id', $cart_id);
		$this->db->join('items','items.item_id = cart_items.item_id');
		
		$query = $this->db->get();
		return $query->row();
	}
	
	function get_number_of_items($cart_id){
		$this->db->select('item_id');
		$this->db->from('cart_items');
		$this->db->where('cart_id', $cart_id);
		
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	function get_cart_content($cart_id){
		$this->db->select('cart_items.item_id, name, category, price, photo, active');
		$this->db->from('cart_items');
		$this->db->where('cart_id', $cart_id);
		$this->db->join('items','items.item_id = cart_items.item_id');
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function delete_from_cart($cart_id,$item_id){
		$this->db->where('cart_id', $cart_id);
		$this->db->where('item_id', $item_id);
	    $this->db->delete('cart_items');
	}
	
	function already_in($cart_id,$item_id){
		$this->db->select('item_id');
		$this->db->from('cart_items');
		$this->db->where('cart_id', $cart_id);
		$this->db->where('item_id', $item_id);
		
		$query = $this->db->get();
		return $query->num_rows();
	}
} 
?>