<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
        <!-- <section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/courses-banner.jpg');?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Course Details</h1>
                </div>
            </div>
        </section> -->
           <?php
$data1['data']='courses-banner.jpg';
$data1['msg']='Course Details';
 $this->load->view('client/include/banner',$data1);
  ?> 
        <section class="breadcrumb">
            <div class="container">
                <ul>
                     <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('courses'); ?>">All courses</a></li>
                 
                </ul>
            </div>
        </section>
       
<div class="course-details">
            <div class="container">
                <h2><?php echo $data->course_name; ?></h2>
                <div class="course-details-main">
                    <div class="course-img">
         <img src="<?php echo base_url('uploads/course_image/'.$data->course_cover_pic);?>" alt="">
                    </div>
                    <div class="course-info">
                        <div class="course-box">
                            <div class="icon"><i class="fa fa-file"></i></div>
                            <p><?php echo $tot_lessons." Lessons"; ?></p>
                        </div>
                        <div class="course-box">
                            <div class="icon"><i class="fa fa-exclamation"></i></div>
                            <p><?php echo $tot_test." Tests"; ?></p>
                        </div>
                        
                        <div class="course-box">
                            <div class="icon"><i class="fa fa-mortar-board"></i></div>
                            <p><?php echo $tot_student." Students"; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <div class="course-instructorInfo">
                                <div class="info-slide"><i class="fa fa-calendar"></i><?php echo $data->course_duration." ".$data->course_duration_type; ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-row">
                                <div class="price"><span>Fees: </span><?php echo $data->course_fee." Rs";?></div>
                                
                                <?php

                                    if($this->session->userdata('sid')!="" && $flag == 1)
                                    {
                                ?>  
                                    <a href="" class="btn" disabled>Enrolled</a>
                                 <?php
                                      }                                      
                                    else
                                    {
                                ?>
                                    <a href="<?php echo base_url('course/enrollment/'.$data->course_name);?>" class="btn">Enroll Now</a>
                                <?php
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>

            <div class="info">
                    <h4>Course Overview</h4>
                    <?php echo $data->course_des;?>
                </div>

                   <div class="syllabus">
                    <h4>Syllabus</h4>
                    <?php $c=0;foreach($syllabus as $sy)
                    {
                        $c++;
                    ?>
                        <div class="syllabus-box">
                        <div class="syllabus-title">lesson <?php echo $c; ?></div>
                        <div class="syllabus-view">
                            <div class="main-point"><?php echo $sy['subject_name'];?></div>
                            <div class="point-list">
                                <?php echo $sy['syllabus_content'];?>
                                 
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
<!-- <script type="text/javascript">
    
    $(document).ready(function(){

              $.ajax({
                 type:'post',
                 url:'<?php echo base_url();?>client/course_faculty_detail',
                 dataType:'json',
                 data:{cr:cr_nm},
                 success : function(data){
                 }

            });

        });

</script> -->