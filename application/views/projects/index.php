<?php
    require('client.php');
    require('create.php');
?>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h2 class="text-center">All Projects</h2>
	</div>
	<div class="col-md-10 col-md-offset-1">
		<ul class="list-group">
			<?php foreach($projects as $project) : ?>
				<li class="list-group-item">
					<div class="row">
						<div class="col-md-12">
							<a href="#"  onclick="view_project(<?php echo $project['id']; ?>)" data-toggle="modal" data-target="#modal-edit-project"><?php echo $project['project_name']; ?></a>
							<button type="button" class="btn btn-success pull-right" onclick="view_project_client(<?php echo $project['id']; ?>)" data-toggle="modal" data-target="#modal-project-client">Clients</button>
                            <button type="button" class="btn btn-default pull-right" onclick="edit_client(<?php echo $project['id']; ?>)" style="margin-right: 10px;" data-toggle="modal" data-target="#modal-edit-project">Edit</button>
                        </div>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="col-md-10 col-md-offset-1 col-xs-8">
		<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-add-project">Add Project</button>
	</div>
</div>


