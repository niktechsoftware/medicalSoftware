<div id="main-wrapper" class="container">
					<div class="row">
						<!-- 
						<div class="col-md-4">
							<div class="panel panel-yellow">
								<div class="panel-heading">
									<h3 class="panel-title">Chat List</h3>
								</div>
								<div class="panel-body panel-white">
								
								</div>
							</div>
						</div>
						 -->
						<div class="col-md-12">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" id="chatName1">No one Selected For Vedio Chat...</h3>
                                        <div class="panel-control">
                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Remove"><i class="icon-close" id="closeChatBody"></i></a>
                                        </div>
                                    </div>
                                    <div class="panel-body panel-white" id="chatBody1">
                                        <IFRAME SRC="https://appr.tc/r/<?php echo $this->uri->segment(3);?>" style="border: 0px;" width="100%" height="600"></iframe>
                                    </div>
                                </div>
						</div>
					</div>
					<script src="<?php echo base_url()?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
					<script>
						$("#closeChatBody").click(function(){
							//alert();
							var v = '<img src="<?php echo base_url();?>assets/images/vChat.png"/>';
							$("#chatBody1").html(v);
						});
					</script>
</div><!-- Main Wrapper -->