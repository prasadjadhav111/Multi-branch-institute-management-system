<?php $this->load->view('admin/header.php'); ?>

	<div class="box-content">
		<h4 class="box-title">Students Details</h4>
				

		<div class="col-md-12">

				<div align="center" class="col-md-3">
					<label class="form_control">Select Course</label>
					<select class="form-control" name="select_course" id="select_course">
						
					</select>
				</div>
				<div align="center" class="col-md-3">
					<label class="form_control">From Date</label>
					<input type="text" name="from_date" class="form-control fdate" placeholder="From Date" id="datepicker-autoclose">
				</div>
				<div align="center" class="col-md-3">
					<label class="form_control">To Date</label>
					<input type="text" name="to_date" class="form-control tdate" placeholder="To Date" id="datepicker">
				</div>
				<div class="col-md-3" align="right">
    					<br>
						<button type="button" class="btn btn-default btn-md" id="excel"><i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>
</button>
				
						<button type="button" class="btn btn-default btn-md" id="printb">Print</button>
						
    			</div>
    		</div>

		<br><br><br><br><br>

		<div class="col-md-12 report box-content">	
			 <h2 align="center">Academy Students Details Report</h2>
			 <br><br>
			<table class="table xll">
  		<thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">Join Date</th>
      <th scope="col">Branch</th>
      <th scope="col">Course</th>
    </tr>

  </thead>

  <tbody id="sy">
    	
  </tbody>
  
</table>
	</div>

	</div>

<?php $this->load->view('admin/footer.php'); ?>

<script type="text/javascript">
	function tdate_course(b,d)
	{

						$.ajax({

							type:'post',
							url:'<?php echo base_url();?>admin/tdate_course_students',
							data:{bid:b,did:d},
							dataType:'json',
							success : function(data){
									
								if(data.length == 0)
								{
									$("#sy").html("<tr><td colspan='7' align='center'>No Records.....</td></tr>");
								
								}
								else
								{
								var op = "";

								for(i=0;i<data.length;i++)
								{
									if(data[i].mobile == "")
									{
										data[i].mobile = "-----";
									}
									op += "<tr><td>"+(i+1)+"</td><td>"+data[i].first_name+" "+data[i].last_name+"</td><td>"+data[i].email+"</td><td>"+data[i].mobile+"</td><td>"+data[i].purchase_date+"</td><td>"+data[i].branch_name+"</td><td>"+data[i].course_name+"</td></tr>";

								}

								$("#sy").html(op);

							}
						}
						});
	}
	function tdate_fdate(a,d)
	{

						$.ajax({

							type:'post',
							url:'<?php echo base_url();?>admin/fdate_tdate_students',
							data:{bid:a,did:d},
							dataType:'json',
							success : function(data){
									
								if(data.length == 0)
								{
									$("#sy").html("<tr><td colspan='7' align='center'>No Records.....</td></tr>");
								
								}
								else
								{
								var op = "";

								for(i=0;i<data.length;i++)
								{
									if(data[i].mobile == "")
									{
										data[i].mobile = "-----";
									}
									op += "<tr><td>"+(i+1)+"</td><td>"+data[i].first_name+" "+data[i].last_name+"</td><td>"+data[i].email+"</td><td>"+data[i].mobile+"</td><td>"+data[i].purchase_date+"</td><td>"+data[i].branch_name+"</td><td>"+data[i].course_name+"</td></tr>";

								}

								$("#sy").html(op);

							}
						}
						});
	}
	function fdate_course(a,b)
	{

						$.ajax({

							type:'post',
							url:'<?php echo base_url();?>admin/fdate_course_students',
							data:{bid:b,did:a},
							dataType:'json',
							success : function(data){
									
								if(data.length == 0)
								{
									$("#sy").html("<tr><td colspan='7' align='center'>No Records.....</td></tr>");
								
								}
								else
								{
								var op = "";

								for(i=0;i<data.length;i++)
								{
									if(data[i].mobile == "")
									{
										data[i].mobile = "-----";
									}
									op += "<tr><td>"+(i+1)+"</td><td>"+data[i].first_name+" "+data[i].last_name+"</td><td>"+data[i].email+"</td><td>"+data[i].mobile+"</td><td>"+data[i].purchase_date+"</td><td>"+data[i].branch_name+"</td><td>"+data[i].course_name+"</td></tr>";

								}

								$("#sy").html(op);

							}
						}
						});
	}
	function course(b)
	{
		$.ajax({

							type:'post',
							url:'<?php echo base_url();?>admin/course_students',
							data:{bid:b},
							dataType:'json',
							success : function(data){
								if(data.length == 0)
								{
									$("#sy").html("<tr><td colspan='7' align='center'>No Records.....</td></tr>");
								}
								else
								{
								var op = "";

								for(i=0;i<data.length;i++)
								{
									if(data[i].mobile == "")
									{
										data[i].mobile = "-----";
									}
									op += "<tr><td>"+(i+1)+"</td><td>"+data[i].first_name+" "+data[i].last_name+"</td><td>"+data[i].email+"</td><td>"+data[i].mobile+"</td><td>"+data[i].purchase_date+"</td><td>"+data[i].branch_name+"</td><td>"+data[i].course_name+"</td></tr>";

								}

								$("#sy").html(op);
							}
							}
						});
	}

	function fdate_course_tdate(a,b,d)
	{
		$.ajax({

							type:'post',
							url:'<?php echo base_url();?>admin/fdate_course_tdate_students',
							data:{bid:b,cid:d,did:a},
							dataType:'json',
							success : function(data){
									
								if(data.length == 0)
								{
									$("#sy").html("<tr><td colspan='7' align='center'>No Records.....</td></tr>");
								
								}
								else
								{
								var op = "";

								for(i=0;i<data.length;i++)
								{
									if(data[i].mobile == "")
									{
										data[i].mobile = "-----";
									}
									op += "<tr><td>"+(i+1)+"</td><td>"+data[i].first_name+" "+data[i].last_name+"</td><td>"+data[i].email+"</td><td>"+data[i].mobile+"</td><td>"+data[i].purchase_date+"</td><td>"+data[i].branch_name+"</td><td>"+data[i].course_name+"</td></tr>";

								}

								$("#sy").html(op);

							}
						}
						});
	}
	function from_date(d)
	{
		$.ajax({

							type:'post',
							url:'<?php echo base_url();?>admin/from_date_students',
							data:{bid:d},
							dataType:'json',
							success : function(data){

								if(data.length == 0)
								{
									$("#sy").html("<tr><td colspan='7' align='center'>No Records.....</td></tr>");
								
								}
								else
								{
								var op = "";

								for(i=0;i<data.length;i++)
								{
									if(data[i].mobile == "")
									{
										data[i].mobile = "-----";
									}
									op += "<tr><td>"+(i+1)+"</td><td>"+data[i].first_name+" "+data[i].last_name+"</td><td>"+data[i].email+"</td><td>"+data[i].mobile+"</td><td>"+data[i].purchase_date+"</td><td>"+data[i].branch_name+"</td><td>"+data[i].course_name+"</td></tr>";

								}

								$("#sy").html(op);

							}
						}
						});
	}
	function to_date(d)
	{
		$.ajax({

							type:'post',
							url:'<?php echo base_url();?>admin/to_date_students',
							data:{bid:d},
							dataType:'json',
							success : function(data){

								if(data.length == 0)
								{
									$("#sy").html("<tr><td colspan='7' align='center'>No Records.....</td></tr>");
								
								}
								else
								{
								var op = "";

								for(i=0;i<data.length;i++)
								{
									if(data[i].mobile == "")
									{
										data[i].mobile = "-----";
									}
									op += "<tr><td>"+(i+1)+"</td><td>"+data[i].first_name+" "+data[i].last_name+"</td><td>"+data[i].email+"</td><td>"+data[i].mobile+"</td><td>"+data[i].purchase_date+"</td><td>"+data[i].branch_name+"</td><td>"+data[i].course_name+"</td></tr>";

								}

								$("#sy").html(op);

							}
						}
						});
	}
	function all_posibilities()
	{

				if($(".fdate").val() != "" && $(".tdate").val() != "" && $("#select_course").val() != "")
				{
								var a = $(".fdate").val();
				
								var date =a.split("/");
								a = date[2]+"-"+date[0]+"-"+date[1];
				
								var d = $(".tdate").val();
								var da =d.split("/");
								d = da[2]+"-"+da[0]+"-"+da[1];

								var b = $("#select_course").val();
					
								fdate_course_tdate(a,b,d);
				}
				else if($("#select_course").val() != "" && $(".fdate").val() != "" && $(".tdate").val() == "")
				{
						var a = $(".fdate").val();
								var date =a.split("/");
								a = date[2]+"-"+date[0]+"-"+date[1];
						var b = $('#select_course').val();
					
						fdate_course(a,b);
				}
				else if($("#select_course").val() != "" && $(".fdate").val() == "" && $(".tdate").val() != "")
				{
						var d = $(".tdate").val();
						var da =d.split("/");
						d = da[2]+"-"+da[0]+"-"+da[1];

						var b = $('#select_course').val();

						tdate_course(b,d);
				}
				else if($("#select_course").val() == "" && $(".fdate").val() != "" && $(".tdate").val() != "")
				{
								var a = $(".fdate").val();				
								var date =a.split("/");
								a = date[2]+"-"+date[0]+"-"+date[1];
				
								var d = $(".tdate").val();
								var da =d.split("/");
								d = da[2]+"-"+da[0]+"-"+da[1];

						tdate_fdate(a,d);
				}
				else if($("#select_course").val() == "" && $(".fdate").val() != "" && $(".tdate").val() == "")
				{
							var d = $('.fdate').val();
							var date =d.split("/");
							d = date[2]+"-"+date[0]+"-"+date[1];
							
							from_date(d);
				}
				else if($("#select_course").val() != "" &&  $(".fdate").val() == "" && $(".tdate").val() == "")
				{
							var b = $('#select_course').val();
							course(b);
				}
				else if($("#select_course").val() == "" && $(".fdate").val() == "" && $(".tdate").val() != "")
				{
						var d = $('.tdate').val();
						var date =d.split("/");
						d = date[2]+"-"+date[0]+"-"+date[1];
				
						to_date(d);
				}
				else if($("#select_course").val() == "" && $(".fdate").val() == "" && $(".tdate").val() == "")
				{
					$("#sy").html("<tr><td colspan='7' align='center'>No Records.....</td></tr>");						
				}
				else
				{

						alert("tdate = "+$('.tdate').val()+" "+"fdate = "+$('.fdate').val()+" "+"course = "+$('#select_course').val());
				}
	}
</script>
<script type="text/javascript">
	jQuery(document).ready(function(){

		$("#sy").html("<tr><td colspan='7' align='center'>No Records.....</td></tr>");
				

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

				$('.fdate').change(function(){
				
					all_posibilities();
				
				});

				$('.tdate').change(function(){
				
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