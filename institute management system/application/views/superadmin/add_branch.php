<?php include('header.php'); ?>
<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
 
      <?php echo form_open_multipart('super_admin/store_branch');?> 
			 <form action="" method="">

			 		<div class= "col-md-6">
							<div class="form-group">														<label for="exampleInputEmail1">Branch Name</label>
				<input type="text" name="branch_name" value="<?php if(isset($_POST['branch_name'])){echo $_POST['branch_name'];} ?>" class="form-control"  placeholder="Enter Branch Name">
						<div class= "col-sm-12">
						<?php echo form_error('branch_name'); ?>
      					</div>
							</div>
						</div>
						
					

							<div class= "col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Branch State</label>
							<select class="form-control" name="state" id="state">
							</select>
							<div class= "col-sm-12">
								<?php echo form_error('branch_state'); ?>
      						</div>
						</div>
					</div>
							<input type="hidden" name="branch_state" id="branch_state" />
				
					<div class="col-md-12">	
							<div class= "col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Branch City</label>
							<select class="form-control" name="city" id="city">
								<option>select</option>
							</select>
							<div class= "col-sm-12">
								<?php echo form_error('branch_city'); ?>
      						</div>
						</div>
					</div>
								<input type="hidden" name="branch_city" id="branch_city" />

							<div class= "col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Branch Address</label>
								<textarea class="form-control"  name="branch_address" value="<?php if(isset($_POST['branch_address'])){echo $_POST['branch_address'];} ?>" placeholder="Enter Branch Address"></textarea>
								<div class= "col-sm-12">
				<?php echo form_error('branch_address'); ?>
      	</div></div>
							</div>
							</div>
							<div class= "col-md-6">

							<div class="form-group">
								<label for="exampleInputEmail1">Branch Pincode</label>
								<input type="text" name="branch_pincode" value="<?php if(isset($_POST['branch_pincode'])){echo $_POST['branch_pincode'];} ?>" class="form-control"  placeholder="Enter Branch Pincode">
						<div class= "col-sm-12">
								<?php echo form_error('branch_pincode'); ?>
      	</div></div>
							</div>
				<div class= "col-md-6">
											<div class="form-group">

						<div class="input-group">
								<label for="exampleInputEmail1">Branch Established Date</label>
		<input type="text" name="branch_establish_date" class="form-control" value="<?php if(isset($_POST['branch_establish_date'])){echo $_POST['branch_establish_date'];} ?>" placeholder="mm/dd/yyyy" id="datepicker-autoclose" size="80">
										<div class= "col-sm-12">

											<?php echo form_error('branch_establish_date'); ?>
      	</div></div></div>
										</div>
							<div class= "col-md-6">

							<div class="form-group">
								<label for="exampleInputEmail1">Branch Contact</label>
								<input type="text" name="branch_contact"  value="<?php if(isset($_POST['branch_pincode'])){echo $_POST['branch_contact'];} ?>" class="form-control"  placeholder="Enter Branch Contact">
										<div class= "col-sm-12">

								<?php echo form_error('branch_contact'); ?>
      	</div></div>
							</div>
							<div class= "col-md-6">

							<div class="form-group">
								<label for="exampleInputEmail1">Branch Email</label>
								<input type="text" name="branch_email" id="branch_email"  value="<?php if(isset($_POST['branch_email'])){echo $_POST['branch_email'];} ?>" class="form-control"  placeholder="Enter Branch Email">
										<div class= "col-sm-12 ck">

								<?php echo form_error('branch_email'); ?>
      									</div>
      									
      </div>
							</div>
							<div class= "col-md-12">

							<div class="form-group">
							<label for="exampleInputFile">Branch Image</label>
						 <input type = "file" name = "userfile" size = "20" class="form-control">
						<?php echo form_error('userfile'); ?>

						 <div class="col-sm-12">
						 <?php if(isset($upload_error)) echo $upload_error; ?>
  							</p>
  						</div>
      </div> 
        				</div> 
        				<div class= "col-md-12">
         <input type = "submit" value = "Add Branch" class="btn btn-primary btn-sm waves-effect waves-light"/> 
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

           		 $("#state").html(state);
					
				});
	           		

	           		$("#state").change(function(){
	
					var sid = document.getElementById("state").value;
			
				$.getJSON("<?php echo base_url()."assets/countries.json"; ?>", function(result){
           		
           		var city = "<option value>select</option>";
           		 for(i=0;i<result.Countries[100].States[sid].Cities.length;i++)
           		{

           			city += "<option value = "+i+">"+result.Countries[100].States[sid].Cities[i]+"</option>"
           			
           		 }

           		 $("#city").html(city);
					
				});

			});


	           		$("#city").change(function(){

	
				var sid = document.getElementById("state"),
				snm = sid.options[sid.selectedIndex].text;

				document.getElementById("branch_state").value = snm;

				var cid = document.getElementById("city"),
				cnm = cid.options[cid.selectedIndex].text;

				document.getElementById("branch_city").value = cnm;
				
					$.getJSON("<?php echo base_url()."assets/assets_client/city.json"; ?>", function(result){
           		
           				console.log(result[56668]['name']);
           				
							for(i=53201;i<=result[56668].length;i++)
							{
								console.log(i);
								// if(cnm == result[i]['name'])
								// {
								// 	console.log(result[i]['name']);
								// 	alert(cnm);
								// }
							}					
						});

			
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