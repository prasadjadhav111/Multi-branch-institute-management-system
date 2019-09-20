<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/loader'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
<?php
$data1['data']='banner-img1.jpg';
$data1['msg']='Welcome';
 $this->load->view('client/include/banner',$data1);
  ?>
  <section class="our-course">
        	<div class="container">
            	<div class="section-title">
                	<h2>Popular Courses</h2>
                </div>
            	<div class="row">
                	<?php 
                foreach($data as $c)
                {
                    ?>
                    <div class="col-md-4 col-sm-6">
                    	<div class="course-box">
                        	<div class="img">
                            	<img src="<?php echo base_url('uploads/course_image/'.$c['course_display_pic']);?>" alt="" style="height: 300px;">
                                <div class="course-info">
                                	<div class="date"><i class="fa fa-calendar"></i><?php echo $c['course_duration']." ".$c['course_duration_type']; ?></div>
                                  
                                </div>
                                <div class="price"><?php echo $c['course_fee']; ?></div>
                           	</div>
                            <div class="course-name" align="center"><?php echo $c['course_name']; ?></div>
                            <div class="comment-row">
                            	
                                <div class="box"><i class="fa fa-users"></i><?php echo $c['students']." Students"; ?></div>
                                <div class="enroll-btn">	
                                	<a href="<?php echo base_url('client/course_details/'.$c['course_name']);?>" class="btn">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                         <?php 
                }
                ?>
                </div>
            </div>
 </section>



 <section class="our-team">
        	<div class="section-title">
            	<h2>Branch Heads</h2>
            </div>
            <div class="member-slider">	
            	<?php 
                foreach($ad as $c)
                {
                    ?>
                <div class="item">
                	<div class="member-info">
                    	<div class="teacher-box">
                            <div class="img">
                                <img src="<?php echo base_url('uploads/branch_Head/'.$c['master_admin_image']);?>" alt="">
                            </div>
                            <div class="info">
                                <div class="name"><a href="<?php echo base_url('client/admin_profile/'.$c['master_admin_id']);?>"><?php echo $c['master_admin_name']; ?></a></div>
                                <div class="designation"><?php echo $c['branch_name']; ?></div>
                                <div class="designation"><?php echo date("Y")-substr($c['master_admin_join_date'],6,10)." Years with Institute "; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                 ?>
            </div>
        </section>
       
       
<?php $this->load->view('client/include/footer'); ?>

      
<script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip("show");
    $('[data-toggle="tooltip"]').find(".tooltip.fade.top").removeClass("in");
 });
</script>