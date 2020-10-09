				<div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                	<?php if($this->uri->segment(3) == 'false'){?>
                                	<div class="alert alert-danger">
                                		Old Password does not matched... Sorry ;)
                                	</div>
                                	<?php }if($this->uri->segment(3) == 'true'){?>
                                	<div class="alert alert-success">
                                		Password successfuly changed.. Now you can use New Password for login...
                                	</div>
                                	<?php }if($this->uri->segment(3) == 'rFail'){?>
                                	<div class="alert alert-warning">
                                		Re-type Password does not matched...
                                	</div>
                                	<?php } ?>
                                    <form class="form-horizontal" action="<?php echo base_url()?>allform/changePassword" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Old Password</label>
                                            <div class="col-sm-4">
                                                <input type="password" name="oldPass" class="form-control" placeholder="Old Password" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">New Password</label>
                                            <div class="col-sm-4">
                                                <input type="password" name="newPass" class="form-control" placeholder="New Password" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Re-Type Password</label>
                                            <div class="col-sm-4">
                                                <input type="password" name="reTypePass" class="form-control" placeholder="Re-Type Password" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" id="btn1" class="btn btn-success">Change Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
