<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
<!-- 
<section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/event.jpg');?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Quiz Result</h1>
                </div>
            </div>
        </section> -->
        <?php
$data1['data']='event.jpg';
$data1['msg']='Quiz Result';
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
                
                    <div class="col-sm-8 col-md-12">
                    	<div class="quiz-intro">
                            <h2 align="center">Academy Test Report</h2>
                            <hr width="4">
                             <table width="100%">
                            
                                     <tr>
                                             <th style="font-size: 20px;text-align: left;">Student Name : <?php echo $snm[0]['first_name']." ".$snm[0]['last_name']; ?></th>    
                                             <th></th>
                                             <th></th>
                                    </tr>
                                    <tbody>
                                        <tr>
                                        <th style="font-size: 20px;text-align: left;">Test Name : <?php echo $tnm ?></th> 
                                        <th><br><br><br></th>
                                        <th style="margin-left:-20px;font-size:25px;text-align: right;">Total Marks : [ <?php echo $total_marks; ?> ]</th> 
                                    </tr>
                                    </tbody>
                                
                            </table>
                            <hr width="2">
                            <table border="4" width="100%">
                               
                                     <tr>
                                        <th style="font-size: 30px; text-align: center;">Test Anaylsis</th>
                                        <th style="font-size: 30px;text-align: center;">Test Score</th>
                                    </tr>
                                <tbody>
                                    <tr>
                                        <td style="color: green;font-size: 25px;" align="center">Right Answers</td>
                                        <td style="color: green;font-size: 25px;" align="center"><?php echo $right; ?></td>

                                    </tr>
                                     <tr>
                                        <td style="color:  #c40b0b;font-size: 25px;" align="center">Not Attempt Answer</td>
                                        <td style="color:  #c40b0b;font-size: 25px;" align="center"><?php echo $not_attempt; ?></td>

                                    </tr>
                                     <tr>
                                        <td style="color: red;font-size: 25px;" align="center">Wrong Answer</td>
                                        <td style="color: red;font-size: 25px;" align="center"><?php echo $wrong; ?></td>

                                    </tr>
                                     <tr>
                                        <td style="color: orange;font-size: 25px;" align="center">Obtain Marks</td>
                                        <td style="color: orange;font-size: 25px;" align="center"><?php echo $ob; ?></td>

                                    </tr>
                                </tbody>
                        </table>
                                     <table border="4" class="col-sm-8 col-md-12">
                                         <tr>
                                        <th style="font-size: 30px; text-align: center;">Questions-Answers</th>
                                    </tr>         
                                        
									<?php

											$i=0;
										foreach ($userque as  $val) {

											?>
                                             <tr>
                                        <td>
												<b><p class="font-weight-bold"  style="margin-left: 20px;font-size:25px"><?php echo $val['question']; ?><p align="right" class="font-weight-bold" style="margin-right: 20px;font-size:25px"><?php echo "[".$val['que_mark']."]"; ?></p></p></b>
									<?php

										if($val['ans']==1)
											{

									?>

										<b><p style="margin-left: 20px;font-size:25px;color: blue;" class="font-weight-bold">1) <?php echo $val['op1']; ?></p></b>
										<p style="margin-left: 20px;font-size:25px" class="font-weight-bold">2) <?php echo $val['op2']; ?></p>
										<p style="margin-left: 20px;font-size:25px" class="font-weight-bold">3) <?php echo $val['op3']; ?></p>
										<p style="margin-left: 20px;font-size:25px" class="font-weight-bold">4) <?php echo $val['op4']; ?></p>

									<?php

											}
											else if($val['ans']==2)
											{

									?>

										<p style="margin-left: 20px;font-size:20px;" class="font-weight-bold">1) <?php echo $val['op1']; ?></p>
										<b><p style="margin-left: 20px;font-size:20px;color: blue;" class="font-weight-bold" >2) <?php echo $val['op2']; ?></p></b>
										<p style="margin-left: 20px;font-size:20px;" class="font-weight-bold">3) <?php echo $val['op3']; ?></p>
										<p style="margin-left: 20px;font-size:20px;" class="font-weight-bold">4) <?php echo $val['op4']; ?></p>


									<?php
											}
											else if($val['ans']==3)
											{
										
									?>

										<p style="margin-left: 20px;font-size:20px;" class="font-weight-bold">1) <?php echo $val['op1']; ?></p>
										<p style="margin-left: 20px;font-size:20px;" class="font-weight-bold">2) <?php echo $val['op2']; ?></p>
										<b><p style="margin-left: 20px;font-size:20px;color: blue;" class="font-weight-bold">3) <?php echo $val['op3']; ?></p></b>
										<p style="margin-left: 20px;font-size:20px;" class="font-weight-bold">4) <?php echo $val['op4']; ?></p>


									<?php		
											}
											else if($val['ans']==4)
											{
												
									?>

										<p style="margin-left: 20px;font-size:20px;" class="font-weight-bold">1) <?php echo $val['op1']; ?></p>
										<p style="margin-left: 20px;font-size:20px;" class="font-weight-bold">2) <?php echo $val['op2']; ?></p>
										<p style="margin-left: 20px;font-size:20px;" class="font-weight-bold">3) <?php echo $val['op3']; ?></p>
										<b><p class="font-weight-bold" style="margin-left: 20px;font-size:20px;color: blue;">4) <?php echo $val['op4']; ?></p></b>
									<?php

										}
                    
										
											if($uans[$i] == 5)
											{
												echo "<b><P class='font-weight-bold' style='color:red;margin-left: 20px;font-size:25px'>Your Answer :- Not Attempt </p></b>";
											}
											else
											{
                                                if($uans[$i] == $val['ans'])
                                                {
                                                        echo "<b><P class='font-weight-bold' style='color:green;margin-left: 20px;font-size:25px'>Your Answer :- option $uans[$i] </p></b>";
                                                }
                                                else
                                                {
                                                    echo "<b><P class='font-weight-bold' style='color:red;margin-left: 20px;font-size:25px'>Your Answer :- option $uans[$i] </p></b>";
                                                }
												

											}
										$i++;
										echo "<hr style='color:black;'></hr>";
                                        ?>
                                    </td></tr>
                                        <?php
										 } 

									 ?> 
									 
	                    </div>
                    </table>
                    </div>
                </div>
            </div>
        </section>

<div align="center">
    <br><br>
  <button type="button" class="btn btn-primary btn-md" id="button1"><i class="fa fa-file-pdf-o"></i> Download Report</button>  
  <br><br>
</div>
  

<?php $this->load->view('client/include/footer'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });
</script>
 <script src="<?php echo base_url()."js/printThis.js";?>"></script>

<script type="text/javascript">

  $(document).ready(function(){

    
    $("#button1").click(function(){
    

    $(".quiz-view").printThis({

      debug: false,
      importCSS: false,
      importStyle: true,
      printContainer: true,
      loadCSS: "",
      pageTitle: "",
      removeInline: false,
      printDelay: 333,
      header: null,
      footer: null,
      formValues: true,
      canvas: false,
      base: false,
      doctypeString: '<!DOCTYPE html>',
      removeScripts: false,
      copyTagClasses: false
    });
  });
});

</script>