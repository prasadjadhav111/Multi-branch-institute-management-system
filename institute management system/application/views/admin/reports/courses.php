<?php $this->load->view('admin/header.php'); ?>

	<div class="box-content">
		<h4 class="box-title">Course Details</h4>
				

		<div class="col-md-12" align="right">

			    					<br>
						<button type="button" class="btn btn-default btn-md" id="excel"><i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>
</button>
				
						<button type="button" class="btn btn-default btn-md" id="printb">Print</button>
						
    		</div>

		<br><br><br><br><br>

		<div class="col-md-12 report box-content">	
			 <h2 align="center">Academy Courses Details Report</h2>
			 <br><br>
			<table class="table xll">
  		<thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Duration</th>
      <th scope="col">Description</th>
      <th scope="col">Fees</th>
    </tr>

  </thead>

  <tbody id="sy">
    	
  </tbody>
  
</table>
	</div>

	</div>

<?php $this->load->view('admin/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){

				$.ajax({

						url:'<?php echo base_url();?>admin/select_course',
						type:'post',
						dataType : 'json',
						success : function(data)
						{
							console.log(data);
								var branch = "";

           						 for(i=0;i<data.length;i++)
           						{

           								branch += "<tr><td>"+(i+1)+"</td><td>"+data[i].course_name+"</td><td>"+data[i].course_duration+" "+data[i].course_duration_type+"</td><td>"+data[i].course_des+"</td><td>"+data[i].course_fee+" Rs</td></tr>";	
           						 }

           		 					$("#sy").html(branch);	
						}
				});
		});
</script>
<script type="text/javascript">

	$(document).ready(function(){

		$("#printb").click(function(){
		

		$(".report").printThis({

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

        $("#excel").click(function () {
            $(".xll").table2excel({
                filename: "courses_report.xls"
            });
        });
});

</script>