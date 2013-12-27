<?php
Class Items extends CI_Model {
	function getItems(){
		$this->db->select('item_id, name, category, price, photo, active');
		$this->db->from('items');
		
		$query=$this->db->get();
		return $query->result();
	}
	
	function get_item($item_id){
		$this->db->select('item_id, name, category, price, photo');
		$this->db->from('items');
		$this->db->where('item_id',$item_id);
		
		$query=$this->db->get();
		return $query->row();
	}
	
	function getItemsByName($name){
		$this->db->select('item_id, name, category, price');
		$this->db->from('items');
		$this->db->like('name', $name);
		
		$query=$this->db->get();
		
		return $query;
	}
	
	//function delete_item($item_id){
	//	$this->db->where('item_id', $item_id);
	//  $this->db->delete('items');
	//}
	
	function activate_item($item_id){
		$this->db->where('item_id', $item_id);
		$this->db->set('active', 1);
		$this->db->update('items'); 
	}
	
	function deactivate_item($item_id){
		$this->db->where('item_id', $item_id);
		$this->db->set('active', 0);
		$this->db->update('items'); 
	}
} 
?>