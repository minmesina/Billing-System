<div class="row">
        <h3 class="text-center well well-sm">Tasks</h3>
    <div class="col-md-4 well">
        <form action="#" class="form-horizontal" id="form-tasks">
            <div class="form-group col-md-12" style="margin-right: -3%">
                <small><label for="select_client">Client</label></small>
                <select name="client" class="form-control input-sm" id="select_client" onchange="get_project_by_client(this)">
                    <?php foreach($clients as $client): ?>
                        <option value="<?php echo $client['id']; ?>"><?php echo $client['company_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-12" style="margin-right: -3%">
                <small><label for="select_project">Project</label></small>
                <select name="project" class="form-control input-sm" id="select_project">
                </select>
            </div>
            <div class="form-group col-md-12" style="margin-right: -3%">
                <small><label for="from_date">From</label></small>
                <input type="date" id="from_date" class="form-control input-sm" name="from_date">
            </div>
            <div class="form-group col-md-12" style="margin-right: -3%">
                <small><label for="to_date">To</label></small>
                <input type="date" id="to_date" class="form-control input-sm" name="to_date">
            </div>
            <div class="form-group col-md-12" style="margin-right: -3%">
                <button type="button" class="btn btn-sm btn-default col-md-12" onclick="display_tasks()">Submit</button>
            </div>
            </form>
    </div>
    <div class="col-md-8">
        <div class="inline-head">
            <h3 id="client_proj" class="col-md-7"></h3>
            <h6 id="date_range" class="col-md-5 text-right"></h6>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr class="info">
                <th class="col-md-7">Description</th>
                <th class="col-md-2">Duration</th>
                <th class="col-md-3">Date</th>
            </tr>
            </thead>
            <tbody id="tbl-tasks">
            </tbody>
        </table>
    </div>
</div>