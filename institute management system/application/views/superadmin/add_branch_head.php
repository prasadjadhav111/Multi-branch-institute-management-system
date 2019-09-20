<?php include('header.php'); ?>
<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
 
      <?php echo form_open_multipart('super_admin/store_branch_head');?> 
			 <form action="" method="">

			 		<div class= "col-md-6">
							<div class="form-group">
					<label for="exampleInputEmail1">User Name</label>
				<input type="text" name="master_admin_name" value="<?php if(isset($_POST['master_admin_name'])){echo $_POST['master_admin_name'];} ?>" class="form-control"  placeholder="Enter User Name">
						<div class= "col-sm-12">
						<?php echo form_error('master_admin_name'); ?>
      					</div>
							</div>
						</div>
						
						<div class= "col-md-6">
						<div class="form-group">
													<label for="exampleInputEmail1">User Gender</label>

							<div class="radio">
								<input type="radio" name="master_admin_gender" id="underwear1" value="male" <?php if(isset($_POST['master_admin_gender'])){ if($_POST['master_admin_gender']=="male") { echo "checked"; }} ?>>
								<label for="underwear1">Male</label>
							
								<input type="radio" name="master_admin_gender" id="underwear2" value="female" <?php if(isset($_POST['master_admin_gender'])){ if($_POST['master_admin_gender']=="female") { echo "checked"; }} ?>>
								<label for="underwear2">Female</label>
							</div>
							<div class= "col-sm-12">
						<?php echo form_error('master_admin_gender'); ?>
      					</div>
						</div>
					</div>

					<div class= "col-md-12">
							<div class="form-group">
							<label for="exampleInputEmail1">Role</label>

							<select class="form-control" name="master_admin_role_id" id="master_admin_role_id" required>
								<option value>select</option>
								<?php 
										foreach ($role as $value) {

											if($value['role'] == 'student')
											{

											}
											else
											{
									?>
									<option value="<?php echo $value['role_id'];?>"><?php echo $value['role'];?></option>	
									<?php
								}
							}
								?>
							</select>
							<div class= "col-sm-12">
								<?php echo form_error('master_admin_role_id'); ?>
      						</div>
						</div>
					</div>
					<div class= "col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Select Branch </label>
							<select class="form-control" name="master_admin_branch" id="master_admin_branch" required>
								<option value>select</option>
								<?php 
										foreach ($branch as $value) {
									?>
									<option value="<?php echo $value['branch_id'];?>"><?php echo $value['branch_name'];?></option>	
									<?php
								}
								?>
							</select>
							<div class= "col-sm-12">
								<?php echo form_error('master_admin_branch'); ?>
      						</div>
						</div>
					</div>
							<div class= "col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">User State</label>
							<select class="form-control" name="admin_state" id="admin_state" required>
							</select>
							<div class= "col-sm-12">
      						</div>
						</div>
					</div>
							<input type="hidden" name="master_admin_state" id="master_admin_state" />
						
							<div class= "col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">User City</label>
							<select class="form-control" name="admin_city" id="admin_city" required>
								<option>select</option>
							</select>
							<div class= "col-sm-12">
								<!--  -->      						</div>
						</div>
					</div>
								<input type="hidden" name="master_admin_city" id="master_admin_city" />

							<div class= "col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">User Address</label>
								<?php echo form_textarea(['name'=>'master_admin_address','class'=>'form-control','placeholder'=>'User Address','value'=>set_value('master_admin_address')]); ?>
																<div class= "col-sm-12">
				<?php echo form_error('master_admin_address'); ?>
      	</div></div>
							</div>
				
					<div class= "col-md-6">
											<div class="form-group">

						<div class="input-group">
								<label for="exampleInputEmail1">User Birth Date</label>
		<input type="text" name="master_admin_dob" class="form-control" value="<?php if(isset($_POST['master_admin_dob'])){echo $_POST['master_admin_dob'];} ?>" placeholder="mm/dd/yyyy" id="datepicker-autoclose" size="80">
										<div class= "col-sm-12">

											<?php echo form_error('master_admin_dob'); ?>
      	</div></div></div>
										</div>

					<div class= "col-md-6">
											<div class="form-group">

						<div class="input-group">
								<label for="exampleInputEmail1">User Join Date</label>
		<input type="text" name="master_admin_join_date" class="form-control" value="<?php if(isset($_POST['master_admin_join_date'])){echo $_POST['master_admin_join_date'];} ?>" placeholder="mm/dd/yyyy" id="datepicker" size="80">
										<div class= "col-sm-12">

											<?php echo form_error('master_admin_join_date'); ?>
      	</div></div></div>
										</div>

											<div class= "col-md-6">

							<div class="form-group">
								<label for="exampleInputEmail1">User Contact</label>
								<input type="text" name="master_admin_contact"  value="<?php if(isset($_POST['master_admin_contact'])){echo $_POST['master_admin_contact'];} ?>" class="form-control"  placeholder="Enter User Contact">
										<div class= "col-sm-12">

								<?php echo form_error('master_admin_contact'); ?>
      	</div></div>
							</div>
							<div class= "col-md-6">

							<div class="form-group">
								<label for="exampleInputEmail1">User Email</label>
								<input type="text" name="master_admin_email" id="master_admin_email"  value="<?php if(isset($_POST['master_admin_email'])){echo $_POST['master_admin_email'];} ?>" class="form-control"  placeholder="Enter User Email">
										<div class= "col-sm-12 ck">

								<?php echo form_error('master_admin_email'); ?>
      									</div>
      									
      </div>
							</div>
							<div class= "col-md-12">

							<div class="form-group">
							<label for="exampleInputFile">User Image</label>
						 <input type = "file" name = "userfile" size = "20" class="form-control">
						<?php echo form_error('userfile'); ?>

						 <div class="col-sm-12">
						 <?php if(isset($upload_error)) echo $upload_error; ?>
  							</p>
  						</div>
  					      </div> 
        				</div> 
        				<div class= "col-md-12">
         <input type = "submit" value = "Add User" class="btn btn-primary btn-sm waves-effect waves-light"/> 
     </div>
      </form>  
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
		</div>
<?php include('footer.php'); ?>


<script type="text/javascript">
	$(document).ready(function(){


		    	$.getJSON("<?php echo base_url()."assets/countries.json"; ?>", function(result){
           		
           	var state = "<option value>select</option>";
           		 for(i=0;i<result.Countries[100].States.length;i++)
           		{

           			state += "<option value = "+i+">"+result.Countries[100].States[i].StateName+"</option>"
           			
           		 }

           		 $("#admin_state").html(state);
					
				});
	           		

	           		$("#admin_state").change(function(){
	
					var sid = document.getElementById("admin_state").value;
			
				$.getJSON("<?php echo base_url()."assets/countries.json"; ?>", function(result){
           		
           		var city = "<option value>select</option>";
           		 for(i=0;i<result.Countries[100].States[sid].Cities.length;i++)
           		{

           			city += "<option value = "+i+">"+result.Countries[100].States[sid].Cities[i]+"</option>"
           			
           		 }

           		 $("#admin_city").html(city);
					
				});

			});


	           		$("#admin_city").change(function(){
	
				var sid = document.getElementById("admin_state"),
				snm = sid.options[sid.selectedIndex].text;

				document.getElementById("master_admin_state").value = snm;

				var cid = document.getElementById("admin_city"),
				cnm = cid.options[cid.selectedIndex].text;

				document.getElementById("master_admin_city").value = cnm;
				
			
			});


        });

</script>

<script type="text/javascript">
	$(document).ready(function(){

		$("#branch_email").focusout(function(){
			var em = document.getElementById("branch_email").value;
			
				$.ajax({

						url:'<?php echo base_url();?>super_admin/check_mail',
						type:'post',
						data:{b_email:em},
						success : function($data)
						{
							if($data != "")
							{

							$("#branch_email").focus();
							$(".ck").html($data);
							$(".ck").css("color","red");

							}
							else
							{
								$(".ck").empty();
							}
						}
				});


		});
	});
</script>