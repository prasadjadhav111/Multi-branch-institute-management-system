<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo $op; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/assets_client/images/Favicon.ico');?>">
    
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
					<a class="waves-effect" href="<?php echo base_url('super_admin/dashboard');?>"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account-multiple"></i><span>Role Manage</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url()."super_admin/role";?>">Manage Role</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-call-split"></i><span>Branch</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url()."super_admin/add_branch";?>">Add Branch</a></li>
						<li><a href="<?php echo base_url()."super_admin/search_branch";?>">Search Branch</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-book-open-page-variant"></i><span>Manage Course</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url()."super_admin/add_course";?>">Add Course</a></li>
						
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi  mdi-file-document"></i><span>Manage Subject</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url()."super_admin/add_subject";?>">Add Subject</a></li>
						
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-file-cloud"></i><span>Manage Syllabus</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url()."super_admin/add_syllabus";?>">Add Syllabus</a></li>
						
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account"></i><span>Manage User</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url()."super_admin/add_branch_head";?>">Add User</a></li>
						<li><a href="<?php echo base_url()."super_admin/search_branch_head";?>">Search User</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi  mdi-yelp"></i><span>Manage Event</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url()."super_admin/manage_event";?>">Event Calander</a></li>

					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-receipt"></i><span>Reports</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url()."super_admin/branchwise_students";?>">Students Report </a></li>
						<li><a href="<?php echo base_url()."super_admin/branches_report";?>">Branches Report </a></li>
						<li><a href="<?php echo base_url()."super_admin/courses_report";?>">Courses Report </a></li>
						<li><a href="<?php echo base_url()."super_admin/branches_heads_report";?>">Branches Heads Report </a></li>
						<li><a href="<?php echo base_url()."super_admin/branches_faculty_report";?>">Branches Faculties Report </a></li>
						<li><a href="<?php echo base_url()."super_admin/all_events_report";?>">All Events Report </a></li>

						<li><a href="<?php echo base_url()."super_admin/syllabus_report";?>">Syllabus Report </a></li>
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
		<h1 class="page-title"><a href="<?php echo base_url('super_admin/dashboard');?>"><?php if(isset($op)){echo($op);} ?></a></h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<!-- /.ico-item -->
		<div class="ico-item fa fa-arrows-alt js__full_screen"></div>
		<!-- /.ico-item fa fa-fa-arrows-alt -->
		
		<!-- /.ico-item -->
		<div class="ico-item">

			<img src="<?php 
			$img = $this->session->userdata('img');
			echo base_url('uploads/branch_head/').$img;
			?>
			" alt="" class="ico-img">


			<ul class="sub-ico-item">
				<li><a class="js__logout" href="#">Log Out</a></li>
			</ul>
			<!-- /.sub-ico-item -->
		</div>
		<!-- /.ico-item -->
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content">

			<script type="text/javascript">
			$(document).ready(function(){

				$("body").on('click','.confirm',function(){
				
						window.location.href = "<?php echo base_url('login/logout');?>";

														
				});
				
			});
		</script>