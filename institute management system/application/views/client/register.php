<?php $this->load->view('client/include/header'); ?>

<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
 <!-- <section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/register-bannerImg.jpg');?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Register</h1>
                </div>
            </div>
        </section> -->
        <?php
$data1['data']='register-bannerImg.jpg';
$data1['msg']='Register';
 $this->load->view('client/include/banner',$data1);
  ?>
            <section class="breadcrumb">
        	<div class="container">
            	<ul>
                	<li><a href="#">Home</a></li>
                    <li><a href="#">Register</a></li>
                </ul>
            </div>
        </section>


         <section class="login-view">
        	<div class="container">
                <?php if($fedback=$this->session->flashdata('feedback')):
                    $fc=$this->session->flashdata('feedback_c');
            ?>
   <div class="message-line <?php echo $fc; ?>">
   <b><?= $fedback; ?></b>
    </div>
  <?php endif; ?>
    
            	<div class="row">
                    <div class="section-title">
                            <h2>REGISTER</h2>
                            
                        </div>
 <form data-toggle="validator" method="post" action="<?php echo base_url('login_c/get_register_data');?>">

                	<div class="col-sm-6">

                  
                    	
                       
                      <div class="form-group">
                            <label for="inputEmail" class="control-label">First Name</label>
            <input type="text" pattern="^[A-z]*$" maxlength="15" class="form-control" id="inputTwitter" name="first_name" placeholder="First Name" required>

                            <div class="help-block with-errors"></div>
                        </div>
                <div class="form-group">
                            <label for="inputEmail" class="control-label">Last Name</label>
<input type="text" pattern="^[A-z]*$" maxlength="15" class="form-control" id="inputTwitter1" placeholder="Last Name" name="last_name" required>
                            <div class="help-block with-errors"></div>
                        </div>
                

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email"  data-error="Bruh, that email address is invalid" required>
                            <div class="help-block with-errors ck"></div>
                        </div>
                

                        
                       
                    </div>

                    <div class="col-sm-6">
                <div class="form-group">
                            <label for="inputPassword" class="control-label">Password</label>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
                                    <div class="help-block">Minimum of 6 characters</div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <input type="password" class="form-control" name="password" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                     
                         

                    <div class="g-recaptcha" data-sitekey="6Lc5KVQUAAAAACa-o8KGgyv5bAVfPy0KfwCf7Bkm">
                        
                    </div>
                    <br>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Signup</button>
                        </div>  
                 
                    
                    </div>
                       </form>
                </div>
               </div>

           </section>
 <?php $this->load->view('client/include/footer'); ?>
<script type="text/javascript">
    $(document).ready(function(){

        $("#inputEmail").focusout(function(){
            var em = document.getElementById("inputEmail").value;
            console.log('<?php echo base_url();?>student/check_mail');
                $.ajax({

                        url:'<?php echo base_url();?>student/check_mail',
                        type:'post',
                        data:{email:em},
                        success : function($data)
                        {
                            if($data != "")
                            {

                            $("#inputEmail").focus();
                            $(".ck").html($data);
                            $(".ck").css("color","red");

                            }
                            else
                            {
                                $(".ck").empty();
                            }
                        }
                });


        });
    });
</script>