<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
       

        <?php
$data1['data']='courses-banner.jpg';
$data1['msg']='Courses';
 $this->load->view('client/include/banner',$data1);
  ?> 
        <section class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('courses'); ?>">All courses</a></li>
                </ul>
            </div>
        </section>




  <section class="courses-view list-view">
            <div class="container">
                <div class="filter-row">
                    <div class="search">
                        <input type="text" placeholder="Search" id="coursedetail">
                        <input type="submit" value="">
                    </div>
                </div>
                <div id="rr">
              <?php 
                foreach($data as $c)
                {
                    ?>
                
                      <div class="course-post">
                    <div class="img">
                        <img src="<?php echo base_url('uploads/course_image/'.$c['course_display_pic']);?>" alt="" style="height: 300px">

                        <div class="icon">
                            <a href="#"><img src="<?php echo base_url('assets/assets_client/images/book-icon.png');?>" alt=""></a>
                        </div>

                        <div class="price"><?php echo $c['course_fee']; ?></div>
                    </div>

                    <div class="info">
                        <div class="name"><?php echo $c['course_name']; ?></div>
                        <div class="product-footer">
                            <p><?php echo $c['course_des']; ?></p>
                            <div class="view-btn2">
                                <a href="<?php echo base_url('courses/').$c['course_name']; ?>" class="btn">view more</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
                <div id="yy">
                    
                </div>
                    <?php 
                }
                ?>
                <?= $this->pagination->create_links(); ?>
                
               
            </div>
        </section>

<?php $this->load->view('client/include/footer'); ?>
<script type="text/javascript">
    $(document).ready(function(){

        $('#coursedetail').on('keyup', function() {

             var search = $(this).val();

        if(search != "")
        {         
           $.ajax({
                 type:'post',
                 url:'<?php echo base_url();?>client/search_course_ajax',
                 dataType:'json',
                 data:{search:search},
                 success : function(data){
                    
                       $("#rr").hide();
                   if(data.length > 0)
                   {


                        var op = "";
                       for(i=0;i<data.length;i++)
                       {
                            
                            op += "<div class='course-post'><div class='img'><img src='"+window.location.origin+"/academy/uploads/course_image/"+data[i]['course_display_pic']+"' style='height: 300px'><div class='icon'><a href='#'><img src='"+window.location.origin+"/academy/assets/assets_client/images/book-icon.png"+"'></a></div><div class='price'>"+data[i]['course_fee']+"</div></div><div class='info'><div class='name'>"+data[i]['course_name']+"</div><div class='product-footer'><p>"+data[i]['course_des']+"</p><div class='view-btn2'><a href='"+window.location.origin+"/academy/courses/"+data[i]['course_name']+"' class='btn'>view more</a></div></div></div></div>";
                          }

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