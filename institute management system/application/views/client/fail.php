<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
<!-- 
<section class="banner inner-page">
          <div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/checkout.jpg');?>" alt=""></div>
            <div class="page-title">  
              <div class="container">
                    <h1>Payment Failed</h1>
                </div>
            </div>
        </section> -->


            <?php
$data1['data']='checkout.jpg';
$data1['msg']='Payment Failed';
 $this->load->view('client/include/banner',$data1);
  ?> 
        <section class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All courses</a></li>
                </ul>
            </div>
        </section>


<!------ Include the above in your HEAD tag ---------->

<div class="container" align="center">
  <h1 style="color: red">Payment is failed</h1>
</div>


<?php $this->load->view('client/include/footer'); ?>
