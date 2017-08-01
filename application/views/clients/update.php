<div class="modal fade" id="modal-edit-client" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title text-center" id="update_client_title"></h3>
			</div>
			<?php $attributes = array('class' => 'form-horizontal');
			echo form_open('clients/update', $attributes); ?>
			<div class="modal-body form">
				<fieldset class="well well-sm">
					<div class="col-md-12">
						<div class="form-group">
							<label for="editName" class="col-md-4 control-label">Company Name</label>
							<div class="col-md-8">
                                <input type="hidden" id="client_id" name="client_id">
                                <input type="text" id="editName" name="company_name" class="form-control" placeholder="Enter Company Name" required>
							</div>
						</div>
						<div class="form-group">
							<label for="editLocation" class="col-md-4 control-label">Location</label>
							<div class="col-md-8">
								<input type="text" id="editLocation" name="location" class="form-control" placeholder="Enter Location" required>
							</div>
						</div>
						<div class="form-group">
							<label for="editPerson" class="col-md-4 control-label">Contact Person</label>
							<div class="col-md-8">
								<input type="text" id="editPerson" name="contact_person" class="form-control" placeholder="Enter Contact Person" required>
							</div>
						</div>
						<div class="form-group">
							<label for="editEmail" class="col-md-4 control-label">Email Address</label>
							<div class="col-md-8">
								<input type="email" id="editEmail" name="email_address" class="form-control" placeholder="Enter Email Address" required>
							</div>
						</div>
                        <div class="form-group">
                            <label for="editCurrency" class="col-md-4 control-label">Currency</label>
                            <div class="col-md-8">
                                <select name="currency" class="form-control" id="editCurrency">
	                                <?php foreach($currencies as $currency): ?>
                                        <option value="<?php echo $currency['id']; ?>" title="<?php echo $currency['acronym']; ?>"><?php echo $currency['abbr']; ?></option>
	                                <?php endforeach; ?>
                                </select>
                                <a href="#" class="btn btn-success btn-xs pull-right" id="btn-add-currency" data-dismiss="modal" aria-hidden="true" data-toggle="modal" data-target="#modal-add-currency">Add Currency</a>
                            </div>
                        </div>
						<div class="form-group">
							<label for="editMOP" class="col-md-4 control-label">Mode of Payment</label>
							<div class="col-md-8">
                                <select name="mode_payment" class="form-control" id="editMOP" required>
                                    <option value="PayPal">PayPal</option>
                                    <option value="BankTransfer">BankTransfer</option>
                                    <option value="Cash">Cash</option>
                                </select>
                            </div>
						</div>
					</div>
				</fieldset>
                <div class="form-group" id="archive-setting">
                    <label for="editStatus" class="col-md-2 col-md-offset-6 control-label text-danger">Archive</label>
                    <div class="col-md-4">
                        <select name="status" class="form-control input-sm" id="editStatus" title="Warning:" data-toggle="popover" data-placement="top" data-content="By selecting TRUE, this client will be archived.">
                            <option value="0">False</option>
                            <option value="1">True</option>
                        </select>
                    </div>
                </div>
			</div>
            <div class="modal-footer" id="modal_footer">
				<button class="btn btn-primary col-md-6 col-md-offset-3" id="btn-save_client_update" type="submit">Save</button>
			</div>
			<?php echo form_close(); ?>
		</div> <!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>