<form action="<?php echo base_url();?>billC/interBillInfo.jsp"  method ="post" role="form" class="form-horizontal" id="form">
	<div class="row">
		<div class="col-sm-12">
			<!-- start: FORM WIZARD PANEL -->
			<div class="panel panel-white">
				<div class="panel-heading">
					<h4 class="panel-title">Bill  <span class="text-bold">Information</span></h4>
				</div>
				<div class="panel-body">
					<div id="wizard" class="swMain">
					<div>
						<?php 
							if($this->uri->segment(3) == 'success'){
								$msg = $this->uri->segment(3); 
						?>
							<div class="alert alert-success" role="alert">
                                 Well done! You successfully insert purchase bill detail.
                            </div>
						<?php }
							if($this->uri->segment(3) == 'fail'){
						?>
							<div class="alert alert-danger" role="alert">
		                    	<strong>Somthing Going wrong please contact to developer.... Sorry for inconvenience caused...</strong>
		                   	</div>
						<?php }?>
						</div>
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Company Name  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="companyName" name="companyName" required="required" />
								</div>	
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
								Dealer name  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="dealerName" name="dealerName" required="required" />
								</div>
							</div>
						</div>
							
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Bill Number  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="billNumber" name="billNumber" required="required" />
								</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Product Quantity  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="product_quantity" name="product_quantity" required="required" />
								</div>
							</div>
						</div>	
							
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Paid Amount  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="amount_paid" name="amount_paid"  required="required" >
								</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									 Pay Mode <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<select class="form-control" id="payMode" name="payMode"  required="required">
										<option value="cash">Cash</option>
										<option value="OBC">Chaque</option>
									</select>
								</div>
							</div>
						</div>
							
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Balance 
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="balance"  name="balance" >
								</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Total Amount <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="total_prize"  name="total_prize" >
								</div>
							</div>
						</div>
							
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Dealer Mobile 1  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="mobile1" name="mobile1" required="required" >
								</div>
								
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Dealer Mobile 2  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="mobile2" name="mobile2"  >
								</div>
								
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									bill Date  <span class="symbol required">(yyyy-mm-dd)</span>
								</label>
								<div class="col-sm-7">
									<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="billDate" class="form-control date-picker" required="required"/>
								</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									bill Time  <span class="symbol required">(yyyy-mm-dd)</span>
								</label>
								<div class="col-sm-7">
									<input type="time" class="form-control" name="billTime" />
								</div>
							</div>
						</div>
							
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Company Address Or Dealer Address <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="daddress" name="daddress"  >
								</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									By Vehicale  
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="Vehicale" name="Vehicale" />
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Bill Discription  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<textarea  class="form-control" id="discription" name="discription"  ></textarea>
								</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Dealer Or Company Email 
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="demail" name="demail" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-8">
						<button type="submit" class="btn btn-success">
							Save Bill Details
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
			