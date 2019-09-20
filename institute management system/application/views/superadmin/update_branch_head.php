<?php include('header.php'); ?>
<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
 
      <?php echo form_open_multipart("super_admin/update_branch_head/{$data->master_admin_id}");?>
       <form action="" method="">
      
      <!-- <?php	echo form_hidden(['branch_id'=>set_value('branch_id',$data->branch_id)]); ?> -->

      				<div class= "col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Branch Head Name</label>
						  <?php echo form_input(['name'=>'master_admin_name','class'=>'form-control','placeholder'=>'Branch Head Name','value'=>set_value('master_admin_name',$data->master_admin_name)]); ?>
							<div class= "col-sm-6">
								<?php echo form_error('master_admin_name'); ?>
      	
							</div></div></div>

							<div class= "col-md-6">
						<div class="form-group">
													<label for="exampleInputEmail1">Branch Head Gender</label>

							<div class="radio">
								<input type="radio" name="master_admin_gender" id="underwear1" value="male" <?php if(isset($_POST['master_admin_gender'])){ if($_POST['master_admin_gender']=="male") { echo "checked"; }} ?>>
								<label for="underwear1">Male</label>
							
								<input type="radio" name="master_admin_gender" id="underwear2" value="female" <?php if(isset($_POST['master_admin_gender'])){ if($_POST['master_admin_gender']=="female") { echo "checked"; }} ?>>
								<label for="underwear2">Female</label>
							</div>
							<div class= "col-sm-12">
      					</div>
						</div>
					</div>
							<div class= "col-md-12">
							<div class="form-group">
							<label for="exampleInputEmail1">Branch Head Role</label>
							<select class="form-control" name="master_admin_role_id" id="master_admin_role_id" required>
								<option value>select</option>
								<?php 
										foreach ($role as $value) {
									?>
									<option value="<?php echo $value['role_id'];?>"><?php echo $value['role'];?></option>	
									<?php
								}
								?>
							</select>
							<div class= "col-sm-6">
								<?php echo form_error('master_admin_role'); ?>
      						</div>
						</div>
					</div>


					<div class= "col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1"> Head Branch</label>
							<select class="form-control" name="master_admin_branch" id="master_admin_branch">
								<option value>select</option>
								<?php 
										foreach ($branch as $value) {
									?>
									<option value="<?php echo $value['branch_id'];?>"><?php echo $value['branch_name'];?></option>	
									<?php
								}
								?>
							</select>
							<div class= "col-sm-6">
								<?php echo form_error('master_admin_branch'); ?>
      						</div>
						</div>
					</div>


							<input type="hidden" name="state" id="state" value="<?php echo $data->master_admin_state ?>">

							<div class= "col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Branch Head State</label>
							<select class="form-control" name="b_state" id="b_state">
								<option value=""></option>
							</select>
							<div class= "col-sm-6">
								<?php echo form_error('master_admin_state'); ?>
      						</div>
						</div>
					</div>


				<input type="hidden" name="city" id="city" value="<?php echo $data->master_admin_city ?>">

					<div class= "col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Branch Head City</label>
							<select class="form-control" name="b_city" id="b_city">
							</select>
							<div class= "col-sm-6">
								<?php echo form_error('branch_city'); ?>
      						</div>
						</div>
					</div>
      			<input type="hidden" name="master_admin_state" id="master_admin_state" >
				<input type="hidden" name="master_admin_city" id="master_admin_city" >

							      				<div class= "col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Branch Head Address</label>
								 <?php echo form_textarea(['name'=>'master_admin_address','class'=>'form-control','placeholder'=>'Branch Head Address','value'=>set_value('master_admin_address',$data->master_admin_address)]); ?>
				<div class= "col-sm-6">
				<?php echo form_error('branch_address'); ?>
</div></div>      	
							</div>
							      			
			      				<div class= "col-md-6">
													<div class="form-group">

			<div class="input-group">
								<label for="exampleInputEmail1">Branch Head Birth Date</label>
		
			<?php echo form_input(['name'=>'master_admin_dob','size'=>'80','id'=>'datepicker-autoclose','class'=>'form-control','placeholder'=>'mm/dd/yyyy','value'=>set_value('master_admin_dob',$data->master_admin_dob)]); ?>
				<div class= "col-sm-6">
											<?php echo form_error('branch_establish_date'); ?>
</div></div>      </div>	
										</div>


			      				<div class= "col-md-6">
													<div class="form-group">

			<div class="input-group">
								<label for="exampleInputEmail1">Branch Head Join Date</label>
		
			<?php echo form_input(['name'=>'master_admin_join_date','size'=>'80','id'=>'datepicker-autoclose','class'=>'form-control','placeholder'=>'mm/dd/yyyy','value'=>set_value('master_admin_join',$data->master_admin_join_date)]); ?>
				<div class= "col-sm-6">
</div></div>      </div>	
										</div>
			      				<div class= "col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Branch Head Contact</label>
								<?php echo form_input(['name'=>'master_admin_contact','class'=>'form-control','placeholder'=>'Branch Head Contact','value'=>set_value('master_admin_contact',$data->master_admin_contact)]); ?>
								<div class= "col-sm-6">
								<?php echo form_error('branch_contact'); ?>
</div></div>      	
							</div>
							      				<div class= "col-md-6">

							<div class="form-group">
								<label for="exampleInputEmail1">Branch Head Email</label>
								<?php echo form_input(['name'=>'master_admin_email','id'=>'master_admin_email','class'=>'form-control','placeholder'=>'Branch Head Email','value'=>set_value('master_admin_email',$data->master_admin_email)]); ?>
      				<div class= "col-sm-6 ck">

								<?php echo form_error('master_admin_email'); ?>
							</div>
</div></div>					
      				<div class= "col-md-12">

						<div class="form-group">
						<label for="exampleInputFile">Branch Head Image</label>
						 <input type = "file" name = "userfile" value="sss" size = "20" class="form-control">
						<?php echo form_error('userfile'); ?>
						 <div class="col-lg-12">
						 <?php if(isset($upload_error)) echo $upload_error; ?>
  							<img src="<?php echo base_url("uploads/branch_head/".$data->master_admin_image); ?>" class="img-thumbnail rounded" height="50" width="50" >
						
      					</div> 
       <!-- <input type="hidden" name="branch_id" value=""> -->
       <!-- <input type="hidden" id="hid" name="branch_image" value="<?php echo $data->branch_image; ?>"> -->
      <?php	echo form_hidden(['master_admin_image'=>set_value('master_admin_image',$data->master_admin_image)]); ?>
</div>        				</div> 
</br>
	<div class="col-md-12">
         <input type = "submit" value = "Update" class="btn btn-primary btn-sm waves-effect waves-light"/> 
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


					var s = document.getElementById("state").value;
					var c = document.getElementById("city").value;

		    	$.getJSON("<?php echo base_url()."assets/countries.json"; ?>", function(result){
           		
           				var st = "";
           		 for(i=0;i<result.Countries[100].States.length;i++)
           		{
							if(result.Countries[100].States[i].StateName == s) 
							{
								  var id = i;
								  break;
							}        			
           		 }

				for(i=0;i<result.Countries[100].States.length;i++)
           		{
           			if(id == i)
           			{
           					st += "<option value = "+i+" selected >"+result.Countries[100].States[i].StateName+"</option>";
           			}
           			else
           			{
           			 st += "<option value = "+i+">"+result.Countries[100].States[i].StateName+"</option>";
           			}
           			
							        			
           		 }           		 



					 $("#b_state").html(st);
				});


		    	$.getJSON("<?php echo base_url()."assets/countries.json"; ?>", function(result){

           			var sid = document.getElementById("b_state").value;
           				var ct = "";

           		 for(i=0;i<result.Countries[100].States[sid].Cities.length;i++)
           		{

							if(result.Countries[100].States[sid].Cities[i] == c) 
							{
								
								 var cid = i;
								 break;
							}  	
           		 }


           		 for(i=0;i<result.Countries[100].States[sid].Cities.length;i++)
           		{


           				if(i == cid)
						{
								ct += "<option value = "+i+" selected >"+result.Countries[100].States[sid].Cities[i]+"</option>"
						}
						else
						{
								ct += "<option value = "+i+">"+result.Countries[100].States[sid].Cities[i]+"</option>"
						}
							  			
           		 }

					 $("#b_city").html(ct);

					 var stid = document.getElementById("b_state"),
				snm = stid.options[stid.selectedIndex].text;

				document.getElementById("master_admin_state").value = snm;

				var ctid = document.getElementById("b_city"),
				cnm = ctid.options[ctid.selectedIndex].text;

				document.getElementById("master_admin_city").value = cnm;
				});



		    	$("#b_state").change(function(){
	
					var sid = document.getElementById("b_state").value;
			
				$.getJSON("<?php echo base_url()."assets/countries.json"; ?>", function(result){
           		
           		var city = "<option>select</option>";
           		 for(i=0;i<result.Countries[100].States[sid].Cities.length;i++)
           		{

           			city += "<option value = "+i+">"+result.Countries[100].States[sid].Cities[i]+"</option>"
           			
           		 }

           		 $("#b_city").html(city);

					
				});

			});

		    $("#b_city").change(function(){
	

		    		 var stid = document.getElementById("b_state"),
				snm = stid.options[stid.selectedIndex].text;

				document.getElementById("master_admin_state").value = snm;

				var ctid = document.getElementById("b_city"),
				cnm = ctid.options[ctid.selectedIndex].text;

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
