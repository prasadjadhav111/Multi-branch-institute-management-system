<?php $this->load->view('superadmin/header'); ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
       
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
    </div>

        <!-- /.row -->
		
<footer class="footer">
			<ul class="list-inline">
				<li>2016 © SY </li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</footer>
</div>
	
	</div>
</body>

</html>

<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url('super_admin/addevent'); ?>">			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="event_name" class="form-control" id="name" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="event_color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="event_start" class="form-control" id="start" >
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="event_end" class="form-control" id="end">
					</div>
				  </div>
					<div class="form-group">
					<label for="end" class="col-sm-2 control-label">Event Image</label>
					<div class="col-sm-10">
					<input type = "file" name = "userfile" id="e_img" size = "20" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label for="end" class="col-sm-2 control-label">Event Description</label>
					<div class="col-sm-10">
					<textarea class="form-control" name="event_des" required></textarea>
					</div>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="<?php echo base_url('super_admin/editevent'); ?>" enctype="multipart/form-data">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="event_name" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="event_color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>

				  </div>
				<div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="event_start" class="form-control" id="start">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="event_end" class="form-control" id="end">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Event Image</label>
					<div class="col-sm-10">
					<input type = "file" name = "userfile" id="e_img1" size = "20" class="form-control">
					
					</div>
				</div>
				<div class="form-group">
					<label for="end" class="col-sm-2 control-label">Event Description</label>
					<div class="col-sm-10">
					<textarea class="form-control" name="event_des" id="event_des" required></textarea>
					</div>
				</div>
				<div class="form-group">
				    
						<div class="col-sm-offset-2 col-sm-10">
						  <li class="checkbox">
								<input type="checkbox" id="chk-2" name="delete"><label for="chk-2"> Delete</label>
							</li>
						</div>
					</div>
					
				  <input type="hidden" name="id" class="form-control" id="id">
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
    
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
<script src="<?php echo base_url('js/jquery.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
	
	<!-- FullCalendar -->

	<script src="<?php echo base_url('js/moment.min.js');?>"></script>
	<script src="<?php echo base_url('js/fullcalendar.min.js');?>"></script>
	



	<!-- new -->
		<script src="<?php echo base_url()."assets/plugin/form-wizard/prettify.js";?>"></script>
	<script src="<?php echo base_url()."assets/plugin/form-wizard/jquery.bootstrap.wizard.min.js";?>"></script>
	<script src="<?php echo base_url()."assets/plugin/jquery-validation/jquery.validate.min.js";?>"></script>
	<script src="<?php echo base_url()."assets/scripts/form.wizard.init.min.js";?>"></script>

	<script src="<?php echo base_url()."assets/scripts/modernizr.min.js";?>"></script>
	<script src="<?php echo base_url()."assets/plugin/bootstrap/js/bootstrap.min.js";?>"></script>
	<script src="<?php echo base_url()."assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js";?>"></script>
	<script src="<?php echo base_url()."assets/plugin/nprogress/nprogress.js";?>"></script>
	<script src="<?php echo base_url()."assets/plugin/sweet-alert/sweetalert.min.js";?>"></script>
	<script src="<?php echo base_url()."assets/plugin/waves/waves.min.js";?>"></script>

	<script src="<?php echo base_url()."assets/scripts/main.min.js";?>"></script>
<script>

	$(document).ready(function() {
		
		var d = new Date().now;

		$('#calendar').fullCalendar({
		
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: d,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					
						ev = event.id;

						$.ajax({
							type:'post',
							url:'<?php echo base_url();?>super_admin/get_event_des',
							data:{event_id:ev},
							dataType:'json',
							success:function(data){
							
						$('#ModalEdit #event_des').val(data[0].event_des);
						$('#ModalEdit #e_img1').val(data[0].event_image);
						// $('#ModalEdit #start').val((data[0].event_start).format('YYYY-MM-DD HH:mm:ss'));
						// $('#ModalEdit #end').val((data[0].event_end).format('YYYY-MM-DD HH:mm:ss'));
							
							}
						});

					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit #start').val((event.start).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalEdit #end').val((event.end).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalEdit').modal('show');

				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($data as $event): 
			
				$start = explode(" ", $event['event_start']);
				$end = explode(" ", $event['event_end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['event_start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['event_end'];
				}
			?>
				{
					id: '<?php echo $event['event_id']; ?>',
					title: '<?php echo $event['event_name']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['event_color']; ?>',
					
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: "<?php echo base_url('super_admin/updateevent'); ?>",
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'ok'){
						alert('Saved');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			});
		}
		
	});
		
		</script>
