<?php
class Enter_stock2 extends CI_Model{
	
	function insert(){
		$id = $this->db->query("SELECT sno From enter_stock order by sno DESC Limit 1")->row()->sno;
		$id = 100 + $id;
		$id = "PCV".$id;
		$productData = array(
				"item_no" => $id,
				"name" => $this->input->post("itemName"),
				"company_name" => $this->input->post("itemCompanyName"),
				"discription" => $this->input->post("discription"),
				"packing" => $this->input->post("packing"),
				"size_power" => $this->input->post("itemSize"),
				"prize_perunit" => $this->input->post("unitPrice"),
				"batch_no" => $this->input->post("batchNo"),
				"mf_date" => date("Y-m-d",strtotime($this->input->post("mfgDate"))),
				"exp_date" => date("Y-m-d",strtotime($this->input->post("expDate"))),
				"free" => $this->input->post("free"),
				"item_quantity" => $this->input->post("itemQuantity"),
				"extraQuantity" => $this->input->post("extraQuantity"),
				"a_date" => date("Y-m-d"),
				"reff_bill_num" => $this->input->post("billNumber"),
				"clinic_id" => $this->session->userdata("clinic_id")
		);
		if($this->db->insert("enter_stock1",$productData)){
			return true;
		}else{
			return false;
		}
	}
	
	function getAll(){
		return $this->db->get();
	}
	
	function getById($id){
		$this->db->where("sno",$id);
		return $this->db->get();
	}
	
	function delete($id){
		$this->db->where("sno",$id);
		$this->db->delete();
		return true;
	}
	
	function update($id,$data){
		$this->db->where("sno",$id);
		$this->db->update("enter_stock2",$data);
	}
}