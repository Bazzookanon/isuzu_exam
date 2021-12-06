$(document).ready(function () {
    getTask();

    function getTask() {
        var id = "load";
        var pro = 1;
        $.ajax({
            type: "POST",
            url: "../includes/gettask-user.php",
            dataType: 'JSON',
            data: {
                id: id,
                pro: pro
            },
            cache: false,
            success: function (data) {
                var content = '';
                $.each(data, function (i, dta) {
                    $.each(dta, function (i, dt) {
                        if (dt.status == 0) {
                            var style = "text-decoration-line: line-through";
                            var ck = "checked";
                            var ds = "disabled";
                        }
                        content += '<tr id="tr_' + dt.id + '">';
                        content += '<td><div class="form-check"><input type="checkbox" ' + ds + ' ' + ck + ' class="form-check-input" onclick="doneTask(' + dt.id + ')" id="ck_' + dt.id + '"><label class="form-check-label" for="exampleCheck1">Check me out</label></div></td>';
                        content += '<td id="tl_' + dt.id + '" style="' + style + '">' + dt.task_title + '</td>';
                        content += '<td id="td_' + dt.id + '" style="' + style + '">' + dt.task_description + '</td>';
                        content += '<td><button class="btn btn-info" style="margin-right: 5px;" ' + ds + ' id="btn_' + dt.id + '" onclick="editTask(' + dt.id + ')"><i class="fa fa-edit"></i></button>';
                        content += '<button class="btn btn-danger" onclick="removeTask(' + dt.id + ')"><i class="fa fa-trash"></i></button></td>';
                        content += '</tr>';
                    });

                });
                $(content).appendTo("#tbl");
            }
        });
    }
});

function doneTask(id) {
    var pro = 2;
    bootbox.confirm({
        message: "Done with this Task?",
        size: 'small',
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result) {

                $.ajax({
                    type: "POST",
                    url: "../includes/gettask-user.php",
                    dataType: 'JSON',
                    data: {
                        id: id,
                        pro: pro
                    },
                    cache: false,
                    success: function (data) {
                        if (data > 0) {
                            $("#tl_" + id).css({
                                "text-decoration": "line-through"
                            });
                            $("#td_" + id).css({
                                "text-decoration": "line-through"
                            });
                            $("#ck_" + id).prop('disabled', true);
                            $("#btn_" + id).prop('disabled', true);
                        }
                    }
                });

            } else {
                $("#ck_" + id).prop('checked', false);
            }

        }
    });
}

function removeTask(id) {
    var pro = 3;
    bootbox.confirm({
        message: "Delete this Task?",
        size: 'small',
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result) {

                $.ajax({
                    type: "POST",
                    url: "../includes/gettask-user.php",
                    dataType: 'JSON',
                    data: {
                        id: id,
                        pro: pro
                    },
                    cache: false,
                    success: function (data) {
                        if (data > 0) {
                            alert("Task Succesfuly Remove.")
                            $("#tr_" + id).fadeOut(1000);
                        }

                    }
                });
            }

        }
    });


}

function editTask(id) {
    $('#modal').modal('toggle');
    $('#mtitle').text('Update New Task');
    $('#save').hide();
    $('#update').show();
    var pro = 4;
    $.ajax({
        type: "POST",
        url: "../includes/gettask-user.php",
        dataType: 'JSON',
        data: {
            id: id,
            pro: pro
        },
        cache: false,
        success: function (data) {
            $("#tasktitle").val(data[0][0]['task_title'])
            $("#description").val(data[0][0]['task_description'])
            $("#id").val(data[0][0]['id'])

        }
    });
}

function openModal() {
    $('#modal').modal('toggle');
    $('#mtitle').text('Add New Task');
    $('#save').show();
    $('#update').hide();
    $("#tasktitle").val("");
    $("#description").val("");
}

function saveUpdate() {
    var id = $("#id").val();
    var tasktitle = $("#tasktitle").val();
    var description = $("#description").val();

    $.ajax({
        type: "POST",
        url: "../includes/edittask-user.php",
        dataType: 'JSON',
        data: {
            id: id,
            tasktitle: tasktitle,
            description: description
        },
        cache: false,
        success: function (data) {
            if (data > 0) {
                location.reload();
            }
        }
    });
}