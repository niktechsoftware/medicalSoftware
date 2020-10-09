<?php
class LoginModel extends CI_Model{
	
	function validate(){
		// get username password and check is it for admin,employee or student.
		
		// check is it for admin
      $this->db->where("username", $this->input->post("uid"));
        $this->db->where("password", md5($this->input->post("pass")));
        $general = $this->db->get("general_settings");
        $res = $general->row();
	 if($general->num_rows() >= 1){
             $res = $general->row();
        	$loginData = array(
        			"login_type" => "admin",
					"institute_name" => $res->cilnic_name,
					"address_1" => $res->address_1,
					"address_2" => $res->address_2,
					"city" => $res->city,
					"state" => $res->state,
					"pin" => $res->pin,
					"phone_number" => $res->phone_number,
					"mobile_number" => $res->mobile_number,
					"username" => $res->admin_username,
					"name" => $res->principle_name,
					"photo" => $res->ico_logo,
					"logo" => $res->logo,
					"is_login" => true,
					"is_lock" => true,
					"login_date" => date("d-M-Y"),
					"login_time" => date("H:i:s")
        	);
            return $loginData;
        }
    }
    
    function validateLock(){
    	$login_type = $this->input->post('logintype');
    	//echo $login_type;
    	//die();
    	if($login_type == 'admin'){
    		$this->db->where("username", $this->input->post("username"));
    		$this->db->where("password", md5($this->input->post("password")));
    		$result = $this->db->get('general_settings');
    		if($result->num_rows() > 0){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    	elseif($login_type == "student"){
    		$this->db->where("student_id", $this->input->post("username"));
    		$this->db->where("password", $this->input->post("password"));
    		$result = $this->db->get('student_info');
    		if($result->num_rows() > 1){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    	else{
    		$this->db->where("emp_no", $this->input->post("username"));
    		$this->db->where("password", $this->input->post("password"));
    		$result = $this->db->get('employee_info');
    		if($result->num_rows() > 1){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    }
    
}