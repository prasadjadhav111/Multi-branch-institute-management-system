<?php $this->load->view('client/include/header'); ?>

<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
 <!-- <section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/courses-banner.jpg');?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>My Courses</h1>
                </div>
            </div>
        </section> -->
                 <?php
$data1['data']='courses-banner.jpg';
$data1['msg']='My Courses';
 $this->load->view('client/include/banner',$data1);
  ?>
        <section class="breadcrumb">
        	<div class="container">
            	<ul>
                	<li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('student/dashboard'); ?>">My Courses</a></li>
                </ul>
            </div>
        </section>
         <div class="user-dashboard">
        	<div class="container">
            	<div class="section-title">
                	<h2>My Courses</h2>
                </div>
                <div class="archived-course">
                	
                    <?php 
                    		foreach ($data as  $value) {
                 	?>
                    <div class="course-list">
                    	<div class="img">
                        	<img src="<?php echo base_url('uploads/course_image/'.$value[0]['course_display_pic']);?>" alt="">
                        </div>
                        <div class="info">
                        	<div class="name"><?php echo $value[0]['course_name']; ?></div>
                            <div class="date"><?php echo $value[0]['course_duration']." ".$value[0]['course_duration_type']; ?></div>
                            <p><?php echo $value[0]['course_des']; ?></p>
                            
                            <div class="btn-block">
                            
                                <a href="<?php echo base_url('online-test/').$value[0]['course_name']; ?>" class="btn">Course Tests</a>
                                <a href="<?php echo base_url('courses/').$value[0]['course_name']; ?>" class="btn">About Course</a>
                                
                            </div>
                        </div>
                    </div>
                   
                   <?php
                    		}
                    ?>
                    
                </div>
            </div>
        </div>
       
 <?php $this->load->view('client/include/footer'); ?>
