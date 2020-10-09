<div id="main-wrapper" class="container">
<div class="row">
	<div class="col-md-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-white">
			<div class="panel-body">
				<div class="row">
					<?php 
						if($isVal){
					?>
					<form action="<?php echo base_url();?>dayBook/editRef.jsp"  method ="post" role="form" class="smart-wizard form-horizontal" id="form">
					<div class="col-md-6">
						<div class="row space15">
							<div class="col-md-5">Refrance Name</div>
							<div class="col-md-7">
								<input type="text" class="form-control" name="name" value="<?php echo $ref->name;?>" placeholder="Refrance Name" required="required">
								<input type="hidden" name="id" value="<?php echo $ref->id;?>">
							</div>
						</div>
						<br/>
						<div class="row space15">
							<div class="col-md-5">Discount Rate (%)</div>
							<div class="col-md-7">
								<input type="text" class="form-control" name="dis" value="<?php echo $ref->dis;?>" placeholder="Discount In %" required="required">
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12">
								<div class="row space15">
									<div class="col-md-5">
										<button type="submit" class="btn btn-success">
											Click to Edit &nbsp;&nbsp;<i class="fa fa-save"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					</form>
					<?php }else{?>
					<form action="<?php echo base_url();?>dayBook/saveRef.jsp"  method ="post" role="form" class="smart-wizard form-horizontal" id="form">
					<div class="col-md-6">
						<div class="row space15">
							<div class="col-md-5">Refrance Name</div>
							<div class="col-md-7">
								<input type="text" class="form-control" name="name" placeholder="Refrance Name" required="required">
							</div>
						</div>
						<br/>
						<div class="row space15">
							<div class="col-md-5">Discount Rate (%)</div>
							<div class="col-md-7">
								<input type="text" class="form-control" name="dis" placeholder="Discount In %" required="required">
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12">
								<div class="row space15">
									<div class="col-md-5">
										<button type="submit" class="btn btn-success">
											Click to Save &nbsp;&nbsp;<i class="fa fa-save"></i>
										</button>
									</div>
									<div class="col-md-7">
										<button type="reset" class="btn btn-success">
											Reset Values &nbsp;&nbsp;<i class="fa fa-refresh"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					</form>
					<?php }?>
					<div class="col-md-6">
						<div class="row space15">
							<div class="col-md-12">
	                            <div class="panel panel-white">
	                                <div class="panel-body">
	                                   <div class="table-responsive">
	                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	                                        <thead>
	                                        	<tr>
	                                            	<th>#</th>
													<th>Refrance Name</th>
													<th>Precentage</th>
													<th>Setting</th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
												<?php $i = 1; foreach($proDetail as $row):?>
												<tr>
													<td><?php echo $i;?></td>
													<td><?php echo $row->name;?></td>
													<td><?php echo $row->dis;?> %</td>
													<td>
														<a href="<?php echo base_url();?>home/ref/<?php echo $row->id;?>.jsp" class="btn btn-success">Edit</a>
														<a href="<?php echo base_url();?>dayBook/delRef/<?php echo $row->id;?>.jsp" class="btn btn-danger">Delete</a>
													</td>
												</tr>	
												<?php $i++; endforeach; ?>
	                                        </tbody>
	                                       </table>  
	                                    </div>
	                                </div>
	                            </div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>