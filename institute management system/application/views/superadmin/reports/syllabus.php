<?php $this->load->view('superadmin/header.php'); ?>

	<div class="box-content">
		<h4 class="box-title">Syllabus Details</h4>
				

		<div class="col-md-12">

			<div class="col-md-6">
					<label class="form_control">Select Course</label>
					<select class="form-control" name="select_course" id="select_course">
						
					</select>
			</div>
			<div class="col-md-6" align="right">
			    					<br>
						<button type="button" class="btn btn-default btn-md" id="excel"><i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>
</button>
				
						<button type="button" class="btn btn-default btn-md" id="printb">Print</button>
				</div>		
    		</div>

		<br><br><br><br><br>

		<div class="col-md-12 report box-content">	
			 <h2 align="center">Academy Syllabus Details Report</h2>
			 <h4 align="right">Course Name : <span id="cnm"> </span></h4>
			 <br><br>
			<table class="table xll">
  		<thead>
    <tr>
      <th scope="col">Subject Name</th>
      <th scope="col">Content</th>
    </tr>

  </thead>

  <tbody id="sy">
    	
  </tbody>
  
</table>
	</div>

	</div>

<?php $this->load->view('superadmin/footer.php'); ?>
<script type="text/javascript">
	$("#sy").html("<tr><td colspan='2' align='center'>No Records.....</td></tr>");
				
				$.ajax({

						url:'<?php echo base_url();?>super_admin/select_course',
						type:'post',
						dataType : 'json',
						success : function(data)
						{
								var course = "<option value>select</option>";

           						 for(i=0;i<data.length;i++)
           						{

           								course += "<option value = "+data[i].course_id+" id = "+data[i].course_id+">"+data[i].course_name+"</option>";	
           						 }

           		 					$("#select_course").html(course);	
						}
				});

				$("#select_course").change(function(){

				var cid = document.getElementById("select_course").value;
			
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>super_admin/get_syllabus',
				data:{course_id:cid},
				dataType : 'json',
				success : function(data){
						
					if(data.length == 0)
					{
						$("#sy").html("<tr><td colspan='2' align='center'>No Records.....</td></tr>");
					}	
					else
					{
						var op = "";
						for(i=0;i<data.length;i++)
						{
							op += "<tr><td>"+data[i].subject_name+"</td><td>"+data[i].syllabus_content+"</td></tr>";
						}		
						
					$("#cnm").html(document.getElementById(cid).text);
						$("#sy").html(op);
					}
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
                filename: "syllabus_report.xls"
            });
        });
});

</script>