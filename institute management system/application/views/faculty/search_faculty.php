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
                 		<button type="button" name="update" id="<?php echo $dt['master_admin_id']; ?>" class="btn btn-success btn-xs update">Update</button>
                 </td>
                 <td>
                 		 <a href="<?php echo base_url('faculty/delete_test/'.$dt['master_admin_id']); ?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Are you sure to delete?')">Delete</a>
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
