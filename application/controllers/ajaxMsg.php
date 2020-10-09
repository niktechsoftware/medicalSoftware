<?php
class ajaxMsg extends CI_Controller{
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
	
	function loadInbox(){
		$data['value'] = $this->message_model->getInbox();
		$this->load->view("ajax/inbox",$data);
	}
	
	function loadSent(){
		$data['value'] = $this->message_model->getSent();
		$this->load->view("ajax/inbox",$data);
	}
	
	function loadCompose(){
		$this->load->view("ajax/compose");
	}
	
	function msgDetail(){
		$id = $this->input->post("rowid");
		$data['row'] = $this->message_model->getById($id)->row();
		
		$this->db->where("username",$data['row']->sender_id);
		$data['sender'] = $this->db->get("general_settings")->row();
		
		$data1 = array(
			"open" => 'y'
		);
		
		$this->db->where("id",$id);
		$this->db->update("message",$data1);
		
		$this->load->view("ajax/msgContent",$data);
	}
	
	function sendMsg(){
		sleep(5);
		$msg = $this->input->post("message");
		$sub = $this->input->post("sub");
		$to = $this->input->post("to");
		
		$this->db->where("username",$to);
		$num = $this->db->get("general_settings")->num_rows();
		
		if($num > 0):
			$data = array(
				"sender_id" => $this->session->userdata("username"),
				"reciever_id" => $to,
				"subject" => $sub,
				"message" => $msg,
				"open" => 'n',
				"send_date" => date("Y-m-d"),
				"send_time" => date("H:i:s"),
				"delete" => 'n'
			);
			if($this->db->insert("message",$data)){
				echo "true";
			}else{
				echo "false";
			}
		else:
			echo "noId";
		endif;
	}
	
	function delMsg(){
		$id = $this->input->post("checkedId");
		$result = count($id);
		for($i = 0; $i < $result; $i++){
			$this->db->where("id",$id[$i]);
			$this->db->delete("message");
		}
		echo $result;
	}
}