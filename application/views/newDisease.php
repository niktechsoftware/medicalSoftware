                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-heading clearfix">
                                    <h4 class="panel-title">Manage Disease</h4>
                                </div>
                            	<div class="panel-body">
                            		<div class="row">
	                            		<div class="col-md-12">
			                            	<?php if($this->uri->segment(3) == "edit"):?>
			                            	<?php $this->db->where("id",$this->uri->segment(4));?>
			                            	<?php $deta = $this->db->get("disease")->row();?>
			                                   <form class="form-horizontal" action="<?php echo base_url()?>allform/editDisease" method="post">
			                                        <div class="form-group">
			                                            <label for="input-Default" class="col-sm-3 control-label"><strong>Disease Name</strong></label>
			                                            <div class="col-sm-9">
			                                            	<input type="hidden" value="<?php echo $this->uri->segment(4);?>" name="id">
			                                                <input type="text" class="form-control" value="<?php echo $deta->disease_name; ?>" id="input-Default" name="disease">
			                                            </div>
			                                        </div>
			                                        <div class="form-group">
			                                            <label for="input-Default" class="col-sm-3 control-label"><strong>Basic Treatment</strong></label>
			                                            <div class="col-sm-9">
			                                            	<textarea class="form-control summernote" id="input-Default" name="treatment">
			                                            		<?php echo $deta->basic_treatment; ?>
			                                            	</textarea>
			                                            </div>
			                                        </div>
			                                         <div class="col-sm-offset-2 col-sm-10">
			                                            <button type="submit" class="btn btn-success">Edit Disease</button>
			                                         </div>
			                                    </form>
			                                <?php else:?>
			                                	<form class="form-horizontal" action="<?php echo base_url()?>allform/saveDisease" method="post">
			                                        <div class="form-group">
			                                            <label for="input-Default" class="col-sm-3 control-label"><strong>Disease</strong></label>
			                                            <div class="col-sm-9">
			                                                <input type="text" class="form-control" id="input-Default" name="disease">
			                                            </div>
			                                        </div>
			                                        <div class="form-group">
			                                            <label for="input-Default" class="col-sm-3 control-label"><strong>Basic Treatment</strong></label>
			                                            <div class="col-sm-9">
			                                                <textarea class="form-control summernote" id="input-Default" name="treatment"></textarea>
			                                            </div>
			                                        </div>
			                                         <div class="col-sm-offset-2 col-sm-10">
			                                            <button type="submit" class="btn btn-success">Save Disease</button>
			                                         </div>
			                                    </form>
			                                <?php endif;?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12"><hr/></div>
										<div class="col-md-12">
											<table class="table" style="width: 100%; cellspacing: 0;">
	                                        <thead>
	                                            <tr>
	                                                <th>#</th>
	                                                <th>Disease</th>
	                                                <th>Treatment</th>
	                                                <th>Action</th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                        	<?php $i = 1;?>
	                                        	<?php $res = $this->disease->getAll()->result();?>
	                                        	<?php foreach($res as $row):?>
	                                            <tr>
	                                                <td>
	                                                	<?php echo $i; ?>
	                                                </td>
	                                                <td><?php echo $row->disease_name; ?></td>
	                                                <td><?php echo $row->basic_treatment; ?></td>
	                                                <td>
	                                                	<a href="<?php echo base_url();?>apanel/newDisease/edit/<?php echo $row->id;?>">Edit</a> | 
	                                                	<a href="<?php echo base_url();?>allform/deleteDisease/<?php echo $row->id;?>">Delete</a>
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
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->