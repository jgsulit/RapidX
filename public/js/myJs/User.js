function AddUser(){
	$.ajax({
        url: "add_user",
        method: "post",
        data: $('#formAddUser').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Saved Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            	$("#modalAddUser").modal('hide');
            	$("#formAddUser")[0].reset();
            	dataTableUsers.draw();
            }
            else{
            	alert("Failed");
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function EditUser(){
    $.ajax({
        url: "edit_user",
        method: "post",
        data: $('#formEditUser').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Saved Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalEditUser").modal('hide');
                $("#formEditUser")[0].reset();
                dataTableUsers.draw();
            }
            else{
                alert("Failed");
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}


function DeactivateUser(){
    $.ajax({
        url: "deactivate_user",
        method: "post",
        data: $('#formDeactivateUser').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Deactivated Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalDeactivateUser").modal('hide');
                $("#formDeactivateUser")[0].reset();
                dataTableUsers.draw();
            }
            else{
                alert("Failed");
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ActivateUser(){
    $.ajax({
        url: "activate_user",
        method: "post",
        data: $('#formActivateUser').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Activated Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalActivateUser").modal('hide');
                $("#formActivateUser")[0].reset();
                dataTableUsers.draw();
            }
            else{
                alert("Failed");
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ResetPassword(){
    $.ajax({
        url: "reset_password",
        method: "post",
        data: $('#formResetPassword').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Reset Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalResetPassword").modal('hide');
                $("#formResetPassword")[0].reset();
            }
            else{
                alert("Failed");
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetUserById(userId){
    $.ajax({
        url: "get_user_by_id",
        method: "get",
        data: {
            user_id: userId
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['user'].length > 0){
                $("#txtEditUserName").val(JsonObject['user'][0].name);
                $("#selEditUserDepartment").val(JsonObject['user'][0].department_id);
                $("#selEditUserLevel").val(JsonObject['user'][0].user_level_id);
                $("#txtEditUserEmail").val(JsonObject['user'][0].email);
                $("#txtEditUserUsername").val(JsonObject['user'][0].username);
                $("#txtEditEmployeeNumber").val(JsonObject['user'][0].employee_number);
            }
            else{
                Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Failed!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}