 		<script src="<?php echo base_url()?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/pace-master/pace.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/switchery/switchery.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/classie/classie.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/waves/waves.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/summernote-master/summernote.min.js"></script>
        
        <!--  List Table Js -->
        
        <script src="<?php echo base_url()?>assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <!--  List End -->
        
        <script src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="<?php echo base_url()?>assets/js/modern.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/pages/form-elements.js"></script>
        
<script>
	jQuery(document).ready(function() {
		$("#extQ").hide();
		$("#itemNo").keyup(function(){
			var itemNo = $("#itemNo").val();
			//alert(itemNo);
			$.post("<?php echo site_url("ajaxSale/checkStock") ?>",{itemNo : itemNo}, function(data){
				var d = jQuery.parseJSON(data);
				$("#msg").html(d.msg);
				if(d.itemName.length > 0){
					$("#itemName").val(d.itemName);
				}
				$("#itemCompanyName").val(d.company_name);
				$("#discription").val(d.discription);
				$("#packing").val(d.packing);
				$("#itemSize").val(d.size_power);
				$("#unitPrice").val(d.prize_perunit);
				$("#pRate").val(d.pRate);
				$("#batchNo").val(d.batch_no);
				$("#mfgDate").val(d.mf_date);
				$("#expDate").val(d.exp_date);
				$("#free").val(d.free);
				$("#itemQuantity").val(d.item_quantity);
				$("#extraQuantity").val(d.extraQuantity);
				$("#billNumber").val(d.reff_bill_num);
				if(d.item_quantity > 0){
					$("#extQ").show();
					$("#itemQuantity").setAttribute();
				}else{
					$("#extQ").hide();
				}
			});
			
		});

		$( "#itemName" ).autocomplete({
	    	source: '<?php echo site_url("ajaxSale/getEnterStockData/?");?>',
	    	close: function(){
				var name = $("#itemName").val();
				$.post("<?php echo site_url("ajaxSale/checkStockByName") ?>",{name : name}, function(data){
					var d = jQuery.parseJSON(data);
					$("#msg").html(d.msg);
					$("#itemNo").val(d.itemNo);
					$("#itemCompanyName").val(d.company_name);
					$("#discription").val(d.discription);
					$("#packing").val(d.packing);
					$("#itemSize").val(d.size_power);
					$("#unitPrice").val(d.prize_perunit);
					$("#pRate").val(d.pRate);
					$("#batchNo").val(d.batch_no);
					$("#mfgDate").val(d.mf_date);
					$("#expDate").val(d.exp_date);
					$("#free").val(d.free);
					$("#itemQuantity").val(d.item_quantity);
					$("#extraQuantity").val(d.extraQuantity);
					$("#billNumber").val(d.reff_bill_num);
					if(d.item_quantity > 0){
						$("#extQ").show();
						$("#itemQuantity").setAttribute();
					}else{
						$("#extQ").hide();
					}
				});
			}
	    });
	});
</script>