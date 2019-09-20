<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
        <!-- <section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/cart.jpg');?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Enroll</h1>
                </div>
            </div>
        </section> -->
                 <?php
$data1['data']='cart.jpg';
$data1['msg']='Enroll';
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
         <section class="checkout-content">
            <div class="container">
<div class="step-box">
                    <div class="title"><span>Your Details</span> <div class="title-data"></div></div>
                    <div class="step1 step-content">
                         <form method="post" id="user_form" data-toggle="validator" action="<?php echo base_url('course/payment-processing');?>">  
                        <div class="login-info">
                            <div class="only-email">
                                    <div class="form-group">
                             <div class="select-box">
                                     <label>Branch</label>
                                        <select class="order-select" name="branch" required>
                                            <option value="">Select Branch</option>
                                            <?php 
                                                foreach ($branch as $b) {
                                                ?>
                                                <option value="<?php echo $b['branch_id']; ?>"><?php echo $b['branch_name']; ?></option>
                                                <?php 
                                                }
                                            ?>
                                            
                                        </select>
                                          <div class="help-block with-errors"></div>

                                           
                               </div>
                           </div>
                                <div class="input-box">
                                    <label>Course</label>
                                    <input type="text" name="productinfo" value="<?php echo $cname; ?>" readonly>
                                </div>
                              
        
                                <div class="input-box moblieInput">
                                    <div class="form-group">
                                            <label>Mobile Number</label>

                                            <?php if(isset($student->mobile))
                                            {
                                            ?>
                                            <input type="text" name="phone" minlength=10 value="<?php echo $student->mobile; ?>" required>
                                            <div class="defautl-digits">+91</div>
                                            <div class="help-block with-errors"></div>

                                            <?php 
                                            }
                                            else
                                            {
                                            ?> 
                                            <input type="text" name="mobile" minlength=10 required>
                                            <div class="defautl-digits">+91</div>
                                             <div class="help-block with-errors"></div>
                                            <?php
                                            }
                                            ?>

                                            
                                        </div>
                                            </div>

                                
                                
                               
                            </div>
                        </div>
                        <div class="social-login">
                            <div class="input-box">
                                    <label>Email</label>
                                    <input type="text" name="email" value="<?php echo $student->email; ?>">
                                </div>
                           <div class="input-box">
                                            <label>Name</label>
                                            <input type="text" name="first_name" value="<?php echo $student->first_name?>">
                                        </div>
                                <div class="input-box">


                               <div class="note">We will send order details to this email address</div>
                       
                            
                      
                        </div>

                           <div class="submit-box">
                                        <!--  <input type="submit" value="" class="btn">
                       -->
                       <button type="submit">
            <img src="<?php echo base_url('assets/images/logo/213.png'); ?>" height="50" width="300">
                     
                        </button>
                                </div>
                    </div>
 </div>
</div>
</section>
<?php $this->load->view('client/include/footer'); ?>