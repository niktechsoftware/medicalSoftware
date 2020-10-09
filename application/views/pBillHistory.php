					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                        	<tr>
                                            	<th>#</th>
                                                <th>Dealer Name</th>
                                                <th>Company Name</th>
                                                <th>Mobile</th>
                                                <th>Bill Number</th>
                                                <th>Product Quantity</th>
                                                <th>Total Amount</th>
                                                <th>Smount Paid</th>
                                                <th>Balance</th>
                                                <th>Pay Mode</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        	$i = 1; foreach($pBillInfo as $row):
                                        ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row->product_delar_name;?></td>
                                                <td><?php echo $row->product_company_name;?></td>
                                                <td><?php echo $row->dealar_mobile1;?></td>
                                                <td><?php echo $row->reff_bil_num;?></td>
                                                <td><?php echo $row->product_quantity;?></td>
                                                <td><?php echo $row->total_prize;?></td>
                                                <td><?php echo $row->amount_paid;?></td>
                                                <td><?php echo $row->balance?></td>
                                                <td><?php echo $row->pay_mode;?></td>
                                                <td><?php echo date("d-M-Y",strtotime($row->date1));?></td>
                                            </tr>
                                        <?php $i++; endforeach;?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
						</div>
					</div>