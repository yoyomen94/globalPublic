<!DOCTYPE html>
<html lang="en">

	<head>
		<title><?php if(isset($title)) echo $title; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="description" content="" />
		<meta name="keywords" content="">
		<!-- Favicon icon -->
		<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">

		<!-- vendor css -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>user_assets/css/style.css">

	</head>
	<body class="">
		
		<?php if(isset($header)) echo $header; ?>
		<?php if(isset($middle)) echo $middle; ?>
		<?php if(isset($footer)) echo $footer; ?>
		
		<input type="hidden" id="base_url" value="<?php echo base_url();?>">
		<input type="hidden" id="user" value="<?php echo user;?>">
		
		<script src="<?php echo base_url(); ?>user_assets/js/vendor-all.min.js"></script>
		<script src="<?php echo base_url(); ?>user_assets/js/plugins/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>user_assets/js/ripple.js"></script>
		<script src="<?php echo base_url(); ?>user_assets/js/pcoded.min.js"></script>
		
		<!-- Apex Chart -->
		<script src="<?php echo base_url(); ?>user_assets/js/plugins/apexcharts.min.js"></script>
		<!-- custom-chart js -->
		<script src="<?php echo base_url(); ?>user_assets/js/pages/dashboard-main.js"></script>
		<script src="<?php echo base_url(); ?>user_assets/js/customjs.js"></script>
	</body>
</html>