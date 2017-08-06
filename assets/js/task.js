function get_project_by_client(client_id) {
    $.ajax({
        url: "tasks/get_projects_by_client/" + client_id.value,
        success: function (data) {
            data = JSON.parse(data);
            project_select(data);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function project_select(data) {
    $("#select_project").empty();
    var cnt = data.length;
    var sel = document.getElementById("select_project");
    for(i=0;i<cnt;i++) {
        var option = document.createElement("option");
        option.text = data[i].project_name;
        option.setAttribute("value", data[i].id);
        sel.add(option);
    }
}

function display_tasks() {
    $.ajax({
        url: "tasks/get_tasks",
        type: "POST",
        data: $('#form-tasks').serialize(),
        dataType: "JSON",
        success: function (data) {
            task_table(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function task_table(data) {
    $("#tbl-tasks tr").remove();
    var cnt = data.length;
    document.getElementById("client_proj").innerHTML = $("#select_client option:selected").text() +" : " +$("#select_project option:selected").text();
    document.getElementById("date_range").innerHTML = "From: " + $("#from_date").val() +" | To: " + $("#to_date").val();

    if(cnt == 0){
        var tbody = document.getElementById("tbl-tasks");
        var row = tbody.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        cell1.innerHTML = "No tasks";

    }else {
        for (i = 0; i < cnt; i++) {
            var task_date = new Date(data[i].date);
            var day = task_date.getDate();
            var month = monthNames[task_date.getMonth()];
            var year = task_date.getFullYear();

            var tbody = document.getElementById("tbl-tasks");
            var row = tbody.insertRow(i);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.innerHTML = data[i].description;
            cell2.innerHTML = data[i].duration;
            cell3.innerHTML = month + " " + day + ", " + year;
        }
    }

}
