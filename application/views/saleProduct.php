<div id="main-wrapper" class="container" style="width:100%; font-size:12px;">
	<form action="<?php echo base_url();?>product/saleProduct" method ="post">
	<div class="row">
		<div class="col-md-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
			<div class="panel panel-white">
				<div class="panel-body"  >
					<div class="row space20">
						<div class="col-sm-4">
							<label class="col-sm-6 control-label">
								Select Customer<span class="symbol required"></span>
							</label>
							<div class="col-sm-6">
								<select class="form-control" id="types" name="types" style="width: 170px;" required="required">  
									 <option value="" selected="selected">--Select Customer--</option>
									 <option value="Regular">Regular</option>  
									 <option value="Retail">Cash Customer</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<input class="form-control" placeholder="Customer Name" type="text" id="retail" name="retail" style="display: none;"/>
							<input class="form-control" placeholder="Customer ID" type="text" id="regular" name="regular" style="display: none;"/>
						</div>
						<div class="col-sm-4">
							<div class="col-sm-8">
								<select class="form-control" id="ref" name="ref" required="required">  
									 <option value="" selected="selected">--Select Refrance--</option>
									 <?php foreach($ref as $dis):?>
									 <option value="<?php echo $dis->id;?>"><?php echo $dis->name;?></option>
									 <?php endforeach;?>
								</select>
							</div>
							<div class="col-sm-4">
								<input class="form-control" name="dis" id="dis" placeholder="Discount (%)" type="text"/>
							</div>
						</div>
					</div>
					<div class="row space20">
						<div class="col-sm-12" id="reply"></div>
					</div>
					<div class="row" id="rahul23">
						<div class="col-md-12">
						<div class="panel-heading panel-grey">
								Product Information:
						</div>
						<table class="table table-hover">
							<thead>
		                        <tr>
		                           <th>#</th>
		                           <th><label>Name</label></th>
		                            <th><label>Packing</label></th>
		                           <th><label>Batch No.</label></th>
		                           <th><label>Exp.Dt.</label></th>
		                           <th><label>Price/Piece</label></th>
		                           <th><label>Avl.Q.</label></th>
		                           <th><label>Quantity</label></th>
		                           <th><label>Discount (%)</label></th>
		                           <th><label>Discount Rs</label></th>
		                           <th><label>Total</label></th>
		                           <th><label>Sub Total</label></th>
		                           <th><label>Add</label></th>
		                           <th><label>Remove</label></th>
		                        </tr>
		                    </thead>
		                    <tbody>
	                        <?php $i = 1; for($i = 1; $i <= 30; $i++){ ?>
	                        <tr id="row<?php echo $i; ?>">
	                            <td width="40">
	                                <strong><?php echo $i; ?></strong>
	                             </td>
	                            <td>
	                                  <input id="item_name<?php echo $i; ?>" name="item_name<?php echo $i; ?>" style="width:170px;">
	                                  <input type="hidden" id="item_no<?php echo $i; ?>" name="item_no<?php echo $i; ?>"o>
	                            </td>
	                            <td>
	                                  <input id="packing<?php echo $i; ?>" name="packing<?php echo $i; ?>" style="width:70px;">
	                            </td>
	                            <td>
	                                  <input id="batch<?php echo $i; ?>" name="batch<?php echo $i; ?>" style="width:50px;">
	                            </td>
	                             <td>
	                                   <input id="expDt<?php echo $i; ?>" name="expDt<?php echo $i; ?>" style="width:50px;">
	                            </td>
	                            <td>
	                                   <input id="item_price<?php echo $i; ?>" name="item_price<?php echo $i; ?>" style="width:50px;">
	                            </td>
	                            <td>
	                                <input id="avlQ<?php echo $i; ?>" name="avlQ<?php echo $i; ?>" style="width:50px;" type="text"/>
	                            </td>
	                            <td>
	                                <input id="item_quantity<?php echo $i; ?>" name="item_quantity<?php echo $i; ?>" style="width:50px;" type="text"/>
	                            </td>
	                            <td>
	                                <input id="item_discount<?php echo $i; ?>" name="item_discount<?php echo $i; ?>" style="width:50px;" type="text"/>
	                            </td>
	                            <td>
	                                <input id="discount<?php echo $i; ?>" name="discount<?php echo $i; ?>" style="width:50px;" type="text"/>
	                            </td>
	                            <td>
	                                  <input id="total_price<?php echo $i; ?>" name="total_price<?php echo $i; ?>" style="width:70px;" type="text"/>
	                            </td>
	                            <td>
	                                <input id="sub_total<?php echo $i; ?>" name="sub_total<?php echo $i; ?>" style="width:70px;" type="text"/>
	                            </td>
	                            <td>
	                            	<?php if($i != 1 && $i != 2 && $i != 3){?>
	                                <span class="btn btn-success" id="add<?php echo $i;?>">Add</span>
	                                <?php }?>
	                            </td>
	                            <td>
	                            	<?php if($i != 1 && $i != 2 && $i != 3 && $i != 4){?>
	                                <span class="btn btn-danger" id="del<?php echo $i;?>">Del</span>
	                                <?php } ?>
	                            </td>
	                       </tr>
	                       <?php } ?>
	                       <tr>
	                            	<td colspan="3"><strong>Previous Balance</strong></td>
	                                <td colspan="5"><input id="p_balance" name="p_balance" style="width:180px;" type="text"/></td>
	                                <td colspan="5">
	                                	<strong>Remark if any...</strong>
	                                </td>
	                       </tr>
	                       <tr>
	                            	<td colspan="3"><strong>Total</strong></td>
	                                <td colspan="5"><input id="total" name="total" style="width:180px;" type="text" required /></td>
	                                <td rowspan="3" colspan="5">
	                                	<textarea rows="5" cols="20" name="remark" class="form-control"></textarea>
	                                </td>
	                       </tr>
	                       <tr>
	                            	<td colspan="3"><strong>Paid</strong></td>
	                                <td colspan="5"><input id="paid" name="paid" style="width:180px;" type="text" required /></td>
	                       </tr>
	                       <tr>
	                            	<td colspan="3"><strong>Balance</strong></td>
	                                <td colspan="5"><input id="balance" name="balance" style="width:180px;" type="text" /></td>
	                       </tr>
	                      </tbody>
	                  </table>
	                  </div>
	                  <div class="col-md-4">
	                  <b id="dt"></b>
	                    			<input type="submit" name="day_book_detail" value="Save & Print Reciept" class="btn btn-success">
	                    	</div>
	              </div>
										
					</div>
					
				</div>
			</div>
		</div>
	</form>
</div>