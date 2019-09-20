<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo $op;?></title>
	 <style>
    
	#calendar {
		max-width: 1000px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>
<!-- Bootstrap Core CSS -->
	    <link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet">
		
	<!-- FullCalendar -->
	<link href="<?php echo base_url('css/fullcalendar.css');?>"	 rel='stylesheet' />

	<!-- Main Styles -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/styles/style.min.css"; ?>">
	
	<!-- Material Design Icon -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/fonts/material-design/css/materialdesignicons.css";?>">
		<!-- <link href="<?php echo base_url()."css/bootstrap.min.css";?>" rel="stylesheet"> -->
	
<!-- Datepicker -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/plugin/datepicker/css/bootstrap-datepicker.min.css";?>">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css";?>">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/plugin/waves/waves.min.css";?>">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/plugin/sweet-alert/sweetalert.css";?>">
	
	<!-- Percent Circle -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/plugin/percircle/css/percircle.css";?>">
<!-- X-Editable -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/plugin/x-editable/bootstrap3-editable/css/bootstrap-editable.css";?>">

	<!-- Chartist Chart -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/plugin/chart/chartist/chartist.min.css";?>">
	<link rel="stylesheet" href="<?php echo base_url()."assets/plugin/form-wizard/prettify.css";?>">

	
	<!-- Data Tables -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/plugin/datatables/media/css/dataTables.bootstrap.min.css";?>">


<link rel="stylesheet" href="<?php echo base_url()."assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css";?>">


	<!-- Dark Themes -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/styles/style-dark.min.css";?>">

<!-- 	      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 -->

<script src="<?php echo base_url()."assets/scripts/jquery.min.js";?>"></script>
	
</head>

<body>
<div class="main-menu">
	<header class="header">
		<a href="<?php echo base_url('login')?>" class="logo">Institute</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	
			
			  
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<ul class="menu js__accordion">
				<li class="current">
					<a class="waves-effect" href="<?php echo base_url('faculty/dashboard');?>"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
				</li>
				
				
				
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-border-color"></i><span>Add Test</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url()."faculty/add_online_test";?>">Add Online Test</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-help"></i><span>Manage Questions</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url()."faculty/add_questions";?>">Add Questions</a></li>
						<li><a href="<?php echo base_url()."faculty/view_questions";?>">View Questions</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li >
					<a class="waves-effect" href="<?php echo base_url('faculty/view_events');?>"><i class="menu-icon mdi  mdi-yelp"></i><span>View Events</span></a>
				</li>
				<li >
					<a class="waves-effect" href="<?php echo base_url('faculty/assignment');?>"><i class="menu-icon mdi mdi-lead-pencil"></i><span>Assignment</span></a>
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-file-document-box"></i><span>Reports</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url()."faculty/course_report";?>">Courses report</a></li>
						<li><a href="<?php echo base_url()."faculty/syllabus_report";?>">Syllabus report</a></li>
						<li><a href="<?php echo base_url()."faculty/test_report";?>">Test report</a></li>
						<li><a href="<?php echo base_url()."faculty/assignment_report";?>">Assignment report</a></li>
					<li><a href="<?php echo base_url()."faculty/all_events_report";?>">Events report</a></li>


					</ul>
					<!-- /.sub-menu js__content -->
				</li>
			</ul>
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title"><?php if(isset($op)){echo($op);} ?></h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item">
			<a href="#" class="ico-item fa fa-search js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="fa fa-search button-search" type="submit"></button></form>
			<!-- /.searchform -->
		</div>
		<!-- /.ico-item -->
		<div class="ico-item fa fa-arrows-alt js__full_screen"></div>
		<!-- /.ico-item fa fa-fa-arrows-alt -->
		
		<!-- /.ico-item -->
		<div class="ico-item">
		<!-- 	<img src="<?php echo base_url('assets/images/avatar-sm-1.jpg');?>" alt="" class="ico-img"> -->
					<img src="<?php 
			$img = $this->session->userdata('img');
			echo base_url('uploads/branch_faculty/').$img;
			?>
			" alt="" class="ico-img">

			<ul class="sub-ico-item">
								<li><a href="<?php echo base_url('faculty/fac_profile');?>">Profile</a></li>

				 <li><a class="js__logout" href="#">Log Out</a></li>
			</ul>
			<!-- /.sub-ico-item -->
		</div>
		<!-- /.ico-item -->
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<!-- /#message-popup --><!-- 

	<div class="main-content"> -->
		<div id="wrapper">
			<div class="main-content">
			<script type="text/javascript">
			$(document).ready(function(){

				$("body").on('click','.confirm',function(){
				
						window.location.href = "<?php echo base_url('login/logout');?>";

														
				});
				
			});
		</script>