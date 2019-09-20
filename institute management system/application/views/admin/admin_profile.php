<?php $this->load->view('admin/header.php'); ?>	
			
				<?php 

					foreach ($data as $value) {
						
			?>
			
			<div class="col-md-12 col-xs-12">
				
				<div class="row">
					<div class="col-xs-12">
						<div class="box-content card">
							<h4 class="box-title"><i class="fa fa-user ico"></i>Profile</h4>
							<!-- /.box-title -->
							
							<div class="col-md-9 col-xs-12">
							<!-- /.dropdown js__dropdown -->
							<div class="card-content">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>First Name:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $value['master_admin_name']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Gender:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $value['master_admin_gender']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Role:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $role[0]['role']; ?></a></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Branch:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $branch[0]['branch_name']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>State:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $value['master_admin_state']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>City:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $value['master_admin_city']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Address:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $value['master_admin_address']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Date of birth:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $value['master_admin_dob']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Joining date:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $value['master_admin_dob']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Contact:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $value['master_admin_contact']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Email:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $value['master_admin_email']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.card-content -->
						</div>
						<div class="col-md-3 col-xs-12">
							<br>
						<div class="box-content bordered primary margin-bottom-20">
							<div class="profile-avatar">
								<img src="<?php echo base_url('uploads/branch_head/'.$value['master_admin_image']); ?>" alt="">
							</div>
						</div>
							</div>
							<?php
									}
							?>
						</div>
						<!-- /.box-content card -->
					</div>
					
				</div>	
			</div>
		
		<div class="col-md-6 col-xs-12">
						<div class="box-content card">
							<h4 class="box-title"><i class="fa fa-flask ico"></i>Related Branch Info</h4>
							<div class="card-content">
								<div class="row">
							<?php

									foreach ($branch as  $val) {
										
							?>

								<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Name:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $val['branch_name']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>

								<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>State:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $val['branch_state']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
								<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>City:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $val['branch_city']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div><div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Address:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $val['branch_address']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div><div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Pincode:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $val['branch_pincode']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div><div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Establish Date:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $val['branch_establish_date']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div><div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Contact:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $val['branch_contact']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div><div class="col-md-12">
										<div class="row">
											<div class="col-xs-5"><label>Email:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-2"><?php echo $val['branch_email']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>


							<?php

									}
							?>
						</div>
					</div>
						</div>
						<!-- /.box-content card -->
					</div>
				
	<div class="row">
		<div class="col-md-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Number of students in Branch</h4>
			
					<div id="categories-flot-chart" class="flot-chart" style="height: 320px">
						<canvas id="studgraph">
							
						</canvas>
					</div>
				
				</div>
			
			</div>
		</div>
		
<?php $this->load->view('admin/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){

		$.getJSON('<?php echo base_url();?>admin/maxstudent', function (data) {
    					
			var students = [];
	 		var branch = [];

	 				for(var i in data)
					{
						branch.push("branch " + data[i].branch_name);
						students.push(data[i].students);
					}

					var graph = {
						labels: branch,
						datasets : [

							{
								label: 'Branch Students',
								backgroundColor: 'rgba(200,200,200,0.75)',
								borderColor: 'rgba(200,200,200,0.75)',
								hoverbackgroundColor: 'rgba(200,200,200,1)',
								hoverborderColor: 'rgba(200,200,200,1)',
								data: students
							}

						]
					};					

					var d = $("#studgraph");
					var bgraph = new Chart(d, {
						type : 'bar',
						data : graph
				}

			);
		});
					
	});
	
</script>