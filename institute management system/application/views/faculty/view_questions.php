<?php $this->load->view('faculty/header.php'); ?>
    <div class="box-content">

     <div class="row">
    <div class="col-lg-8 col-lg-offset-3">

    </div>
  </div>
</div>

 	<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">View Questions</h4>
					<!-- /.box-title -->
					
	<!-- <table id="" class="table table-bordered table-striped"> -->
	<table id="user_data" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

												<thead>
							<tr>
								<th>Srno</th>
								<th>Course</th>
								<th>Subject</th>
								<th>Question</th>
								<th>Option 1</th>
								<th>Option 2</th>
								<th>Option 3</th>
								<th>Option 4</th>
								<th>Answer (option wise)</th>
								<th>Question mark</th>
								<th>Question time(Sec)</th>
								<th></th>
								
							</tr>
						</thead>
						<tbody><?php
						
						 $cnt = 1;
		if(count($data))
		{
        	foreach ($data as $dt): ?>
            <tr>
                <td><?php echo $cnt++; ?></td>
                <td><?php echo $dt['course_name']; ?></td>
                <td><?php echo $dt['subject_name']; ?></td>
                <td><?php echo $dt['question']; ?></td>
                <td><?php echo $dt['op1']; ?></td>
                <td><?php echo $dt['op2']; ?></td>
                <td><?php echo $dt['op3']; ?></td>
                <td><?php echo $dt['op4']; ?></td>
                <td><?php echo $dt['ans']; ?></td>
                <td><?php echo $dt['que_mark']; ?></td>
                <td><?php echo $dt['que_time']; ?></td>
                 
                 
                 <td>
                 		 <a href="<?php echo base_url('faculty/delete_test/'.$dt['que_id']); ?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Are you sure to delete?')">Delete</a>
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
</div>
</div>

			 	

<?php $this->load->view('faculty/footer.php'); ?>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#user_data').dataTable({
    columnDefs: [{ orderable: false, "targets": [-1] }] /* -1 = 1st colomn, starting from the right */
	});  
      
 });  
 
 </script>  


          