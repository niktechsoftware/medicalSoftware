<?php 
if(strlen($this->uri->segment(3)) > 0){
	$clinic_id = $this->uri->segment(3);
}else{
	$clinic_id = $this->session->userdata("clinic_id");
}
$this->db->where("clinic_id",$clinic_id);
$profile = $this->db->get("general_settings")->row();
?>
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo base_url()?>allform/editProfile.jsp" method="post">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Cilnic Name </label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->cilnic_name) > 0){
                                                				echo $profile->cilnic_name;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Clinic Id</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->clinic_id) > 0){
                                                				echo $profile->clinic_id;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->address_1) > 0){
                                                				echo $profile->address_1;
                                                				echo " ".$profile->address_2;
                                                				echo " ".$profile->city;
                                                				echo " ".$profile->state;
                                                				echo " ".$profile->pin;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->phone_number) > 0){
                                                				echo $profile->phone_number;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Fax Number</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->fax_number) > 0){
                                                				echo $profile->fax_number;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Mobile Number</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->mobile_number) > 0){
                                                				echo $profile->mobile_number;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email Address</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->email1) > 0){
                                                				echo $profile->email1;
                                                				echo ",".$profile->email2;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Head Name</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->head_name) > 0){
                                                				echo $profile->head_name;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Doctor Name</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->doctor_name) > 0){
                                                				echo $profile->doctor_name;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Doctor Name 1</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->doctor_name_1) > 0){
                                                				echo $profile->doctor_name_1;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Doctor Name 2</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->doctor_name_2) > 0){
                                                				echo $profile->doctor_name_2;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Doctor Name 3</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->doctor_name_3) > 0){
                                                				echo $profile->doctor_name_3;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Doctor Name 4</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->doctor_name_4) > 0){
                                                				echo $profile->doctor_name_4;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->image) > 0){
                                                				echo $profile->image;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Logo</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->logo) > 0){
                                                				echo $profile->logo;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <hr/>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                            	<input type="hidden" name="id" value="<?php echo $clinic_id;?>">
                                                <button type="submit" class="btn btn-success">Edit Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->