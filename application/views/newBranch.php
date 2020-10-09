
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo base_url()?>allform/addNewProfile" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Login Type</label>
                                            <div class="col-sm-4">
                                            	<input type="hidden" name="login_type" vlaue="branch">
                                            	 <label class="control-label">Branch</label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Cilnic Name</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="clinic_name" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Address Line 1</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="address_1" required="required">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Address Line 2</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="fname" class="form-control" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">City</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="city" class="form-control" required="required">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">State</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="state" class="form-control" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Area Pin Code</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="pin" class="form-control" required="required">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="phone_number" class="form-control" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Fax Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="fax_number" class="form-control">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Mobile Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="mobile_number" class="form-control date-picker" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email-1</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="email1" class="form-control">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email-2</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="email2" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Head Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="head_name" class="form-control" required="required">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Doctor Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="doctor_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Doctor Name 1</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="doctor_name_1" class="form-control">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Doctor Name 2</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="doctor_name_2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Doctor Name 3</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="doctor_name_3" class="form-control">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Doctor Name 4</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="doctor_name_4" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Browse Your's image (120 KB Max.)</label>
                                            <div class="col-sm-4">
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Browse Clinic Logo (100 KB Max.)</label>
                                            <div class="col-sm-4">
                                                <input type="file" name="logo" class="form-control" />
                                            </div>
                                        </div>
                                        
                                        <hr/>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Choose a User Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="uid" class="form-control">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-4">
                                                <input type="password" name="pass" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                            	<input type="hidden" name="submitType" value="admin">
                                                <button type="submit" class="btn btn-success">Add New Profile Information</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->