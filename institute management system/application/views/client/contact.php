<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
<!-- <section class="banner inner-page">
            <div class="banner-img"><img src="<?php echo base_url('images/banner/contact-us.jpg');?>" alt=""></div>
            <div class="page-title">    
                <div class="container">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </section> -->
     <?php
$data1['data']='contact-us.jpg';
$data1['msg']='Conatct-Us';
 $this->load->view('client/include/banner',$data1);
  ?> 
     <section class="breadcrumb">
            <div class="container">
                <ul>
                     <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>
                 
                </ul>
            </div>
        </section>
<section class="contact-detail">
        	<div class="container">
                <div class="section-title">
                    <?php 
                         foreach ($branch as $c) {
                                 
                 ?>
                    <h2>Get in Touch</h2>
                </div>
                <div class="contact-boxView">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="contact-box yello">
                                <div class="icon-box">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <h4>location</h4>
                                <p><?php echo $c['branch_address'].",".$c['branch_city'].",".$c['branch_state']; ?></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contact-box green">
                                <div class="icon-box">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <h4>phone number</h4>
                                <p><?php echo $c['branch_contact']; ?></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contact-box red">
                                <div class="icon-box">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <h4>email address</h4>
                                <p><?php echo $c['branch_email']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                    <iframe width="100%" height="500" frameborder="0" style="border:0"
src=<?php echo "https://www.google.com/maps/embed/v1/place?q=place_id:".$c['map_api']."&key=AIzaSyD3LhYVS0Xhs7Q_xNiOPCJ5jyriSJ7PIjU"; ?> allowfullscreen></iframe>
                  <?php 

                }
                ?>
            </div>
        </section>
           
<?php $this->load->view('client/include/footer'); ?>       