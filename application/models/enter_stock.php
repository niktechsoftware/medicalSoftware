<?php
class Enter_stock extends CI_Model{
	
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
			"pRate" => $this->input->post("pRate"),
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
		if($this->db->insert("enter_stock",$productData)){
			return true;
		}else{
			return false;
		}
	}
	
	function getAll(){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		return $this->db->get("enter_stock");
	}
	
	function getById($id){
		$this->db->where("sno",$id);
		return $this->db->get("enter_stock");
	}
	
	function getItemByName($name){
		$this->db->where("name",$name);
		return $this->db->get("enter_stock");
	}
	
	function getItem($itemNo){
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->where("item_no",$itemNo);
		return $this->db->get("enter_stock");
	}
	
	function delete($id){
		$this->db->where("sno",$id);
		$this->db->delete("enter_stock");
		return true;
	}
	
	function update(){
		$stockData = array(
				"item_no" => $this->input->post("itemNo"),
				"name" => $this->input->post("itemName"),
				"company_name" => $this->input->post("itemCompanyName"),
				"discription" => $this->input->post("discription"),
				"packing" => $this->input->post("packing"),
				"size_power" => $this->input->post("itemSize"),
				"prize_perunit" => $this->input->post("unitPrice"),
				"pRate" => $this->input->post("pRate"),
				"batch_no" => $this->input->post("batchNo"),
				"mf_date" => date("Y-m-d",strtotime($this->input->post("mfgDate"))),
				"exp_date" => date("Y-m-d",strtotime($this->input->post("expDate"))),
				"free" => $this->input->post("free"),
				"item_quantity" => $this->input->post("extraQuantity") + $this->input->post("itemQuantity"),
				"extraQuantity" => $this->input->post("extraQuantity"),
				"a_date" => date("Y-m-d"),
				"reff_bill_num" => $this->input->post("billNumber"),
				"clinic_id" => $this->session->userdata("clinic_id")
		);
		$this->db->where("item_no",$this->input->post("itemNo"));
		if($this->db->update("enter_stock",$stockData)){
			return true;
		}else{
			return false;
		}
	}
	
	function saleUpdate($data){
		$this->db->select("item_quantity");
		$this->db->where("item_no",$data['product_id']);
		$var = $this->db->get("enter_stock");
		
		if($var->num_rows() > 0):
			$row = $var->row();
			$q = $row->item_quantity;
			$data1 = array(
				"item_quantity" => ($q - $data["product_quantity"])
			);
			$this->db->where("item_no",$data["product_id"]);
			if($this->db->update("enter_stock",$data1)){
				return true;
			}
			else{
				return false;
			}
		else:
			return false;
		endif;
	}
}