<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
  <!-- <section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/event.jpg');?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Online Exam</h1>
                </div>
            </div>
        </section> -->
        <?php
$data1['data']='event.jpg';
$data1['msg']='online exam';
 $this->load->view('client/include/banner',$data1);
  ?>
        <section class="breadcrumb white-bg">
        	<div class="container">
            	<ul>
                	<li><a href="<?php echo base_url(); ?>">Home </a></li>
                    <li><a href="<?php echo base_url('student/dashboard'); ?>">Quiz</a></li>
                </ul>
            </div>
        </section>
        <section class="quiz-view">
            <div class="container">
                <div class="quiz-title">
                    <h2>Test Rank</h2>
                    
                </div>
                
                    <div class="col-sm-8 col-md-12">
                        <div class="quiz-intro">
               
        <b><table class="table">
  <thead>
    <tr>
      <th scope="col">Rank</th>
      <th scope="col">Student Name</th>
      <th scope="col">Test Name</th>
      <th scope="col">Percentage</th>
    </tr>
  </thead>
  <tbody>
    
    <?php  
            $cnt = 1;
    foreach ($val as $value) {
                
                ?>
                <tr>
                    <td><?php echo $cnt++ ?></td>
                    <td><?php echo $value['first_name']." ".$value['last_name']; ?></td>
                    <td><?php echo $value['test_name']; ?></td>
                    <td><?php echo $value['percentage']; ?></td>

                                                           
                </tr>
                <?php
                }

                if($cnt == 1)
                {

            ?>
                <tr align="center">
                    <td colspan="4"><?php echo "No records.........." ?></td>
                   
                                                           
                </tr>
            <?php
                }
               
                ?>
    
  </tbody>
  
</table></b>
<table class="table">
    <?php
            if(!empty($val))
            {
    ?>

            
    <tr>

    <td align="right"><a href="<?php echo base_url('online-test/').$val[0]['course_name']; ?>" class="btn">Go to back</a></td>
</tr>
    <?php

            }
    ?>
</table>
                    
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php $this->load->view('client/include/footer'); ?>