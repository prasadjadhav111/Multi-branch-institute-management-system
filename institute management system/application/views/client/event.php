<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
        <!-- <section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/event.jpg');?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Event</h1>
                </div>
            </div>
        </section> -->

            <?php
$data1['data']='event.jpg';
$data1['msg']='Event';
 $this->load->view('client/include/banner',$data1);
  ?> 
   <section class="breadcrumb">
            <div class="container">
                <ul>
                     <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('events'); ?>">All Events</a></li>
                 
                </ul>
            </div>
        </section>
<div class="event-page">
        	<div class="container">
        <div class="row">
        		<?php 
                         foreach ($event as $c) {
                                 
                 ?>
        		
                	<div class="col-sm-6 col-md-4">
                        <div class="event-box">
                            <div class="img"><img src="<?php echo base_url('uploads/event_image/'.$c['event_image']);?>" alt="" height="300"></div>
                            <div class="event-name"><a href="#"><?php echo $c['event_name']; ?></a></div>
                            <div class="event-info"><i class="fa fa-clock-o"></i><?php echo $c['event_start']; ?></div>
                            <div class="event-info"><i class="fa fa-clock-o"></i><?php echo $c['event_end']; ?></div>
                            <p><?php echo $c['event_des']; ?></p>
                        
                        </div>
                    </div>
                    <?php 
                }
                ?>
                   </div>
               </div>
           </div>

<?php $this->load->view('client/include/footer'); ?>