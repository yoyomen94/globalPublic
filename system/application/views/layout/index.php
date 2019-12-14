<!DOCTYPE html>
<html lang="en">
<head>
	<!-- PAGE TITLE -->
	<title><?php if(isset($title)){ echo $title; } ?></title>
	<!-- META-DATA -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="" sizes="32x32" type="image/x-icon">
	<meta name="description" content="">
	<meta name="keywords" content="">

	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/themify-icons.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
</head>

<body>

 <?php if(isset($header)) echo $header ;?>
	<?php if(isset($middle)) echo $middle ;?>
 <?php if(isset($footer)) echo $footer ;?>



	<input type="hidden" id="base_url" value="<?php echo base_url();?>">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
	
</body>

</html>