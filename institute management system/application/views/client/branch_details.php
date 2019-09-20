<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
   <!-- <section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/event.jpg');?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Branch Details</h1>
                </div>
            </div>
        </section> -->
        <?php
$data1['data']='event.jpg';
$data1['msg']='Branch Details';
 $this->load->view('client/include/banner',$data1);
  ?> 

        			<section class="contact-detail">
        	<div class="container">

                <div class="section-title">
                   
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
                                <p><?php echo $data->branch_state.','.$data->branch_city.','.$data->branch_address; ?></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contact-box green">
                                <div class="icon-box">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <h4>phone number</h4>
                                <p><?php echo $data->branch_contact; ?></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contact-box red">
                                <div class="icon-box">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <h4>email address</h4>
                                <p><?php echo $data->branch_email; ?></p>
                            </div>
                        </div>
                    </div>

                </div>
                      <div class="row">

                  <iframe width="108%" height="350" frameborder="0" style="border:0"
src=<?php echo "https://www.google.com/maps/embed/v1/place?q=place_id:".$data->map_api."&key=AIzaSyD3LhYVS0Xhs7Q_xNiOPCJ5jyriSJ7PIjU"; ?> allowfullscreen></iframe>

</div>
            </div>

        </section>


<?php $this->load->view('client/include/footer'); ?>