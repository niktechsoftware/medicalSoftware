<div id="main-wrapper" class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="panel panel-yellow">
								<div class="panel-heading">
									<h3 class="panel-title">Chat List</h3>
								</div>
								<div class="panel-body panel-white">
									<?php
					            		$chatId = 1;
										$this->db->where("is_login",true);
										$a = $this->db->get("chat");
										foreach($a->result() as $row){
											if(($row->clinic_id != $this->session->userdata("clinic_id")) && ($this->session->userdata("login_type") != "account")){
												$this->db->where("clinic_id",$row->clinic_id);
												$val = $this->db->get("general_settings")->row();
									?>
											<div class="row" style="padding:10px;">
												<div class="col-md-12">
													<a href="javascript:void(0);" id="chatClick1<?php echo $chatId;?>">
														<input type="hidden" id="chat1<?php echo $chatId;?>" value="<?php echo $row->chat_id;?>" />
														<input type="hidden" id="name1<?php echo $chatId;?>" value="<?php echo $val->head_name;?>" />
														<input type="hidden" id="image1<?php echo $chatId;?>" value="<?php echo $val->image;?>" />
														<div class="row">
															<div class="col-md-2">
																<img style="width:40px; height: auto; border-radius:50px;" src="<?php echo base_url();?>assets/images/docImg/<?php echo $val->image;?>" alt="<?php echo $val->head_name; ?>">
															</div>
															<div class="col-md-10">
																<span>
																	<?php echo $val->head_name;?><br/>
																	<small><?php echo $val->cilnic_name;?></small>
																</span>
															</div>
														</div>
													</a>
												</div>
											</div>
									<?php
											$chatId++;
											}
										}
									?>
									
									<script>
										<?php for($i = 1;$i< $chatId; $i++){ ?>
											$('#chatClick1<?php echo $i;?>').click(function(){
												var id = jQuery("#chat1<?php echo $i;?>").val();
												var name = jQuery("#name1<?php echo $i;?>").val();
												var chatUrl = '<IFRAME SRC="https://appr.tc/r/'+id+'" style="border: 0px;" width="100%" height="600"></iframe>';
												$("#chatName1").html(name);
												$("#chatBody1").html(chatUrl);
											});
										<?php }?>
									</script>
								</div>
							</div>
						</div>
						<div class="col-md-8">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" id="chatName1">No one Selected For Vedio Chat...</h3>
                                        <div class="panel-control">
                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Remove"><i class="icon-close" id="closeChatBody"></i></a>
                                        </div>
                                    </div>
                                    <div class="panel-body panel-white" id="chatBody1">
                                        <img src="<?php echo base_url();?>assets/images/vChat.png"/>
                                    </div>
                                </div>
						</div>
					</div>
					<script>
						$("#closeChatBody").click(function(){
							//alert();
							var v = '<img src="<?php echo base_url();?>assets/images/vChat.png"/>';
							$("#chatBody1").html(v);
						});
					</script>
</div><!-- Main Wrapper -->