<?php $this->load->view('superadmin/header.php'); ?>

	<div class="box-content print">
		
		<h1 align="center">Online Academy</h1>

		<h4 class="box-title">Course Name : <?php echo $data[0]['course_name']; ?></h4>
		
			<table class="table">
  		<thead>
    <tr>
      <th scope="col">Subject Name</th>
      <th scope="col">Content</th>
     
    </tr>

  </thead>
  <tbody id="sy">
    	<?php 

    			foreach ($data as $value) {
  
  		?>
  		<tr>
  			<td><?php echo $value['subject_name'];?></td>
  			<td><?php echo $value['syllabus_content'];?></td>
  		</tr>
  		<?php
    				}	

    	?>
  </tbody>
</table>
<div align="center" class="table">
	<button type="button" class="btn btn-default btn-md" id="printb">Print/download</button>
</div>
	</div>


<?php $this->load->view('superadmin/footer.php'); ?>
<script type="text/javascript">

	$(document).ready(function(){

		$("#printb").show();

		$("#printb").click(function(){
		
		$("#printb").hide();

		$(".print").printThis({

			debug: false,
			importCSS: true,
			printContainer: true,
			loadCSS: "",
			pageTitle: "",
			removeInline: false,
			printDelay: 333,
			header: null,
			footer: null,
			formValues: true,
			canvas: false,
			base: false,
			doctypeString: '<!DOCTYPE html>',
			removeScripts: false,
			copyTagClasses: false
		});
	});
});

</script>