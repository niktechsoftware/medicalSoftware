<?php
class procedure_model extends CI_Model{
	function getByid($id){
		$this->db->where("patient_id",$id);
		return $this->db->get("procedure");
	}
	
	function insert($data){
		if($this->db->insert("procedure",$data)){
			return true;
		}else{
			return false;
		}		
	}
	
}