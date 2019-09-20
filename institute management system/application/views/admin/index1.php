<?php include('header.php'); ?>

<div class="row small-spacing">
			
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-success text-white">
					<div class="statistics-box with-icon">
						<!-- <i class="ico small mdi mdi-account-multiple"></i> -->
					<i class="ico fa fa-users text-inverse"></i>
						<p class="text text-white">Total Students</p>
						<h2 class="counter"><?php if(isset($tot_students)){echo($tot_students);} ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-violet text-white">
					<div class="statistics-box with-icon">
						<!-- <i class="ico small mdi mdi-account-multiple"></i> -->
												
							<i class="ico fa fa-user-plus text-inverse"></i>
						<p class="text text-white">Total faculties</p>
						<h2 class="counter"><?php if(isset($tot_facs)){echo($tot_facs);} ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
					<div class="statistics-box with-icon">
						<i class="ico fa fa-book text-inverse"></i>
						<p class="text text-white">Total Courses</p>
						<h2 class="counter"><?php if(isset($tot_courses)){echo($tot_courses);} ?></h2>
					</div>
				</div>

				<!-- /.box-content -->
			</div>
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-info text-white">
					<div class="statistics-box with-icon">
						<i class="ico fa fa-calendar-check-o text-inverse"></i>
						<p class="text text-white">Total Events</p>
						<h2 class="counter"><?php if(isset($tot_events)){echo($tot_events);} ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
		</div>
			<div class="col-md-12">
				<div class="box-content">
					<h4 class="box-title">Numbers of students enrolled in each year Chart</h4>
					<div id="basic"></div>
				</div>
			</div>
			


<?php include('footer.php'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts

<?php
 if(empty($yearwise_stu))
 {
 	?>
$('#basic').html("<b><center><h2>No Data Available....</b>");
 	<?php
 }
 else
 {
 	?>
 	google.charts.load('current', {'packages':['corechart']});

 	google.charts.setOnLoadCallback(yearChart);

 	<?php
 }


?>

// Draw the chart and set the chart values
function yearChart() {

  var data = google.visualization.arrayToDataTable([
  ['year', 'Students'],

  	<?php 

    			foreach ($yearwise_stu as $value) {
    					echo "['".$value['year']."',".$value['students']."],";
    			}
    	?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {
  				};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.BarChart(document.getElementById('basic'));
  chart.draw(data, options);

}

$(window).resize(function(){
				yearChart();
		});
</script>
