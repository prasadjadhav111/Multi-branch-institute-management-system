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
$data1['msg']='Online Exam';
 $this->load->view('client/include/banner',$data1);
  ?>
        <section class="breadcrumb white-bg">
        	<div class="container">
            	<ul>
                	<li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('student/dashboard'); ?>">Courses</a></li>
                </ul>
            </div>
        </section>
         <section class="quiz-view">
        	<div class="container">
                <div class="quiz-title">
                    <h2>Available Test</h2>
                </div>
                        <div class="col-sm-8 col-md-12">
                    	<div class="quiz-intro">
               
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Test Name</th>
      <th scope="col">Course Name</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Number Of Question</th>
      <th scope="col">Let's Start</th>
      <th scope="col">Ranking</th>
    </tr>
  </thead>
  <tbody>
    
    <?php  
        if(!empty($data))
        {
            foreach ($data as $value) {
				
				?>
				<tr>
					<td><?php echo $value['test_name']; ?></td>
					<td><?php echo $value['course_name']; ?></td>
					<td><?php echo $value['subject_name']; ?></td>
					<td><?php echo $value['number_of_que']; ?></td>
					<td><a href="<?php echo base_url(); ?>online-test/question-paper/<?php echo $value['subject_name']; ?>/<?php echo $value['test_name']; ?>" class="btn btn-sm"><i class="fa fa-play-circle fa-2x" aria-hidden="true" onclick="go_full_screen()"></i></a></td>
                    <td><a href="<?php echo base_url(); ?>online-test/ranking/<?php echo $value['test_name']; ?>" class="btn btn-sm btn-success"><i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i></a></td>										
				</tr>
				<?php
				}
            }
            else
            {
				?>
                <tr align="center">
                    <td colspan="6">No Test Available Right Now...</td>
                </tr>
            <?php
            }
            ?>
    
  </tbody>
</table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php $this->load->view('client/include/footer'); ?>

<!-- 
<script type="text/javascript">
    
    function go_full_screen(){
    var elem = document.documentElement;
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen();
    }
}
</script> -->
