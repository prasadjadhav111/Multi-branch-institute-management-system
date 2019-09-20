<?php include('header.php'); ?>

	
<div class="row small-spacing">

	<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-success text-black">
					<div class="statistics-box with-icon">
						<i class="ico fa fa-university text-inverse"></i>
						<h2 class="counter text-inverse"><?php if(isset($tot_branch)){echo($tot_branch);} ?></h2>
						<p class="text" style="color: white">Total Branches</p>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-violet text-black">
					<div class="statistics-box with-icon">
						<i class="ico fa fa-user-plus text-inverse"></i>
						<h2 class="counter text-inverse"><?php if(isset($tot_members)){echo($tot_members);} ?></h2>
						<p class="text" style="color: white">Total Members</p>
						
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger    text-white">
					<div class="statistics-box with-icon">
						<!-- <i class="ico small mdi mdi-account-multiple"></i> -->
						<i class="ico fa fa-users text-inverse"></i>
						
						<h2 class="counter text-inverse"><?php if(isset($tot_students)){echo($tot_students);} ?>
							
						</h2>
						<p class="text" style="color: white">Total Students</p>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-info text-white">
					<div class="statistics-box with-icon">
						<!-- <i class="ico small mdi mdi-account-multiple"></i> -->
						<i class="ico fa fa-users text-inverse"></i>
						
						<h2 class="counter text-inverse"><?php if(isset($tot_facs)){echo($tot_facs);} ?></h2>
						<p class="text" style="color: white;size:">Total faculties</p>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			

			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
		
			<div class="row small-spacing">
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-success text-black">
					<div class="statistics-box with-icon">
						<i class="ico fa fa-book text-inverse"></i>
						<h2 class="counter text-inverse">
							<?php if(isset($tot_courses)){echo($tot_courses);} ?></h2>
						<p class="text" style="color: white">Total Courses</p>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-violet text-black" > 
					<div class="statistics-box with-icon">
						<i class="ico fa fa-calculator text-inverse"></i>
						<h2 class="counter text-inverse">
							<?php if(isset($tot_subjects)){echo($tot_subjects);} ?></h2>
						<p class="text" style="color: white">Total Subjects</p>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-black" > 
					<div class="statistics-box with-icon">
						<i class="ico fa fa-calendar-check-o text-inverse"></i>
						<h2 class="counter text-inverse"><?php if(isset($tot_events)){echo($tot_events);} ?></h2>
						<p class="text" style="color: white">Total Events</p>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-info text-black" > 
					<div class="statistics-box with-icon">
						<i class="ico fa fa-user text-inverse"></i>
						<h2 class="counter text-inverse"><?php if(isset($tot_roles)){echo($tot_roles);} ?></h2>
						<p class="text" style="color: white">Total Roles</p>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
		</div>
		<!-- .row -->

			<div class="col-md-12">
				<div class="box-content">
					<h4 class="box-title">Branchwise Students and Faculties Chart</h4>
					<div id="dual_y_div"></div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-4">
				<div class="box-content">
					<h4 class="box-title">Popular Courses Chart</h4>
					<div id="piechart"></div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="box-content">
					<h4 class="box-title">Numbers of students enrolled in each year Chart</h4>
					<div id="basic"></div>
				</div>
			</div>
			</div>
		</div>

<?php include('footer.php'); ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
	google.charts.load('current', {packages: ['bar']});
google.charts.setOnLoadCallback(startChart);

function startChart() {

  var data = new google.visualization.arrayToDataTable([
    ['Branch', 'Students', 'faculties'],
    
    	<?php 

    			foreach ($tot_fac_stu as $value) {
    					echo "['".$value['branch_name']."',".$value['students'].",".$value['faculties']."],";
    			}
    	?>
	
      ]);

  var options = {
    chart: {
      
    },
    series: {
      0: {
        axis: 'Students'
      }, // Bind series 0 to an axis named 'distance'.
      1: {
        axis: 'faculties'
      } // Bind series 1 to an axis named 'brightness'.
    },
    axes: {
      y: {
        distance: {
          label: 'parsecs'
        }, // Left y-axis.
        brightness: {
          side: 'right',
          label: 'apparent magnitude'
        } // Right y-axis.
      }
    }
  };

  var chart = new google.charts.Bar(document.getElementById('dual_y_div'));
 chart.draw(data, options);
}
	$(window).resize(function(){
				startChart();
		});
</script>

	<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Courses', 'Students'],

  	<?php 

    			foreach ($popularcourse as $value) {
    					echo "['".$value['course_name']."',".$value['students']."],";
    			}
    	?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {
  			
  			pieHole:0.4,
	};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);

}

$(window).resize(function(){
				drawChart();
		});
</script>


<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(yearChart);

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
  var chart = new google.visualization.LineChart(document.getElementById('basic'));
  chart.draw(data, options);

}

$(window).resize(function(){
				yearChart();
		});
</script>
