<?php $this->load->view('superadmin/header.php'); ?>

	<div class="box-content">
		<h4 class="box-title">Events Details</h4>
				

		<div class="col-md-12">

				<div align="center" class="col-md-3">
					<button type="button" class="btn btn-success btn-md all">All Events</button>						
				</div>
				<div align="center" class="col-md-3">
					<button type="button" class="btn btn-orange btn-md up">Upcoming Events</button>
						
				</div>
				<div align="center" class="col-md-3">
					<button type="button" class="btn btn-primary btn-md ce">Celebrated Events</button>
						
				</div>
				<div class="col-md-3" align="right">
						<button type="button" class="btn btn-default btn-md" id="excel"><i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>
</button>
				
						<button type="button" class="btn btn-default btn-md" id="printb">Print</button>
						
    			</div>
    		</div>

		<br><br><br><br><br>

		<div class="col-md-12 report box-content">	
			 <h2 align="center">Academy Events Details Report</h2>
			 <br><br>
			<table class="table xll">
  		<thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Event Description</th>
    </tr>

  </thead>

  <tbody id="sy">
    	
  </tbody>
  
</table>
	</div>

	</div>

<?php $this->load->view('superadmin/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){

				$.ajax({

						url:'<?php echo base_url();?>super_admin/all_events',
						type:'post',
						dataType : 'json',
						success : function(data)
						{
							if(data.length == 0)
							{
											$("#sy").html("<tr><td colspan='5' align='center'>No Records.....</td></tr>");

							}
							else
							{
								var branch = "";

           						 for(i=0;i<data.length;i++)
           						{

           								branch += "<tr><td>"+(i+1)+"</td><td>"+data[i].event_name+"</td><td>"+data[i].event_start+"</td><td>"+data[i].event_end+"</td><td>"+data[i].event_des+"</td></tr>";	
           						 }

           		 					$("#sy").html(branch);	
						}}
				});

				$(".up").click(function(){

						$.ajax({

						url:'<?php echo base_url();?>super_admin/upcoming_events',
						type:'post',
						dataType : 'json',
						success : function(data)
						{
							if(data.length == 0)
							{
										$("#sy").html("<tr><td colspan='5' align='center'>No Records.....</td></tr>");

							}
							else
							{
								var branch = "";


           						 for(i=0;i<data.length;i++)
           						{

           								branch += "<tr><td>"+(i+1)+"</td><td>"+data[i].event_name+"</td><td>"+data[i].event_start+"</td><td>"+data[i].event_end+"</td><td>"+data[i].event_des+"</td></tr>";	
           						 }

           		 					$("#sy").html(branch);	
						}}
				});
				});
				$(".ce").click(function(){

						$.ajax({

						url:'<?php echo base_url();?>super_admin/ce_events',
						type:'post',
						dataType : 'json',
						success : function(data)
						{
							if(data.length == 0)
							{
										$("#sy").html("<tr><td colspan='5' align='center'>No Records.....</td></tr>");

							}
							else
							{
								var branch = "";


           						 for(i=0;i<data.length;i++)
           						{

           								branch += "<tr><td>"+(i+1)+"</td><td>"+data[i].event_name+"</td><td>"+data[i].event_start+"</td><td>"+data[i].event_end+"</td><td>"+data[i].event_des+"</td></tr>";	
           						 }

           		 					$("#sy").html(branch);	
						}}
				});
				});
				$(".all").click(function(){

						$.ajax({

						url:'<?php echo base_url();?>super_admin/all_events',
						type:'post',
						dataType : 'json',
						success : function(data)
						{
							if(data.length == 0)
							{
											$("#sy").html("<tr><td colspan='5' align='center'>No Records.....</td></tr>");

							}
							else
							{
								var branch = "";

           						 for(i=0;i<data.length;i++)
           						{

           								branch += "<tr><td>"+(i+1)+"</td><td>"+data[i].event_name+"</td><td>"+data[i].event_start+"</td><td>"+data[i].event_end+"</td><td>"+data[i].event_des+"</td></tr>";	
           						 }

           		 					$("#sy").html(branch);	
						}}
				});
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
                filename: "event_report.xls"
            });
        });
});

</script>