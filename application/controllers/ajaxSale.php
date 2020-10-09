<?php
class AjaxSale extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->is_login();
	}
	
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if(!$is_login){
			//echo $is_login;
			redirect(base_url()."login/index");
		}
		elseif(!$is_lock){
			redirect(base_url()."login/lockPage");
		}
	}
	
	function checkStock(){
		$msg = '<div class="alert alert-success"><button data-dismiss="alert" class="close">&times;</button><strong>New Item Entry :) </strong></div>';
		$itemNo = $this->input->post("itemNo");
		
		$this->db->where("item_no",$itemNo);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$var=$this->db->get("enter_stock");
		
		if($var->num_rows() > 0){
			$row = $var->row();
			$itemData = array(
				"msg" => "",
				"itemName" => $row->name,
				"company_name" => $row->company_name,
				"discription" => $row->discription,
				"packing" => $row->packing,
				"size_power" => $row->size_power,
				"prize_perunit" => $row->prize_perunit,
				"pRate" => $row->pRate,
				"batch_no" => $row->batch_no,
				"mf_date" => $row->mf_date,
				"exp_date" => $row->exp_date,
				"free" => $row->free,
				"item_quantity" => $row->item_quantity,
				"extraQuantity" => $row->extraQuantity,
				"a_date" => $row->a_date,
				"reff_bill_num" => $row->reff_bill_num
			);
		}
		else{
			$itemData = array(
				"itemName" => '',
				"company_name" => '',
				"size_power" => '',
				"packing" => '',
				"prize_perunit" => '',
				"pRate" => '',
				"batch_no" => '',
				"mf_date" => '',
				"exp_date" => '',
				"free" => '',
				"item_quantity" => '',
				"extraQuantity" => '',
				"a_date" => '',
				"reff_bill_num" => '',
				"clinic_id" => '',
				"msg" => $msg
			);
		}
	
		echo (json_encode($itemData));
	}
	function checkStockByName(){
		$msg = '<div class="alert alert-success"><button data-dismiss="alert" class="close">&times;</button><strong>New Item Entry :) </strong></div>';
		$itemNo = $this->input->post("name");
		
		$this->db->where("name",$itemNo);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$var=$this->db->get("enter_stock");
		
		if($var->num_rows() > 0){
			$row = $var->row();
			$itemData = array(
					"msg" => "",
					"itemNo" => $row->item_no,
					"company_name" => $row->company_name,
					"discription" => $row->discription,
					"packing" => $row->packing,
					"size_power" => $row->size_power,
					"prize_perunit" => $row->prize_perunit,
					"pRate" => $row->pRate,
					"batch_no" => $row->batch_no,
					"mf_date" => $row->mf_date,
					"exp_date" => $row->exp_date,
					"free" => $row->free,
					"item_quantity" => $row->item_quantity,
					"extraQuantity" => $row->extraQuantity,
					"a_date" => $row->a_date,
					"reff_bill_num" => $row->reff_bill_num
			);
		}
		else{
			$itemData = array(
					"itemNo" => '',
					"company_name" => '',
					"size_power" => '',
					"packing" => '',
					"prize_perunit" => '',
					"pRate" => '',
					"batch_no" => '',
					"mf_date" => '',
					"exp_date" => '',
					"free" => '',
					"item_quantity" => '',
					"extraQuantity" => '',
					"a_date" => '',
					"reff_bill_num" => '',
					"clinic_id" => '',
					"msg" => $msg
			);
		}
		
		echo (json_encode($itemData));
	}
	function getEnterStockData(){
		$searchTerm = $_GET['term'];
		//get matched data from skills table
		$this->db->like("name",$searchTerm);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->order_by("name", "asc");
		$query = $this->db->get("enter_stock");
		foreach($query->result() as $row){
			$data[] = $row->name;
		}
		echo json_encode($data);
	}
	
	function getData(){
		$searchTerm = $_GET['term'];
		//get matched data from skills table
		$this->db->like("name",$searchTerm);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->order_by("name", "asc");
		$query = $this->db->get("enter_stock");
		foreach($query->result() as $row){
			$data[] = $row->name;
		}
		echo json_encode($data);
	}
	
	function getItemData(){
		$tid = $this->input->post("name");
		$var = $this->enter_stock->getItemByName($tid);
		if($var->num_rows() > 0){
			$row = $var->row();
			$itemData = array(
				"itemNo" =>$row->item_no,
				"avlQ" => $row->item_quantity,
				"packing" =>$row->packing,
				"batch_no" =>$row->batch_no,
				"exp_date" =>$row->exp_date,
				"prize_perunit" =>$row->prize_perunit
			);
			echo (json_encode($itemData));
			//echo "abc";
		}
	}
	
	function getSaleData(){
		$searchTerm = $_GET['term'];
		//get matched data from skills table
		$this->db->like("company_name",$searchTerm);
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$this->db->order_by("company_name", "asc");
		$query = $this->db->get("product_sale");
		foreach($query->result() as $row){
			$data[] = $row->company_name;
		}
		echo json_encode($data);
	}
	
	function getSaleItemData(){
		$tid = $this->input->post("name");
		$billNo = $this->input->post("billNo");
		
		$this->db->where("company_name",$tid);
		$this->db->where("bill_no",$billNo);
		$product = $this->db->get("product_sale");
		
		if($product->num_rows() > 0){
				$row = $product->row();
				$itemData = array(
						"itemNo" =>$row->product_id,
						"item_quantity" =>$row->product_quantity,
						"prise_per_pro" =>$row->prise_per_pro,
						"discount" =>$row->discount,
						"discount_rate" =>$row->discount_rate,
						"sub_total" => $row->sub_total,
						"total" => $row->total
				);
				echo (json_encode($itemData));
		}else{
			$itemData = array(
				"itemNo" => "Not saled",
				"item_quantity" => "Not saled",
				"prise_per_pro" => "Not saled",
				"discount" => "Not saled",
				"discount_rate" => "Not saled",
				"sub_total" => "Not saled",
				"total" => "Not saled"
			);
			echo (json_encode($itemData));
		}
	}
	
	function checkQuantity(){
		$quant = $this->input->post("quant");
		$tid = $this->input->post("name");
		$billNo = $this->input->post("billNo");
		
		$this->db->where("product_id",$tid);
		$this->db->where("bill_no",$billNo);
		$product = $this->db->get("product_sale");
		
		if($product->num_rows() > 0){
			if($product->row()->product_quantity < $quant){
				echo "0";
			}
			else{
				echo $quant;
			}
		}
	}
	
}