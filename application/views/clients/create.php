<div class="modal fade" id="modal-add-client" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title text-center">Add Client</h3>
            </div>
			<?php $attributes = array('id' => 'form-add-client', 'class' => 'form-horizontal');
			echo form_open('clients/create', $attributes); ?>
            <div class="modal-body form">
                <fieldset class="well well-sm">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputName" class="col-md-4 control-label">Company Name</label>
                            <div class="col-md-8">
                                <input type="text" id="inputName" name="company_name" class="form-control" placeholder="Enter Company Name" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputLocation" class="col-md-4 control-label">Location</label>
                            <div class="col-md-8">
                                <input type="text" id="inputLocation" name="location" class="form-control" placeholder="Enter Location" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPerson" class="col-md-4 control-label">Contact Person</label>
                            <div class="col-md-8">
                                <input type="text" id="inputPerson" name="contact_person" class="form-control" placeholder="Enter Contact Person" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-md-4 control-label">Email Address</label>
                            <div class="col-md-8">
                                <input type="email" id="inputEmail" name="email_address" class="form-control" placeholder="Enter Email Address" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCurrency" class="col-md-4 control-label">Currency</label>
                            <div class="col-md-8">
                                <select name="currency" class="form-control" id="inputCurrency">
				                    <?php foreach($currencies as $currency): ?>
                                        <option value="<?php echo $currency['id']; ?>" title="<?php echo $currency['acronym']; ?>"><?php echo $currency['abbr']; ?></option>
				                    <?php endforeach; ?>
                                </select>
                                <a href="#" class="btn btn-success btn-xs pull-right" data-dismiss="modal" aria-hidden="true" data-toggle="modal" data-target="#modal-add-currency">Add Currency</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputMOP" class="col-md-4 control-label">Mode of Payment</label>
                            <div class="col-md-8">
                                <select name="mode_payment" class="form-control" id="inputMOP" required>
                                    <option value="PayPal">PayPal</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                    <option value="Cash">Cash</option>
                                </select>
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