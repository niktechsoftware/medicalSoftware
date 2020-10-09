                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-heading clearfix">
                                    <h4 class="panel-title">Manage Expense List</h4>
                                </div>
                            	<div class="panel-body">
                            		<div class="col-md-7">
		                            	<?php if($this->uri->segment(3) == "edit"):?>
		                            	<?php $this->db->where("id",$this->uri->segment(4));?>
		                            	<?php $deta = $this->db->get("batch_time")->row();?>
		                                   <form class="form-horizontal" action="<?php echo base_url()?>apanelForms/editBatch" method="post">
		                                        <div class="form-group">
		                                            <label for="input-Default" class="col-sm-6 control-label"><strong>Name Of Expense Type</strong></label>
		                                            <div class="col-sm-6">
		                                            	<input type="hidden" value="<?php echo $this->uri->segment(4);?>" name="id">
		                                                <input type="text" class="form-control" value="<?php echo $deta->batch_time; ?>" id="input-Default" name="batch">
		                                            </div>
		                                        </div>
		                                         <div class="col-sm-offset-2 col-sm-10">
		                                            <button type="submit" class="btn btn-success">Edit Expense Name</button>
		                                         </div>
		                                    </form>
		                                <?php else:?>
		                                	<form class="form-horizontal" action="<?php echo base_url()?>apanelForms/saveBatch" method="post">
		                                        <div class="form-group">
		                                            <label for="input-Default" class="col-sm-6 control-label"><strong>Name Of Expense Type</strong></label>
		                                            <div class="col-sm-6">
		                                                <input type="text" class="form-control" id="input-Default" name="batch">
		                                            </div>
		                                        </div>
		                                         <div class="col-sm-offset-2 col-sm-10">
		                                            <button type="submit" class="btn btn-success">Save New Expense Name</button>
		                                         </div>
		                                    </form>
		                                <?php endif;?>
									</div>
									<div class="col-md-5">
										<table class="table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Expense Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $i = 1;?>
                                        	<?php $res = $this->db->get("expense")->result();?>
                                        	<?php foreach($res as $row):?>
                                            <tr>
                                                <td>
                                                	<?php echo $i; ?>
                                                </td>
                                                <td><?php echo $row->eName; ?></td>
                                                <td>
                                                	<a href="<?php echo base_url();?>apanel/expenseList/edit/<?php echo $row->id;?>">Edit</a> | 
                                                	<a href="<?php echo base_url();?>apanelForms/deleteBatch/<?php echo $row->id;?>">Delete</a>
                                                </td>
                                            </tr>
                                            <?php $i++;?>
                                            <?php endforeach;?>
                                        </tbody>
                                       </table>  
									</div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->