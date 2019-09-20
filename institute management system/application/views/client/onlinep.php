 <?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>

<section class="banner inner-page">
            <div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/event.jpg');?>" alt=""></div>
            <div class="page-title">    
                <div class="container">
                    <h1>online check</h1>
                </div>
            </div>
 </section>
    <?php
$data1['data']='event.jpg';
$data1['msg']='online check';
 $this->load->view('client/include/banner',$data1);
  ?>
 <?php $this->load->view('client/include/footer'); ?>
