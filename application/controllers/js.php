<?php
class Js extends CI_Controller{
	
	function messageJs(){
		$this->load->view("customJs/messageJs");
	}
	
	function msgDetailJs(){
		$this->load->view("customJs/inbox");
	}
}