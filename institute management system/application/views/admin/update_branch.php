<?php include('header.php'); ?>
<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
 
      <?php echo form_open_multipart("super_admin/update_branch/{$data->branch_id}");?>
      
			 <form action="" method="">
      <!-- <?php	echo form_hidden(['branch_id'=>set_value('branch_id',$data->branch_id)]); ?> -->

      				<div class= "col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Branch Name</label>
						  <?php echo form_input(['name'=>'branch_name','class'=>'form-control','placeholder'=>'Branch Name','value'=>set_value('branch_name',$data->branch_name)]); ?>
							<div class= "col-sm-6">
								<?php echo form_error('branch_name'); ?>
      	
							</div></div></div>
      				<div class= "col-md-6">

							<div class="form-group">
								<label for="exampleInputEmail1">Branch State</label>
				<?php echo form_input(['name'=>'branch_state','class'=>'form-control','placeholder'=>'Branch Satate','value'=>set_value('branch_state',$data->branch_state)]); ?>
							<div class= "col-sm-6">
							<?php echo form_error('branch_state'); ?>
      	
							</div></div></div>
      				<div class= "col-md-6">

							<div class="form-group">
								<label for="exampleInputEmail1">Branch City</label>
							<?php echo form_input(['name'=>'branch_city','class'=>'form-control','placeholder'=>'Branch Satate','value'=>set_value('branch_city',$data->branch_city)]); ?>
						<div class= "col-sm-6">
						<?php echo form_error('branch_city'); ?>
			</div></div>      	
							</div>
							      				<div class= "col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Branch Address</label>
								 <?php echo form_textarea(['name'=>'branch_address','class'=>'form-control','placeholder'=>'Branch Address','value'=>set_value('branch_address',$data->branch_address)]); ?>
				<div class= "col-sm-6">
				<?php echo form_error('branch_address'); ?>
</div></div>      	
							</div>
							      				<div class= "col-md-6">

							<div class="form-group">
								<label for="exampleInputEmail1">Branch Pincode</label>
									<?php echo form_input(['name'=>'branch_pincode','class'=>'form-control','placeholder'=>'Branch Pincode','value'=>set_value('branch_pincode',$data->branch_pincode)]); ?>
						<div class= "col-sm-6">
								<?php echo form_error('branch_pincode'); ?>
</div></div>      	
							</div>
			      				<div class= "col-md-6">
													<div class="form-group">

			<div class="input-group">
								<label for="exampleInputEmail1">Branch Established Date</label>
		
			<?php echo form_input(['name'=>'branch_establish_date','size'=>'80','id'=>'datepicker-autoclose','class'=>'form-control','placeholder'=>'mm/dd/yyyy','value'=>set_value('branch_establish_date',$data->branch_establish_date)]); ?>
				<div class= "col-sm-6">
											<?php echo form_error('branch_establish_date'); ?>
</div></div>      </div>	
										</div>
			      				<div class= "col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Branch Contact</label>
								<?php echo form_input(['name'=>'branch_contact','class'=>'form-control','placeholder'=>'Branch Contact','value'=>set_value('branch_contact',$data->branch_contact)]); ?>
								<div class= "col-sm-6">
								<?php echo form_error('branch_contact'); ?>
</div></div>      	
							</div>
							      				<div class= "col-md-6">

							<div class="form-group">
								<label for="exampleInputEmail1">Branch Email</label>
								<?php echo form_input(['name'=>'branch_email','class'=>'form-control','placeholder'=>'Branch Email','value'=>set_value('branch_email',$data->branch_email)]); ?>
      				<div class= "col-sm-6">

								<?php echo form_error('branch_email'); ?>
							</div>
</div></div>					
      				<div class= "col-md-12">

						<div class="form-group">
						<label for="exampleInputFile">Branch Image</label>
						 <input type = "file" name = "userfile" value="sss" size = "20" class="form-control">
						<?php echo form_error('userfile'); ?>
						 <div class="col-lg-12">
						 <?php if(isset($upload_error)) echo $upload_error; ?>
  							<img src="<?php echo base_url("uploads/".$data->branch_image); ?>" class="img-thumbnail rounded" height="50" width="50" >
						
      					</div> 
       <!-- <input type="hidden" name="branch_id" value=""> -->
       <!-- <input type="hidden" id="hid" name="branch_image" value="<?php echo $data->branch_image; ?>"> -->
      <?php	echo form_hidden(['branch_image'=>set_value('branch_image',$data->branch_image)]); ?>
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