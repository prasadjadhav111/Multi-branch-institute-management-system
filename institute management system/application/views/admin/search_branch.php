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
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Search Branch</h4>
					<!-- /.box-title -->
					
	<!-- <table id="" class="table table-bordered table-striped"> -->
	<table id="user_data" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

												<thead>
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
                <td><?php echo $dt['branch_name']; ?></td>
                <td><?php echo $dt['branch_state']; ?></td>
                <td><?php echo $dt['branch_city']; ?></td>
                <td><?php echo $dt['branch_address']; ?></td>
                <td><?php echo $dt['branch_pincode']; ?></td>
                <td><?php echo $dt['branch_establish_date']; ?></td>
                <td><?php echo $dt['branch_contact']; ?></td>
                 <td><?php echo $dt['branch_email']; ?></td>
               <!-- <td><?php echo $dt['branch_image']; ?></td> -->
                
                <td><img src="<?php echo base_url('uploads/'.$dt['branch_image']); ?>" height=40 width=50 ></td>
               
                <td>
                <!-- <a href="<?php echo base_url("super_admin/update_branch/");?>" class="btn btn-primary update" >Edit</a> -->
                 <!-- <?= anchor("super_admin/update_branch/{$dt['branch_id']}",'Edit',['class'=>'btn btn-primary']);?>  -->
 				<a href="<?php echo base_url('super_admin/update_branch/'.$dt['branch_id']); ?>" class="glyphicon glyphicon-edit"></a>
 			</td>
 			<td>
                                <a href="<?php echo base_url('super_admin/delete_branch/'.$dt['branch_id']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            
                </td>
                 
            </tr>
        <?php endforeach; 
    	}
    	else
    	{
    	?>
    		<tr>
			<td colspan="12"> No Records.....</td>
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

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#user_data').dataTable({
    columnDefs: [{ orderable: false, "targets": [-2,-1,-3] }] /* -1 = 1st colomn, starting from the right */
	});  
      
 });  
 
 </script>  


          