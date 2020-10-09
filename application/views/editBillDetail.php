<div id="main-wrapper" class="container" style="width:100%; font-size:12px;">
	<form action="<?php echo base_url();?>product/editBill"  method ="post" role="form" class="smart-wizard form-horizontal" id="form">
	<div class="row">
		<div class="col-md-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
			<div class="panel panel-white">
				<div class="panel-body">
					<div class="row space20">
						<div class="col-sm-12" id="reply">
							<?php 
								$data['isReguler'] = true;
								$data['isReturn'] = false;
								$data['cDetail'] = $cDetail;
								$this->load->view("ajax/billCustomerDetail",$data);
							?>
						</div>
					</div>
					<div class="row" id="rahul23">
						<div class="col-md-12">
						<div class="panel-heading panel-grey">
								Product Information:
								<input type="hidden" name="billNo" value="<?php echo $billNo;?>">
						</div>
						<table class="table table-hover">
							<thead>
		                        <tr>
		                           <th>#</th>
		                           <th><label>Item No</label></th>
		                           <th><label>Item Name</label></th>
		                           <th><label>Item Company Name</label></th>
		                           <th><label>Item Size</label></th>
		                           <th><label>Price/Piece</label></th>
		                           <th><label>Item Quantity</label></th>
		                           <th><label>Discount (%)</label></th>
		                           <th><label>Discount Rs</label></th>
		                           <th><label>Total Price</label></th>
		                           <th><label>Sub Total</label></th>
		                           <th><label>Add</label></th>
		                           <th><label>Remove</label></th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    <?php 
		                    	$i = 1; 
		                    	foreach($billDetail->result() as $row){
		                    		$this->db->where("item_no",$row->product_id);
		                    		$val = $this->db->get("enter_stock")->row();
		                    ?>
	                        <tr id="row<?php echo $i; ?>">
	                            <td width="40">
	                                <strong><?php echo $i; ?></strong>
	                             </td>
	                             <td>
									  <input id="item_no<?php echo $i; ?>" name="item_no<?php echo $i; ?>" value="<?php echo $row->product_id;?>" style="width:70px;">
	                            </td>
	                            <td>
	                                  <input id="item_name<?php echo $i; ?>" name="item_name<?php echo $i; ?>" value="<?php echo $val->name?>" style="width:70px;">
	                            </td>
	                            <td>
	                                  <input id="item_comp<?php echo $i; ?>" name="item_comp<?php echo $i; ?>" value="<?php echo $row->company_name;?>" style="width:70px;">
	                            </td>
	                            <td>
	                                  <input id="item_size<?php echo $i; ?>" name="item_size<?php echo $i; ?>" value="<?php echo $val->size_power;?>" style="width:50px;">
	                            </td>
	                            <td>
	                                   <input id="item_price<?php echo $i; ?>" name="item_price<?php echo $i; ?>" value="<?php echo $row->prise_per_pro;?>" style="width:50px;">
	                            </td>
	                            <td>
	                            	<input type="hidden" name="old_item_quantity<?php echo $i; ?>" value="<?php echo $row->product_quantity;?>">
	                                <input id="item_quantity<?php echo $i; ?>" name="item_quantity<?php echo $i; ?>" value="<?php echo $row->product_quantity;?>" style="width:50px;" type="text"/>
	                            </td>
	                            <td>
	                                <input id="item_discount<?php echo $i; ?>" name="item_discount<?php echo $i; ?>" value="<?php echo $row->discount;?>" style="width:50px;" type="text"/>
	                            </td>
	                            <td>
	                                <input id="discount<?php echo $i; ?>" name="discount<?php echo $i; ?>" value="<?php echo $row->discount_rate;?>" style="width:50px;" type="text"/>
	                            </td>
	                            <td>
	                                  <input id="total_price<?php echo $i; ?>" name="total_price<?php echo $i; ?>" value="<?php echo $row->total;?>" style="width:70px;" type="text"/>
	                            </td>
	                            <td>
	                                <input id="sub_total<?php echo $i; ?>" name="sub_total<?php echo $i; ?>" value="<?php echo $row->sub_total;?>" style="width:70px;" type="text"/>
	                            </td>
	                       </tr>
	                       <?php $j = $i++; } ?>
	                        <?php for($i = $rows; $i <= 30; $i++){ ?>
	                        <tr id="row<?php echo $i; ?>">
	                            <td width="40">
	                                <strong><?php echo $i; ?></strong>
	                             </td>
	                             <td>
									  <input id="item_no<?php echo $i; ?>" name="item_no<?php echo $i; ?>" style="width:70px;">
	                            </td>
	                            <td>
	                                  <input id="item_name<?php echo $i; ?>" name="item_name<?php echo $i; ?>" style="width:70px;">
	                            </td>
	                            <td>
	                                  <input id="item_comp<?php echo $i; ?>" name="item_comp<?php echo $i; ?>" style="width:70px;">
	                            </td>
	                            <td>
	                                  <input id="item_size<?php echo $i; ?>" name="item_size<?php echo $i; ?>" style="width:50px;">
	                            </td>
	                            <td>
	                                   <input id="item_price<?php echo $i; ?>" name="item_price<?php echo $i; ?>" style="width:50px;">
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
	                            	<?php if($i >= $rows){?>
	                                <span class="btn btn-success" id="add<?php echo $i;?>">Add</span>
	                                <?php }?>
	                            </td>
	                            <td>
	                            	<?php if($i > $rows){?>
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
	                            	<td colspan="3"><strong>Return Amount</strong></td>
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