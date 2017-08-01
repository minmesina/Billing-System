<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>
<div class="row">
	<div class="col-md-4">
		<div class="well">
			<?php echo form_open_multipart('logs/create'); ?>
				<div class="form-group">
					<label>Project</label>
					<select name="category_id" class="form-control">
						<?php foreach($projects as $project): ?>
							<option value="<?php echo $project['id']; ?>"><?php echo $project['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label>Hour</label>
					<input type="text" class="form-control" name="hour" placeholder="0:00">
				</div>
				<div class="form-group">
					<label>Body</label>
					<textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>

    <div class="col-md-8">
        <div class="well">
            <h1>Logs</h1>
        </div>
    </div>
</div>