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
        var day = date_started.getDay();
        var month = monthNames[date_started.getMonth()];
        var year = date_started.getFullYear();

        var tbody = document.getElementById("projects-table");
        var row = tbody.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        cell1.innerHTML = data[i].company_name;
        cell2.innerHTML = data[i].rate_per_hour;
        cell3.innerHTML = month + " " + day + ", " + year;
    }
}

function form_project(id) {
    $.ajax({
        url: "clients/single_client/" + id,
        success: function (data) {
            data = JSON.parse(data);
            $('#client_id').val(data.id);
            $('#editName').val(data.company_name);
            $('#editLocation').val(data.location);
            $('#editPerson').val(data.contact_person);
            $('#editEmail').val(data.email_address);
            $('#editMOP').val(data.mode_of_payment);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function view_project(id) {
    form_client(id);
    $('#editName').prop('readonly', true);
    $('#editLocation').prop('readonly', true);
    $('#editPerson').prop('readonly', true);
    $('#editEmail').prop('readonly', true);
    $('#editMOP').prop('readonly', true);
    $('#btn-save_client_update').hide();
}

function edit_project(id) {
    form_client(id);
    $('#editName').prop('readonly', false);
    $('#editLocation').prop('readonly', false);
    $('#editPerson').prop('readonly', false);
    $('#editEmail').prop('readonly', false);
    $('#editMOP').prop('readonly', false);
    $('#btn-save_client_update').show();
}

