<?php
class Home extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->isLogin();
	}
	
	function isLogin(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		if(!$is_login){
			//echo $is_login;
			redirect(base_url()."login/index");
		}
		elseif(!$is_lock){
			redirect(base_url()."login/lockPage");
		}
	}
	
	public function saleProduct(){
		$data['ref'] = $this->db->get("ref")->result();
		$data['subPage'] = 'Product';
		$data['title'] = "Product Sale";
		$data['smallTitle'] = "Sale / Product Sale";
		$data['pageTitle'] = "Product Sale";
		$data['mainContent'] = "saleProduct";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/template",$data);
	}
	
	public function returnProduct(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Return";
		$data['smallTitle'] = "Sale / Product Return";
		$data['pageTitle'] = "Product Return";
		$data['mainContent'] = "returnProduct";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/returnProductJs";
		$this->load->view("include/template",$data);
	}
	
	public function editBill(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Edit Bill";
		$data['smallTitle'] = "Sale / Edit Bill";
		$data['pageTitle'] = "Edit Bill";
		$data['mainContent'] = "editBill";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/editBillJs";
		$this->load->view("include/template",$data);
	}
	
	public function pBillEntry(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Purchase Bill Entry";
		$data['smallTitle'] = "Sale / Purchase Bill Entry";
		$data['pageTitle'] = "Purchase Bill Entry";
		$data['mainContent'] = "pBillEntry";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/editBillJs";
		$this->load->view("include/template",$data);
	}
	
	function pBillHistory(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Purchase Bill History";
		$data['smallTitle'] = "Sale / Purchase Bill History";
		$data['pageTitle'] = "Purchase Bill History";
		$data['mainContent'] = "pBillHistory";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$data['pBillInfo'] = $this->bill_info->getAll();
		$this->load->view("include/template",$data);
	}
	
	function sBillHistory(){
		$data['subPage'] = 'Bill History';
		$data['title'] = "Sale Bill History";
		$data['smallTitle'] = "Sale / Sale Bill History";
		$data['pageTitle'] = "Sale Bill History";
		$data['mainContent'] = "sBillHistory";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$data['sBillInfo'] = $this->sale_bill->getAll()->result();
		$this->load->view("include/template",$data);
	}
	
	function rBillHistory(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Return Bill History";
		$data['smallTitle'] = "Sale / Return Bill History";
		$data['pageTitle'] = "Return Bill History";
		$data['mainContent'] = "rBillHistory";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$data['rBillInfo'] = $this->return_bill->getAll()->result();
		$this->load->view("include/template",$data);
	}
	
	public function enterStock(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Entry";
		$data['smallTitle'] = "Product / Product Entry";
		$data['pageTitle'] = "Product Entry";
		$data['mainContent'] = "enterStock";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/enterStockJs";
		$data['proDetail'] = $this->enter_stock->getAll()->result();
		$this->load->view("include/template",$data);
	}
	
	function ref(){
		$this->db->where("id",$this->uri->segment(3));
		$ref = $this->db->get("ref");
		if($ref->num_rows() > 0){
			$data['isVal'] = true;
			$data['ref'] = $ref->row();
		}else{
			$data['isVal'] = false;
		}
		$data['subPage'] = 'Product';
		$data['title'] = "Refrance Entry";
		$data['smallTitle'] = "Product / Refrance Entry";
		$data['pageTitle'] = "Refrance Entry";
		$data['mainContent'] = "ref";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/enterStockJs";
		$data['proDetail'] = $this->db->get("ref")->result();
		$this->load->view("include/template",$data);
	}
	
	function productDetail(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Detail";
		$data['smallTitle'] = "Sale / Product Detail";
		$data['pageTitle'] = "Product Detail";
		$data['mainContent'] = "productDetail";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$data['proDetail'] = $this->enter_stock->getAll()->result();
		$this->load->view("include/template",$data);
	}
}