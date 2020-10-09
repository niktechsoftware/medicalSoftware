<?php
class Patient extends CI_Controller{
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
	function cDetailAjax(){
		$cid = $this->input->post("customer_id");
		//echo $cid;
		$data['isReguler'] = true;
		$data['isReturn'] = false;
		$data['cDetail'] = $this->patient_model->getById($cid);
		$this->load->view("ajax/billCustomerDetail",$data);
	}
	function getRef(){
		$this->db->where("id",$this->input->post("ref"));
		$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
		$abc = $this->db->get("ref")->row();
		echo $abc->dis;
	}
	function searchNewPatient(){
		$data['subPage'] = 'Patient';
		$data['smallTitle'] = 'Search or New Patient';
		$data['pageTitle'] = 'Search or New Patient';
				
		$data['title'] = 'Pain Clinic | Search/New Patient';
		$data['headerCss'] = 'headerCss/patientCss';
		$data['footerJs'] = 'footerJs/patientJs';
		$data['mainContent'] = 'newPatient';
		
		$data['val'] = $this->disease->getAll();
		$this->load->view("include/template", $data);
	}
	
	function basic(){
		$id = $this->input->post("id");
		$data = $this->disease->getById($id);
		if($data['isFound']){
			echo $data['val']->row()->basic_treatment;
		}else{
			echo "N/A";
		}
	}
	
	function searchPatient(){
		$clinic_id = $this->session->userdata("clinic_id");
		$keyword = '%'.$this->input->post("keyword").'%';
		$sql = "SELECT * FROM patient WHERE clinic_id='$clinic_id' AND p_name LIKE '$keyword' OR patient_id LIKE '$keyword' ORDER BY p_name ASC LIMIT 0, 10";
		$query = $this->db->query($sql);
		foreach ($query->result() as $rs) {
			// put in bold the written text
			//$country_name = str_replace($this->input->post("keyword"), '<b>'.$this->input->post("keyword").'</b>', $rs->p_name);
			// add new option
		    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs->patient_id." - ".$rs->p_name).'\')"><a href="#javascript();">'.$rs->patient_id." - ".$rs->p_name.'</a></li>';
		}
	}
	function retunToPatient(){
		$keyword = $this->input->post("keyword");
		$pieces = explode(" - ", $keyword);
		$id = $pieces[0];
		$this->db->where("patient_id",$id);
		$row1 = $this->db->get("patient");
		if($row1->num_rows() > 0){
			$row = $row1->row();
			$data = array(
					"p_id" => $row->patient_id,
					"name" => $row->p_name,
					"gender" => $row->gender,
					"dob" => $row->dob,
					"age" => $row->age,
					"address" => $row->address,
					"mobile" => $row->mobile,
					"weight" => $row->weight,
					"bp_level" => $row->bp_level,
					"detail" => $row->detail
			);
		}else{
			$data = array(
					"p_id" => "",
					"name" => "",
					"gender" => "",
					"dob" => "",
					"age" => "",
					"address" => "",
					"mobile" => "",
					"weight" => "",
					"bp_level" => "",
					"detail" => ""
			);
		}
		echo (json_encode($data));
		
	}
	
	
	function newCustomer(){
		$p_id = $this->input->post("p_id");
		if(strlen($p_id) > 0):
			$data1 = array(
				"p_id" => $this->input->post("p_id"),
				"t_date" => date("Y-m-d"),
				"clinic_id" => $this->session->userdata("clinic_id"),
				"bp" => $this->input->post("bp"),
				"weight" => $this->input->post("weight"),
				"detail" => $this->input->post("basic"),
				"disease" => $this->input->post("comon"),
				"doc_fee" => $this->input->post('docFee')
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
				$cb = ($this->opening_closing_balance->closing()->closing_balance) + ($this->input->post('docFee'));
				$this->opening_closing_balance->update($cb);
			//--------------------------------- Entry in daybook --------------------------------				
				$db = array(
					"paid_to" => $this->input->post("p_id"),
					"paid_by" => $this->session->userdata("username"),
					"reason" => "Doctor's Fee",
					"dabit_cradit" => "cradit",
					"amount" => $this->input->post("docFee"),
					"closing_balance" => $cb,
					"pay_date" => date("Y-m-d"),
					"pay_mode" => "cash",
					"clinic_id" => $this->session->userdata("clinic_id"),
					"invoice_no" => $invoice_id
				);
				$this->day_book->insert($db);
				
			if($this->treatment_model->saveDetail($data1)){
				$id = $data['patient_id'];
				redirect(base_url()."patient/printReport/$p_id/print.jsp");
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
				"p_id" => $p_id,
				"t_date" => date("Y-m-d"),
				"clinic_id" => $this->session->userdata("clinic_id"),
				"bp" => $this->input->post("bp"),
				"weight" => $this->input->post("weight"),
				"detail" => $this->input->post("basic"),
				"disease" => $this->input->post("comon"),
				"doc_fee" => $this->input->post('docFee')
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
			$cb = ($this->opening_closing_balance->closing()->closing_balance) + ($this->input->post('docFee'));
			$this->opening_closing_balance->update($cb);
			//--------------------------------- Entry in daybook --------------------------------
			$db = array(
					"paid_to" => $p_id,
					"paid_by" => $this->session->userdata("user_id"),
					"reason" => "Doctor's Fee",
					"dabit_cradit" => "cradit",
					"amount" => $this->input->post("docFee"),
					"closing_balance" => $cb,
					"pay_date" => date("Y-m-d"),
					"pay_mode" => "cash",
					"clinic_id" => $this->session->userdata("clinic_id"),
					"invoice_no" => $invoice_id
			);
			$this->day_book->insert($db);
			
			
			// Patient model is calling for saveing data in table patient
			if(($this->patient_model->saveNewPatient($data)) && ($this->treatment_model->saveDetail($data1)) && ($this->db->insert("customer",$data2))){
				$id = $data['patient_id'];
				redirect(base_url()."patient/printReport/$p_id/print.jsp");
			}else{
				echo "fail";
			}
		endif;
	}
	
	function printReport(){
		$data['subPage'] = 'Patient';
		$data['smallTitle'] = 'Print Report';
		$data['pageTitle'] = 'Print Report';
	
		$data['title'] = 'Pain Clinic | Print Report';
		$data['headerCss'] = 'headerCss/patientCss';
		$data['footerJs'] = 'footerJs/patientJs';
		$data['mainContent'] = 'printReport';
		$data['p_id'] = $this->uri->segment(3);
		
		$this->load->view("include/template", $data);
	}
	
	function treatment(){
		$data['subPage'] = 'Patient';
		$data['smallTitle'] = 'Treatement';
		$data['pageTitle'] = 'Treatement';
		
		$data['title'] = 'Pain Clinic | Treatement';
		$data['headerCss'] = 'headerCss/patientCss';
		$data['footerJs'] = 'footerJs/patientJs';
		$data['mainContent'] = 'newPatient';
		
		$data['val'] = $this->disease->getAll();
		$this->load->view("include/template", $data);
	}
	
	function procedure(){
		$data['subPage'] = 'Patient';
		$data['smallTitle'] = 'Procedure';
		$data['pageTitle'] = 'Procedure';
		
		$data['title'] = 'Pain Clinic | Treatement';
		$data['headerCss'] = 'headerCss/pHistroyCss';
		$data['footerJs'] = 'footerJs/procedureJs';
		$data['mainContent'] = 'procedure';
		
		$this->load->view("include/template", $data);
	}
	function procedureList(){
		$keyword = $this->input->post("keyword");
		$pieces = explode(" - ", $keyword);
		$id = $pieces[0];
		$val = $this->procedure_model->getById($id);
		if($val->num_rows() > 0){
			$data['val'] = $val->result();
			$data['isRow'] = true;
			$this->load->view("ajax/prcedureList",$data);
		}else{
			$data['isRow'] = false;
			$this->load->view("ajax/prcedureList",$data);
		}
	}
	function retunToProcedure(){
		$keyword = $this->input->post("keyword");
		$pieces = explode(" - ", $keyword);
		$id = $pieces[0];
		$this->db->where("patient_id",$id);
		$row1 = $this->db->get("patient");
		if($row1->num_rows() > 0){
			$row = $row1->row();
			$col = $this->db->query("SELECT * FROM `procedure` WHERE patient_id='$id' ORDER BY id DESC LIMIT 1");
			if($col->num_rows() > 0){
				$col = $col->row();
			$data = array(
					"p_id" => $row->patient_id,
					"name" => $row->p_name,
					"gender" => $row->gender,
					"dob" => $row->dob,
					"age" => $row->age,
					"address" => $row->address,
					"mobile" => $row->mobile,
					"weight" => $row->weight,
					"bp_level" => $row->bp_level,
					"detail" => $row->detail,
					"procedure_name" => $col->procedure_name,
					"procedure_fee" => $col->procedure_fee,
					"previous_due" => $col->previous_due,
					"current_due" => $col->current_due,
					"discount_rate" => $col->discount_rate,
					"discount_amount" => $col->discount_amount,
					"paid" => $col->paid,
					"date" => $col->date
			);
			}else{
				$data = array(
						"p_id" => $row->patient_id,
						"name" => $row->p_name,
						"gender" => $row->gender,
						"dob" => $row->dob,
						"age" => $row->age,
						"address" => $row->address,
						"mobile" => $row->mobile,
						"weight" => $row->weight,
						"bp_level" => $row->bp_level,
						"detail" => $row->detail,
						"procedure_name" => "",
						"procedure_fee" => "",
						"previous_due" => "",
						"current_due" => "",
						"discount_rate" => "",
						"discount_amount" => "",
						"paid" => "",
						"date" => ""
				);
			}
		}else{
			$data = array(
					"p_id" => "",
					"name" => "",
					"gender" => "",
					"dob" => "",
					"age" => "",
					"address" => "",
					"mobile" => "",
					"weight" => "",
					"bp_level" => "",
					"detail" => "",
					"procedure_name" => "",
					"procedure_fee" => "",
					"previous_due" => "",
					"current_due" => "",
					"discount_rate" => "",
					"discount_amount" => "",
					"paid" => "",
					"date" => ""
			);
		}
		echo (json_encode($data));
	
	}
	
	function patientHistory(){
		$data['subPage'] = 'Patient';
		$data['smallTitle'] = 'Patient History';
		$data['pageTitle'] = 'Patient History';
		
		$data['title'] = 'Pain Clinic | Treatement';
		$data['headerCss'] = 'headerCss/patientCss';
		$data['footerJs'] = 'footerJs/pHistoryJs';
		$data['mainContent'] = 'pHistory';
		
		$this->load->view("include/template", $data);
	}
	
	function patientHistoryList(){
		$keyword = $this->input->post("keyword");
		$pieces = explode(" - ", $keyword);
		$id = $pieces[0];
		$this->db->where("patient_id",$id);
		$row1 = $this->db->get("patient");
		if($row1->num_rows() > 0){
			$list['info'] = $row1->row();
			
			$this->db->where("p_id",$id);
			$a = $this->db->get("treatement");
			if($a->num_rows() > 0){
				$list['is'] = true;
				$list['row1'] = $a;
			}else{
				$list['is'] = false;
			}
			
			$this->load->view("ajax/pHistory",$list);
		}
	}
}