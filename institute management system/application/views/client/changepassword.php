<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
<!-- <section class="banner inner-page">
            <div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/register-bannerImg.jpg');?>" alt=""></div>
            <div class="page-title">    
                <div class="container">
                    <h1>Change Password</h1>
                </div>
            </div>
        </section> -->
        <?php
$data1['data']='register-bannerImg.jpg';
$data1['msg']='Change Password';
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
    <br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2>Change Password Proccess</h2>
                            
                        </div>
                        <form method="post" id="user_form" data-toggle="validator" action="<?php echo base_url('login_c/send_link');?>">  
                        <div class="form-group">
                        <div class="input-box">
                        
                                <label for="inputEmail" class="control-label">Enter Registerd Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Please Enter Registered Email"  required>
                            
                            <div class="help-block with-errors"></div>
                        </div>
                        </div>
                        
                        <div class="submit-slide">
                            <input type="submit" value="Send" class="btn">
                            
                        </div>
                    </form>
                       </div>
                      </div>
                    </div>
                </section>

<?php $this->load->view('client/include/footer'); ?>