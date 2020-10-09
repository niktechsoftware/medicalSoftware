<?php
class Procedure extends CI_Controller{
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
	
	function savePro(){
		$p_id = $this->input->post("p_id");
		if(strlen($p_id) > 0):
			if($this->input->post("pf") <= 0){
				$pf = $this->input->post("procedure_fee");
			}else{
				$pf = $this->input->post("pf");
			}
			$data1 = array(
					"patient_id" => $this->input->post("p_id"),
					"procedure_name" => $this->input->post("procedure_name"),
					"procedure_detail" => $this->input->post("pd"),
					"procedure_fee" => $pf,
					"previous_due" => $this->input->post("pb"),
					"current_due" => $this->input->post("current_due"),
					"paid" => $this->input->post('paid'),
					"clinic_id" => $this->session->userdata("clinic_id"),
					"date" => date('Y-m-d H:i:s')
			);
			//-------------------------Generate Invoice Data-------------------------------------
			$invoice_id = "PCV".(1000+$this->invoice_serial->graterId());
			$invoiceData = array(
					"invoice_no" => $invoice_id,
					"reason" => "Procedure Fee",
					"invoice_date" => date("Y-m-d"),
					"clinic_id" => $this->session->userdata("clinic_ic")
			);
			$this->invoice_serial->insert($invoiceData);
			//-------------------------------- Update opening closing balance -------------------
			$cb = ($this->opening_closing_balance->closing()->closing_balance) + ($this->input->post('paid'));
			$this->opening_closing_balance->update($cb);
			//--------------------------------- Entry in daybook --------------------------------
			$db = array(
					"paid_to" => $this->input->post("p_id"),
					"paid_by" => $this->session->userdata("username"),
					"reason" => "Procedure Fee",
					"dabit_cradit" => "cradit",
					"amount" => $this->input->post("paid"),
					"closing_balance" => $cb,
					"pay_date" => date("Y-m-d"),
					"pay_mode" => "cash",
					"clinic_id" => $this->session->userdata("clinic_id"),
					"invoice_no" => $invoice_id
			);
			$this->day_book->insert($db);
			
			if($this->procedure_model->insert($data1)){
				$id = $data['patient_id'];
				if(strlen($this->input->post("saveO")) > 0){
					redirect(base_url()."patient/procedure/true.jsp");
				}elseif(strlen($this->input->post("saveP")) > 0){
					redirect(base_url()."patient/printReport/$p_id/print.jsp");
				}
			}else{
				echo "fail";
			}
		else:
			//$this mas id call from patient model madId function is defined in model patient model
			$maxId = 1000+$this->patient_model->maxId();
			// $this is id generate for paitent id. PCV is stand for pain clinc varanasi....
			$p_id = "PCV".$maxId;
			// $this array is for table patient
			$data = array(
					"patient_id" => $p_id,
					"p_name" => $this->input->post("p_name"),
					"gender" => $this->input->post("gender"),
					"dob" => date("Y-m-d", strtotime($this->input->post("dob"))),
					"age" => $this->input->post("age"),
					"address" => $this->input->post("address"),
					"mobile" => $this->input->post("mobile"),
					"weight" => $this->input->post("weight"),
					"bp_level" => $this->input->post("bp"),
					"detail" => $this->input->post("basic"),
					"date" => date("Y-m-d"),
					"clinic_id" => $this->session->userdata("clinic_id"),
					"doc_fee" => $this->input->post('docFee')
			);
			$data2 = array(
					"c_id" => $p_id,
					"c_name" => $this->input->post("p_name"),
					"address" => $this->input->post("address"),
					"mobile" => $this->input->post("mobile"),
					"company_name" => date("Y-m-d", strtotime($this->input->post("dob"))),
					"email" => $this->input->post("gender"),
					"clinic_id" => $this->session->userdata("clinic_id")
			);
			$data1 = array(
					"patient_id" => $p_id,
					"procedure_name" => $this->input->post("procedure_name"),
					"procedure_detail" => $this->input->post("pd"),
					"procedure_fee" => $this->input->post("procedure_fee"),
					"previous_due" => 0,
					"current_due" => $this->input->post("current_due"),
					"paid" => $this->input->post('paid'),
					"clinic_id" => $this->session->userdata("clinic_id"),
					"date" => date('Y-m-d H:i:s')
			);
				
			//-------------------------Generate Invoice Data-------------------------------------
			$invoice_id = "PCV".(1000+$this->invoice_serial->graterId());
			$invoiceData = array(
					"invoice_no" => $invoice_id,
					"reason" => "Doctor's Fee",
					"invoice_date" => date("Y-m-d"),
					"clinic_id" => $this->session->userdata("clinic_ic")
			);
			$this->invoice_serial->insert($invoiceData);
			//-------------------------------- Update opening closing balance -------------------
			$cb = ($this->opening_closing_balance->closing()->closing_balance) + ($this->input->post('paid'));
			$this->opening_closing_balance->update($cb);
			//--------------------------------- Entry in daybook --------------------------------
			$db = array(
					"paid_to" => $p_id,
					"paid_by" => $this->session->userdata("username"),
					"reason" => "Procedure Fee",
					"dabit_cradit" => "cradit",
					"amount" => $this->input->post("paid"),
					"closing_balance" => $cb,
					"pay_date" => date("Y-m-d"),
					"pay_mode" => "cash",
					"clinic_id" => $this->session->userdata("clinic_id"),
					"invoice_no" => $invoice_id
			);
			$this->day_book->insert($db);
				
				
			// Patient model is calling for saveing data in table patient
			if(($this->patient_model->saveNewPatient($data)) && ($this->procedure_model->insert($data1)) && ($this->db->insert("customer",$data2))){
				$id = $data['patient_id'];
				if(strlen($this->input->post("saveO")) > 0){
					redirect(base_url()."patient/procedure/true.jsp");
				}elseif(strlen($this->input->post("saveP")) > 0){
					redirect(base_url()."patient/printReport/$p_id/print.jsp");
				}
			}else{
				echo "fail";
			}
		endif;
	}
}