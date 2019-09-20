<?php include('header.php'); ?>

<div class="row small-spacing">
			
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
					<div class="statistics-box with-icon">
						<i class="ico small mdi mdi-account-multiple"></i>
						<p class="text text-white">Total Taken Subjets</p>
						<h2 class="counter"><?php if(isset($tot_tk_sub)){echo($tot_tk_sub);} ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-warning text-white">
					<div class="statistics-box with-icon">
						<i class="ico small mdi mdi-account-multiple"></i>
						<p class="text text-white">Total Organized Tests</p>
						<h2 class="counter"><?php if(isset($tot_test)){echo($tot_test);} ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-primary text-white">
					<div class="statistics-box with-icon">
						<i class="ico small mdi mdi-account-multiple"></i>
						<p class="text text-white">Total Sended Assignments</p>
						<h2 class="counter"><?php if(isset($tot_assign)){echo($tot_assign);} ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div><div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-success text-white">
					<div class="statistics-box with-icon">
						<i class="ico small mdi mdi-account-multiple"></i>
						<p class="text text-white">Total Events</p>
						<h2 class="counter"><?php if(isset($tot_events)){echo($tot_events);} ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
		</div>
			<div class="col-md-12">
				<div class="box-content">
					<h4 class="box-title">Numbers of questions related to each subjects</h4>
					<div id="basic"></div>
				</div>
			</div>
			
		
<?php include('footer.php'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(yearChart);

function yearChart() {
  var data = google.visualization.arrayToDataTable([
  ['Subject', 'Questions'],

  	<?php 

    			foreach ($yearwise_stu as $value) {
    					echo "['".$value['subject_name']."',".$value['question']."],";
    			}
    	?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {
  					colors : ['red'],

  				};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.ColumnChart(document.getElementById('basic'));
  chart.draw(data, options);

}

$(window).resize(function(){
				yearChart();
		});
</script>
