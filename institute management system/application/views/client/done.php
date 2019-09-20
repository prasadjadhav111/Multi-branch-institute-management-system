<?php $this->load->view('client/include/header'); ?>

<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
 <!-- <section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/courses-banner.jpg');?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Verification</h1>
                </div>
            </div>
        </section> -->
              <?php
$data1['data']='courses-banner.jpg';
$data1['msg']='Verification';
 $this->load->view('client/include/banner',$data1);
  ?> 
        <br><br><br><br>
<div class="container">
              <?php if($fedback=$this->session->flashdata('feedback')):
                    $fc=$this->session->flashdata('feedback_c');
            ?>
   <div class="message-line <?php echo $fc; ?>">
   <b><?= $fedback; ?></b>
    </div>
  <?php endif; ?>
                        
                        <center><a href="<?php echo base_url('student');?>" class="btn btn-md btn-primary">Login Here</a></center>
</div>
<br><br><br><br>

 <?php $this->load->view('client/include/footer'); ?>
