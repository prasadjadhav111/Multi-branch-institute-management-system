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
 <button type="button" id="add_button" data-toggle="modal" data-target="#addrole" class="btn btn-success btn-sm">Add Role</button>  

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
								<th>Role</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<!-- <tfoot>
							<tr>
								<th>Srno</th>
								<th>Name</th>
								<th>State</th>
								<th>City</th>
								<th>Address</th>
								<th>Pincode</th>
								<th>EstablishedDate</th>
								<th>Contact</th>
								<th>Email</th>
								<th>Image</th>
								<th class="no-sort" ></th>
								<th></th>
							</tr>
						</tfoot> -->
						<tbody>
		<?php $cnt = 1;
		if(count($data))
		{
        foreach ($data as $dt): ?>
            <tr>
                <td><?php echo $cnt++; ?></td>
                <td><?php echo $dt['role']; ?></td>
                
                <td>
                <!-- <a href="<?php echo base_url('super_admin/update_branch/'.$dt['role_id']); ?>" class="glyphicon glyphicon-edit"></a>
 				 -->
 				 	<button type="button" name="update" id="<?php echo $dt['role_id']; ?>" class="btn btn-primary btn-xs update">Update</button>
 				 </td>
 				<td>
                <a href="<?php echo base_url('super_admin/delete_role/'.$dt['role_id']); ?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Are you sure to delete?')">Delete</a>
                    
                   <!--   <a type="button" name="update" <?php echo base_url('super_admin/delete_role');?> class="btn btn-danger btn-xs delete" onclick="return confirm('Are you sure to delete?')">Delete</a>        
                 --></td>
                 
            </tr>
        <?php endforeach; 
    	}
    	else
    	{
    	?>
    		<tr>
			<td colspan="4"> No Records.....</td>
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

 <div id="addrole" class="modal fade">  
      <div class="modal-dialog">  
             <form method="post" id="user_form" data-toggle="validator" action="<?php echo base_url('super_admin/add_role');?>">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Add Role</h4>  
                     </div>  
                     <div class="modal-body">  
                         
                         
              <div class="form-group">
              <label for="inputEmail" class="control-label">Enter Role</label>
                    <input type="text" pattern="^[A-z]*$" maxlength="15" name ="role" class="form-control"  placeholder="Enter Role" required>

              <div class="help-block with-errors"></div>


              </div>

                     </div>  
            

                     <div class="modal-footer">  
                          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>    
		 <div id="userModal" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="user_form" data-toggle="validator" action="<?php echo base_url('super_admin/update_role');?>">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Update Role</h4>  
                     </div>  
                     <div class="modal-body">  
                         
                        <div class="form-group">
              <label for="inputEmail" class="control-label">Enter Role</label>
                    <input type="text" pattern="^[A-z]*$" maxlength="15" name ="role" id="role" class="form-control"  placeholder="Enter Role" required>

              <div class="help-block with-errors"></div>


              </div>

                     </div>  
                     <div class="modal-footer">  
                          <input type="hidden" name="role_id" id="role_id" />  
                          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>  
<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#user_data').dataTable({
    columnDefs: [{ orderable: false, "targets": [-2,-1] }] /* -1 = 1st colomn, starting from the right */
	});  

       $(document).on('click', '.update', function(){  
          var user_id = $(this).attr("id"); 
          
            $.ajax({
                url:"<?php echo base_url(); ?>super_admin/fetch_role",  
                method:"POST",  
                data:{id:user_id},  
                dataType:"json",  
                success:function (data) {
                    $.each(data,function (key,value) {
                        $('#role').val(value.role);
                        $('#role_id').val(value.role_id);
                        $('#userModal').modal('show'); 
                         //alert(value.role);
                    });
                }
            });
          
            
      }); 
 });  
 
 </script>  


          