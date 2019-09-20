<?php $this->load->view('client/include/header'); ?>

<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
<!-- <section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('images/banner/account-settings.jpg'); ?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Account Settings</h1>
                </div>
            </div>
        </section> -->
                     <?php
$data1['data']='account-settings.jpg';
$data1['msg']='Account Settings';
 $this->load->view('client/include/banner',$data1);
  ?>
        <section class="breadcrumb">
        	<div class="container">
            	<ul>
                	<li><a href="<?php echo base_url('');?>">Home</a></li>
                    <li><a href="<?php echo base_url('student/profile');?>">Account Settings</a></li>
                </ul>
            </div>
        </section>
        <div class="my-accountPage">
        	<div class="container">
            	<div class="my-account">
                    <div class="account-tab">
                        <ul>
                            <li class="active"><a href="javascript:void(0);" id="profile">Profile</a></li>
                            <li><a href="javascript:void(0);" id="order">Order</a></li>
                        </ul>
                    </div>
                    <div class="tab-content profile-con open">

                    	<?php
                    		foreach ($data as $value) {
                    		
                    	?>
                        <div class="personal-information">
                            <div class="info-slide">
                                <p><span>Name :</span><?php echo $value['first_name']." ".$value['last_name']; ?></p>
                            </div>
                            <div class="info-slide">
                                <p><span>Email ID :</span><?php echo $value['email']; ?></p>
                            </div>
                            <div class="info-slide">
                                <p><span>Mobile Number :</span><?php echo $value['mobile']; ?></p>
                            </div>
                           
                        </div>
                    <?php } ?>
                    </div>
                    <div class="tab-content order-con">
                        <table class="booking-viewTable">
                            <tr>
                                <th>Courses ID</th>
                                <th class="detail"> Courses Details</th>
                                <th>Purchase Date</th>
                                <th>Amount</th>
                            </tr>
                            <?php 
                            			foreach ($course as $val) {
                            	
                            ?>
                            <tr>
                                <td><span class="small-heading">Courses Name</span><?php echo $val['course_name']; ?></td>
                                <td class="detail">
                                    <span class="small-heading">Courses Duration</span>
                                    <div class="detailTd">
                                        <p><?php echo $val['course_duration']." ".$val['course_duration_type']; ?></p>
                                    </div>
                                </td>
                                <td><span class="small-heading">Purchase Date</span><?php echo $val['purchase_date']; ?></td>
                                <td><span class="small-heading">Amount</span><?php echo $val['course_fee']; ?></td>
                            </tr>
                        <?php } ?>
                        </table>
                    </div>
                    
                </div>
            </div>

        </div>
        
<?php $this->load->view('client/include/footer'); ?>
