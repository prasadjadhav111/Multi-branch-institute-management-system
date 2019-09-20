
				<div class="box-content">
					<h4 class="box-title">Wizard With Form Validation</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else there</a></li>
							<li class="split"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<form id="commentForm" action="#">
						<div id="tabsleft" class="tabbable tabs-left">
							<ul>
								<li><a href="#tabsleft-tab1" data-toggle="tab">First</a></li>
								<li><a href="#tabsleft-tab2" data-toggle="tab">Second</a></li>
								<li><a href="#tabsleft-tab3" data-toggle="tab">Third</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane" id="tabsleft-tab1">
									<div class="form-group">
										<label for="emailfield">Email</label>
										<div class="controls">
											<input type="text" id="emailfield" name="emailfield" class="required email form-control">
										</div>
									</div>
</div>
</div>
</div>
</form>
</div>


<?php $this->load->view('admin/header.php'); ?>
<div class="box-content">
<div class="dropdown js__drop_down">
	<form id="commentForm" action="#">
		<div id="tabsleft" class="tabbable tabs-left">
							<ul>
								<li><a href="#tabsleft-tab1" data-toggle="tab">First</a></li>
								<li><a href="#tabsleft-tab2" data-toggle="tab">Second</a></li>
								<li><a href="#tabsleft-tab3" data-toggle="tab">Third</a></li>
							</ul>
			<div class="tab-content">
								<div class="tab-pane" id="tabsleft-tab1">
					<?php echo form_open_multipart(base_url("admin/add_faculty_detail"), array('id'=>'facultyreg'));  ?>
<div class= "col-md-12">
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Faculty Name'); ?>	

							<?php echo form_input(array('name'=>'master_admin_name','id'=>'master_admin_name','class'=>'form-control','placeholder'=>'Enter Faulty Name','value'=>set_value('master_admin_name'))) ?>	

				</div>
				<div class= "col-md-6">
							<?php echo form_error('master_admin_name'); ?>
				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
					<?php echo form_label('Faculty Gender'); ?>	
							<div class="radio">
								<input type="radio" name="master_admin_gender" id="underwear1" value="male"  <?php if(isset($_POST['master_admin_gender'])){ if($_POST['master_admin_gender']=="male") { echo "checked"; }} ?>>
								<label for="underwear1">Male</label>
							
								<input type="radio" name="master_admin_gender" id="underwear2" value="female"  <?php if(isset($_POST['master_admin_gender'])){ if($_POST['master_admin_gender']=="female") { echo "checked"; }} ?>>
								<label for="underwear2">Female</label>
							</div>
						</div>
						<div class= "col-md-6">
							<?php echo form_error('master_admin_gender'); ?>
				</div>
			</div>
	</div>

<input type="hidden" name="branch_id" id="branch_id" value="<?php if(isset($_POST['branch_id'])) { echo $_POST['branch_id'];  }else{ echo $branch[0]['branch_id']; } ?>" />
<input type="hidden" name="master_admin_role_id" id="master_admin_role_id" value="<?php if(isset($_POST['master_admin_role_id'])) { echo $_POST['master_admin_role_id'];  }else{ echo $role[0]['role_id']; } ?>" />
<input type="hidden" name="master_admin_branch" id="master_admin_branch" value="<?php if(isset($_POST['master_admin_branch'])) { echo $_POST['master_admin_branch'];  }else{ echo $branch[0]['branch_id']; } ?>" />
</div>
<div class= "col-md-12">
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select State'); ?>
							<select class="form-control"  name="admin_state" id="admin_state">

							</select>
				</div>
				<div class= "col-md-6">
							<?php echo form_error('admin_state'); ?>
				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select City'); ?>
							<select class="form-control" name="admin_city" id="admin_city">
								<option value>select</option>
							</select>
				</div>
				<div class= "col-md-6">
							<?php echo form_error('admin_city'); ?>
				</div>
			</div>
</div>
		<input type="hidden" name="a_state" id="a_state" value="<?php if(isset($_POST['a_state'])) { echo $_POST['a_state'];  } ?>" />

	<input type="hidden" name="a_city" id="a_city" value="<?php if(isset($_POST['a_city'])) { echo $_POST['a_city'];  } ?>" />

		<input type="hidden" name="master_admin_state" id="master_admin_state" value="<?php if(isset($_POST['master_admin_state'])) { echo $_POST['master_admin_state'];  } ?>" />

	<input type="hidden" name="master_admin_city" id="master_admin_city" value="<?php if(isset($_POST['master_admin_city'])) { echo $_POST['master_admin_city'];  } ?>" />
	<!--  -->


<div class= "col-md-12">
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Faculty Address'); ?>	

							<?php echo form_textarea(array('name'=>'master_admin_address','id'=>'master_admin_address','class'=>'form-control','placeholder'=>'Enter Faulty Address','value'=>set_value('master_admin_address'))); ?>	

				</div>
				<div class= "col-md-6">
							<?php echo form_error('master_admin_address'); ?>
				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
					<?php echo form_label('Faculty Birth Date'); ?>	
					
					<?php echo form_input(array('name'=>'master_admin_dob','id'=>'datepicker-autoclose','class'=>'form-control','placeholder'=>"mm/dd/yyyy",'value'=>set_value('master_admin_dob'))); ?>	
				</div>
				<div class= "col-md-6">
							<?php echo form_error('master_admin_dob'); ?>
				</div>
			</div>
	</div>

<div class= "col-md-12">
			<div class= "col-md-6">
				<div class="form-group">
					<?php echo form_label('Faculty Joining Date'); ?>	
					
					<?php echo form_input(array('name'=>'master_admin_join_date','id'=>'datepicker','class'=>'form-control','placeholder'=>"mm/dd/yyyy",'value'=>set_value('master_admin_join_date'))); ?>	
				</div>
				<div class= "col-md-6">
							<?php echo form_error('master_admin_join_date'); ?>
				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Faculty Contact'); ?>	

							<?php echo form_input(array('name'=>'master_admin_contact','id'=>'master_admin_contact','class'=>'form-control','placeholder'=>'Enter Faulty Contact','value'=>set_value('master_admin_contact'))); ?>	

				</div>
				<div class= "col-md-6">
							<?php echo form_error('master_admin_contact'); ?>
				</div>
			</div>
			
</div>

<div class= "col-md-12">
				<div class="form-group">
							<?php echo form_label('Faculty Email'); ?>	

							<?php echo form_input(array('name'=>'master_admin_email','id'=>'master_admin_email','class'=>'form-control','placeholder'=>'Enter Faulty Email','value'=>set_value('master_admin_email'))); ?>	

				</div>
</div>
<div class= "col-md-12">
				
				<?php echo form_error('master_admin_email'); ?>

</div>
<div class= "col-md-12">
				<div class="form-group">
							<?php echo form_label('Faculty Image'); ?>	

							 <input type = "file" name = "userfile" class="form-control">

				</div>
</div>
<input type="hidden" name="cid" id="cid" value="<?php  if(isset($_POST['cid'])) { echo $_POST['cid'];  } ?>">
<div class="col-sm-12">
						 <?php if(isset($upload_error)){ echo $upload_error; } ?>
 </div>
 <div class= "col-md-12">
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select Course'); ?>
							<select class="form-control"  name="course_id" id="course">
									<option value>select</option>
									<?php 
										foreach ($course as $value) {
									?>
									<option value="<?php echo $value['course_id']; ?>" <?php if(isset($_POST['course_id'])){ if($value['course_id']==$_POST['course_id']){ echo "selected"; }} ?>><?php echo $value['course_name']; ?></option>
									<?php
								}
									?>
							</select>
				</div>
				<div class= "col-md-6">
							<?php echo form_error('course_id'); ?>
				</div>
			</div>
			<div class= "col-md-6">
				<div class="form-group">
							<?php echo form_label('Select Subject'); ?>
							<select class="form-control" name="subject_id" id="subject">
								<option value>select</option>
							</select>
				</div>
				<div class= "col-md-6">
							<?php echo form_error('subject_id'); ?>
				</div>
			</div>
</div>


<!-- <input type="text" name="subid" id="subid" value="<?php if(isset($_POST['subid'])) { echo $_POST['subid'];  } ?>" />
<input type="text" name="subnm" id="subnm" value="<?php if(isset($_POST['subnm'])) { echo $_POST['subnm'];  } ?>" /> -->
 <div class="col-md-12">
          <button type="submit" class="btn btn-primary btn-sm" id="insertfaculty">ADD FACULTY</button>
        <?php echo form_close(); ?>
 </div>
</div>
</div>
</div>
</form></div>
<?php $this->load->view('admin/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){



		    	$.getJSON("<?php echo base_url()."assets/countries.json"; ?>", function(result){
           		
           	var state = "<option value='<?php if(isset($_POST['a_state'])) { echo $_POST['a_state'];  } ?>'><?php if(isset($_POST['master_admin_state'])) { if($_POST['master_admin_state']!=""){echo $_POST['master_admin_state'];}else{ echo "select"; }  }else { echo "select"; } ?></option>";
           		 for(i=0;i<result.Countries[100].States.length;i++)
           		{

           			state += "<option value = "+i+">"+result.Countries[100].States[i].StateName+"</option>"
           			
           		 }

           		 $("#admin_state").html(state);
					
				});
	           		
				$.getJSON("<?php echo base_url()."assets/countries.json"; ?>", function(result){
           		
           		var city = "<option value='<?php if(isset($_POST['a_city'])) { echo $_POST['a_city'];  } ?>'><?php if(isset($_POST['master_admin_city'])) {if($_POST['master_admin_city']!=""){echo $_POST['master_admin_city'];}else{ echo "select"; } }else { echo "select"; } ?></option>";

           		var sid = "<?php if(isset($_POST['a_city'])) { echo $_POST['a_city'];  } ?>";
           		 for(i=0;i<result.Countries[100].States[sid].Cities.length;i++)
           		{

           			city += "<option value = "+i+">"+result.Countries[100].States[sid].Cities[i]+"</option>"
           			
           		 }

           		 $("#admin_city").html(city);
					
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
				
				document.getElementById("a_state").value = document.getElementById("admin_state").value;
				document.getElementById("a_city").value = document.getElementById("admin_city").value;
			});


	           		$("#course").change(function(){

				var cid = document.getElementById("course").value;
				document.getElementById("cid").value = cid;
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>admin/get_sub',
				data:{course_id:cid},
				dataType : 'json',
				success : function(data){
					var op = "<option>select</option>";

					for(i=0;i<data.length;i++)
					{
						op += "<option value = "+data[i].subject_id + ">"+ data[i].subject_name+"</option>"
						
					}
						$("#subject").html(op);
				}
			});
			});

	           	
	           			if( document.getElementById("cid").value != "")
	           			{
	           					var cid = document.getElementById("cid").value;
				
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>admin/get_sub',
				data:{course_id:cid},
				dataType : 'json',
				success : function(data){
					var op = "<<option value='<?php if(isset($_POST['subid'])) { echo $_POST['subid'];  } ?>'><?php if(isset($_POST['subnm'])) {if($_POST['subnm']!=""){echo $_POST['subnm'];}else{ echo "select"; } }else { echo "select"; } ?></option>";

					for(i=0;i<data.length;i++)
					{
						op += "<option value = "+data[i].subject_id + ">"+ data[i].subject_name+"</option>"
						
					}
						$("#subject").html(op);
				}
			});
	           			}
		


	           		// $("#subject").change(function(){

	           		// 	var r = document.getElementById("subject").value;	
	           		// 	document.getElementById("subid").value = r;
	           		// });
        });

</script>
