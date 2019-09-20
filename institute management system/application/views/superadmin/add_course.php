<?php $this->load->view('superadmin/header.php'); ?>
<?php

	 if($feedback=$this->session->flashdata('feedback'))
	 {
		$feedback_c=$this->session->flashdata('feedback_c');
?>
     <div class="alert alert-dismissible <?php $feedback_c ?>">
      <b><?php echo $feedback; ?></b>
    </div>
  
<?php } ?>
	
 <button type="button" class="btn btn-warning btn-md ins" data-toggle="modal" data-target="#addcourse">ADD COURSE</button>
	<div>
		<br>
	</div>
	<div class="box-content">
		<h4 class="box-title">Course</h4>		
			<table id="courserecord" class="table table-striped table-bordered dt-responsive nowrap" >

						<thead>
							<tr>
								<th>COURSE SNO</th>
								<th></th>
								<th></th>
								<th>COURSE NAME</th>
								<th>COURSE DURATION</th>
								<th>COURSE DURATION TYPE</th>
								<th>COURSE DESCRIPTION</th>
								<th>COURSE FEE</th>
								<th>COURSE DISPLAY PICTURE</th>
								<th>COURSE COVER PICTURE</th>
							</tr>
						</thead>
		<tbody>

		<?php $cnt = 1;
		if(count($data))
		{
        	foreach ($data as $dt): ?>
            <tr>
                <td><?php echo $cnt++; ?></td>
                <td>
                 		<button name="update" id="<?php echo $dt['course_id']; ?>" class="btn btn-success btn-xs update">Update</button>
                 </td>
                 <td>
                 		 <a href="<?php echo base_url('super_admin/delete_course/'.$dt['course_id']); ?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Are you sure to delete?')">Delete</a>
                 </td>
                <td><?php echo $dt['course_name']; ?></td>
                <td><?php echo $dt['course_duration']; ?></td>
                <td><?php echo $dt['course_duration_type']; ?></td>
                <td><?php echo $dt['course_des']; ?></td>
                <td><?php echo $dt['course_fee']." Rs"; ?></td>

                <td><img src="<?php echo base_url('uploads/course_image/'.$dt['course_display_pic']); ?>" height=40 width=50 ></td>
                
                <td><img src="<?php echo base_url('uploads/course_image/'.$dt['course_cover_pic']); ?>" height=40 width=50 ></td>
                 
 				
            </tr>
        <?php endforeach; 
    	}
    	else
    	{
    	?>
    		<tr>
			<td colspan="10"> No Records.....</td>
			</tr>
		<?php
    	}
        ?>
						</tbody>
					</table>
</div>

<?php $this->load->view('superadmin/footer.php'); ?>

 <div class="modal fade" id="addcourse" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD COURSE</h4>
        </div>
        <div class="modal-body">
        	<div class="box-content">
        	<div class= "col-md-12">

				<?php echo form_open_multipart(base_url("super_admin/add_course_detail"), array('id'=>'coursereg'));  ?>
				<div class="form-group">
							<?php echo form_label('Course Name'); ?>	

							<?php echo form_input('course_name','',array('id'=>'course_name','class'=>'form-control','placeholder'=>'Enter Course Name','required'=>'required')); ?>	

				</div>
			</div>
			
		<div class= "col-md-12">
			
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Course Duration'); ?>	

							<?php echo form_input('course_duration','',array('id'=>'course_duration','class'=>'form-control','placeholder'=>'Enter Duration','required'=>'required')); ?>	
				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Course Duration Type'); ?>	

							
							<select class="form-control" name="course_duration_type" id="course_duration_type">
								<option>select</option>
								<option value="day">days</option>
								<option value="month">months</option>
								<option value="year">years</option>
						</select>	
				</div>
			</div>
		</div>
		<div class= "col-md-12">
			<?php echo form_label('Course Description'); ?>
			<textarea name="course_des" id="course_des" rows="5" cols="30" class="form-control"></textarea>
		</div>
		<div class= "col-md-12">
				<div class="form-group">
							<?php echo form_label('Course Fees'); ?>	

							<?php echo form_input('course_fee','',array('id'=>'course_fee','class'=>'form-control','placeholder'=>'Enter Course Fees','required'=>'required')); ?>	
				</div>
			</div>
		<div class= "col-md-12">
			
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Course Display Picture'); ?>	

							<input type="file" name="userfile1" id="course_display_pic" class="form-control">	
				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Course Cover Picture'); ?>	

							<input type="file" name="userfile2" id="course_cover_pic" class="form-control">	
				</div>
				</div>
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-md" id="insertcourse">ADD Course</button>
        </div>
        <?php echo form_close(); ?>
      </div>
     </div> 
     		</div>

    </div>
  </div>



<div class="modal fade" id="updatecourse" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">UPDATE COURSE</h4>
        </div>
        <div class="modal-body">
        	<div class="box-content">
<div class= "col-md-12">

				<?php echo form_open_multipart(base_url("super_admin/update_course"), array('id'=>'coursereg'));  ?>
				<div class="form-group">
							<?php echo form_label('Course Name'); ?>	

							<?php echo form_input('course_name','',array('id'=>'upcourse_name','class'=>'form-control','placeholder'=>'Enter Course Name','required'=>'required')); ?>	

				</div>
			
		</div>
		<div class= "col-md-12">
			
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Course Duration'); ?>	

							<?php echo form_input('course_duration','',array('id'=>'upcourse_duration','class'=>'form-control','placeholder'=>'Enter Duration','required'=>'required')); ?>	
				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Course Duration Type'); ?>	

							
							<select class="form-control" name="course_duration_type" id="upcourse_duration_type">
								<option>select</option>
								<option value="day">days</option>
								<option value="month">months</option>
								<option value="year">years</option>
						</select>	
				</div>
			</div>
		</div>
		<div class= "col-md-12">
			<?php echo form_label('Course Description'); ?>
			<textarea name="course_des" id="upcourse_des" rows="5" cols="30" class="form-control"></textarea>
		</div>
		<div class= "col-md-12">
				<div class="form-group">
							<?php echo form_label('Course Fees'); ?>	

							<?php echo form_input('course_fee','',array('id'=>'upcourse_fee','class'=>'form-control','placeholder'=>'Enter Course Fees','required'=>'required')); ?>	
				</div>
			</div>
		<div class= "col-md-12">
			
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Course Display Picture'); ?>	

							<input type="file" name="userfile1" id="course_display_pic" class="form-control">	
							<input type="hidden" name="course_display_pic" id="upcourse_display_pic">
				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Course Cover Picture'); ?>	

							<input type="file" name="userfile2" id="course_cover_pic" class="form-control">	
														<input type="hidden" name="course_cover_pic" id="upcourse_cover_pic">

				</div>
				</div>
			</div>
		</div>
        </div>
        <input type="hidden" name="course_id" id="course_id">
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-md" id="updatecourse">Update Course</button>
        </div>
        <?php echo form_close(); ?>
      </div>
     </div> 
    </div>
  </div>

  <script type="text/javascript">
  	$(document).ready(function(){
  		
  		
		$('.update').click(function(){

			var uid = $(this).attr("id"); 
			
			$.ajax({
				type:'post',
				url:'<?php echo base_url();?>super_admin/retrive_course',
				data:{course_id:uid},
				dataType : 'json',
				success : function(data){
						$('#updatecourse').modal("show");
						$('#upcourse_duration').val(data[0].course_duration);
						$('#upcourse_fee').val(data[0].course_fee);
						$('#upcourse_duration_type').val(data[0].course_duration_type);
						$('#course_id').val(data[0].course_id);
						$('#upcourse_name').val(data[0].course_name);
						$('#upcourse_des').val(data[0].course_des);
						$('#upcourse_display_pic').val(data[0].course_display_pic);
						$('#upcourse_cover_pic').val(data[0].course_cover_pic);

				}

			});

	
   		});


		});

   		
  </script>
  <script type="text/javascript" language="javascript">
  	$(document).ready(function(){  
      $('#courserecord').dataTable({
    columnDefs: [{ orderable: false, "targets": [2,1] }]/* -1 = 1st colomn, starting from the right */
	});  
  });
  </script>
  
