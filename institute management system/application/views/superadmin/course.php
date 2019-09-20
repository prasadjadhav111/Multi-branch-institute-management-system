<?php include('header.php'); ?>

<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
 
      <?php echo form_open_multipart("super_admin/course");?>
      
			 <form action="" method="">
      
      				<div class= "col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Branch Name</label>
						  <?php echo form_input(['name'=>'branch_name','class'=>'form-control','placeholder'=>'Branch Name','value'=>set_value('branch_name')]); ?>
							<div class= "col-sm-6">
								<?php echo form_error('b_name'); ?>
      	
							</div></div></div>

						
							<div class= "col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Branch State</label>
							 <?php echo form_input(['name'=>'branch_name','class'=>'form-control','placeholder'=>'Branch Name','value'=>set_value('branch_name')]); ?>
							
							<div class= "col-sm-6">
								<?php echo form_error('branch_state'); ?>
      						</div>
      					
						</div>
					</div>
				<div class= "col-md-12">
							<div class="form-group">
							<label for="exampleInputEmail1">Branch State</label>
							
						<textarea id="tinymce" name="description">
							</textarea>
				</div>
				<div class= "col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Branch Name</label>
						  <?php echo form_input(['name'=>'branch_name','class'=>'form-control','placeholder'=>'Branch Name','value'=>set_value('branch_name')]); ?>
							<div class= "col-sm-6">
								<?php echo form_error('b_name'); ?>
      	
							</div></div></div>

						
							<div class= "col-md-6">
							<div class="form-group">
							<label for="exampleInputEmail1">Branch State</label>
							 <?php echo form_input(['name'=>'branch_name','class'=>'form-control','placeholder'=>'Branch Name','value'=>set_value('branch_name')]); ?>
							
							<div class= "col-sm-6">
								<?php echo form_error('branch_state'); ?>
      						</div>
      					
						</div>
					</div>
			</div>
			<div class="col-md-12">
         <input type = "submit" value = "Update" class="btn btn-primary btn-sm waves-effect waves-light"/> 
      </div>

				</form>
			</div>
		</div>
	</div>



<?php include('footer.php'); ?>