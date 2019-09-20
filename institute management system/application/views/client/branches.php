<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
        <!-- <section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/event.jpg');?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Our Branches</h1>
                </div>
            </div>
        </section> -->
        <?php
$data1['data']='event.jpg';
$data1['msg']='Our Branches';
 $this->load->view('client/include/banner',$data1);
  ?> 
<section class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('branches'); ?>">All Branches</a></li>
                </ul>
            </div>
        </section>



<div class="event-page">
        	<div class="container">
        <div class="row">
        		<?php 
                         foreach ($branch as $c) {
                                 
                 ?>
        		
                	<div class="col-sm-6 col-md-4">
                        <div class="event-box">
                            <div class="img"><img src="<?php echo base_url('uploads/branch_image/'.$c['branch_image']);?>" alt="" height="300"></div>
                            <div class="event-name"><a href="#"><?php echo $c['branch_name']; ?></a></div>
                            <div class="event-info"><i class="fa fa-map-marker"></i><?php echo $c['branch_address'].",".$c['branch_city'].",".$c['branch_state']; ?></div>
                            <div class="event-info"><i class="fa fa-phone"></i><?php echo $c['branch_contact']; ?></div>
                            <div class="event-info"><i class="fa fa-envelope"></i><?php echo $c['branch_email']; ?></div>
                            <div class="more-btn">
                        <a href="<?php echo base_url('client/view_branch/').$c['branch_name'];?>" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
                ?>
                   </div>
               </div>
           </div>

<?php $this->load->view('client/include/footer'); ?>