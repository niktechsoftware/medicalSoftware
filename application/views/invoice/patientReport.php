<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>PATIENT SLIP</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
	<style type="text/css">
		body { font: 14px/1.4 Arial, Helvetica, sans-serif; font-weight: bold; }
	</style>
</head>

<body>
	
	<div id="page-wrap">
		<div id="customer" style="padding: 30px;">
		<table style="width: 100%" id="headerP" class="non-printable">
			<tr>
				<td width="10%" style="border: none;">
					<!-- 
					<img src="<?php echo base_url();?>assets/images/empImage/<?php echo $this->session->userdata("photo");?>" alt="" width="100" />
					 -->
					 <br/>
				</td>
				<td style="border: none;">
					<h1 align="center" style="text-transform:uppercase;"><?php echo $info->cilnic_name; ?></h1>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo $info->address_1; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php if(strlen($info->phone_number > 0 )){echo "Phone : ".$info->phone_number.", ";} ?>
			            <?php echo "Mobile : ".$info->mobile_number; ?>
			        </h3>
				</td>
			</tr>
		</table>
			<div class="printcontent" >
					<table width="100%">
						<tr>
							<td width="28%">&nbsp;</td>
							<td width="17%">&nbsp;</td>
							<td width="25%">&nbsp;</td>
							<td width="25%" align="right">&nbsp;</td>
						</tr>
						<tr>
							<td width="28%" colspan="2">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo $p_info->p_name;?>
							</td>
							<td width="25%" align="center">
								<?php 
		                    		$pieces = explode(",", $p_info->age);
									$age = $pieces[0];
								?>
								<?php echo $p_info->gender."&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;".$age;?>
							</td>
							<td width="25%" align="right">&nbsp;</td>
						</tr>
						<tr>
							<td width="28%" colspan="4">
								&nbsp;&nbsp;&nbsp;&nbsp;
								<br/>
								<?php echo $p_info->address;?>
							</td>
						</tr>
						<tr>
							<td width="28%">&nbsp;</td>
							<td width="17%">&nbsp;</td>
							<td width="25%">&nbsp;</td>
							<td width="25%" align="right">&nbsp;</td>
						</tr>
						<tr>
							<td width="28%">&nbsp;</td>
							<td width="17%" colspan="2" align="center"><strong>Patient ID : </strong><?php echo $p_info->patient_id;?></td>
							<td width="25%" align="right"><?php echo date("d-M-Y H:i:s");?></td>
						</tr>
						<tr>
							<td width="28%">&nbsp;</td>
							<td width="17%" colspan="2" align="center"><strong>Mobile Number : </strong><?php echo $p_info->mobile;?></td>
							<td width="25%" align="right">&nbsp;</td>
						</tr>
					</table>
		       </div>
			</div>
		</div>
	<div class="invoice-buttons non-printable" align="center">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Latterhead
        </button>
        <button id="plain" class="btn btn-default margin-right" type="button" >
        	<i class="fa fa-print padding-right-sm"></i> Print Plain Paper
        </button>
    </div>
    
    <script>
		jQuery(document).ready(function(){
			$("#plain").click(function(){
				$("#customer").css("padding-top", "0px");
				$("#headerP").attr('class', 'printcontent');
				window.print();
			});
		});
    </script>
    
    
</body>

</html>