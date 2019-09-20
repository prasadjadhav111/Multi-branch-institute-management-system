<?php $this->load->view('admin/header.php'); ?>

	<div class="box-content">
		<h4 class="box-title">Students Details</h4>
				

		<div class="col-md-12">

				<div align="center" class="col-md-4">
					<label class="form_control">Select Course</label>
					<select class="form-control" name="select_course" id="select_course">
						
					</select>
				</div>
				<div align="center" class="col-md-4 sub">
					<label class="form_control">Select Subject</label>
					<select class="form-control" name="select_subject" id="select_subject">
						<option value>select</option>
					</select>
				</div>
				<div class="col-md-4" align="right">
    					<br>
						<button type="button" class="btn btn-default btn-md" id="excel"><i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>
</button>
				
						<button type="button" class="btn btn-default btn-md" id="printb">Print</button>
						
    			</div>
    		</div>

		<br><br><br><br><br>

		<div class="col-md-12 report box-content">	
			 <h2 align="center">Academy Faculties Details Report</h2>
			 <br><br>
			<table class="table xll">
  		<thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">Join Date</th>
      <th scope="col">Branch</th>
      <th scope="col">Course</th>
      <th scope="col">Subject</th>
    </tr>

  </thead>

  <tbody id="sy">
    	
  </tbody>
  
</table>
	</div>

	</div>

<?php $this->load->view('admin/footer.php'); ?>
<script type="text/javascript">
	
	function course_facs(b)
	{
			$.ajax({

							type:'post',
							url:'<?php echo base_url();?>admin/course_faculties',
							data:{bid:b},
							dataType:'json',
							success : function(data){
									
								if(data.length == 0)
								{

									$("#sy").html("<tr><td colspan='11' align='center'>No Records.....</td></tr>");
									$('.sub').hide(1200);
									
								}
								else
								{
								var op = "";

								for(i=0;i<data.length;i++)
								{
									op += "<tr><td>"+(i+1)+"</td><td>"+data[i].master_admin_name+"</td><td>"+data[i].master_admin_dob+"</td><td>"+data[i].master_admin_state+"</td><td>"+data[i].master_admin_city+"</td><td>"+data[i].master_admin_address+"</td><td>"+data[i].master_admin_email+"</td><td>"+data[i].master_admin_contact+"</td><td>"+data[i].master_admin_join_date+"</td><td>"+data[i].branch_name+"</td><td>"+data[i].course_name+"</td><td>"+data[i].subject_name+"</td></tr>";	
           						
								}

								$("#sy").html(op);

							}
						}
						});	
	}

	function course_subject(c,s)
	{
			$.ajax({

							type:'post',
							url:'<?php echo base_url();?>admin/course_subject_faculties',
							data:{cid:c,sid:s},
							dataType:'json',
							success : function(data){
							
								if(data.length == 0)
								{
									
									$("#sy").html("<tr><td colspan='11' align='center'>No Records.....</td></tr>");
									$('.sub').hide(1200);
									document.getElementById('select_subject').value = "";
									//$("#select_subject").val() = "";
								}
								else
								{
								var op = "";

								for(i=0;i<data.length;i++)
								{
									op += "<tr><td>"+(i+1)+"</td><td>"+data[i].master_admin_name+"</td><td>"+data[i].master_admin_dob+"</td><td>"+data[i].master_admin_state+"</td><td>"+data[i].master_admin_city+"</td><td>"+data[i].master_admin_address+"</td><td>"+data[i].master_admin_email+"</td><td>"+data[i].master_admin_contact+"</td><td>"+data[i].master_admin_join_date+"</td><td>"+data[i].branch_name+"</td><td>"+data[i].course_name+"</td><td>"+data[i].subject_name+"</td></tr>";	
           						
								}

								$("#sy").html(op);

							}
						}
						});	
	}
	function load_subject(cnm)
	{
		$.ajax({

						url:'<?php echo base_url();?>admin/select_subject',
						type:'post',
						data:{cnm:cnm},
						dataType : 'json',
						success : function(data)
						{
								var course = "<option value>select</option>";

           						 for(i=0;i<data.length;i++)
           						{

           								course += "<option value = "+data[i].subject_id+">"+data[i].subject_name+"</option>";	
           						 }

           		 					$("#select_subject").html(course);	
							}
						});
	}

	function all_posibilities()
	{
							
							if($("#select_course").val() != "" && $("#select_subject").val() == "")
							{

									var cnm = $("#select_course").val();
									course_facs(cnm);	
									$('.sub').show(1200);
									load_subject(cnm);
							}
							else if($("#select_course").val() != "" && $("#select_subject").val() != "")
							{
								
									var c = $("#select_course").val();
									var s = $("#select_subject").val();
									course_subject(c,s);
							}
							else if($("#select_course").val() == "" && $("#select_subject").val() != "")
							{
									$("#sy").html("<tr><td colspan='11' align='center'>No Records.....</td></tr>");
									$('.sub').hide(1200);
									 document.getElementById('select_subject').value = "";
							}
							else if($("#select_course").val() == "" && $("#select_subject").val() == "")
							{
									$("#sy").html("<tr><td colspan='11' align='center'>No Records.....</td></tr>");
									$('.sub').hide(1200);
									document.getElementById('select_subject').value = "";
							}
							else
							{
									var c = $("#select_course").val();
									var s = $("#select_subject").val();
									alert("course = "+c+"subject = "+s);	
							}
	}
</script>
<script type="text/javascript">
	jQuery(document).ready(function(){

		$('.sub').hide();

		$("#sy").html("<tr><td colspan='11' align='center'>No Records.....</td></tr>");
				
				$.ajax({

						url:'<?php echo base_url();?>admin/select_course',
						type:'post',
						dataType : 'json',
						success : function(data)
						{
								var course = "<option value>select</option>";

           						 for(i=0;i<data.length;i++)
           						{

           								course += "<option value = "+data[i].course_id+">"+data[i].course_name+"</option>";	
           						 }

           		 					$("#select_course").html(course);	
						}
				});

				$('#select_course').change(function(){
					
					all_posibilities();
				});
				$('#select_subject').change(function(){
					
					all_posibilities();
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
                filename: "students.xls"
            });
        });
});

</script>