<div class="modal fade" id="modal-add-project" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title text-center">Add Project</h3>
			</div>
			<?php $attributes = array('id' => 'form-add-project', 'class' => 'form-horizontal');
			echo form_open('projects/create', $attributes); ?>
			<div class="modal-body form">
				<fieldset class="well well-sm">
					<div class="col-md-12">
						<div class="form-group">
							<label for="inputProjName" class="col-md-4 control-label">Project Name</label>
							<div class="col-md-8">
								<input type="text" id="inputProjName" name="project_name" class="form-control" placeholder="Enter Project Name" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="inputDescription" class="col-md-4 control-label">Description</label>
							<div class="col-md-8">
								<textarea id="inputDescription" name="project_description" class="form-control" required autofocus></textarea>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="modal-footer" id="modal_footer">
				<button class="btn btn-primary col-md-6 col-md-offset-3" type="submit">Save</button>
			</div>
			<?php echo form_close(); ?>
		</div> <!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>