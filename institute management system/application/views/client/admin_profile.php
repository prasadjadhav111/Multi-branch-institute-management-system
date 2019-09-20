<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
 <!-- <section class="banner inner-page">
        	<div class="banner-img"><img src="images/banner/instructor-profile.jpg" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>instructor Profile</h1>
                </div>
            </div>
        </section> -->
           <?php
$data1['data']='instructor-profile.jpg';
$data1['msg']='instructor Profile';
 $this->load->view('client/include/banner',$data1);
  ?> 
        <section class="breadcrumb">
        	<div class="container">
            	<ul>
                	<li><a href="index.html">Home</a></li>
                    <li><a href="instructors.html">Users</a></li>
                    <li><a href="instructor-profile.html">instructor Profile</a></li>
                </ul>
            </div>
        </section>
        <section class="teacher-profile">
        	<div class="container">
        		 <?php 
                foreach($ad as $c)
                {
                    ?>
            	<div class="teacher-name">
                	<h3><?php echo $c['master_admin_name']; ?></h3>
                    <span><?php echo "Admin" ?></span>
                </div>
                <div class="row">
                	<div class="col-md-8">
                    	<div class="img"><img src="<?php echo base_url('uploads/branch_head/'.$c['master_admin_image']);?>" alt=""  style="width: 500px;height: 500px"></div>
                        
                    </div>
                    <div class="col-md-4">
                    	<div class="profile-details">
                        	<h4>Profile details</h4>
                            <div class="details-slide">
                            	<span>Job:</span>
                                <p>As a Admin</p>
                            </div>
                            <div class="details-slide">
                            	<span>Branch:</span>
                                <p><?php echo $c['branch_name']; ?></p>
                            </div>
                            <div class="details-slide">
                            	<span>Experience:</span>
                                <p><?php echo date("Y")-substr($c['master_admin_join_date'],6,10)." Years Experiance"; ?></p>
                            </div>
                            <div class="details-slide">
                            	<span>Phone:</span>
                                <p><?php echo $c['master_admin_contact']; ?></p>
                            </div>
                            <div class="details-slide">
                            	<span>E-mail:</span>
                                <p><?php echo $c['master_admin_email']; ?></p>
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