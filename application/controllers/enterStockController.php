<?php 
class EnterStockController extends CI_Controller{
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
		$msg = '<div class="alert alert-info"><button data-dismiss="alert" class="close">&times;</button><strong>New Item Entry :) </strong></div>';
		$itemNo = $this->input->post("itemNo");
		
		$this->load->model("enterStockModel");
		$var = $this->enterStockModel->checkStock($itemNo);
		if($var->num_rows() > 0){
			foreach ($var->result() as $row){
				$itemData = array(
						"itemName" =>$row->item_name,
						"itemCat" =>$row->item_company_name	,
						"itemsize" =>$row->item_size,
						"price" =>$row->product_prize_perunit,
						"itemQuantity"=>$row->item_quantity,
						"msg" => ""
				);
			}
		}
		else{
			$itemData = array(
					"itemName" =>"",
					"itemCat" =>"",
					"itemsize" =>"",
					"price" =>"",
					"itemQuantity"=>"",
					"msg" => $msg
			);
		}
		
		echo (json_encode($itemData));
	}
	
	
	
	function enterStock(){
		if($this->input->post("itemQuantity") > 0){
			$this->db->where("name",$this->input->post("itemName"));
			$val = $this->db->get("enter_stock");
			if($val->num_rows() > 0){
				if($this->enter_stock->update() && $this->enter_stock2->insert()){
					redirect(base_url()."home/enterStock/success");
				}else{
					redirect(base_url()."home/enterStock/fail");
				}
			}else{
				if($this->enter_stock->insert() && $this->enter_stock2->insert()){
					redirect(base_url()."home/enterStock/success");
				}else{
					redirect(base_url()."home/enterStock/fail");
				}
			}
		}else{
			redirect(base_url()."home/enterStock/falseStock.jsp");
		}
	}
	
		
	function checkStudID(){
			$pBalance = array();
			$tid = $this->input->post("cat");
			$this->load->model("teacherModel");
			$var = $this->teacherModel->checkStudID($tid);
			if($var->num_rows() > 0){
				
				foreach ($var->result() as $row){
					
					$msg = '<div class="alert alert-success">ID Found ! <strong>'. $row->first_name.' '.$row->midd_name.' '.$row->last_name.' </strong></div>';
					$pBalance['msg'] = $msg;
					$pBalance['indicator'] = "true";
					}
					$valid_id = $this->teacherModel->checkBal($tid);
					if($valid_id->num_rows() > 0){
						foreach ($valid_id->result() as $row){
							$pBalance['balance'] = $row->balance;
						}
					}
					echo (json_encode($pBalance));
			}
			else{
				$msg = '<div class="alert alert-danger">Sorry :( <strong> Student Not Found ! Wrong Student Id !</strong></div>';
				$pBalance['msg'] = $msg;
				$pBalance['balance'] = '';
				$pBalance['indicator'] = "false";
				echo (json_encode($pBalance));
			}
			
		}
		function checkempID(){
			$pBalance = array();
			$tid = $this->input->post("teacherid");
			$this->load->model("teacherModel");
			$var = $this->teacherModel->checkID($tid);
			if($var->num_rows() > 0){
				foreach ($var->result() as $row){
					$msg = '<div class="alert alert-success">ID Found ! <strong>'. $row->first_name.' '.$row->mid_name.' '.$row->last_name.' </strong></div>';
					$pBalance['msg'] = $msg;
					$pBalance['indicator'] = "true";
					}
					$valid_id = $this->teacherModel->checkBal($tid);
					if($valid_id->num_rows() > 0){
						foreach ($valid_id->result() as $row){
							$pBalance['balance'] = $row->balance;
						}
					}
					echo (json_encode($pBalance));
			}
				else{
				$msg = '<div class="alert alert-danger">Sorry :( <strong> Employee Not Found ! Wrong Employee Id !</strong></div>';
				$pBalance['msg'] = $msg;
				$pBalance['balance'] = '';
				$pBalance['indicator'] = "false";
				echo (json_encode($pBalance));
			}
		}
		
		function getTData(){
			$tid = $this->input->post("name");
			$this->load->model("enterStockModel");
			$var = $this->enterStockModel->getItemName($tid);
			if($var->num_rows() > 0){
				foreach ($var->result() as $row){
					$itemData = array(
							"itemName" =>$row->item_name,
							"itemCat" =>$row->item_company_name,
							"itemsize" =>$row->item_size,
							"price" =>$row->product_prize_perunit,
							"unit" =>$row->product_meserment
							);
				}		
				}
				echo (json_encode($itemData));
		}
		
		function saleStock(){
			
			$billno = $this->db->count_all("product_sale");
			$this->load->model("daybookModel");
			$this->load->model("enterStockModel");
			
				$validID = "";
				if(strlen($this->input->post("studID"))>0){
					$validID = $this->input->post("studID");
					$data2 = array(
							"bill_num"=>$billno,
							"buyer_id"=>$validID
					);
					
					$this->enterStockModel->updatebill($data2);
				}
				else if(strlen($this->input->post("empID"))>0){
					$validID = $this->input->post("empID");
					$data2 = array(
							"bill_num"=>$billno,
							"buyer_id"=>$validID
					);
					$this->enterStockModel->updatebill($data2);
				}else {
					$validID=$this->input->post("empFirstName");
					$emp_phone=$this->input->post("empphone");
					$data2 = array(
							"bill_num"=>$billno,
							"buyer_id"=>$validID,
							"buyer_phone"=>$emp_phone
					);
				}
				
				$daybook=array(
						"amount" => $this->input->post("paid"),
						"pay_date"=> date("Y-m-d"),
						"reason" =>"From sale Stock",
						"pay_mode"=>"Cash, ".$billno,
						"paid_by"=>$validID
				);
				$daybook1 = $this->daybookModel->fromStock($daybook);
				
			for($i=1; $i<=30;$i++)
			{
				if(strlen($this->input->post("item_no$i")) > 0)
				{
				$data = array(
						"product_id" => $this->input->post("item_no$i"),
						"prise_per_pro" => $this->input->post("item_price$i"),
						"product_quantity" => $this->input->post("item_quantity$i"),
						"discount" => $this->input->post("item_discount$i"),
						"discount_rate" => $this->input->post("discount$i"),
						"sub_total" => $this->input->post("sub_total$i"),
						"total"=> $this->input->post("tt"),
						"bill_no" =>$billno
						);
				$var1 = $this->enterStockModel->saleEntry($data);
				
				$data5 = array(
						"total_price" => $this->input->post("total_price$i"),
						"paid" => $this->input->post("paid"),
						"previous_balance" => $this->input->post("p_balance"),
						"balance" =>  $this->input->post("balance"),
						"id_name" => $this->input->post("category"),
						"valid_id" => $validID,
						"name" => $this->input->post("empFirstName"),
						"phone_no"=> $this->input->post("empphone"),
						"date"=> date("Y-m-d"),
						"bill_no" =>$billno
					);
				$var1 = $this->enterStockModel->saleEntry($data);
					if($var1):
						$var = $this->enterStockModel->getItemName1($data);
						if($var->num_rows() > 0):
							foreach ($var->result() as $row):
								$q = $row->item_quantity;
								$data1 = array(
									"item_quantity" => ($q - $data["item_quant"]),
									"item_no" =>  $data["item_no"]
								);
								$this->enterStockModel->updateStock1($data1);
							endforeach;
						endif;
					endif;
					if($var1||$var)
					{
						redirect("index.php/invoiceController/printSaleReciept/$billno");
					}
			}
		}
		
	}
	
	function interBillInfo()
	{
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
				"dealer_email"=>$this->input->post("demail")
		);
		$this->load->model("enterStockModel");
		$var=$this->enterStockModel->enterBillDetail($data);
		if($var)
			redirect("stockControllers/enterBillpurchase/success");
	}
}
?>