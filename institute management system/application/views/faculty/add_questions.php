<?php $this->load->view('faculty/header.php'); ?>
<div class="box-content">

					

<input type="hidden" name="cid" id="cid" value="<?php  if(isset($_POST['cid'])) { echo $_POST['cid'];  } ?>">

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
<div class= "col-md-12">

				<div class="form-group">
							<?php echo form_label('Enter number of questions : '); ?>
							<?php echo form_input(array('name'=>'number_of_que','id'=>'number_of_que','class'=>'form-control','placeholder'=>'Enter number of questions ','value'=>set_value('number_of_que'))) ?>		
				</div>
			
</div>
<div id="question" style="display: none;">

	
	<div id="tq">
		
	</div>
<!-- <input type="text" name="subid" id="subid" value="<?php if(isset($_POST['subid'])) { echo $_POST['subid'];  } ?>" />
<input type="text" name="subnm" id="subnm" value="<?php if(isset($_POST['subnm'])) { echo $_POST['subnm'];  } ?>" /> -->

 <div class="col-md-12">
          <button type="button" class="btn btn-primary btn-sm" id="insertquestions">ADD QUESTIONS</button>
       
 </div>



</div>

<!-- 
<div class= 'col-md-6'><div class='form-group'><input type='text' class='form-control' id='que_mark"+i+"' name='que_mark' placeholder='Enter question mark'></div></div> -->

</div>
<?php $this->load->view('faculty/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){

		$("#number_of_que").blur(function(){
			var no = $("#number_of_que").val();

			for(i=1;i<=no;i++)
			{
				$("#tq").append("<div  id='q"+i+"'><div class= 'col-md-12'><div class='form-group'><label> Question number : "+ i +"</label><input type='text' class='form-control' id='qno"+i+"' name='qno' placeholder='Enter question number "+i+"'></div><div class= 'col-md-6'><div class='form-group'><input type='text' class='form-control' id='ono1"+i+"' name='ono1' placeholder='Enter Option number 1'></div></div><div class= 'col-md-6'><div class='form-group'><input type='text' class='form-control' id='ono2"+i+"' name='ono2' placeholder='Enter Option number 2'></div></div><div class= 'col-md-6'><div class='form-group'><input type='text' class='form-control' id='ono3"+i+"' name='ono3' placeholder='Enter Option number 3'></div></div><div class= 'col-md-6'><div class='form-group'><input type='text' class='form-control' id='ono4"+i+"' name='ono4' placeholder='Enter Option number 4'></div></div><div class= 'col-md-6'><select class='form-control' name='ans' id='ans"+i+"'><option>Select right answer </option><option value='1'>option 1</option><option value='2'>option 2</option><option value='3'>option 3</option><option value='4'>option 4</option></select></div><div class= 'col-md-6'><select class='form-control' name='que_mark' id='que_mark"+i+"'><option>Select Question marks </option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></div></div></div>");
					
					$("#question").show();

			}
			
		});



					

			$("#insertquestions").click(function(){


				var qno = $("#number_of_que").val();

				var val = [];

				for(j=1;j<=qno;j++)
				{

						var cid = $("#course").val();
					var sid = $("#subject").val();
					var que = $("#qno"+j+"").val();
					var op1 = $("#ono1"+j+"").val();
					var op2 = $("#ono2"+j+"").val();
					var op3 = $("#ono3"+j+"").val();
					var op4 = $("#ono4"+j+"").val();
					var ans = $("#ans"+j+"").val();
					var mark = $("#que_mark"+j+"").val();

					var time = 0;

					if(mark == 1)
					{
						time = 60;
					}
					else if(mark == 2)
					{
						time=120;
					}
					else if(mark == 3)
					{
						time=180;
					}
					else if(mark == 4)
					{
						time=240;
					}
					else if(mark == 5)
					{
						time=300;
					}

					val[j-1] = {course_id:cid,chapter_id:sid,question:que,op1:op1,op2:op2,op3:op3,op4:op4,ans:ans,que_mark:mark,que_time:time};
				}
					
					 $.ajax({
					 			type:'post',
					 			url:'<?php echo base_url();?>faculty/add_question_detail',
								data:{val:val},
					 			success : function(data){
									///console.log(data);
									window.location = '<?php echo base_url();?>faculty/add_questions';
								}
					});

			});
		

	           		$("#course").change(function(){

				var cid = document.getElementById("course").value;
				document.getElementById("cid").value = cid;
				$.ajax({
				type:'post',
				url:'<?php echo base_url();?>faculty/get_sub',
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
				url:'<?php echo base_url();?>faculty/get_sub',
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
	
        });

</script>
