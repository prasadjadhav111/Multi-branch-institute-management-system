<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
<!-- <section class="banner inner-page">
            <div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/register-bannerImg.jpg');?>" alt=""></div>
            <div class="page-title">    
                <div class="container">
                    <h1>Update Password</h1>
                </div>
            </div>
        </section> -->
                <?php
$data1['data']='register-bannerImg.jpg';
$data1['msg']='Update Password';
 $this->load->view('client/include/banner',$data1);
  ?>
            <section class="breadcrumb">
            
        </section>
         <section class="login-view">
            <div class="container">
               
    
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2>Change Password </h2>
                            
                        </div>
                        <form method="post" id="user_form" data-toggle="validator" action="<?php echo base_url('student/update-password');?>">  
                        <div class="form-group">
                        <div class="input-box">
                        
                                <label for="inputEmail" class="control-label">Enter New Password</label>
                            <input type="password" data-minlength="6" name="change_password1" class="form-control" id="pwd" placeholder="New Password"  required>
                            
                            <div class="help-block with-errors"></div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="input-box">
                        
                                <label for="inputEmail" class="control-label">Enter Confirm Password</label>
                            <input type="password" name="change_password" class="form-control" id="inputEmail" data-match="#pwd" data-match-error="Whoops, these don't match" placeholder="Confirm Password"  required>
                            
                            <div class="help-block with-errors"></div>
                        </div>
                        </div>
                        
                        <div class="submit-slide">
                            <input type="submit" value="change password" class="btn">
                            
                        </div>
                    </form>
                       </div>
                      </div>
                    </div>
                </section>

<?php $this->load->view('client/include/footer'); ?>