			<div class="page-sidebar sidebar horizontal-bar">
                <div class="page-sidebar-inner">
                    <ul class="menu accordion-menu">
                        <li class="nav-heading"><span>Navigation</span></li>
                        <li class="active"><a href="<?php echo base_url();?>apanel/"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
                        <li class="droplink">
                        	<a href="#">
                        		<span class="icon icon-users"></span>
                        		<p>&nbsp;&nbsp;&nbsp;Patient</p>
                        		<span class="arrow"></span>
                        	</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>patient/searchNewPatient.jsp">Search/New Patient</a></li>
                                <li><a href="<?php echo base_url();?>patient/patientHistory.jsp">Patient Record</a></li>
                                <li><a href="<?php echo base_url();?>patient/procedure.jsp">Patient Procedure</a></li>
                            </ul>
                        </li>
                        <?php if($this->session->userdata("login_type") != "staff"){ ?>
                        <li><a href="<?php echo base_url();?>apanel/message"><span class="menu-icon icon-envelope-open"></span><p>Mailbox</p><span class="arrow"></span></a></li>
                        <li class="nav-heading"><span>Features</span></li>
                        <?php if($this->session->userdata("login_type") == "admin"):?>
                        <li class="droplink"><a href="#"><span class="menu-icon icon-user"></span><p>Branch</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>apanel/addprofile.jsp">Add New Branch</a></li>
                                <li><a href="<?php echo base_url();?>apanel/branchList.jsp">Branch List</a></li>
                            </ul>
                        </li>
                        <?php endif;?>
                        <li class="droplink"><a href="#"><span class="menu-icon icon-grid"></span><p>Sale</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>home/saleProduct.jsp">Sale Product</a></li>
                                <?php if($this->session->userdata("login_type") != "account"){ ?>
                                <li><a href="<?php echo base_url();?>home/returnProduct.jsp">Return Product</a></li>
                                <li><a href="<?php echo base_url();?>home/editBill.jsp">Edit Bill</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'bill'){?>class="active droplink"<?php } else echo "class='droplink'";?>>
                        	<a href="#">
                        		<span class="fa fa-file-text-o"></span>
                        		<p>&nbsp;&nbsp;&nbsp;Bill</p><span class="arrow"></span>
                        	</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>home/pBillEntry.jsp">Purchase Bill Entry</a></li>
                                <li class="droplink"><a href="#"><p>Bill History</p><span class="arrow"></span></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url();?>home/pBillHistory.jsp">Purchase Bill History</a></li>
                                        <li><a href="<?php echo base_url();?>home/sBillHistory.jsp">Sale Bill History</a></li>
                                        <li><a href="<?php echo base_url();?>home/rBillHistory.jsp">Return Bill History</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li <?php if($this->uri->segment(2) == 'bill'){?>class="active droplink"<?php } else echo "class='droplink'";?>>
                        	<a href="<?php echo base_url();?>apanel/studentRegister.jsp">
                        		<span class="fa fa-cubes"></span>
                        		<p>&nbsp;&nbsp;&nbsp;Product</p>
                        	</a>
                        	<ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>home/enterStock.jsp">Product Entry</a></li>
                                <li><a href="<?php echo base_url();?>home/productDetail.jsp">Product Detail</a></li>
                                <li><a href="<?php echo base_url();?>home/ref.jsp">Refrance Entry</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#"><span class="menu-icon icon-user"></span><p>Disease</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>apanel/newDisease.jsp">New Disease</a></li>
                                <li><a href="<?php echo base_url();?>apanel/diseaseList.jsp">Disease List</a></li>
                            </ul>
                        </li>
                        <?php if($this->session->userdata("login_type") == "admin"):?>
                        <li>
                        	<a href="<?php echo base_url();?>apanel/chat.jsp">
                        		<span class="glyphicon glyphicon-facetime-video"></span>
                        		<p> &nbsp;&nbsp;Vedio Call</p><span class="arrow"></span>
                        	</a>
                        </li>
                        <?php else:?>
                        <li>
							<?php 
								$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
								$chat_id = $this->db->get("chat")->row()->chat_id;
							?>
                        	<a href="<?php echo base_url();?>apanel/chatBranch/<?php echo $chat_id;?>.jsp">
                        		<span class="glyphicon glyphicon-facetime-video"></span>
                        		<p> &nbsp;&nbsp;Vedio Call</p><span class="arrow"></span>
                        	</a>
                        </li>
                        <?php endif;?>
                        <li class="droplink"><a href="#"><span class="menu-icon icon-notebook"></span><p>DayBook</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>dayBook/dailyExpence.jsp">Daily Expence</a></li>
                                <li><a href="<?php echo base_url();?>dayBook/dbook.jsp">DayBook Detail</a></li>
                                <li><a href="<?php echo base_url();?>dayBook/rSaleList.jsp">Refrance Sale List</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <li class="droplink"><a href="#"><span class="menu-icon icon-globe"></span><p>Website</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>web/query.jsp">Query/Contact List</a></li>
                                <li><a href="<?php echo base_url();?>login/logout.jsp">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->