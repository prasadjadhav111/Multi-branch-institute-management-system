<?php include('header.php'); ?>
<?php if($fedback=$this->session->flashdata('feedback')):
		$fc=$this->session->flashdata('feedback_c');
?>
     <div class="row">
    <div class="col-lg-8 col-lg-offset-3">
    <div class="alert alert-dismissible <?= $fc; ?>">
      <b><?= $fedback; ?></b>
    </div>
  </div>
</div>
<?php endif; ?>

 	<div class="row small-spacing">
 <button type="button" id="add_button" data-toggle="modal" data-target="#addassignment" class="btn btn-success btn-sm">Send New Assignment</button>  

			<div class="col-xs-12">
                <br /><br />  

				<div class="box-content">
					<h4 class="box-title">Role</h4>
					<!-- /.box-title -->
					
	 <!-- <table id="" class="table table-bordered table-striped"> --> 
<table id="user_data" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

						<thead>
							<tr>
								<th>Srno</th>
								<th>Assingment Title</th>
								<th>Course</th>
								<th>Subject</th>
                <th>Description</th>
                <th>File</th>
                <th>Date</th> 
							</tr>
						</thead>
			
						<tbody>
		<?php $cnt = 1;
		if(count($data))
		{
        foreach ($data as $dt): ?>
            <tr>
                <td><?php echo $cnt++; ?></td>
                <td><?php echo $dt['title']; ?></td>
                <td><?php echo $dt['course']; ?></td>
                <td><?php echo $dt['subject']; ?></td>
                <td>
                <button type="button" id="<?php echo $dt['assignment_id']; ?>" class="btn  update"><i class="fa fa-eye "></i></button>
                
                
                 </td>
                <!-- <td><?php echo $dt['description']; ?></td> -->
                <!-- <td><?php echo $dt['file']; ?></td> -->
     <td> <a href="<?php echo base_url('faculty/download/'.$dt['file']); ?>" class="glyphicon glyphicon-download  fa-2x"> </a>
     </td>

                <td><?php echo $dt['dateofc']; ?></td>
                
                 
            </tr>
        <?php endforeach; 
    	}
    	else
    	{
    	?>
    		<tr>
			<td colspan="7"> No Records.....</td>
			</tr>
		<?php
    	}
        ?>
						</tbody>
					</table> 
</div>
</div>
</div>

		

<?php include('footer.php'); ?>

<div class="modal fade" id="addassignment" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD ASSIGNMENT</h4>
        </div>
        <div class="modal-body">
          <div class="box-content">

          
        <?php echo form_open_multipart(base_url("faculty/add_assignment"), array('id'=>'coursereg','data-toggle'=>'validator'));  ?>

<div class= "col-md-12">
  <div class= "col-md-12">
        <div class="form-group">
       <?php echo form_label('Assignment Title'); ?>  
       <?php echo form_input('assignment_title','',array('id'=>'assignment_title','class'=>'form-control','placeholder'=>'Enter Course Name','required'=>'required','pattern'=>'^[A-z]*$')); ?>  
        <div class="help-block with-errors"></div>
     
    </div>
 


    </div>
</div>
<div class= "col-md-12">
       <div class= "col-md-6">
        <div class="form-group">
             <input type="hidden" name="branch_id"  value="<?php echo $bid=$this->session->userdata('branch_id');
     ?>">

              <?php echo form_label('Select Course'); ?>
              <select class="form-control" name="course_id" validate[required] id="course" required>

             </select> 
             <div class="help-block with-errors"></div>
       </div>
       </div>
       <div class= "col-md-6">
        <div class="form-group">

              <?php echo form_label('Select Subject'); ?>
              <select class="form-control" name="subject_id" id="subject" required>
              </select> 
              <div class="help-block with-errors"></div>
        </div>
      </div> 
</div>


<div class= "col-md-12">
    
        <div class="form-group">
              <?php echo form_label('Assignment Description'); ?> 

          <?php echo form_textarea(['name'=>'assignment_description','class'=>'form-control','placeholder'=>'Branch Address','required'=>'required']); ?>
          <div class="help-block with-errors"></div>

        </div> 


      </div>

<div class= "col-md-12">
        <div class="form-group">
             <div class="form-group">
              <?php echo form_label('Assignment Attachment'); ?> 
              <input type = "file" name = "userfile"  class="form-control" required>
              <div class="help-block with-errors"></div>
             </div>
       </div> 
</div>
    </div>



        </div>
        <div class="modal-footer">
             <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />  
       </div>
        <?php echo form_close(); ?>
      </div>
     </div> 
    </div>
  </div>


<!-- DESCRIPTION MODAL -->
 <div id="userModal" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="user_form" data-toggle="validator" action="<?php echo base_url('super_admin/update_role');?>">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Description</h4>  
                     </div>  
                     <div class="modal-body">  
                         
                        <div class="form-group">
                
           <?php echo form_textarea(['name'=>'role','id'=>'role','class'=>'form-control','placeholder'=>'Branch Address','required'=>'required']); ?>
   
            <!-- <input type="text" pattern="^[A-z]*$" maxlength="15" name ="role" id="role" class="form-control"  placeholder="Enter Role" required>
 -->
            <div class="help-block with-errors"></div>


              </div>

                     </div>  
                     <div class="modal-footer">  
                        
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>  


	 
<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
    

      $('#add_button').click(function(){
        $.ajax({
         type:'post',
         url:'<?php echo base_url('faculty/fetch_faculty_course');?>',
         dataType:'json',
         success:function(data){
          var op="<option  selected disabled>select course</option>";
          for(i=0;i<data.length;i++)
          {
            op+="<option value="+data[i].course_id+">"+data[i].course_name+"</option>";
          }
          $("#course").html(op);
        } 

        });
      
    $('#course').change(function(){
      var id=this.value;
             $.ajax({
              type:'post',
              data:{'course_id':id},
              url:'<?php echo base_url('faculty/fetch_faculty_subject');?>',
              dataType:'json',
              success:function(data){
                   var op="<option selected disabled>Select Subject</option>";
          for(i=0;i<data.length;i++)
          {
            op+="<option value="+data[i].subject_id+">"+data[i].subject_name+"</option>";
          }
          $("#subject").html(op);
        
              }
             });

      });  
      });  




      $(document).on('click', '.update', function(){  
      
          var assignment_id = $(this).attr("id"); 
          
            $.ajax({
                url:"<?php echo base_url(); ?>faculty/fetch_assignment_description",  
                method:"POST",  
                data:{id:assignment_id},  
                dataType:"json",  
                success:function (data) {
                    $.each(data,function (key,value) {
                     // alert(value.assignment_description);
                        $('#role').val(value.assignment_description);
                         $('#userModal').modal('show'); 
                        //  //alert(value.role);
                    });
                }
            });
          
            
      }); 

        });  
 
 </script>  

