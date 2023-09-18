function GetModuleByStat(moduleStat, cboElement){
    let result = '<option value="0" selected disabled> -- Select Module -- </option>';
    $.ajax({
        url: 'get_module_by_stat',
        method: 'get',
        data: {
            'module_stat': moduleStat
        },
        dataType: 'json',
        beforeSend: function(){
            result = '<option value="0" selected disabled> -- Loading -- </option>';
            cboElement.html(result);
        },
        success: function(JsonObject){
            // alert(JSON.stringify(JsonObject));
            // alert(JsonObject['modules'][0].module_id);
            if(JsonObject['modules'].length > 0){
                result = '<option value="0" selected disabled> -- Select Module -- </option>';
                for(let index = 0; index < JsonObject['modules'].length; index++){
                    result += '<option value="' + JsonObject['modules'][index].module_id + '">' + JsonObject['modules'][index].module_name + '</option>';
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

function GetModuleByIdToEdit(moduleId){
	$.ajax({
		url: 'get_module_by_id',
		method: 'get',
		data: {
			'module_id': moduleId
		},
		dataType: 'json',
		beforeSend: function(){
			
		},
		success: function(JsonObject){
			if(JsonObject['module'].length > 0){
				$("#txtEditModuleName").val(JsonObject['module'][0].module_name);
			}
			else{
				$("#txtEditModuleName").val("Reload Again!");
			}
		},
		error: function(data, xhr, status){
			$("#txtEditModuleName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function ArchiveModule(){
    $.ajax({
        url: "archive_module",
        method: "post",
        data: $('#formArchiveModule').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            if(JsonObject['result'] == 1){
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Archived Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalArchiveModule").modal('hide');
                $("#formArchiveModule")[0].reset();
                dataTableModules.draw();
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

function RestoreModule(){
    $.ajax({
        url: "restore_module",
        method: "post",
        data: $('#formRestoreModule').serialize(),
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
                $("#modalRestoreModule").modal('hide');
                $("#formRestoreModule")[0].reset();
                dataTableModules.draw();
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

function EditModule(){
    $.ajax({
        url: "edit_module",
        method: "post",
        data: $('#formEditModule').serialize(),
        dataType: "json",
        beforeSend: function(){

        },
        success: function(JsonObject){
            Swal({
                position: 'top-end',
                type: 'success',
                title: 'Updated Successfully!',
                showConfirmButton: false,
                timer: 1500,
                customClass: 'swal-wide',
            });
            if(JsonObject['result'] == 1){
                $("#modalEditModule").modal('hide');
                $("#formEditModule")[0].reset();
                dataTableModules.draw();
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

function AddModule(){
	$.ajax({
        url: "add_module",
        method: "post",
        data: $('#formAddModule').serialize(),
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
            	$("#modalAddModule").modal('hide');
            	$("#formAddModule")[0].reset();
            	dataTableModules.draw();
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