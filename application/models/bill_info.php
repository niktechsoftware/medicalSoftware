<?php
class Bill_info extends CI_Model{
	
	function insert(){
		$data=array(
				"product_company_name"=>$this->input->post("companyName"),
				"product_delar_name"=>$this->input->post("dealerName"),
				"reff_bil_num"=>$this->input->post("billNumber"),
				"product_quantity"=>$this->input->post("product_quantity"),
				"amount_paid"=>$this->input->post("amount_paid"),
				"pay_mode"=>$this->input->post("payMode"),
				"balance"=>$this->input->post("balance"),
				"total_prize"=>$this->input->post("total_prize"),
				"dealar_mobile1"=>$this->input->post("mobile1"),
				"dealar_mobile2"=>$this->input->post("mobile2"),
				"date1"=>$this->input->post("billDate"),
				"time1"=>$this->input->post("billTime"),
				"dealer_address"=>$this->input->post("daddress"),
				"by_vehical"=>$this->input->post("Vehicale"),
				"discription"=>$this->input->post("discription"),
				"dealer_email"=>$this->input->post("demail"),
				"clinic_id"=> $this->session->userdata("clinic_id")
		);
		if($this->db->insert("bill_info",$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function getAll(){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		return $this->db->get("bill_info")->result();
	}
	
	function getById($id){
		$this->db->where("sno",$id);
		return $this->db->get("bill_info");
	}
	
	function delete($id){
		$this->db->where("sno",$id);
		$this->db->delete("bill_info");
		return true;
	}
	
	function update($id,$data){
		$this->db->where("sno",$id);
		$this->db->update("bill_info",$data);
	}
}