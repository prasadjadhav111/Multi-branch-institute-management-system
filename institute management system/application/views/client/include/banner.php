
  <style type='text/css'>
    #recordingslist { list-style: none; }
    #recordingslist audio { display: block; margin-bottom: 10px; }
  </style>
  <section class="banner">
            <div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/').$data;?>" alt=""></div>

            <div class="banner-text">
                <div class="container">
                    <br><br><br>
                    <h1><?php  echo $msg; ?></h1>
                 
                    <!-- <p>Join us today to know how  you can ace entrance exams  </p> -->
                    
                </div>
            </div>
            <link href="<?php echo base_url('assets/assets_client/css/main.css');?>" rel="stylesheet">
                    <script type="text/javascript" src="<?php echo base_url('assets/assets_client/js/Recorder.js');?>"></script>

            <div id="mybutton">


<header id="header">
            <div class="container">
<div class="main-section" >
    <div class="row border-chat">
        <div class="col-md-12 col-sm-12 col-xs-12 first-section">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-6 left-first-section">
                    <p data-toggle="tooltip" title="Hi ! I am academy robo.Let's talk with me for enquiry or any doubt regarding academy..">Academy Robo</p>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6 right-first-section">
                   
                    <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>

                </div>
            </div>
        </div>
    </div>
    <div class="row border-chat">
        <div class="col-md-12  second-section">
            <div class="chat-section">
                <ul id="wit">
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="row border-chat">
        <div class="col-md-12 third-section" style="background-color: white;">
                            <table width="100%">
                                <tr>
                                    <td width="80%" align="center">
            
                    <input type="text" class="form-control" id="t1" placeholder="Write messege">
           </td>
           <td align="center">
                    <i class="fa fa-microphone fa-2x voice" aria-hidden="true" id="rec"></i>
                
                </td>
                </tr>
                </table>
            
        </div>
    </div>
</div>
<div id="ppp">
    
</div>
             </div>
</header>
</div>
<style type='text/css'>
    #recordingslist { list-style: none; }
    #recordingslist audio { display: block; margin-bottom: 10px; }
  </style>
<style type="text/css">
   

#mybutton {
  position: fixed;
  bottom: 20px;
  right: 10px;
   z-index: 1;
}
</style>
        </section>


    <script type="text/javascript" src="<?php echo base_url('assets/assets_client/js/jquery-1.12.4.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo  base_url('assets/assets_client/js/bootstrap.js');?>"></script>

<script type="text/javascript">

  function wit_response(val,response)
  {
    console.log(response);
    var height = $(".chat-section").prop('scrollHeight');
    $("#wit").append("<li><div class='left-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1.png'>"+val+"</p></div></li>");  

                              if(response.entities.name_institute)
                              {
                                if(response.entities.name_institute[0].value = "institute_name")
                                {

                                        $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+'Welcome in our Academy ..!!!'+"</p></div></li>");
                                        
                                     sessionStorage.setItem('witchat',$("#wit").html());
 
                                  }
                               }
                               else if(response.entities.greeting_check)
                              {

                                $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+'i am fine.<br>tell me how can i help you ?'+"</p></div></li>");
                                        
                                     sessionStorage.setItem('witchat',$("#wit").html());
 
                               }
                               else if(response.entities.user_help)
                              {

                                $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+'of course.<br>tell me how can i help you ?'+"</p></div></li>");
                                        
                                     sessionStorage.setItem('witchat',$("#wit").html());
 
                               }
                               else if(response.entities.greetings)
                              {
                                if(response.entities.greetings.value = "true")
                                {

                                        $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+'Hello , i am Academy Robo..<br>how can i help you ?'+"</p></div></li>");
                                        
                                     sessionStorage.setItem('witchat',$("#wit").html());
 
                                  }
                               }
                               else if(response.entities.last_greeting)
                              {
                                if(response.entities.last_greeting.value = "true")
                                {

                                        $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+'Welcome..again'+"</p></div></li>");
                                        
                                     sessionStorage.setItem('witchat',$("#wit").html());
 
                                  }
                               }
                                else if((response.entities.test_help) || (response.entities.test_attempt))
                              {
                                  var op = "You have to login and go to your course or you have to enroll the course for that follow below few steps :- <br><a href='"+window.location.origin+"/academy/courses/"+"' style='color:red;text-decoration:none;'>Select your course.</a><br>Click on enroll.<br>Select your near by branch.<br>Enroll the course.<br>go to Dashboard.<br>Attempt Test.";

                                        $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");

                                     sessionStorage.setItem('witchat',$("#wit").html());
                                   
                               }
                               else if((response.entities.password_intent) || (response.entities.password_type))
                              {
                                  var op = "follow below few steps :- <br><a href='"+window.location.origin+"/academy/student/change-password"+"' style='color:red;text-decoration:none;'>Click here</a> to go that page.<br>Write Your register email.<br>Open your mail account and Click on link.<br>Update your password.";

                                        $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");

            
                                     sessionStorage.setItem('witchat',$("#wit").html());
                                   
                               }
                               else if((response.entities.branches_name) && (response.entities.total_number) )
                              {
                                $.ajax({
                                               type:'post',
                                               url:'<?php echo base_url();?>bot/total_branches',
                                              dataType : 'json',
                                              success : function(data){
                                                
                                                  var op = "";

                                                  if(data.length==0)
                                                  {
                                                    op += "No Records are available";
                                                  }
                                                  else
                                                  {
                                                  
                                                    op += "There are "+data+" branches in different cities.";

                                                  $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");
                                                  }
                                                  sessionStorage.setItem('witchat',$("#wit").html());
                                              }
                                        });
            
                                     sessionStorage.setItem('witchat',$("#wit").html());
                                   
                               }
                               else if(response.entities.branches_name)
                              {
                                
                                var op = "<a href='"+window.location.origin+"/academy/branches/"+"' style='color:red;text-decoration:none;'>Click Here</a> for all Branches information." 

                                        $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");
                                        
                                     sessionStorage.setItem('witchat',$("#wit").html());
 
                                  
                               }
                               else if(response.entities.admission_process)
                              {
                                if(response.entities.admission_process[0].value = "admission_process")
                                {
                                    var op = "follow below few steps :- <br><a href='"+window.location.origin+"/academy/courses/"+"' style='color:red;text-decoration:none;'>Select your course.</a><br>Click on enroll.<br>Select your near by branch.<br>Enroll the course.";

                                        $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");

                                     sessionStorage.setItem('witchat',$("#wit").html());
 
                                  }
                               }
                               else if(response.entities.course_name && response.entities.duration)
                               {
                                  var dur = response.entities.duration[0].value;
                                  var unit = response.entities.duration[0].unit;
                                  alert(dur+" "+unit);
                                  

                                    $.ajax({
                                               type:'post',
                                               url:'<?php echo base_url();?>bot/duration_course',
                                               data:{dur:dur,unit:unit},
                                              dataType : 'json',
                                              success : function(data){
                                                
                                                  var op = "";

                                                  if(data.length==0)
                                                  {
                                                    op += "No Courses are available for this particular duration.<br><a href='"+window.location.origin+"/academy/courses/"+"' style='color:red;text-decoration:none;'>Click here </a> for check out all courses.";
                                                  }
                                                  else
                                                  {
                                                      for(i=0;i<data.length;i++)
                                                     {
                                                        op += "<a href='"+window.location.origin+"/academy/courses/"+data[i]['course_name']+"' style='color:red;text-decoration:none;'>"+data[i].course_name+"</a><br>";
                                                     }
 
                                                  op += "course having a bright future.";
                                                  }
                                                  
                                                    

                                                  $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");
                                                  sessionStorage.setItem('witchat',$("#wit").html());
                                              }
                                        });
            
                                     sessionStorage.setItem('witchat',$("#wit").html());
                                   
                                  }
                              else if(response.entities.course_name && response.entities.total_number)
                               {
                                  if(response.entities.course_type)
                                  {

                                    if(response.entities.course_type[0].value = "available" )
                                    {

                                    $.ajax({
                                               type:'post',
                                               url:'<?php echo base_url();?>bot/total_course',
                                              dataType : 'json',
                                              success : function(data){
                                                console.log(data);
                                                  var op = "";

                                                  if(data.length==0)
                                                  {
                                                    op += "No Records are available";
                                                  }
                                                  else
                                                  {
                                                  
                                                    op += "There are around "+data+" courses pursuing by students.";

                                                  $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");
                                                  }
                                                  sessionStorage.setItem('witchat',$("#wit").html());
                                              }
                                        });
            
                                     sessionStorage.setItem('witchat',$("#wit").html());
                                   
                                     }
                                  }
                                  else if(response.entities.course_name[0].value = "courses")
                                  {
                                      $.ajax({
                                               type:'post',
                                               url:'<?php echo base_url();?>bot/total_course',
                                              dataType : 'json',
                                              success : function(data){
                                                
                                                  var op = "";

                                                  if(data.length==0)
                                                  {
                                                    op += "No Records are available";
                                                  }
                                                  else
                                                  {
                                                  
                                                    op += "There are around "+data+" courses pursuing by students.";

                                                  $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");
                                                  }
                                                  sessionStorage.setItem('witchat',$("#wit").html());
                                              }
                                        });
            
                                     sessionStorage.setItem('witchat',$("#wit").html());
                                   }
                                }
                               else if(response.entities.course_name)
                               {
                                  if(response.entities.course_type)
                                  {

                                    if(response.entities.course_type[0].value = "available" )
                                    {

                                    $.ajax({
                                               type:'post',
                                               url:'<?php echo base_url();?>bot/popular_course',
                                              dataType : 'json',
                                              success : function(data){
                                                console.log(data);
                                                  var op = "";

                                                  if(data.length==0)
                                                  {
                                                    op += "No Records are available";
                                                  }
                                                  else
                                                  {
                                                      for(i=0;i<data.length;i++)
                                                     {
                                                        op += "<a href='"+window.location.origin+"/academy/courses/"+data[i]['course_name']+"' style='color:red;text-decoration:none;'>"+data[i].course_name+"</a><br>";
                                                     }
 
                                                    op += "course having a bright future.";
                                                  }
                                                  
                                                    

                                                  $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");
                                                  sessionStorage.setItem('witchat',$("#wit").html());
                                              }
                                        });
            
                                     sessionStorage.setItem('witchat',$("#wit").html());
                                   }
                                  }
                                  else if(response.entities.course_name[0].value = "courses")
                                  {
                                      $.ajax({
                                               type:'post',
                                               url:'<?php echo base_url();?>bot/get_allcourse',
                                              dataType : 'json',
                                              success : function(data){
                                                  var op = "";

                                                  if(data.length==0)
                                                  {
                                                    op += "No Records are available";
                                                  }
                                                  else
                                                  {
                                                      for(i=0;i<data.length;i++)
                                                     {
                                                        op += "<a href='"+window.location.origin+"/academy/courses/"+data[i]['course_name']+"' style='color:red;text-decoration:none;'>"+data[i].course_name+"</a>,<br>";
                                                     }
 
                                                  }
                                                  
                                                    op += "here click on the course name for getting all information about course.";

                                                  $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");
                                                  sessionStorage.setItem('witchat',$("#wit").html());
                                              }
                                        });
            
                                     sessionStorage.setItem('witchat',$("#wit").html());
                                   }
                                  } 
                                  else if((response.entities.upcoming_event) && (response.entities.all_events))
                                  {
                               
                                      $.ajax({
                                               type:'post',
                                               url:'<?php echo base_url();?>bot/upcoming_event',
                                              dataType : 'json',
                                              success : function(data){
                                                  var op = "";

                                                  if(data.length==0)
                                                  {
                                                    op += "No Records are available<br>";
                                                  }
                                                  else
                                                  {
                                                      for(i=0;i<data.length;i++)
                                                     {
                                                        op += data[i]['event_name']+",<br>";
                                                     }
 
                                                  }
                                                  
                                                    op += "<a href='"+window.location.origin+"/academy/events/"+"' style='color:red;text-decoration:none;'>Click here</a> for further information about events.";

                                                  $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");
                                                  sessionStorage.setItem('witchat',$("#wit").html());
                                              }
                                        });

                                   sessionStorage.setItem('witchat',$("#wit").html());
 
                                  
                               }
                               else if((response.entities.celebrated_event) && (response.entities.all_events))
                                  {
                               
                                      $.ajax({
                                               type:'post',
                                               url:'<?php echo base_url();?>bot/ce_events',
                                              dataType : 'json',
                                              success : function(data){
                                                  var op = "";

                                                  if(data.length==0)
                                                  {
                                                    op += "No Records are available<br>";
                                                  }
                                                  else
                                                  {
                                                      for(i=0;i<data.length;i++)
                                                     {
                                                        op += data[i]['event_name']+",<br>";
                                                     }
 
                                                  }
                                                  
                                                    op += "<a href='"+window.location.origin+"/academy/events/"+"' style='color:red;text-decoration:none;'>Click here</a> for further information about events.";

                                                  $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");
                                                  sessionStorage.setItem('witchat',$("#wit").html());
                                              }
                                        });

                                   sessionStorage.setItem('witchat',$("#wit").html());
 
                                  
                               }
                               else if(response.entities.all_events)
                                  {
                               
                                      $.ajax({
                                               type:'post',
                                               url:'<?php echo base_url();?>bot/all_events',
                                              dataType : 'json',
                                              success : function(data){
                                                  var op = "";

                                                  if(data.length==0)
                                                  {
                                                    op += "No Records are available<br>";
                                                  }
                                                  else
                                                  {
                                                      for(i=0;i<data.length;i++)
                                                     {
                                                        op += data[i]['event_name']+",<br>";
                                                     }
 
                                                  }
                                                  
                                                    op += "<a href='"+window.location.origin+"/academy/events/"+"' style='color:red;text-decoration:none;'>Click here</a> for further information about events.";

                                                  $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+op+"</p></div></li>");
                                                  sessionStorage.setItem('witchat',$("#wit").html());
                                              }
                                        });

                                   sessionStorage.setItem('witchat',$("#wit").html());
 
                                  
                               }
                               else
                               {
                                        $("#wit").append("<li><div class='right-chat'><p><img src='"+window.location.origin+"/academy/assets/assets_client/images/bot/1499345471_boy.png'>"+"I didn't get it what are you trying to say.You may try again or contact us for more enquiry. "+"</p></div></li>");
                                                  sessionStorage.setItem('witchat',$("#wit").html());

                               }
                                  
                                      var scroll_height = $(".chat-section").prop('scrollHeight');
                                      
                                        $(".chat-section").scrollTop(scroll_height);
                                      
                                        sessionStorage.setItem('scroll_height',scroll_height);
 
                                        $("#t1").val('');
  }
</script>
<script type="text/javascript">

    $(document).ready(function(){
        $(".left-first-section").click(function(){
            $('.main-section').toggleClass("open-more");
        });
    });
    $(document).ready(function(){
        $(".fa-minus").click(function(){
            $('.main-section').toggleClass("open-more");
        });
    });

  $(document).ready(function(){
            
            $("#t1").keypress(function(e){
                if(e.which == 13)
                {
                    var val = $("#t1").val();
                    messeage_fun(val);
                        
                }

            });
        });
</script>
  <script>
  

  var audio_context;
  var recorder;

  function startUserMedia(stream) {
    var input = audio_context.createMediaStreamSource(stream);
    recorder = new Recorder(input);
   
  }


  function mainrecord() {
    recorder && recorder.exportWAV(function(blob) {
  
          record_fun(blob);
    });
  }

  window.onload = function init() {

    $("#wit").html(sessionStorage.getItem('witchat'));


    $(".chat-section").scrollTop(sessionStorage.getItem('scroll_height'));


    try {
      
      window.AudioContext = window.AudioContext || window.webkitAudioContext;
      navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia;
      window.URL = window.URL || window.webkitURL;
      
      audio_context = new AudioContext;
       } catch (e) {
      alert('No web audio support in this browser!');
    }
    
    navigator.getUserMedia({audio: true}, startUserMedia, function(e) {
      
    });
  };

  </script>

<script type="text/javascript">
    var f=1;
    $(document).ready(function(){
        
            $('.voice').click(function(){

                if(f==1)
                {

                        recorder && recorder.record();
                        $('.voice').css('color','red');
                        f=0;
                }
                else
                {

                  
                    recorder && recorder.stop();
                   
                    mainrecord();
    
                     recorder.clear();

                        $('.voice').css('color','black');
                        f=1;
                }
                
            });


    });
</script>
<script type="text/javascript">
    $(".main-section").resize();
</script>



<script type="text/javascript">
  
    function record_fun(blob)
    {
       $.ajax({
                  url :  "https://api.wit.ai/speech",
                  headers: {
                    'X-Requested-With': 'JSONHttpRequest',
                    'Content-Type': 'audio/wav',
                    'Authorization' : 'Bearer JQWCOPH65JOX2RZQUMNEIBZDKJKSAKOP'
                  },
                  type: 'POST',
                  data: blob,
                  processData: false,
                  success: function(response) {
                    val = response._text;
                      
                    wit_response(val,response);
                  }
            });
    }

    function messeage_fun(val)
    {
        $.ajax({
                        url: 'https://api.wit.ai/message',
                        data: {
                                     'q':val,
                                    'access_token' : '5UQFHLOABIOP4X75EX5QXDHM7HVUQMXX'
                                },
                        dataType: 'jsonp',
                        method: 'GET',
                        success: function(response) {

                                wit_response(val,response);
                                
                            }
                    });
    }
</script>
