<?php $this->load->view('admin/header.php'); ?>
<div class="box-content">

					<?php echo form_open_multipart(base_url("admin/update_faculty/{$data->master_admin_id}"), array('id'=>'facultyreg'));  ?>
<div class= "col-md-12">
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Faculty Name'); ?>	

							<?php echo form_input(array('name'=>'master_admin_name','id'=>'master_admin_name','class'=>'form-control','placeholder'=>'Enter Faulty Name','value'=>set_value('master_admin_name',$data->master_admin_name))) ?>	

				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
					<?php echo form_label('Faculty Gender'); ?>	
							<div class="radio">
								<input type="radio" name="master_admin_gender" id="underwear1" value="male" <?php if(isset($data->master_admin_gender)){ if($data->master_admin_gender=="male") { echo "checked"; }} ?>>
								<label for="underwear1">Male</label>
							
								<input type="radio" name="master_admin_gender" id="underwear2" value="female" <?php if(isset($data->master_admin_gender)){ if($data->master_admin_gender=="female") { echo "checked"; }} ?>>
								<label for="underwear2">Female</label>
							</div>
						</div>
			</div>
	</div>
<div class= "col-md-12">
				<div class= "col-md-6">
							<?php echo form_error('master_admin_name'); ?>
				</div>
				<div class= "col-md-6">
							<?php echo form_error('master_admin_gender'); ?>
				</div>
</div>

					<div class= "col-md-12">

					<div class= "col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Role</label>
							<select class="form-control" name="master_admin_role_id" id="master_admin_role_id" required>
								<option value>select</option>
								<?php 
										foreach ($role as $value) {
									?>
									<option value="<?php echo $value['role_id'];?>" <?php if(isset($data->master_admin_role_id)){ if($data->master_admin_role_id == $value['role_id']){ echo "selected"; } } ?>> <?php echo $value['role'];?></option>	
									<?php
								}
								?>
							</select>
							
						</div>
					</div>
						<div class= "col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Branch</label>
							<select class="form-control" name="master_admin_branch" id="master_admin_branch">
								<option value>select</option>
								<?php 
										foreach ($branch as $value) {
									?>
									<option value="<?php echo $value['branch_id'];?>" <?php if(isset($data->master_admin_branch)){ if($data->master_admin_branch == $value['branch_id']){ echo "selected"; } } ?>><?php echo $value['branch_name'];?></option>	
									<?php
								}
								?>
							</select>
							
						</div>
					</div>
</div>

<div class= "col-md-12">
				<div class= "col-md-6">
							<?php echo form_error('master_admin_role_id'); ?>
				</div>
				<div class= "col-md-6">
							<?php echo form_error('master_admin_branch'); ?>
				</div>
</div>

<input type="hidden" name="state" id="state" value="<?php echo $data->master_admin_state ?>">
<div class= "col-md-12">
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select State'); ?>
							<select class="form-control"  name="b_state" id="b_state">
							</select>
				</div>
			</div>
<input type="hidden" name="city" id="city" value="<?php echo $data->master_admin_city ?>">
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select City'); ?>
							<select class="form-control" name="b_city" id="b_city">
								<option value>select</option>
							</select>
				</div>
			</div>
</div>
<div class= "col-md-12">
				<div class= "col-md-6">
							<?php echo form_error('b_state'); ?>
				</div>
				<div class= "col-md-6">
							<?php echo form_error('b_city'); ?>
				</div>
</div>
		<input type="hidden" name="master_admin_state" id="master_admin_state" value="<?php echo $data->master_admin_state ?>" />

	<input type="hidden" name="master_admin_city" id="master_admin_city" value="<?php echo $data->master_admin_state ?>" />
	<!--  -->
<div class= "col-md-12">
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Faculty Address'); ?>	

							<?php echo form_textarea(array('name'=>'master_admin_address','id'=>'master_admin_address','class'=>'form-control','placeholder'=>'Enter Faulty Address','value'=>set_value('master_admin_address',$data->master_admin_address))); ?>	

				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
					<?php echo form_label('Faculty Birth Date'); ?>	
					
					<?php echo form_input(array('name'=>'master_admin_dob','id'=>'datepicker-autoclose','class'=>'form-control','placeholder'=>"mm/dd/yyyy",'value'=>set_value('master_admin_dob',$data->master_admin_dob))); ?>	
				</div>
			</div>
	</div>
<div class= "col-md-12">
				<div class= "col-md-6">
							<?php echo form_error('master_admin_address'); ?>
				</div>
				<div class= "col-md-6">
							<?php echo form_error('master_admin_dob'); ?>
				</div>
</div>
<div class= "col-md-12">
			<div class= "col-md-6">
				<div class="form-group">
					<?php echo form_label('Faculty Joining Date'); ?>	
					
					<?php echo form_input(array('name'=>'master_admin_join_date','id'=>'datepicker','class'=>'form-control','placeholder'=>"mm/dd/yyyy",'value'=>set_value('master_admin_join',$data->master_admin_join_date))); ?>	
				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Faculty Contact'); ?>	

							<?php echo form_input(array('name'=>'master_admin_contact','id'=>'master_admin_contact','class'=>'form-control','placeholder'=>'Enter Faulty Contact','value'=>set_value('master_admin_contact',$data->master_admin_contact))); ?>	

				</div>
			</div>
			
</div>
<div class= "col-md-12">
				<div class= "col-md-6">
							<?php echo form_error('master_admin_join_date'); ?>
				</div>
				<div class= "col-md-6">
							<?php echo form_error('master_admin_contact'); ?>
				</div>
</div>
<div class= "col-md-12">
	<div></div>
				<div class="form-group">
							<?php echo form_label('Faculty Email'); ?>	

							<?php echo form_input(array('name'=>'master_admin_email','id'=>'master_admin_email','class'=>'form-control','placeholder'=>'Enter Faulty Email','value'=>set_value('master_admin_email',$data->master_admin_email))); ?>	

				</div>
</div>
<div class= "col-md-12">
				
				<?php echo form_error('master_admin_email'); ?>

</div>
<div class= "col-md-12">
	<div></div>
				<div class="form-group">
							<?php echo form_label('Faculty Image'); ?>	

							 <input type = "file" name = "userfile" class="form-control">

				</div>
</div>
<div class="col-sm-12">
						 <?php if(isset($upload_error)){ echo $upload_error; } ?>
<img src="<?php echo base_url("uploads/branch_faculty/".$data->master_admin_image); ?>" class="img-thumbnail rounded" height="50" width="50" >
 </div>
  <?php	echo form_hidden(['master_admin_image'=>set_value('master_admin_image',$data->master_admin_image)]); ?>
  
 <div class="col-md-12">
          <button type="submit"  value = "Update" class="btn btn-primary btn-sm" id="insertfaculty">Update FACULTY</button>
        <?php echo form_close(); ?>
 </div>
</div>


<?php $this->load->view('admin/footer.php'); ?>
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
		$("#course").change(function(){

				var cid = document.getElementById("course").value;
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>admin/get_sub',
				data:{course_id:cid},
				dataType : 'json',
				success : function(data){
					var op = "";

					for(i=0;i<data.length;i++)
					{
						op += "<option value = "+data[i].subject_id + ">"+ data[i].subject_name+"</option>"
						
					}
						$("#subject").html(op);
				}
			});
			});
	});
</script>
