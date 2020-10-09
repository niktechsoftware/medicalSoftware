<form action="<?php echo base_url();?>enterStockController/enterStock.jsp"  method ="post" role="form" class="smart-wizard form-horizontal" id="form">
<div class="row">
	<div class="col-md-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-white">
			<div class="panel-body">
				<div class="alert alert-info">
					<h4 class="center">
						<b>Important Instructions about Enter Stock</b>
					</h4>
					<br>
							This is stock entry area. Here you have to enter Unique Item Number and Item Name, Item category etc.
				</div>
					<?php 
						if($this->uri->segment(3) == 'success'){
					?>
						<div class="alert alert-success" role="alert">
	                    	<strong>Well done! You successfully insert/Update Product.</strong>
	                   	</div>
					<?php }?>
					<?php 
						if($this->uri->segment(3) == 'fail'){
					?>
						<div class="alert alert-danger" role="alert">
	                    	<strong>Somthing Going wrong please contact to developer.... Sorry for inconvenience caused...</strong>
	                   	</div>
					<?php }?>
					<?php 
						if($this->uri->segment(3) == 'falseStock'){
					?>
						<div class="alert alert-danger" role="alert">
	                    	<strong>Item Quantity Can not be less than 1.......</strong>
	                   	</div>
					<?php }?>
				<div id="msg"></div>
				<div class="row">
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">Item Name</div>
							<div class="col-md-7"><input type="text" class="form-control" id="itemName" required="required" name="itemName" placeholder="Item Name"></div>
						</div>
					</div>
					<input type="hidden" class="form-control" id="itemNo" name="itemNo" placeholder="Item No">
					<!--
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">Item No</div>
							<div class="col-md-7"><input type="text" class="form-control"   placeholder="Auto Generated" disabled="disabled" > </div>
						</div>
					</div>
					-->
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">Company Name</div>
							<div class="col-md-7"><input type="text" class="form-control" id="itemCompanyName" name="itemCompanyName" placeholder="Company Name"></div>
						</div>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">Item Size/Power</div>
							<div class="col-md-7"><input type="text" class="form-control" id="itemSize" name="itemSize" placeholder="Item Size/Power"></div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">Purchase Rate/Unit</div>
							<div class="col-md-7"><input type="text" class="form-control" id="pRate" name="pRate" placeholder="Purchase Rate/Unit"></div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">Sale Rate/Unit</div>
							<div class="col-md-7"><input type="text" class="form-control" id="unitPrice" name="unitPrice" placeholder="Sale Rate/Unit"></div>
						</div>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">Batch No</div>
							<div class="col-md-7">
								<input type="text" class="form-control" id="batchNo" name="batchNo" placeholder="Batch Number">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">MFG. Date</div>
							<div class="col-md-7">
								<input type="text" class="form-control date-picker" id="mfgDate" name="mfgDate" required="required" placeholder="Magnify Date">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">EXP. Date</div>
							<div class="col-md-7">
								<input type="text" class="form-control date-picker" id="expDate" required="required" name="expDate" placeholder="Epiry Date">
							</div>
						</div>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">Free</div>
							<div class="col-md-7">
								<input type="text" class="form-control" id="free" name="free" placeholder="Free with this Item">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">Packing</div>
							<div class="col-md-7">
								<input type="text" class="form-control" id="packing" name="packing" placeholder="Packing">
							</div>
						</div>
					</div>
					<!-- 
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">EXP. Date</div>
							<div class="col-md-7">
								<input type="text" class="form-control" id="unitPrice" name="unitPrice" placeholder="Price/Unit">
							</div>
						</div>
					</div>
					 -->
				</div>
				<hr/>
				<div class="row">
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">Item Quantity</div>
							<div class="col-md-7">
								<input type="hidden" value="0" id="itemQuantity1" name="itemQuantity1">
								<input type="text" class="form-control" value="0" id="itemQuantity" name="itemQuantity" placeholder="Item Quantity">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row space15" id="extQ">
							<div class="col-md-5">Extra Quantity</div>
							<div class="col-md-7"><input type="text" class="form-control" value="0" id="extraQuantity" name="extraQuantity" placeholder="Extra Quantity"></div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row space15">
							<div class="col-md-5">Bill Number</div>
							<div class="col-md-7"><input type="text" class="form-control" id="billNumber" name="billNumber" placeholder="Bill Number"></div>
						</div>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-md-4">
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
				<br/><br/>
				</div>
			</div>
		</div>
	</div>
</form>

<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                        	<tr>
                                            	<th>#</th>
												<th>Item No.</th>
												<th>Name</th>
												<th>Company Name</th>
												<th>Size/Power</th>
												<th>Packing</th>
												<th>Price/Unit</th>
												<th>Batch No.</th>
												<th>MFG. Date</th>
												<th>EXP. Date</th>
												<th>Free</th>
												<th>Item Quantity</th>
												<th>Bill Number</th>
												<th>Update Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php $i = 1; foreach($proDetail as $row):?>
											<tr <?php if($row->item_quantity < 16){ echo 'class="alert alert-danger"'; } ?>>
												<td><?php echo $i;?></td>
												<td><?php echo $row->item_no;?></td>
												<td><?php echo $row->name;?></td>
												<td><?php echo $row->company_name;?></td>
												<td><?php echo $row->size_power;?></td>
												<td><?php echo $row->packing;?></td>
												<td><?php echo $row->prize_perunit;?></td>
												<td><?php echo $row->batch_no;?></td>
												<td><?php echo date("d-M-Y",strtotime($row->mf_date));?></td>
												<td><?php echo date("d-M-Y",strtotime($row->exp_date));?></td>
												<td><?php echo $row->free;?></td>
												<td><?php echo $row->item_quantity;?></td>
												<td><?php echo $row->reff_bill_num;?></td>
												<td><?php echo date("d-M-Y",strtotime($row->a_date));?></td>
											</tr>	
											<?php $i++; endforeach; ?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
						</div>
					</div>