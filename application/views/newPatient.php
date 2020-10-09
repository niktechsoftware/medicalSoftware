<div class="container">
	<div class="row">
			<div class="col-sm-12">
				<!-- start: FORM WIZARD PANEL -->
				<div class="panel panel-white">
					<div class="panel-heading">
						<h4 class="panel-title">Search  <span class="text-bold">Patient</span></h4>
					</div>
					<div class="panel-body">
						<div id="wizard" class="swMain">
							<div class="form-group">
								<div class="col-sm-10">
									<label class="col-sm-2 control-label">
										Patient Name/ID  <span class="symbol required"></span>
									</label>
									<div class="col-sm-10">
	                                    <input type="text" class="form-control"  id="country_id" onkeyup="autocomplet()" placeholder="Patient Name/ID" required="required" />
	                                    <ul style="list-style: none; padding:0px;" id="country_list_id"></ul>
	                                </div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<div>
	  </div>
		<!-- end: FORM WIZARD PANEL -->
	</div>
	<form action="<?php echo base_url();?>patient/newCustomer"  method ="post" role="form" class="form-horizontal" id="form">
		<div class="row">
			<div class="col-sm-12">
				<!-- start: FORM WIZARD PANEL -->
				<div class="panel panel-white">
					<div class="panel-heading">
						<h4 class="panel-title">Patient  <span class="text-bold">Information</span></h4>
					</div>
					<div class="panel-body">
						<div><?php 
								if($this->uri->segment(3) == 'success'){
									$msg = $this->uri->segment(3); 
							?>
								<div class="alert alert-success" role="alert">
	                                 Well done! You successfully new patient detail.
	                            </div>
							<?php }?>
							</div>
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Patient Name  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="hidden" id="p_id" name="p_id" value="" />
										<input type="text" class="form-control" id="p_name" name="p_name" placeholder="Patient Name" required="required" />
									</div>	
								</div>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Gender  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<select class="form-control m-b-sm" id="gender" name="gender" required="required">
											<option value="">-Select Gender-</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Date of Birth  
									</label>
									<div class="col-sm-7">
										<input type="text" name="dob" id="dob" class="form-control date-picker" placeholder="Date of Birth" />
									</div>	
								</div>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Age  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="age" name="age" placeholder="Patient Age" required="required" />
									</div>
								</div>
							</div>
								
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
									Address  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="address" name="address" placeholder="Address" required="required" />
									</div>
								</div>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Mobile Number <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required="required" />
									</div>
								</div>
							</div>	
								
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Patient Weight  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="weight" name="weight" placeholder="Patient Weight" required="required" >
									</div>
								</div>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Blood Pressure Level <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="bp" name="bp" placeholder="Blood Pressure level" required="required" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Common Disease  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<select class="form-control" name="comon" id="comon" required="required">
											<option value="">-Select Disease-</option>
											<?php foreach($val->result() as $row):?>
											<option value="<?php echo $row->id;?>"><?php echo $row->disease_name;?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Consultation Fee (if Applicable)<span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="docFee" name="docFee" placeholder="Consultation Fee"/>
									</div>
								</div>
							</div>
							<!-- 
							<div>
								<div class="col-sm-12">
									<label class="col-sm-2 control-label">
										Basic Treatement <span class="symbol required"></span>
									</label>
									<div class="col-sm-10">
										<textarea class="summernote" id="basic" name="basic"></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-10">
									<label class="col-sm-2 control-label">
										Patient Disease Detail <span class="symbol required"></span>
									</label>
									<div class="col-sm-10">
										<textarea class="form-control summernote" id="pd" name="pd" placeholder="Patient Disease Detail" required="required" >
										</textarea>
									</div>
								</div>
							</div>
							 -->
					</div>
					<div class="form-group">
						<div class="col-sm-2 col-sm-offset-8">
							<button type="submit" class="btn btn-success">
								Save Patient Details
							</button>
						</div>
					</div>
				</div>
			</div>
		<div>
	  </div>
		<!-- end: FORM WIZARD PANEL -->
	</div>				
	</form>
</div>
				