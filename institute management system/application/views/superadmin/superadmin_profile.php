<?php $this->load->view('superadmin/header.php'); ?>
			
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
								<img src="<?php echo base_url('uploads/branch_faculty/'.$value['master_admin_image']); ?>" alt="">
							</div>
						</div>
							</div>
							<?php
									}
							?>
						</div>
					</div>
					
				</div>	
			</div>

				
		</div>
	</div>


<?php $this->load->view('superadmin/footer.php'); ?>
