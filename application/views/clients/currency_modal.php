<div class="modal fade" id="modal-add-currency" role="dialog" onload="close_m()">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="text-center">Add Currency</h4>
			</div>
			<?php $attributes = array('id' => 'form-add-currency', 'class' => 'form-horizontal');
			echo form_open('clients/add_currency', $attributes); ?>
			<div class="modal-body form">
				<fieldset class="well well-sm">
					<div class="col-md-12">
						<div class="form-group">
							<label for="inputAbbr" class="text-center control-label">Abbreviation</label>
							<div class="col-md-12">
								<input type="text" id="inputAbbr" name="abbr" class="form-control input-sm" placeholder="Ex. PHP" required autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="inputAcronym" class="text-center control-label">Acronym</label>
							<div class="col-md-12">
								<input type="text" id="inputAcronym" name="acronym" class="form-control input-sm" placeholder="Ex. Philippine Peso" required autofocus>
							</div>
						</div>
				</fieldset>
			</div>
			<div class="modal-footer" id="modal_footer">
				<button class="btn btn-primary btn-sm col-md-8 col-md-offset-2" type="submit">Save</button>
			</div>
			<?php echo form_close(); ?>
		</div> <!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>