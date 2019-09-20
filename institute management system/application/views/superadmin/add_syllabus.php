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
	
 <button type="button" class="btn btn-warning btn-md ins" data-toggle="modal" data-target="#addsyllabus">Add Syllabus</button>
	<div>
		<br>
	</div>
	<div class="box-content">
		<h4 class="box-title">Syllabus</h4>
		<div class="col-md-3">
		</div>		
				<div align="center" class="col-md-6">
					<label class="form_control">Select Course</label>
					<select class="form-control" name="select_course" id="select_course">
						
					</select>
				</div>
		<div class="col-md-3">
		</div>	

				<br><br><br><br><br><br>
			<table class="table">
  		<thead>
    <tr>
      <th scope="col">Subject Name</th>
      <th scope="col">Content</th>
      <th></th>
      <th></th>
    </tr>

  </thead>
  <tbody id="sy">
    	
  </tbody>
</table>
<div align="center" class="table">
	<button type="button" class="btn btn-default btn-md" id="printb">Syllabus Print/Download</button>
</div>
	</div>

<?php $this->load->view('superadmin/footer.php'); ?>

 <div class="modal fade" id="addsyllabus" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD SYLLABUS</h4>
        </div>
        <div class="modal-body">
        	<div class="box-content">
        	<div class= "col-md-12">
        						<?php echo form_open(base_url("super_admin/add_syllabus_detail"), array('id'=>'coursereg'));  ?>

				<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select Course '); ?>	

							
							<select class="form-control" name="course_id" id="course">	
							</select>		
				</div>
			</div>
				<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select Subject '); ?>	

							
							<select class="form-control" name="subject_id" id="subject">	
							</select>		
				</div>
			</div>
		</div>
		<div class= "col-md-12">
			<?php echo form_label('Syllabus Content'); ?>
			<textarea name="syllabus_content" id="syllabus_content" class="form-control"></textarea>
		</div>
	
		
		</div>
			 <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-md" id="addsyllabus">ADD Syllabus</button>
           <?php echo form_close(); ?>
        </div>
        </div>
       
       
      </div>
     </div> 
     		</div>

 <div class="modal fade" id="upsyllabus" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">UPDATE SYLLABUS</h4>
        </div>
        <div class="modal-body">
        	<div class="box-content">
        	<div class= "col-md-12">
        						<?php echo form_open(base_url("super_admin/update_syllabus_detail"), array('id'=>'coursereg'));  ?>

				<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select Course '); ?>	

							
							<select class="form-control" name="course_id" id="upcourse">	
							</select>		
				</div>
			</div>
				<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select Subject '); ?>	

							
							<select class="form-control" name="subject_id" id="upsubject">	
							</select>		
				</div>
			</div>
		</div>
		<div class= "col-md-12">
			<?php echo form_label('Syllabus Content'); ?>
			<textarea name="syllabus_content" id="upsyllabus_content" class="form-control"></textarea>
		</div>
	<input type="hidden" name="syllabus_id" id="upsubject_id">
		
		</div>
			 <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-md" id="upsyllabus" name="submit">UPDATE Syllabus</button>
           <?php echo form_close(); ?>
        </div>
        </div>
       
       
      </div>
     </div> 
     		</div>

  
<script type="text/javascript">
  	$(document).ready(function(){

  		$(".table").hide();

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
						$("#select_course").html(op);
				}
			});

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


  				$("#course").change(function(){

				var cid = document.getElementById("course").value;
			
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>super_admin/get_subject',
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

   		$("#select_course").change(function(){

				var cid = document.getElementById("select_course").value;
			
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>super_admin/get_syllabus',
				data:{course_id:cid},
				dataType : 'json',
				success : function(data){
						$(".table").show();

						var op = "";
						for(i=0;i<data.length;i++)
						{
							op += "<tr><td>"+data[i].subject_name+"</td><td>"+data[i].syllabus_content+"</td><td><button type='button' name='update' data-id="+[data[i].syllabus_id,data[i].course_id]+" class='btn btn-primary btn-xs update'>Update</button></td><td><button type='button' name='delete' data-id="+data[i].syllabus_id+" class='btn btn-danger btn-xs del' >Delete</button></td></tr>";
						}		
					
					$("#sy").html(op);
				}
			});


				$("#printb").click(function(){

						window.location.href =  "<?php echo base_url();?>super_admin/download_syllabus/"+cid;
				});
	
		});

   			$("body").on('click','.del',function(){

   				var id = $(this).data('id');

   				$.ajax({
   					type:'post',
					url:'<?php echo base_url();?>super_admin/delete_syllabus',
					data:{syllabus_id:id},
					success : function(data){
						alert(data);
					    window.location.href = "<?php echo base_url();?>super_admin/add_syllabus";
					}				
   				});
			});
			

   			$("body").on('click','.update',function(){

   				var id = $(this).data('id');
   				$.ajax({
   		 			type:'post',
					 url:'<?php echo base_url();?>super_admin/fetch_syllabus',
					 data:{syllabus_id:id[0]},
					 dataType:'json',
					 success : function(data){
					
						$("#upsyllabus #upsyllabus_content").val(data[0].syllabus_content);
						$("#upsyllabus #upsubject_id").val(data[0].syllabus_id);
						$("#upsyllabus").modal("show");
					 }				
   		 		});



   				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>super_admin/fetch_course_s',
				data:{syllabus_id:id[0]},
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
   				
   				$.ajax({


				type:'post',
				url:'<?php echo base_url();?>super_admin/fetch_subject_s',
				
				data:{syllabus_id:id[0],course_id:id[2]},
				
				dataType : 'json',
				success : function(data){
				
				console.log(data.s[0].subject_id);

				var op = "<option>select</option>";

					
					for(i=0;i<data.s.length;i++)
					{
						if(data.s[i].subject_id == data.t[0].subject_id)
						{
							op += "<option value = "+data.s[i].subject_id + " selected >"+ data.s[i].subject_name+"</option>"
						}
						else
						{
							op += "<option value = "+data.s[i].subject_id + ">"+ data.s[i].subject_name+"</option>"	
						}
						
					}
						$("#upsubject").html(op);
				}
	
				

			});


			});

   			$("#upcourse").change(function(){

				var cid = document.getElementById("upcourse").value;
			
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>super_admin/get_subject',
				data:{course_id:cid},
				dataType : 'json',
				success : function(data){
						var op = "<option>select</option>";

					for(i=0;i<data.length;i++)
					{

						op += "<option value = "+data[i].subject_id + ">"+ data[i].subject_name+"</option>"
				
					}
						$("#upsubject").html(op);
				
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
  
