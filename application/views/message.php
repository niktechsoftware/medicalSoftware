            <div class="page-inner">
                <div id="main-wrapper" class="container">
                    <div class="row m-t-md">
                        <div class="col-md-12">
                            <div class="row mailbox-header">
                                <div class="col-md-2">
                                    <button class="btn btn-success btn-block" id="compose">Compose</button>
                                </div>
                                <div class="col-md-6">
                                    <h2 id="actionName">Inbox</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <ul class="list-unstyled mailbox-nav">
                                <li class="active" id="in">
                                	<a href="#" id="inbox">
                                		<i class="fa fa-inbox"></i>Inbox 
                                		<span class="badge badge-success pull-right">
                                			<?php 
                                				$this->db->where("reciever_id",$this->session->userdata("username"));
                                				$this->db->where("open",'n');
                                				echo $this->db->get("message")->num_rows();
                                			?>
                                		</span>
                                	</a>
                                </li>
                                <li class="" id="st"><a href="#" id="sent"><i class="fa fa-sign-out"></i>Sent</a></li>
                                <li><a href="#" id="spam"><i class="fa fa-exclamation-circle"></i>Spam</a></li>
                                <li><a href="#" id="trash"><i class="fa fa-trash"></i>Trash</a></li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <div class="panel panel-white" id="msgBody">
                            	<!-- ------------------------------------------------------ Content Here -------------------------- -->
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <div class="container">
                        <p class="no-s">2015 &copy; Pain Clinic Group</p>
                    </div>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->