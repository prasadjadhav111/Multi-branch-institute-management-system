<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
 <!-- <section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/ourTeacher-banner.jpg');?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Our Instructors</h1>
                </div>
            </div>
        </section> -->
                        <?php
$data1['data']='ourTeacher-banner.jpg';
$data1['msg']='Our Instructors';
 $this->load->view('client/include/banner',$data1);
  ?>
        <section class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>

                    <li><a href="<?php echo base_url('instructors'); ?>">Users</a></li>
                </ul>
            </div>
        </section>
                                    
       <section class="courses-view">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-3">
                    	<div class="right-slide left">
                        	<h3>Branch Wise</h3>
                            <div class="filter-blcok">
                                <form id="brform">
                                <?php 
                                $i =0;
                                        foreach ($branch as $val) {
                                         
                                ?>
                                <div class="check-slide">
                                    <label class="label_check" for="radio-<?php echo $i; ?>"><input id="radio-<?php echo $i; ?>" type="radio" name="branch" value="<?php echo $val['branch_name']; ?>" class="r1"><?php echo $val['branch_name']; ?></label>
                                </div>
                            <?php 
                                $i = $i + 1;
                                    }
                             ?>
                                </form>
                            </div>
                            <h3>Course Wise</h3>
                            <div class="filter-blcok">
                                <form id="crform">
                                <?php 
                                        foreach ($course as $val) {
                                         
                                ?>
                                <div class="check-slide">
                                    <label class="label_check" for="radio-<?php echo $i; ?>"><input id="radio-<?php echo $i; ?>" type="radio" name="course" value="<?php echo $val['course_name']; ?>" class="r2"><?php echo $val['course_name']; ?></label>
                                </div>
                            <?php 
                                $i = $i + 1;
                                    }
                             ?>
                                </form>
                            </div>
                            <h3>Subject Wise</h3>
                            <div class="filter-blcok">
                                <form id="srform">
                                <?php 
                                        foreach ($subject as $val) {
                                         
                                ?>
                                <div class="check-slide">
                                    <label class="label_check" for="radio-<?php echo $i; ?>"><input id="radio-<?php echo $i; ?>" type="radio" name="subject" value="<?php echo $val['subject_name']; ?>" class="r3"><?php echo $val['subject_name']; ?></label>
                                </div>
                            <?php 
                                $i = $i + 1;
                                    }
                             ?>
                                </form>
                            </div>
                            </div>
                    </div>
                    <div class="col-md-9">
                    	<div class="filter-row">
                           
                            <div class="search">
                                <input type="text" placeholder="Search" id="userdetail">
                                <input type="submit" value="">
                            </div>
                        </div>
                        <div class="row">
                            
                            <section class="our-teacher ttt">
            <div class="container">
                <div class="row rr">

                    <?php
function my_simple_crypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'my_simple_secret_key';
    $secret_iv = 'my_simple_secret_iv';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}
                foreach($data as $c)
                {

                    ?>

                    <div class="col-md-9 col-md-4">
                        <div>
                         <a href="<?php echo base_url('faculty-profile/'.my_simple_crypt($c['master_admin_email'],'e'));?>">
                        <div class="teacher-box" >
                            <div class="img">
                                <img src="<?php echo base_url('uploads/branch_faculty/'.$c['master_admin_image']);?>" alt="" style="width: 230px;height:250px;">
       <ul class="sosiyal-mediya">
    <li>
       <i class="fa fa-profile"></i>
    </li>
                                    
                                </ul>
                            </div>
                            <div class="info">
                                <div class="name"><a href="<?php echo base_url('faculty-profile/'.my_simple_crypt($c['master_admin_email'],'e'));?>"><?php echo $c['master_admin_name']; ?></a></div>
                                <div class="designation"><?php echo $c['branch_name']; ?></div>
                                <div class="designation"><?php echo date("Y")-substr($c['master_admin_join_date'],6,10)." Years Experiance"; ?></div>
                            </div>
                        </div>
                        </a>
                    </div>
                    </div>
                    <?php 
                }
                ?>
                </div></div></section>
                <div id="yy">
                    
                </div>
                        </div>
                        <div id="ppp">
                        <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            	
            </div>
        </section>


      
<?php $this->load->view('client/include/footer'); ?>
<script type="text/javascript">
  var page =0; 
  var page1 =0;
  var page2 = 0;
    $(document).ready(function(){
   

        $('#brform input').on('change', function() {

                branch_wise(page2);
        });    

        function branch_wise(page2)
          {

            $('.r2').prop('checked', false);
            $('.r3').prop('checked', false);

            var br_nm = $('input[name=branch]:checked', '#brform').val();
            
            $.ajax({
                 type:'post',
                 url:'<?php echo base_url();?>client/branch_faculty_detail',
                 dataType:'json',
                data:{br:br_nm,page2:page2},
                 success : function(data){
                    console.log(data);

                       $(".rr").hide();
                                          if(data['user'].length > 0)
                   {
                       var d = new Date();
                        var op = "<section class='our-teacher'><div class='container'>";

                       for(i=0;i<data['user'].length;i++)
                       {
                            
                            op += "<div class='col-md-9 col-md-4'><div class='teacher-box'><div class='img'><img src='"+window.location.origin+"/academy/uploads/branch_faculty/"+data['user'][i]['master_admin_image']+"' style='width: 230px;height:250px;'></div><div class='info'><div class='name'><a href='"+window.location.origin+"/academy/faculty-profile/"+data['user'][i]['master_admin_id']+"'>"+data['user'][i]['master_admin_name']+"</a></div><div class='designation'>"+data['user'][i]['branch_name']+"</div><div class='designation'>"+((d.getFullYear())-(parseInt(data['user'][i]['master_admin_join_date'].substr(6,10))))+" Years Experiance</div></div></div></div>";
                          }
                          
                          
                          op+="</div></section><div class='pagination3'><ul>";

                        for(j=1;j<=data['total'];j++)
                       {
                          op += "<span class='pagi1' id='"+j+"'><a id='s1' style='color:black;hover:background-color:blue;float: left;padding: 8px 16px;text-decoration: none;border: 1px solid #02cbf7;' >"+j+"</a></span>";
                      }

                        op+="</ul></div>";
                    }
                    else
                    {
                op = "<div align='center' readonly>No Records Are Available</div>";

                    }

                         $("#yy").html(op);
                         $('.ppp').hide();
                         $('.ttt').hide();
                }             

            });


          }

         $('#crform input').on('change', function() {

             course_wise(page1);             

        });

         function course_wise(page1)
          {

            $('.r1').prop('checked', false);
            $('.r3').prop('checked', false);

            var cr_nm = $('input[name=course]:checked', '#crform').val();

            $.ajax({
                 type:'post',
                 url:'<?php echo base_url();?>client/course_faculty_detail',
                 dataType:'json',
                 data:{cr:cr_nm,page1:page1},
                 success : function(data){
                    

                       $(".rr").hide();
                 if(data['user'].length > 0)
                   {
                       var d = new Date();
                        var op = "<section class='our-teacher'><div class='container'>";
                       for(i=0;i<data['user'].length;i++)
                       {
                            
                            op += "<div class='col-md-9 col-md-4'><div class='teacher-box' ><div class='img'><img src='"+window.location.origin+"/academy/uploads/branch_faculty/"+data['user'][i]['master_admin_image']+"' style='width: 230px;height:250px;'></div><div class='info'><div class='name'><a href='"+window.location.origin+"/academy/faculty-profile/"+data['user'][i]['master_admin_id']+"'>"+data['user'][i]['master_admin_name']+"</a></div><div class='designation'>"+data['user'][i]['branch_name']+"</div><div class='designation'>"+((d.getFullYear())-(parseInt(data['user'][i]['master_admin_join_date'].substr(6,10))))+" Years Experiance</div></div></div></div>";
                          }
                          
                          
                          op+="</div></section><div class='pagination2' style='display: inline-block;'><ul>";

                        for(j=1;j<=data['total'];j++)
                       {
                          op += "<span class='pagi1' id='"+j+"'><a id='s1' style='color:black;hover:background-color:blue;float: left;padding: 8px 16px;text-decoration: none;border: 1px solid #02cbf7;' >"+j+"</a></span>";
                        }

                        op+="</ul></div>";
                    }
                    else
                    {
                op = "<div align='center' readonly>No Records Are Available</div>";

                    }

                         $("#yy").html(op);
                         $('.ppp').hide();
                         $('.ttt').hide();
                }             

            });


          }


          $('#srform input').on('change', function() {

                subject_wise(page);
        });


          function subject_wise(page)
          {

            $('.r1').prop('checked', false);
            $('.r2').prop('checked', false);

            var br_nm = $('input[name=subject]:checked', '#srform').val();
            $.ajax({
                 type:'post',
                 url:'<?php echo base_url();?>client/subject_faculty_detail',
                 dataType:'json',
                 data:{br:br_nm,page:page},
                 success : function(data){
                    
                       $(".rr").hide();
                       if(data['user'].length > 0)
                       {
                       var d = new Date();
                        var op = "<section class='our-teacher'><div class='container'>";
                       for(i=0;i<data['user'].length;i++)
                       {
                            
                            op += "<div class='col-md-9 col-md-4'><div class='teacher-box' ><div class='img'><img src='"+window.location.origin+"/academy/uploads/branch_faculty/"+data['user'][i]['master_admin_image']+"' style='width: 230px;height:250px;'></div><div class='info'><div class='name'><a href='"+window.location.origin+"/academy/faculty-profile/"+data['user'][i]['master_admin_id']+"'>"+data['user'][i]['master_admin_name']+"</a></div><div class='designation'>"+data['user'][i]['branch_name']+"</div><div class='designation'>"+((d.getFullYear())-(parseInt(data['user'][i]['master_admin_join_date'].substr(6,10))))+" Years Experiance</div></div></div></div>";
                          }
                          
                          
                          op+="</div></section><div class='pagination1'><ul>";

                        for(j=1;j<=data['total'];j++)
                       {
                          op += "<span class='pagi1' id='"+j+"'><a id='s1' style='color:black;hover:background-color:blue;float: left;padding: 8px 16px;text-decoration: none;border: 1px solid #02cbf7;' >"+j+"</a></span>";
                     }

                        op+="</ul></div>";
                    }
                    else
                    {
                op = "<div align='center' readonly>No Records Are Available</div>";

                    }
                         $("#yy").html(op);
                         $('.ppp').hide();
                         $('.ttt').hide();
                }             

            });


          }

        $("body").on('click','.pagination1 .pagi',function(){
             page = $(this).attr("id");
             subject_wise(page);
        });    

        $("body").on('click','.pagination2 .pagi1',function(){
             page1 = $(this).attr("id");
             $(".pagi1").css("background-color","red");

             course_wise(page1);
        });

        $("body").on('click','.pagination3 .pagi2',function(){
             page2 = $(this).attr("id");
             branch_wise(page2);
        }); 


        $('#userdetail').on('keyup', function() {

             var search = $(this).val();

                $('.r1').prop('checked', false);
                $('.r3').prop('checked', false);
                $('.r2').prop('checked', false);

        if(search != "")
        {         
           $.ajax({
                 type:'post',
                 url:'<?php echo base_url();?>client/search_instructor',
                 dataType:'json',
                 data:{search:search},
                 success : function(data){
                       $(".rr").hide();
                   if(data['user'].length > 0)
                   {
                       var d = new Date();
                        var op = "<section class='our-teacher'><div class='container'>";
                       for(i=0;i<data['user'].length;i++)
                       {
                            
                            op += "<div class='col-md-9 col-md-4'><div class='teacher-box' ><div class='img'><img src='"+window.location.origin+"/academy/uploads/branch_faculty/"+data['user'][i]['master_admin_image']+"' style='width: 230px;height:250px;'></div><div class='info'><div class='name'><a href='"+window.location.origin+"/academy/faculty-profile/"+data['user'][i]['master_admin_id']+"'>"+data['user'][i]['master_admin_name']+"</a></div><div class='designation'>"+data['user'][i]['branch_name']+"</div><div class='designation'>"+((d.getFullYear())-(parseInt(data['user'][i]['master_admin_join_date'].substr(6,10))))+" Years Experiance</div></div></div></div>";
                          }
                          
                          
                          op+="</div></section>";

                        }
                        else
                        {
                            op = "<div align='center' readonly>No Records Are Available</div>";
                        }

                         $("#yy").html(op);
                         $('.ppp').hide();
                         $('.ttt').hide();
                }             

            });
       }
       else
       {

            location.reload();
       }

        });


    });
</script>


<style>


 #s1.active {
    background-color: #4CAF50;
    color: blue;
    border: 1px solid #4CAF50;
}

 #s1:hover:not(.active) {background-color: #ddd;}


</style>