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
                                        <?php 
                                        	$i = 1; foreach($proDetail as $row):
                                        ?>
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
                                        <?php $i++; endforeach;?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
						</div>
					</div>