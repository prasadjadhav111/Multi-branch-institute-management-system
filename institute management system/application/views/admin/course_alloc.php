<?php $this->load->view('admin/header.php'); ?>

<?php

	 if($feedback=$this->session->flashdata('feedback'))
	 {
		$feedback_c=$this->session->flashdata('feedback_c');
?>
     <div class="alert alert-dismissible <?php $feedback_c ?>">
      <b><?php echo $feedback; ?></b>
    </div>
  
<?php } ?>
	
 
	<div class="box-content">
		<h4 class="box-title">Course Allocation</h4>		
			<table id="coursesrecord" class="table table-striped table-bordered dt-responsive nowrap" width="100%" >

						<thead>
							<tr>
								<th>Srno</th>
								<th>Faculty Name</th>
								<th>Email</th>
								<th>Course</th>
								<th>Subject</th>
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
                <td><?php echo $dt['master_admin_name']; ?></td>
                <td><?php echo $dt['master_admin_email']; ?></td>
               <td><?php echo $dt['course_name']; ?></td>
                 <td><?php echo $dt['subject_name']; ?></td>
               
                  <td>
                 		<button type="button" name="update" id="<?php echo $dt['faculty_id']; ?>" class="btn btn-success btn-xs update">Update</button>
                 </td>
                 <td>
                 		 <a href="<?php echo base_url('admin/delete_course_alloc/'.$dt['faculty_id']); ?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Are you sure to delete?')">Delete</a>
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


<?php $this->load->view('admin/footer.php'); ?>

<div class="modal fade" id="updatecourse" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">UPDATE COURSE ALLOCATION</h4>
        </div>
        <div class="modal-body">
        	<div class="box-content">
        	<div class= "col-md-12">
			<div class= "col-md-6">

				<?php echo form_open(base_url("admin/update_course_alloc"), array('id'=>'testup'));  ?>
				<div class="form-group">
							<?php echo form_label('Faculty Name'); ?>	

							<?php echo form_input('master_admin_name','',array('id'=>'master_admin_name','class'=>'form-control', 'readonly'=>true)); ?>	

				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Faculty Email'); ?>	

							<?php echo form_input('master_admin_email','',array('id'=>'master_admin_email','class'=>'form-control', 'readonly'=>true)); ?>	

				</div>
			</div>
		</div>
		<div class= "col-md-12">
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select Course'); ?>
							<select class="form-control"  name="course_id" id="course">
									<option value>select</option>
									
							</select>
				</div>
				
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select Subject'); ?>
							<select class="form-control" name="subject_id" id="subject">
								<option value>select</option>
							</select>
				</div>
				
			</div>
</div>


                          <input type="hidden" name="faculty_id" id="faculty_id" />  
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-md" id="updatecourse">UPDATE COURSE ALLOCATION</button>
        </div>
        <?php echo form_close(); ?>
      </div>
     </div> 
    </div>
  </div>


<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#coursesrecord').dataTable({
    columnDefs: [{ orderable: false, "targets": [-2,-1] }] /* -1 = 1st colomn, starting from the right */
	});  
      
 });  
 </script> 

 <script type="text/javascript">
 	
 	$(document).ready(function(){
 		
 		$('.update').click(function(){
 			
			var uid = $(this).attr("id"); 
			
			$.ajax({
				type:'post',
				url:'<?php echo base_url();?>admin/retrive_course_alloc',
				data:{faculty_id:uid},
				dataType : 'json',
				success : function(data){
						$('#updatecourse').modal("show");
						 $('#master_admin_name').val(data[0].master_admin_name);
						 $('#master_admin_email').val(data[0].master_admin_email);
						 $('#faculty_id').val(data[0].faculty_id);
						 
						
				}
		});

			$("#updatecourse").show(function(){
			
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>admin/fetch_course_alloc',
				data:{faculty_id:uid},
				dataType : 'json',
				success : function(data){
				 var op = "<option>select</option>";

				
				 	for(i=0;i<data.c.length;i++)
				 	{
				 		if(data.c[i].course_id == data.t[0].course_id)
				 		{
				 			op += "<option value = "+data.c[i].course_id + " selected >"+ data.c[i].course_name+"</option>"

				 			var c = data.c[i].course_id;
				 		}
				 		else
				 		{
				 			op += "<option value = "+data.c[i].course_id + ">"+ data.c[i].course_name+"</option>"	
				 		}
						
				 	}

				 		$("#course").html(op);
				}
			});


				$.ajax({

				type:'post',
				url:'<?php echo base_url();?>admin/fetch_subject_alloc',
				data:{faculty_id:uid},
				dataType : 'json',
				success : function(data){
					
				var op = "<option>select</option>";
				//console.log(data);
					
					for(i=0;i<data.s.length;i++)
					{
						if(data.s[i].subject_id == data.t[0].subject_id)
						{
							//alert(data.t[0].subject_id);
							op += "<option value = "+data.s[i].subject_id + " selected >"+ data.s[i].subject_name+"</option>"
						}
						else
						{
							op += "<option value = "+data.s[i].subject_id + ">"+ data.s[i].subject_name+"</option>"	
						}
						
					}


						$("#subject").html(op);
				}
			});

				$("#course").change(function(){

				var cid = document.getElementById("course").value;
			
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>admin/get_subject',
				data:{course_id:cid},
				dataType : 'json',
				success : function(data){
					
				var op = "<option>select</option>";

					for(i=0;i<data.length;i++)
					{
						op += "<option value = "+data[i].subject_id + ">"+ data[i].subject_name+"</option>"
					}

						$("#subject").html(op);
				}
			});

		});

		});
 	 });
}); 		
 </script> 