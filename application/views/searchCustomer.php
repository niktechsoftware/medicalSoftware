					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                        	<tr>
                                            	<th>#</th>
                                                <th>Customer Id</th>
                                                <th>Customer Name</th>
                                                <th>Address</th>
                                                <th>Mobile Number</th>
                                                <th>Company Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        	$i = 1; foreach($this->customermodel->getAll()->result() as $row):
                                        ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row->c_id;?></td>
                                                <td><?php echo $row->c_name;?></td>
                                                <td><?php echo $row->address;?></td>
                                                <td><?php echo $row->mobile;?></td>
                                                <td><?php echo $row->company_name;?></td>
                                                <td><?php echo $row->email;?></td>
                                                <th><a href="<?php echo base_url();?>customer/deleteCustomer/<?php echo $row->id;?>">Delete</a></th>
                                            </tr>
                                        <?php $i++; endforeach;?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
						</div>
					</div>