function GetDepartmentByStat(departmentStat, cboElement){
	let result = '<option value="0" selected disabled> -- Select Department -- </option>';
	$.ajax({
		url: 'get_department_by_stat',
		method: 'get',
		data: {
			'department_stat': departmentStat
		},
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" selected disabled> -- Loading -- </option>';
			cboElement.html(result);
		},
		success: function(JsonObject){
			if(JsonObject['departments'].length > 0){
				result = '<option value="0" selected disabled> -- Select Department -- </option>';
				for(let index = 0; index < JsonObject['departments'].length; index++){
					result += '<option value="' + JsonObject['departments'][index].department_id + '">' + JsonObject['departments'][index].department_name + '</option>';
				}
			}
			else{
				result = '<option value="0" selected disabled> -- No record found -- </option>';
			}
			cboElement.html(result);
		},
		error: function(data, xhr, status){
			result = '<option value="0" selected disabled> -- Reload Again -- </option>';
			cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function GetDepartmentByIdToEdit(departmentId){
	$.ajax({
		url: 'get_department_by_id',
		method: 'get',
		data: {
			'department_id': departmentId
		},
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['department'].length > 0){
				$("#txtEditDepartmentName").val(JsonObject['department'][0].department_name);
			}
			else{
				$("#txtEditDepartmentName").val("Reload Again!");
			}
		},
		error: function(data, xhr, status){
			$("#txtEditDepartmentName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function ArchiveDepartment(){
    $.ajax({
        url: "archive_department",
        method: "post",
        data: $('#formArchiveDepartment').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                $("#modalArchiveDepartment").modal('hide');
                $("#formArchiveDepartment")[0].reset();
                dataTableDepartments.draw();
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

function RestoreDepartment(){
    $.ajax({
        url: "restore_department",
        method: "post",
        data: $('#formRestoreDepartment').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Restored Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalRestoreDepartment").modal('hide');
                $("#formRestoreDepartment")[0].reset();
                dataTableDepartments.draw();
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

function EditDepartment(){
    $.ajax({
        url: "edit_department",
        method: "post",
        data: $('#formEditDepartment').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Updated Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalEditDepartment").modal('hide');
                $("#formEditDepartment")[0].reset();
                dataTableDepartments.draw();
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

function AddDepartment(){
	$.ajax({
        url: "add_department",
        method: "post",
        data: $('#formAddDepartment').serialize(),
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
            	$("#modalAddDepartment").modal('hide');
            	$("#formAddDepartment")[0].reset();
            	dataTableDepartments.draw();
            }
            else{
            	Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Saving Failed!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });            }
        },
        error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}