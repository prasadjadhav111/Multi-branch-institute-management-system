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
		<h4 class="box-title">Students Details</h4>		
		<table id="testrecord" class="table table-striped table-bordered dt-responsive nowrap" width="100%">

						<thead>
							<tr>
								<th>Srno</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Contact</th>
								<th>Image</th>
								<th>Edit</th>
								<th>Active/Deactive</th>
								<!-- <th></th> -->
							</tr>
						</thead>
		<tbody>

		<?php $cnt = 1;
		if(count($data))
		{
        	foreach ($data as $dt): ?>
            <tr>
                <td><?php echo $cnt++; ?></td>
                <td><?php echo $dt['first_name']; ?></td>
                <td><?php echo $dt['last_name']; ?></td>
                <td><?php echo $dt['email']; ?></td>
                <td><?php echo $dt['mobile']; ?></td>
                <?php 
                if($dt['picture_url'])
                {
                	?>
                	<td><img src="<?php echo $dt['picture_url']; ?>" height=40 width=50 ></td>
                	<?php
                }
                else
                {
                	?>
                	<td>Not Available</td>
                	<?php
                }
                ?>
                
               
                

                

               
                  

<td>
	<button type="button" name="update" data-id="<?php echo $dt['student_id']; ?>" class="btn btn-primary btn-xs update">Update</button>
 				 
 </td>
    

                  <td>
                  	<?php 
                  	if($dt['status']==01)
                  	{
                  		?>
                  		<div class="switch primary">
								<input type="checkbox"  value="unchecked" onchange="change(this);" id="<?php echo  $dt['student_id']; ?>">
								<label for="<?php echo $dt['student_id']; ?>" id ="dec"></label>
							</div>
                  
                  		<?php
                  	}
                  	else
                  	{
                  	?>
                  <div class="switch primary">
								<input type="checkbox" checked  onchange="change(this);" value="checked" id="<?php echo $dt['student_id']; ?>">
								<label for="<?php echo $dt['student_id']; ?>" id="ac"></label>
							</div>
                  
                  	<?php

                  	}
                  	?>
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

	 <div id="userModal" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="user_form" data-toggle="validator" action="<?php echo base_url('admin/update_student');?>">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Update Role</h4>  
                     </div>  
                     <div class="modal-body">  
                         
                        <div class="form-group">
              <label for="inputEmail" class="control-label">Enter Firstname</label>
                    <input type="text" pattern="^[A-z]*$" maxlength="15" name ="first_name" id="first_name" class="form-control"  placeholder="Enter Role" required>

              <div class="help-block with-errors"></div>


              </div>

               <div class="form-group">
              <label for="inputEmail" class="control-label">Enter Lastname</label>
                    <input type="text" pattern="^[A-z]*$" maxlength="15" name ="last_name" id="last_name" class="form-control"  placeholder="Enter Role" required>

              <div class="help-block with-errors"></div>


              </div>

               <div class="form-group">
              <label for="inputEmail" class="control-label">Enter Email</label>
                    <input type="text"  name ="email" id="email" class="form-control"  placeholder="Enter Role" required>

              <div class="help-block with-errors"></div>


              </div>

               <div class="form-group">
              <label for="inputEmail" class="control-label">Enter Mobileno</label>
                    <input type="text"  maxlength="10" name ="mobile" id="mobile" class="form-control"  placeholder="Enter Mobile" >

              <div class="help-block with-errors"></div>


              </div>

                     </div>  
                     <div class="modal-footer">  
                          <input type="hidden"  name="student_id" id="student_id" />  
                          <input type="submit"  id="action" class="btn btn-success" value="Add" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>  

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
   
      $('#testrecord').dataTable({
    columnDefs: [{ orderable: false, "targets": [-2,-1,-3] }] /* -1 = 1st colomn, starting from the right */
	});  
});

      
 function change(a)
 {
 
   
 	if(a.value=="checked")
 	{
 		
 			var id=a.id;
 			$.ajax({
 				type : 'post',
 				url : '<?php echo base_url('admin/student_status_on'); ?>',
 				data : {data:id},
 				success : function(data){
 					a.value="unchecked";			
 				document.getElementById(id).checked = false;
        }

 			});
 			
 	}
 	else
 	{
 		var id=a.id;
 			$.ajax({
 				type : 'post',
 				url : '<?php echo base_url('admin/student_status_off'); ?>',
 				data : {data:id},
 				success : function(data){
 					a.value="checked";			
          document.getElementById(id).checked = true;
 				 
        }

 			});
 	}

 }

 </script>  


 <script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
 
       $(document).on('click', '.update', function(){  
          var user_id = $(this).attr("data-id"); 
          
            $.ajax({
                url:"<?php echo base_url(); ?>admin/fetch_student",  
                method:"POST",  
                data:{id:user_id},  
                dataType:"json",  
                success:function (data) {
                    $.each(data,function (key,value) {
                        $('#first_name').val(value.first_name);
                        $('#last_name').val(value.last_name);
                        $('#email').val(value.email);
                        $('#mobile').val(value.mobile);
                        

                        $('#student_id').val(value.student_id);
                        $('#userModal').modal('show'); 
                         //alert(value.role);
                    });
                }
            });
          
            
      }); 
 });  
 
 </script>  


          