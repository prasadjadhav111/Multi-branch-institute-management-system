 <?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
<section class="banner inner-page">
            <div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/event.jpg');?>" alt=""></div>
            <div class="page-title">    
                <div class="container">
                    <h1>Question Paper</h1>
                </div>
            </div>
 </section>
 <section class="breadcrumb white-bg">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Quiz</a></li>
                </ul>
            </div>
        </section>

 <section class="quiz-view">
        	<div class="container">
                <div class="quiz-title">
                    <h2>General Quiz</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="row">
                	<div class="col-sm-4 col-md-3">
                    <div class="time-info"></div>
                        
                    	<div id="tm" style="color:white;background-color:#42d4f4;height: 50px; font-size: xx-large;" align="center"></div>  
                        <div class="qustion-list">
                        	<?php 

                                    for ($i=1;$i<=$total_que;$i++) { 
                            ?>
                                <div class="qustion-slide <?php if($num == $i){ echo 'active'; } ?>">
                                <div class="qustion-number">Question <?php echo $i; ?></div>
                                
                            </div>
                            <?php
                                    }
                            ?>
                            
                            
                        </div>
                    </div>

                    <div class="col-sm-5 col-md-6">
                    	<div class="qustion-main">
                            <div class="qustion-box">
                                <form method="post" id="form1" action="<?php echo base_url(); ?>student/questionpaper">
              
                <?php
                    foreach ($val as  $value) {
                ?>
                    <div class="qustion"><?php echo $value['question']; ?><div align="right"><?php echo "[".$value['que_mark']."]"; ?></div></div>
                    <div class="ans">
                  
                                    <div class="ans-slide">
                                        <label class="label_radio" for="radio-01"><input name="<?php echo $value['que_id']; ?>" id="radio-01" value="1" type="radio"><?php echo $value['op1']; ?></label>
                                    </div>
                                    <div class="ans-slide">
                                        <label class="label_radio" for="radio-02"><input name="<?php echo $value['que_id']; ?>" id="radio-02" value="2" type="radio"><?php echo $value['op2']; ?></label>
                                    </div>
                                    <div class="ans-slide">
                                        <label class="label_radio" for="radio-03"><input name="<?php echo $value['que_id']; ?>" id="radio-03" value="3" type="radio"><?php echo $value['op3']; ?></label>
                                    </div>
                                    <div class="ans-slide">
                                        <label class="label_radio" for="radio-04"><input name="<?php echo $value['que_id']; ?>" id="radio-04" value="4" type="radio"><?php echo $value['op4']; ?></label>
                                    </div>
                                    <div class="ans-slide">
                                        <label class="label_radio" for="radio-05"><input type="radio" name="<?php echo $value['que_id']; ?>"  value="5" checked="checked" style="display: none;"></label>
                                </div>
                  </div>
                <?php          
                    }
            ?>  

                            <div class="submit-quiz">
                            	<input type="submit" value="submit" class="btn btn-warning btn-md smt">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                

                <div class="col-sm-3 col-md-3">
                    
                    <div>
                        <table class="table">
                                <thead>
                                     <tr>
                                             <th scope="col">Rank</th>
                                             <th scope="col">User Name</th>
                                            <th scope="col">Right answer</th>
                                    </tr>
                                </thead>
                                <tbody id="on">

                                </tbody>
                        </table>
                    </div>      
              </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('client/include/footer'); ?>
    <script type="text/javascript">
       
        var s = <?php echo $val[0]['que_time']; ?>;
        function secondload()
        {
            document.getElementById('tm').innerHTML = s+" Sec";
            s = s - 1;
            if(s<=20)
            {
                document.getElementById("tm").style.color="red";
            }
            if(s<=0)
            {
                document.getElementById('form1').submit();
            }
            
        }
            var st = setInterval(secondload,1000);

        function secondstop()
        {
            clearInterval(st);
        }

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
                    $.ajax({
                                type:"post",
                                url:"<?php echo base_url('student/online_check'); ?>",
                                dataType:"json",
                                success : function(data)
                                {
                                    console.log(data);
                                    for(i=0;i<data.length;i++)
                                    {

                                        $("#on").append("<tr><td>"+(i+1)+"</td><td>"+data[i].first_name+" "+data[i].last_name+"</td><td>"+data[i].right_ans+"</td></tr>");
                                    }
                                    
                                }
                        });
        
        });
    </script>
<script type="text/javascript">
    $(document).keydown(function(e){
        e.preventDefault();
    });
    
    $(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });

        $(function() {
            $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
        }); 
     
</script>
<script type="text/javascript">
    
</script>
<script type='text/javascript'>
// $(document).keydown(function(e){
//   var key = e.charCode || e.keyCode;
//   if (key == 165) {
//     alert("ppp"); 
//     // enter key do nothing
//   } else {
//     e.preventDefault();
//   } 
// });
</script>
<!-- <script type="text/javascript">
    $(document).ready(function(){
        jwerty.key('alt+tab', function () { 
        alert("ppp");
    });
    });
</script>
 -->

