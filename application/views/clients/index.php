<?php
    require('create.php');
    require('project.php');
    require('update.php');
    require('currency_modal.php');
?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h2 class="text-center">All Clients</h2>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <ul class="list-group">
            <?php foreach($clients as $client) : ?>
                <li class="list-group-item">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4 col-xs-12">
                            <a href="#" onclick="view_client(<?php echo $client['id']; ?>)" data-toggle="modal" data-target="#modal-edit-client"><?php echo $client['company_name']; ?></a>
                        </div>
                        <div class="col-md-8 col-xs-11">
                            <button type="button" class="btn btn-success pull-right" onclick="view_client_project(<?php echo $client['id']; ?>)" data-toggle="modal" data-target="#modal-client-project">Projects</button>
                            <button type="button" class="btn btn-default pull-right" onclick="edit_client(<?php echo $client['id']; ?>)" style="margin-right: 10px;" data-toggle="modal" data-target="#modal-edit-client">Edit</button>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
     </div>
    <div class="col-md-11 col-xs-9">
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-add-client">Add Client</button>
    </div>
</div>


