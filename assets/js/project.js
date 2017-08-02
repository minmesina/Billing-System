function view_project_client(id) {
    $.ajax({
        url: "projects/clients/" + id,
        success: function (data) {
            data = JSON.parse(data);
            display_clients(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function display_clients(data) {
    $("#projects-table tr").remove();
    var cnt = data.length;
    document.getElementById("modal-title").innerHTML = "";

    if(cnt == 0){
        document.getElementById("modal-title").innerHTML = "";
    }else{
        document.getElementById("modal-title").innerHTML = data[0].project_name;
    }

    for(i=0;i<cnt;i++){
        var date_started = new Date(data[i].date_started);
        var day = date_started.getDate();
        var month = monthNames[date_started.getMonth()];
        var year = date_started.getFullYear();

        var tbody = document.getElementById("projects-table");
        var row = tbody.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        cell1.innerHTML = data[i].company_name;
        cell2.innerHTML = data[i].rate_per_hour;
        cell3.innerHTML = month + " " + day + ", " + year;
        if(data[i].date_ended != "0000-00-00"){
            var date_ended = new Date(data[i].date_ended);
            var end_day = date_ended.getDate();
            var end_month = monthNames[date_ended.getMonth()];
            var end_year = date_ended.getFullYear();
            cell4.innerHTML = end_month + " " + end_day + ", " + end_year;
        }else{
            cell4.innerHTML = "Ongoing";
        }
    }
}

function view_project(id) {
    $.ajax({
        url: "projects/single_project/" + id,
        success: function (data) {
            data = JSON.parse(data);
            $('#panel-project-name').text(data.project_name);
            if(data.description == ""){
                $('#panel-project-description').text("No Description");
            }else{
                $('#panel-project-description').text(data.description);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function edit_project(id) {
    $('#editDescription').val("");
    $.ajax({
        url: "projects/single_project/" + id,
        success: function (data) {
            data = JSON.parse(data);
            $('#project_id').val(data.id);
            $('#editProjName').val(data.project_name);
            $('#editDescription').val(data.description);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}