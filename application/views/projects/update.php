<div class="modal fade" id="modal-edit-project" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="modal-title text-center" id="update_project_title"></h2>
			</div>
			<?php $attributes = array('class' => 'form-horizontal');
			echo form_open('projects/update', $attributes); ?>
			<div class="modal-body form">
				<fieldset class="well">
					<div class="col-md-12">
						<div class="form-group">
							<label for="editProjName" class="col-md-4 control-label">Project Name</label>
							<div class="col-md-8">
								<input type="hidden" id="project_id" name="project_id">
								<input type="text" id="editProjName" name="project_name" class="form-control" placeholder="Enter Project Name" required>
							</div>
						</div>
						<div class="form-group">
							<label for="editDescription" class="col-md-4 control-label">Description</label>
							<div class="col-md-8">
                                <textarea id="editDescription" name="project_description" class="form-control" required autofocus></textarea>
                            </div>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="modal-footer" id="modal_footer">
				<button class="btn btn-primary col-md-8 col-md-offset-2" id="btn-save_client_update" type="submit">Save</button>
			</div>
			<?php echo form_close(); ?>
		</div> <!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>