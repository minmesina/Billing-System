function view_client_project(id) {
    $.ajax({
        url: "clients/project/" + id,
        success: function (data) {
            data = JSON.parse(data);
            display_projects(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function display_projects(data) {
    $("#projects-table tr").remove();
    var cnt = data.length;
    document.getElementById("modal-title").innerHTML = "";

    if(cnt == 0){
        document.getElementById("modal-title").innerHTML = "No Project Yet";
    }else{
        document.getElementById("modal-title").innerHTML = "Projects from <strong>" + data[0].company_name +"</strong>";
    }

    for(i=0;i<cnt;i++){
        var date_started = new Date(data[i].date_started);
        var start_day = date_started.getDate();
        var start_month = monthNames[date_started.getMonth()];
        var start_year = date_started.getFullYear();

        var tbody = document.getElementById("projects-table");
        var row = tbody.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        cell1.innerHTML = data[i].project_name;
        cell2.innerHTML = data[i].rate_per_hour;
        cell3.innerHTML = start_month + " " + start_day + ", " + start_year;
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

function view_client(id) {
    form_client(id);
    document.getElementById("update_client_title").innerHTML = "Client Details";
    $('#editName').prop('readonly', true);
    $('#editLocation').prop('readonly', true);
    $('#editPerson').prop('readonly', true);
    $('#editEmail').prop('readonly', true);
    $('#editCurrency').prop('disabled', true);
    $('#editMOP').prop('disabled', true);
    $('#btn-save_client_update').hide();
    $('#btn-add-currency').hide();
    $('#archive-setting').hide();
}

function edit_client(id) {
    form_client(id);
    document.getElementById("update_client_title").innerHTML = "Update Client Details";
    $('#editName').prop('readonly', false);
    $('#editLocation').prop('readonly', false);
    $('#editPerson').prop('readonly', false);
    $('#editEmail').prop('readonly', false)
    $('#editCurrency').prop('disabled', false);
    $('#editMOP').prop('disabled', false);
    $('#btn-save_client_update').show();
    $('#btn-add-currency').show();
    $('#archive-setting').show();
}

function form_client(id) {
    $.ajax({
        url: "clients/single_client/" + id,
        success: function (data) {
            data = JSON.parse(data);
            $('#editCurrency option[value='+data.currency_id+']').removeAttr("selected");
            $('#editMOP option[value='+data.mode_of_payment+']').removeAttr("selected");
            $('#editStatus option[value='+data.status+']').removeAttr("selected");
            $('#curr').val(data.currency_id);
            $('#client_id').val(data.id);
            $('#editName').val(data.company_name);
            $('#editLocation').val(data.location);
            $('#editPerson').val(data.contact_person);
            $('#editEmail').val(data.email_address);
            $('#editCurrency option[value='+data.currency_id+']').attr('selected','selected');
            $('#editMOP option[value='+data.mode_of_payment+']').attr('selected','selected');
            $('#editStatus option[value='+data.status+']').attr('selected','selected');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}