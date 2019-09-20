<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>LOGIN</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/styles/style.min.css')?>">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="<?php echo base_url('assets/plugin/waves/waves.min.css')?>">

</head>

<body>

<div id="single-wrapper">
	<form action="<?php echo base_url('login/loginMe'); ?>" class="frm-single" method="post">
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
			<div class="title"><strong>ACADEMY</strong></div>
			
			<!-- /.title -->
			<div class="frm-title">Login</div>
			<!-- /.frm-title -->
			<div class="frm-input">
				<input type="text" required name="email" placeholder="Username" class="frm-inp"><i class="fa fa-user frm-ico"></i>
							<div>
								<?php echo form_error('email'); ?>
      						</div>
			</div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" required name="password" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i>
					<div>
								<?php echo form_error('password'); ?>
      						</div>
      					</div>
			<!-- /.frm-input -->
			<div class="clearfix margin-bottom-20">
				<div class="pull-left">
					<!-- <div class="checkbox primary"><input type="checkbox" id="rememberme"><label for="rememberme">Remember me</label>

					</div> -->
					<!-- /.checkbox -->
				</div>
				<!-- /.pull-left -->
				<div class="pull-left"><a href="<?php echo base_url('login/change_password');?>" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div>
				<!-- /.pull-right -->
			</div>
			<!-- /.clearfix -->
			<button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>
			
			<!-- /.row -->
			<div class="frm-footer">Academy © 2018.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
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

	<script src="<?php echo base_url('assets/scripts/main.min.js')?>"></script>
</body>

</html>