<?php $this->load->view('faculty/header.php'); ?>

	<div class="box-content">
		<h4 class="box-title">Assignments Details</h4>
				

		<div class="col-md-12" align="right">

			    					<br>
						<button type="button" class="btn btn-default btn-md" id="excel"><i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>
</button>
				
						<button type="button" class="btn btn-default btn-md" id="printb">Print</button>
						
    		</div>

		<br><br><br><br><br>

		<div class="col-md-12 report box-content">	
			 <h2 align="center">Academy Assignments Details Report</h2>
			 <br><br>
			<table class="table xll">
  		<thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Title</th>
      <th scope="col">Course</th>
      <th scope="col">Subject</th>
      <th scope="col">Description</th>
    </tr>

  </thead>

  <tbody id="sy">
    	
  </tbody>
  
</table>
	</div>

	</div>

<?php $this->load->view('faculty/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){

				$.ajax({

						url:'<?php echo base_url();?>faculty/assign_detail',
						type:'post',
						dataType : 'json',
						success : function(data)
						{
							console.log(data);
								var branch = "";

           						 for(i=0;i<data.length;i++)
           						{

           								branch += "<tr><td>"+(i+1)+"</td><td>"+data[i].assignment_title+"</td><td>"+data[i].course_name+"</td><td>"+data[i].subject_name+"</td><td>"+data[i].assignment_description+" Rs</td></tr>";	
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