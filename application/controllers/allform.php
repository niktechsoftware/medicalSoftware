<?php
class AllForm extends CI_Controller{
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
	
	public function editProfile(){
		$clinic_id = $this->input->post("id");
		
		$this->db->where("clinic_id",$clinic_id);
		$data['info'] = $this->db->get("general_settings")->row();
		
		$data['subPage'] = 'Profile';
		$data['smallTitle'] = 'Edit Profile';
		$data['pageTitle'] = 'Edit Your Profile - '.$data['info']->clinic_id;
		$data['title'] = 'Pain Clinic | Edit Profile';
		$data['headerCss'] = 'headerCss/messageCss';
		$data['footerJs'] = 'footerJs/profileJs';
		$data['mainContent'] = 'edit_profile';
		
		$this->load->view("include/template", $data);
	}
//-------------------------------------------------------------------- Update Profile ----------------------------------------
	public function saveProfile(){
		
		$id = $this->input->post('clinic_id');
		
		if(strlen($_FILES['image']['name']) > 0):
			$photo_name = time().trim($_FILES['image']['name']);
			$new_img = array(
					"image"=> $photo_name
			);
			$old_img = $this->input->post("old_image");
			@chmod("assets/images/docImg/" . $old_img, 0777);
			@unlink("assets/images/docImg" . $old_img);
			
			if($query = $this->allformodel->updateImage($new_img,$id)){
				$this->load->library('upload');
				// Set configuration array for uploaded photo.
				$image_path = realpath(APPPATH . '../assets/images/docImg');
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				$config['file_name'] = $photo_name;
				// Upload first photo and create a thumbnail of it.
				if (!empty($_FILES['image']['name'])) {
					$this->upload->initialize($config);
					if ($this->upload->do_upload('image')) {
						// ---------------------------------- Reset session value of photo ----------------------
						if($id == $this->session->userdata("clinic_id")):
							$this->session->set_userdata("photo",$photo_name);
						endif;
					}
				}
			}
		endif;
		if(strlen($_FILES['logo']['name']) > 0):
			$photo_name = time().trim($_FILES['logo']['name']);
			$new_img = array(
					"logo"=> $photo_name
			);
			$old_img = $this->input->post("old_logo");
			@chmod("assets/images/docImg/" . $old_img, 0777);
			@unlink("assets/images/docImg/" . $old_img);
			
			if($query = $this->allformodel->updateLogo($new_img,$id)){
				$this->load->library('upload');
				// Set configuration array for uploaded photo.
				$image_path = realpath(APPPATH . '../assets/images/docImg');
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				$config['file_name'] = $photo_name;
				// Upload first photo and create a thumbnail of it.
				if (!empty($_FILES['logo']['name'])) {
					$this->upload->initialize($config);
					if ($this->upload->do_upload('logo')) {
						// ---------------------------------- Reset session value of logo ----------------------
						if($id == $this->session->userdata("clinic_id")):
							$this->session->set_userdata("logo",$photo_name);
						endif;
					}
				}
			}
		endif;
		
		$val = array(
				"login_type" => $this->input->post("login_type"),
				"cilnic_name" => $this->input->post("clinic_name"),
				"address_1" => $this->input->post("address_1"),
				"address_2" => $this->input->post("address_2"),
				"city" => $this->input->post("city"),
				"state" => $this->input->post("state"),
				"pin" => $this->input->post("pin"),
				"phone_number" => $this->input->post("phone_number"),
				"fax_number" => $this->input->post("fax_number"),
				"mobile_number" => $this->input->post("mobile_number"),
				"email1" => $this->input->post("email1"),
				"email2" => $this->input->post("email2"),
				"head_name" => $this->input->post("head_name"),
				"doctor_name" => $this->input->post("doctor_name"),
				"doctor_name_1" => $this->input->post("doctor_name_1"),
				"doctor_name_2" => $this->input->post("doctor_name_2"),
				"doctor_name_3" => $this->input->post("doctor_name_3"),
				"doctor_name_4" => $this->input->post("doctoe_name_4")
		);
		if($this->allformodel->updateProfile($val,$id)){
				redirect(base_url()."apanel/profile.jsp/$id");
		}
	}
//----------------------------------------------------------- Add new Branch informaton ------------------------

	function addNewProfile(){
		$id = $this->input->post('clinic_id');
		$newId = $this->allformodel->getNewId();
		$logo = time().trim($_FILES['logo']['name']);
		$image = time().trim($_FILES['image']['name']);
		$val = array(
				"login_type" => $this->input->post("login_type"),
				"username" => $this->input->post("uid"),
				"password" => md5($this->input->post("pass")),
				"cilnic_name" => $this->input->post("clinic_name"),
				"address_1" => $this->input->post("address_1"),
				"address_2" => $this->input->post("address_2"),
				"city" => $this->input->post("city"),
				"state" => $this->input->post("state"),
				"pin" => $this->input->post("pin"),
				"phone_number" => $this->input->post("phone_number"),
				"fax_number" => $this->input->post("fax_number"),
				"mobile_number" => $this->input->post("mobile_number"),
				"email1" => $this->input->post("email1"),
				"email2" => $this->input->post("email2"),
				"head_name" => $this->input->post("head_name"),
				"doctor_name" => $this->input->post("doctor_name"),
				"doctor_name_1" => $this->input->post("doctor_name_1"),
				"doctor_name_2" => $this->input->post("doctor_name_2"),
				"doctor_name_3" => $this->input->post("doctor_name_3"),
				"doctor_name_4" => $this->input->post("doctoe_name_4"),
				"image"=> $logo,
				"logo"=> $image,
				"clinic_id" => $newId
		);
		if(strlen($_FILES['image']['name']) > 0):
			$photo_name = time().trim($_FILES['image']['name']);			
			
				$this->load->library('upload');
				// Set configuration array for uploaded photo.
				$image_path = realpath(APPPATH . '../assets/images/docImg');
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				$config['file_name'] = $photo_name;
				// Upload first photo and create a thumbnail of it.
				if (!empty($_FILES['image']['name'])) {
					$this->upload->initialize($config);
					if ($this->upload->do_upload('image')) {
						// ---------------------------------- Reset session value of photo ----------------------
						if($id == $this->session->userdata("clinic_id")):
							$this->session->set_userdata("photo",$photo_name);
						endif;
					}
				}
		endif;
		if(strlen($_FILES['logo']['name']) > 0):
			$photo_name = time().trim($_FILES['logo']['name']);				
			
				$this->load->library('upload');
				// Set configuration array for uploaded photo.
				$image_path = realpath(APPPATH . '../assets/images/docImg');
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				$config['file_name'] = $photo_name;
				// Upload first photo and create a thumbnail of it.
				if (!empty($_FILES['logo']['name'])) {
					$this->upload->initialize($config);
					if ($this->upload->do_upload('logo')) {
						// ---------------------------------- Reset session value of logo ----------------------
						if($id == $this->session->userdata("clinic_id")):
							$this->session->set_userdata("logo",$photo_name);
						endif;
					}
				}
		endif;
		
		if($this->allformodel->addProfile($val)){
			$val=$this->db->get("sms_setting")->row();
			$senderiD=$val->sender_id;
			$authkey=$val->auth_key;
			
			$this->load->helper("sms");
			$msg ="Congradulations new branch is added with the user id ".$this->input->post("uid")." and password ".$this->input->post("pass");
			$fmobile = "8382829593";
			sms($authkey,$msg,$senderiD,$fmobile);
			redirect(base_url()."apanel/profile.jsp");
		}
	}
	
//----------------------------------------------------------- Add new Disease ------------------------	

	public function saveDisease(){
		$data = array(
			"disease_name" => $this->input->post("disease"),
			"basic_treatment" => $this->input->post("treatment")
		);
		if($this->disease->save($data)){
			redirect(base_url()."apanel/newDisease/true");
		}else{
			echo "somthing going wrong... Contact to developer...";
		}
	}
	public function editDisease(){
		$id = $this->input->post("id");
		$data = array(
				"disease_name" => $this->input->post("disease"),
				"basic_treatment" => $this->input->post("treatment")
		);
		if($this->disease->edit($id,$data)){
			redirect(base_url()."apanel/newDisease/editTrue");
		}else{
			echo "somthing going wrong... Contact to developer...";
		}
	}
	public function deleteDisease(){
		if($this->disease->delete($this->uri->segment(3))){
			redirect(base_url()."apanel/newDisease/deleteTrue");
		}else{
			redirect(base_url()."apanel/newDisease/deleteFalse");
		}
	}
	
	public function changePassword(){
		$userName = $this->session->userdata("username");
		$oPass = $this->input->post("oldPass");
		$newPass = $this->input->post("newPass");
		$reTypePass = $this->input->post("reTypePass");
		
		
		$this->db->where("username",$userName);
		$this->db->where("password",md5($oPass));
		$isVal = $this->db->get("general_settings");
		if(($isVal->num_rows() > 0) && ($newPass === $reTypePass)){
			$changePassData = array(
					"password" => md5($newPass)
			);
			$this->db->where("username",$userName);
			$this->db->where("password",md5($oPass));
			if($this->db->update("general_settings",$changePassData)){
				redirect(base_url()."apanel/changePass/true.jsp");
			}
			else{
				redirect(base_url()."apanel/changePass/false.jsp");
			}
		}elseif($newPass != $reTypePass){
			redirect(base_url()."apanel/changePass/rFail.jsp");
		}else{
			//echo $oPass." ";
			//echo $userName." ";
			//echo $newPass;
			redirect(base_url()."apanel/changePass/false.jsp");
		}
	}
	
	
}