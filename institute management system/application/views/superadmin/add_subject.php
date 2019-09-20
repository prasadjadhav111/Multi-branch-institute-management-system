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
	
 <button type="button" class="btn btn-warning btn-md ins" data-toggle="modal" data-target="#addsubject">ADD SUBJECT</button>
	<div>
		<br>
	</div>
	<div class="box-content">
		<h4 class="box-title">Subject</h4>		
			<table id="subjectrecord" class="table table-striped table-bordered dt-responsive nowrap" >

						<thead>
							<tr>
								<th>SUBJECT SNO</th>
								<th>SUBJECT NAME</th>
								<th>COURSE NAME</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
		<tbody>

		<?php $cnt = 1;
		if(count($data))
		{
        	foreach ($data as $dt): ?>
            <tr>
                <td><?php echo $cnt++; ?></td>
                <td><?php echo $dt['subject_name']; ?></td>
                <td><?php echo $dt['course_name']; ?></td>
                
                 
                 <td>
                 		<button type="button" name="update" id="<?php echo $dt['subject_id']; ?>" class="btn btn-success btn-xs update">Update</button>
                 </td>
                 <td>
                 		 <a href="<?php echo base_url('super_admin/delete_subject/'.$dt['subject_id']); ?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Are you sure to delete?')">Delete</a>
                 </td>
 				
            </tr>
        <?php endforeach; 
    	}
    	else
    	{
    	?>
    		<tr>
			<td colspan="8"> No Records.....</td>
			</tr>
		<?php
    	}
        ?>
						</tbody>
					</table>
</div>

<?php $this->load->view('superadmin/footer.php'); ?>

 <div class="modal fade" id="addsubject" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD SUBJECT</h4>
        </div>
        <div class="modal-body">
        	<div class="box-content">
			<div class= "col-md-6">

				<?php echo form_open(base_url("super_admin/add_subject_detail"), array('id'=>'subjectreg'));  ?>
				<div class="form-group">
							<?php echo form_label('subject Name'); ?>	

							<?php echo form_input('subject_name','',array('id'=>'subject_name','class'=>'form-control','placeholder'=>'Enter Subject Name','required'=>'required')); ?>	

				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Course Name'); ?>	

							
							<select class="form-control" name="course_id" id="course">	
							</select>		
				</div>
			</div>
		</div>
		
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-md" id="insertsubject">ADD Subject</button>
        </div>
        <?php echo form_close(); ?>
     </div> 
    </div>
  </div>
</div>


<div class="modal fade" id="updatesubject" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">UPDATE COURSE</h4>
        </div>
         <div class="modal-body">
        	<div class="box-content">
			<div class= "col-md-6">

				<?php echo form_open(base_url("super_admin/update_subject"), array('id'=>'subjectup'));  ?>
				<div class="form-group">
							<?php echo form_label('subject Name'); ?>	

							<?php echo form_input(array('name'=>'subject_name','id'=>'upsubject_name','class'=>'form-control','placeholder'=>'Enter Subject Name','required'=>'required')); ?>	

				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Course Name'); ?>	

							
							<select class="form-control" name="course_id" id="upcourse">	
							</select>		
				</div>
			</div>
			 <input type="hidden" name="subject_id" id="upsubject_id" />
		</div>
		
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-md" id="updatesubject">UPDATE Subject</button>
        </div>
        <?php echo form_close(); ?>
     </div> 
     </div> 
    </div>
  </div>


  <script type="text/javascript">
  	$(document).ready(function(){
  		
   		$('.ins').click(function(){

  				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>super_admin/get_course',
				dataType : 'json',
				success : function(data){
					var op = "<option>select</option>";

					for(i=0;i<data.length;i++)
					{

						op += "<option value = "+data[i].course_id + ">"+ data[i].course_name+"</option>"
				
					}
						$("#course").html(op);
				}
			});

   		});

   				$('.update').click(function(){

			var uid = $(this).attr("id"); 
			
			$.ajax({
				type:'post',
				url:'<?php echo base_url();?>super_admin/retrive_subject',
				data:{subject_id:uid},
				dataType : 'json',
				success : function(data){
						$('#updatesubject').modal("show");
						$('#upsubject_name').val(data[0].subject_name);
						$('#upsubject_id').val(data[0].subject_id);		
				}

			});

			$.ajax({
				type:'post',
				url:'<?php echo base_url();?>super_admin/fetch_course',
				data:{subject_id:uid},
				dataType : 'json',
				success : function(data){
						
	
						var op = "<option>select</option>";

					for(i=0;i<data.c.length;i++)
					{

						if(data.c[i].course_id == data.t[0].course_id)
						{
							op += "<option value = "+data.c[i].course_id + " selected >"+ data.c[i].course_name+"</option>";
						}
						else
						{
							op += "<option value = "+data.c[i].course_id + ">"+ data.c[i].course_name+"</option>";
					
						}
						
					}
						$("#upcourse").html(op);

				}
	
				

			});

	
   		});


   		
  	});
  </script>
  <script type="text/javascript" language="javascript">
  	$(document).ready(function(){  
      $('#subjectrecord').dataTable({
    columnDefs: [{ orderable: false, "targets": [-2,-1] }] /* -1 = 1st colomn, starting from the right */
	}); 
	}); 
  </script>
  
