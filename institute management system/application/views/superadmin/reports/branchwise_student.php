<?php $this->load->view('superadmin/header.php'); ?>

	<div class="box-content">
		<h4 class="box-title">Students Details</h4>
				

		<div class="col-md-12">

				<div align="center" class="col-md-3">
					<label class="form_control">Select Branch</label>
					<select class="form-control" name="select_branch" id="select_branch">
						
					</select>
				</div>
				<div align="center" class="col-md-3">
					<label class="form_control">Select Course</label>
					<select class="form-control" name="select_course" id="select_course">
						
					</select>
				</div>
				<div align="center" class="col-md-2">
					<label class="form_control">From Date</label>
					<input type="text" name="from_date" class="form-control fdate" placeholder="From Date" id="datepicker-autoclose">
				</div>
				<div align="center" class="col-md-2">
					<label class="form_control">To Date</label>
					<input type="text" name="to_date" class="form-control tdate" placeholder="To Date" id="datepicker">
				</div>
				<div class="col-md-2" align="right">
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

<?php $this->load->view('superadmin/footer.php'); ?>
<script type="text/javascript">
	function course_branch(b,c)
	{

						$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/branch_course_students',
							data:{bid:b,cid:c},
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
							url:'<?php echo base_url();?>super_admin/course_students',
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

	function branch(b)
	{
		$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/branch_students',
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

	function from_date(d)
	{
		$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/from_date_students',
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
							url:'<?php echo base_url();?>super_admin/to_date_students',
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
	function fdate_branch_course(a,b,c)
	{
		$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/fdate_branch_course_students',
							data:{bid:b,cid:c,did:a},
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
	function fdate_branch(a,b)
	{

						$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/fdate_branch_students',
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
	function tdate_branch(b,d)
	{

						$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/tdate_branch_students',
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
	function fdate_course(a,b)
	{

						$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/fdate_course_students',
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
	function tdate_fdate(a,d)
	{

						$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/fdate_tdate_students',
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
	function tdate_course(b,d)
	{

						$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/tdate_course_students',
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
	function fdate_tdate_branch_course(a,b,c,d)
	{
				$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/fdate_tdate_branch_course_students',
							data:{bid:b,cid:c,did:a,tid:d},
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
	function tdate_branch_course(a,b,c)
	{
		$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/tdate_branch_course_students',
							data:{bid:b,cid:c,did:a},
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
	function fdate_branch_tdate(a,b,d)
	{
		$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/fdate_branch_tdate_students',
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
	function fdate_course_tdate(a,b,d)
	{
		$.ajax({

							type:'post',
							url:'<?php echo base_url();?>super_admin/fdate_course_tdate_students',
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

	function all_posibilities()
	{

		if($(".fdate").val() != "" && $(".tdate").val() != "" && $("#select_course").val() != "" && $("#select_branch").val() != "" )
				{
								var a = $(".fdate").val();
								var date =a.split("/");
								a = date[2]+"-"+date[0]+"-"+date[1];
				
								var d = $(".tdate").val();
								var da =d.split("/");
								d = da[2]+"-"+da[0]+"-"+da[1];

								var b = $("#select_branch").val();
								var c = $("#select_course").val();
					
								fdate_tdate_branch_course(a,b,c,d);
				}
				else if($(".fdate").val() != "" && $(".tdate").val() == "" && $("#select_course").val() != "" && $("#select_branch").val() != "" )
				{
								var a = $(".fdate").val();
				
								var date =a.split("/");
								a = date[2]+"-"+date[0]+"-"+date[1];
				
								var b = $("#select_branch").val();
								var c = $("#select_course").val();
					
								fdate_branch_course(a,b,c);
				}
				else if($(".fdate").val() == "" && $(".tdate").val() != "" && $("#select_course").val() != "" && $("#select_branch").val() != "" )
				{
								var a = $(".tdate").val();
				
								var date =a.split("/");
								a = date[2]+"-"+date[0]+"-"+date[1];
				
								var b = $("#select_branch").val();
								var c = $("#select_course").val();
					
								tdate_branch_course(a,b,c);
				}
				else if($(".fdate").val() != "" && $(".tdate").val() != "" && $("#select_course").val() == "" && $("#select_branch").val() != "" )
				{
								var a = $(".fdate").val();
				
								var date =a.split("/");
								a = date[2]+"-"+date[0]+"-"+date[1];
				
								var d = $(".tdate").val();
								var da =d.split("/");
								d = da[2]+"-"+da[0]+"-"+da[1];

								var b = $("#select_branch").val();
					
								fdate_branch_tdate(a,b,d);
				}
				else if($(".fdate").val() != "" && $(".tdate").val() != "" && $("#select_course").val() != "" && $("#select_branch").val() == "" )
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
				else if($(".fdate").val() != "" && $(".tdate").val() == "" && $("#select_course").val() == "" && $("#select_branch").val() != "")
				{
								var a = $(".fdate").val();
								var date =a.split("/");
								a = date[2]+"-"+date[0]+"-"+date[1];
								var b = $("#select_branch").val();
								
								fdate_branch(a,b);
				}	
				else if($("#select_course").val() != "" && $("#select_branch").val() != "" && $(".fdate").val() == "" && $(".tdate").val() == "")
				{

								var b = $("#select_branch").val();
								var c = $("#select_course").val();
					
						 course_branch(b,c);
				}
				else if($("#select_course").val() != "" && $("#select_branch").val() == "" && $(".fdate").val() != "" && $(".tdate").val() == "")
				{
						var a = $(".fdate").val();
								var date =a.split("/");
								a = date[2]+"-"+date[0]+"-"+date[1];
						var b = $('#select_course').val();
					
						fdate_course(a,b);
				}
				else if($("#select_course").val() == "" && $("#select_branch").val() != "" && $(".fdate").val() == "" && $(".tdate").val() != "")
				{
						var d = $(".tdate").val();
						var da =d.split("/");
						d = da[2]+"-"+da[0]+"-"+da[1];

						var b = $("#select_branch").val();

						tdate_branch(b,d);
				}
				else if($("#select_course").val() != "" && $("#select_branch").val() == "" && $(".fdate").val() == "" && $(".tdate").val() != "")
				{
						var d = $(".tdate").val();
						var da =d.split("/");
						d = da[2]+"-"+da[0]+"-"+da[1];

						var b = $('#select_course').val();

						tdate_course(b,d);
				}
				else if($("#select_course").val() == "" && $("#select_branch").val() == "" && $(".fdate").val() != "" && $(".tdate").val() != "")
				{
								var a = $(".fdate").val();				
								var date =a.split("/");
								a = date[2]+"-"+date[0]+"-"+date[1];
				
								var d = $(".tdate").val();
								var da =d.split("/");
								d = da[2]+"-"+da[0]+"-"+da[1];

						tdate_fdate(a,d);
				}
				else if($("#select_course").val() == "" && $("#select_branch").val() == "" && $(".fdate").val() != "" && $(".tdate").val() == "")
				{
							var d = $('.fdate').val();
							var date =d.split("/");
							d = date[2]+"-"+date[0]+"-"+date[1];
							
							from_date(d);
				}
				else if($("#select_course").val() != "" && $("#select_branch").val() == "" && $(".fdate").val() == "" && $(".tdate").val() == "")
				{
						
							var b = $('#select_course').val();
							course(b);
				}
				else if($("#select_course").val() == "" && $("#select_branch").val() != "" && $(".fdate").val() == "" && $(".tdate").val() == "")
				{
						
							var b = $('#select_branch').val();
							branch(b);
				}
				else if($("#select_course").val() == "" && $("#select_branch").val() == "" && $(".fdate").val() == "" && $(".tdate").val() != "")
				{
						var d = $('.tdate').val();
						var date =d.split("/");
						d = date[2]+"-"+date[0]+"-"+date[1];
				
						to_date(d);
				}
				else if($("#select_course").val() == "" && $("#select_branch").val() == "" && $(".fdate").val() == "" && $(".tdate").val() == "")
				{
					$("#sy").html("<tr><td colspan='7' align='center'>No Records.....</td></tr>");						
				}
				else
				{

						alert("tdate = "+$('.tdate').val()+" "+"fdate = "+$('.fdate').val()+" "+"course = "+$('#select_course').val()+"branch = "+$('#select_branch').val());
				}
	}
</script>
<script type="text/javascript">
	jQuery(document).ready(function(){

		$("#sy").html("<tr><td colspan='7' align='center'>No Records.....</td></tr>");
				$.ajax({

						url:'<?php echo base_url();?>super_admin/select_branch',
						type:'post',
						dataType : 'json',
						success : function(data)
						{
								var branch = "<option value>select</option>";

           						 for(i=0;i<data.length;i++)
           						{

           								branch += "<option value = "+data[i].branch_id+">"+data[i].branch_name+"</option>";	
           						 }

           		 					$("#select_branch").html(branch);	
						}
				});

				$.ajax({

						url:'<?php echo base_url();?>super_admin/select_course',
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

				$('#select_branch').change(function(){
				
						all_posibilities();
				});


				$('#select_course').change(function(){
				
					all_posibilities();
				
				});


		});

</script>
<script type="text/javascript">
	$(document).ready(function(){

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