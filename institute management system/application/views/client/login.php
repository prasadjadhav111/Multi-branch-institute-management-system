<?php $this->load->view('client/include/header'); ?>

<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>

 <!-- <section class="banner inner-page">
            <div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/register-bannerImg.jpg');?>" alt=""></div>
            <div class="page-title">    
                <div class="container">
                    <h1>Login</h1>
                </div>
            </div>
        </section> -->
        <?php
$data1['data']='register-bannerImg.jpg';
$data1['msg']='Login';
 $this->load->view('client/include/banner',$data1);
  ?>
            <section class="breadcrumb">
            
        </section>


         <section class="login-view">
            <div class="container">
                 <?php if($fedback=$this->session->flashdata('feedback1')):
                    $fc=$this->session->flashdata('feedback_c1');
            ?>
   <div class="message-line <?php echo $fc; ?>">
   <b><?= $fedback; ?></b>
    </div>
  <?php endif; ?>
    
                <div class="row">
                    <div class="col-sm-8">
                        <div class="section-title">
                            <h2>Login</h2>
                            <p>Login to your account below</p>
                        </div>
            <form method="post" id="user_form" data-toggle="validator" action="<?php echo base_url('student/login');?>">  
                        <div class="form-group">
                        <div class="input-box">
                        
                                <label for="inputEmail" class="control-label">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email"  required>
                            
                            <div class="help-block with-errors"></div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="input-box">
                            <input type="Password" data-minlength="6"   name="password" placeholder="Password" required>
                              <div class="help-block with-errors"></div>
                        </div>
                    </div>
                        <div class="check-slide">
                       
                            <div class="right-link">
                                <a href="<?php echo base_url('student/change-password');?>">Lost Password? </a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="<?php echo base_url('student/signup');?>">Register now - Completely free </a>
                            </div>
                        </div>
                        <div class="submit-slide">
                            <input type="submit" value="Login" class="btn">
                            
                        </div>
                    </form>
                    </div>

                    <div class="col-sm-4">
                    
                    
                      <div class="sosiyal-login">
                    <div class="row">
                      
                      <div class="section-title">
                            <h2>Login With</h2>
                           
                    </div>
                </div>
                    <div class="row">
                      
                        <div class="col-sm-12 col-md-12">
                            <a href="<?php echo $loginURL; ?>" class="google-pluse"><i class="fa fa-google-plus"></i>Google</a>
                        </div>
                     </div>
                     <div class="row">
                    
                         <div class="col-sm-12 col-md-12">
                            <a href="<?php echo $oauthURL; ?>" class="linkedin"><i class="fa fa-linkedin"></i>Linkedin</a>
                        </div> 
                   </div>

                  
                    </div>
                </div>
               
                </div>
               </div>
           </section>
 <?php $this->load->view('client/include/footer'); ?>
