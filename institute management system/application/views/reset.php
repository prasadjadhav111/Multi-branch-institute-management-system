<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.ninjateam.org/html/zeiss/dark/page-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Feb 2018 10:53:08 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>RESET</title>
<link rel="stylesheet" href="<?php echo base_url('assets/styles/style.min.css')?>">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="<?php echo base_url('assets/plugin/waves/waves.min.css')?>">

</head>

<body>

<div id="single-wrapper">

	<form action="<?php echo base_url('login/reset');?>" data-toggle="validator"  method="post" class="frm-single">
		<div class="inside">

<?php if($fedback=$this->session->flashdata('feedback')):
		$fc=$this->session->flashdata('feedback_c');
?>
     <div class="row">
    
    <div class="alert alert-dismissible <?= $fc; ?>">
      <b><?= $fedback; ?></b>
   
  </div>
</div>
<?php endif; ?>
			<div class="title"><strong>Academy</strong></div>
			<!-- /.title -->
			<div class="frm-title">Reset Password</div>



			<!-- /.frm-title -->
			
			<div class="form-group">
				<input type="password"  placeholder="Enter Password"  id="inputPassword" class="form-control" required>
 <div class="help-block with-errors"></div>
			</div>


			<div class="form-group">
				<input type="password" name="password" placeholder="Enter Conform Password" data-match="#inputPassword" class="form-control" required>

   <div class="help-block with-errors"></div>
			</div>
						<!-- /.frm-input -->
			<button type="submit" class="frm-submit btn">Reset<i class="fa fa-arrow-circle-right"></i></button>
		</form>
		
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	
		<script src="<?php echo base_url('assets/scripts/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/scripts/modernizr.min.js')?>"></script>
	<script src="<?php echo base_url('assets/plugin/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/plugin/nprogress/nprogress.js')?>"></script>
	<script src="<?php echo base_url('assets/plugin/waves/waves.min.js')?>"></script>
	<script src="<?php echo base_url('assets/plugin/validator/validator.min.js')?>"></script>
	
	<script src="<?php echo base_url('assets/scripts/main.min.js')?>"></script>
</body>


<!-- Mirrored from demo.ninjateam.org/html/zeiss/dark/page-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Feb 2018 10:53:08 GMT -->
</html>