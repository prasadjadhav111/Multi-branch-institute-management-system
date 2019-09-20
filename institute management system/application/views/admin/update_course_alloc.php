<?php $this->load->view('faculty/header.php'); ?>
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
		<h4 class="box-title">Online Test</h4>		
			<table id="testrecord" class="table table-striped table-bordered dt-responsive nowrap" >

						<thead>
							<tr>
								<th>Test SNO</th>
								<th>TEST NAME</th>
								<th>COURSE NAME</th>
								<th>SUBJECT NAME</th>
								<th>TOTAL NUMBER OF QUESTIONS</th>
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
                <td><?php echo $dt['test_name']; ?></td>
                <td><?php echo $dt['course_name']; ?></td>
                <td><?php echo $dt['subject_name']; ?></td>
                <td><?php echo $dt['number_of_que']; ?></td>
                 
                 <td>
                 		<button type="button" name="update" id="<?php echo $dt['test_id']; ?>" class="btn btn-success btn-xs update">Update</button>
                 </td>
                 <td>
                 		 <a href="<?php echo base_url('faculty/delete_test/'.$dt['test_id']); ?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Are you sure to delete?')">Delete</a>
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

<?php $this->load->view('faculty/footer.php'); ?>

 <div class="modal fade" id="addtest" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD TEST</h4>
        </div>
        <div class="modal-body">
        	<div class="box-content">
        	<div class= "col-md-12">
			<div class= "col-md-6">

				<?php echo form_open(base_url("faculty/add_test"), array('id'=>'testreg'));  ?>
				<div class="form-group">
							<?php echo form_label('Test Name'); ?>	

							<?php echo form_input('test_name','',array('id'=>'test_name','class'=>'form-control','placeholder'=>'Enter Test Name','required'=>'required')); ?>	

				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select Course'); ?>

							<select class="form-control" name="course_id" id="course">
							</select>
				</div>
			</div>
		</div>
		<div class= "col-md-12">
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select Subject'); ?>


							<select class="form-control" name="subject_id" id="subject">
								<option>select</option>
							</select>
				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Total Number of Questions'); ?>	

							<?php echo form_input('number_of_que','',array('id'=>'questions','class'=>'form-control','placeholder'=>'Enter Total Number of Questions','required'=>'required')); ?>	
				</div>
			</div>
		</div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-md" id="inserttest">ADD TEST</button>
        </div>
        <?php echo form_close(); ?>
      </div>
     </div> 
    </div>
  </div>


<div class="modal fade" id="updatetest" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">UPDATE TEST</h4>
        </div>
        <div class="modal-body">
        	<div class="box-content">
        	<div class= "col-md-12">
			<div class= "col-md-6">

				<?php echo form_open(base_url("faculty/update_test"), array('id'=>'testup'));  ?>
				<div class="form-group">
							<?php echo form_label('Test Name'); ?>	

							<?php echo form_input('test_name','',array('id'=>'up_test_name','class'=>'form-control','placeholder'=>'Enter Test Name','required'=>'required')); ?>	

				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select Course'); ?>

							<select class="form-control" name="course_id" id="upcourse">
							</select>
				</div>
			</div>
		</div>
		<div class= "col-md-12">
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select Subject'); ?>


							<select class="form-control" name="subject_id" id="upsubject">
								<option>select</option>
							</select>
				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Total Number of Questions'); ?>	

							<?php echo form_input('number_of_que','',array('id'=>'up_questions','class'=>'form-control','placeholder'=>'Enter Total Number of Questions','required'=>'required')); ?>	
				</div>
			</div>
		</div>
                          <input type="hidden" name="test_id" id="test_id" />  
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-md" id="updatetest">UPDATE TEST</button>
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
				url:'<?php echo base_url();?>faculty/get_course',
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

   		$("#course").change(function(){

				var cid = document.getElementById("course").value;
			
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>faculty/get_subject',
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

		$('.update').click(function(){

			var uid = $(this).attr("id"); 
			
			$.ajax({
				type:'post',
				url:'<?php echo base_url();?>faculty/retrive_test',
				data:{test_id:uid},
				dataType : 'json',
				success : function(data){
						$('#updatetest').modal("show");
						$('#up_questions').val(data[0].number_of_que);
						$('#up_test_name').val(data[0].test_name);
						$('#test_id').val(data[0].test_id);

				}
			});

			$("#updatetest").show(function(){
			
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>faculty/fetch_course',
				data:{test_id:uid},
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

						$("#upcourse").html(op);
				}
			});

			$.ajax({

				type:'post',
				url:'<?php echo base_url();?>faculty/fetch_subject',
				data:{test_id:uid},
				dataType : 'json',
				success : function(data){
					
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

			$("#upcourse").change(function(){

				var cid = document.getElementById("upcourse").value;
			
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>faculty/get_subject',
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

   		});

   		
  	});
  </script>
  <script type="text/javascript" language="javascript">
  	$(document).ready(function(){  
      $('#testrecord').dataTable({
    columnDefs: [{ orderable: false, "targets": [-2,-1] }] /* -1 = 1st colomn, starting from the right */
	});  
  </script>
  
