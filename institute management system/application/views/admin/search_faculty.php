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
		<h4 class="box-title">Online Test</h4>		
			<table id="testrecord" class="table table-striped table-bordered dt-responsive nowrap" >

						<thead>
							<tr>
								<th>Srno</th>
								<th>Name</th>
								<th>Gender</th>
								<th>Role</th>
								<th>Branch</th>
								<th>State</th>
								<th>City</th>
								<th>Address</th>
								<th>Dob</th>
								<th>JDate</th>
								<th>Contact</th>
								<th>Email</th>
								<th>Image</th>
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
                <td><?php echo $dt['master_admin_gender']; ?></td>
                <td><?php echo $dt['role']; ?></td>
                <td><?php echo $dt['branch_name']; ?></td>
                <td><?php echo $dt['master_admin_state']; ?></td>
                <td><?php echo $dt['master_admin_city']; ?></td>
                <td><?php echo $dt['master_admin_address']; ?></td>
                <td><?php echo $dt['master_admin_dob']; ?></td>
                <td><?php echo $dt['master_admin_join_date']; ?></td>
                <td><?php echo $dt['master_admin_contact']; ?></td>
                 <td><?php echo $dt['master_admin_email']; ?></td>
               
                  <td><img src="<?php echo base_url('uploads/branch_faculty/'.$dt['master_admin_image']); ?>" height=40 width=50 ></td>
                 
                 <td>
                 		<a href="<?php echo base_url('admin/update_faculty/'.$dt['master_admin_id']); ?>" class="glyphicon glyphicon-edit"></a>
                 </td>
                 <td>
                 		 <a href="<?php echo base_url('admin/delete_faculty/'.$dt['master_admin_id']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                 </td>
 				
            </tr>
            
        <?php endforeach; 
    	}
    	else
    	{
    	?>
    		<tr>
			<td colspan="15"> No Records.....</td>
			</tr>
		<?php
    	}
        ?>
						</tbody>
					</table>
</div>


<?php $this->load->view('admin/footer.php'); ?>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#testrecord').dataTable({
    columnDefs: [{ orderable: false, "targets": [-2,-1,-3] }] /* -1 = 1st colomn, starting from the right */
	});  
      
 });  
 
 </script>  