// function GetUserLevelByStat(userLevelStat){
// 	let result = '<option value="0" selected disabled> -- Select User Level -- </option>';
// 	$.ajax({
// 		url: 'get_user_level_by_stat',
// 		method: 'get',
// 		data: {
// 			'user_level_stat': userLevelStat
// 		},
// 		dataType: 'json',
// 		beforeSend: function(){
// 			result = '<option value="0" selected disabled> -- Loading -- </option>';
// 			$("#selAddUserLevel").html(result);
// 		},
// 		success: function(JsonObject){
// 			if(JsonObject['user_levels'].length > 0){
// 				result = '<option value="0" selected disabled> -- Select User Level -- </option>';
// 				for(let index = 0; index < JsonObject['user_levels'].length; index++){
// 					result += '<option value="' + JsonObject['user_levels'][index].user_level_id + '">' + JsonObject['user_levels'][index].user_level_name + '</option>';
// 				}
// 			}
// 			else{
// 				result = '<option value="0" selected disabled> -- No record found -- </option>';
// 			}
// 			$("#selAddUserLevel").html(result);
// 		},
// 		error: function(data, xhr, status){
// 			result = '<option value="0" selected disabled> -- Reload Again -- </option>';
// 			$("#selAddUserLevel").html(result);
//             console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//         }
// 	});
// }

function GetUserLevelByStatToAddUser(userLevelStat, cboElement) {
    let result = '<option value="0" selected disabled> -- Select User Level -- </option>';
    $.ajax({
        url: 'get_user_level_by_stat',
        method: 'get',
        data: {
            'user_level_stat': userLevelStat
        },
        dataType: 'json',
        beforeSend: function () {
            result = '<option value="0" selected disabled> -- Loading -- </option>';
            cboElement.html(result);
        },
        success: function (JsonObject) {
            // alert(JSON.stringify(JsonObject));
            // alert(JsonObject['user_levels'][0].module_id);
            if (JsonObject['user_levels'].length > 0) {
                result = '<option value="0" selected disabled> -- Select User Level -- </option>';
                for (let index = 0; index < 3; index++) {
                    result += '<option value="' + JsonObject['user_levels'][index].user_level_id + '">' + JsonObject['user_levels'][index].user_level_name + '</option>';
                }
            }
            else {
                result = '<option value="0" selected disabled> -- No record found -- </option>';
            }

            cboElement.html(result);
        },
        error: function (data, xhr, status) {
            result = '<option value="0" selected disabled> -- Reload Again -- </option>';
            cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetUserLevelByStatToAddUserAccess(userLevelStat, cboElement) {
    let result = '<option value="0" selected disabled> -- Select User Level -- </option>';
    $.ajax({
        url: 'get_user_level_by_stat',
        method: 'get',
        data: {
            'user_level_stat': userLevelStat
        },
        dataType: 'json',
        beforeSend: function () {
            result = '<option value="0" selected disabled> -- Loading -- </option>';
            cboElement.html(result);
        },
        success: function (JsonObject) {
            // alert(JSON.stringify(JsonObject));
            // alert(JsonObject['user_levels'][0].module_id);
            if (JsonObject['user_levels'].length > 0) {
                result = '<option value="0" selected disabled> -- Select User Level -- </option>';
                for (let index = 3; index < JsonObject['user_levels'].length; index++) {
                    result += '<option value="' + JsonObject['user_levels'][index].user_level_id + '">' + JsonObject['user_levels'][index].user_level_name + '</option>';
                }
            }
            else {
                result = '<option value="0" selected disabled> -- No record found -- </option>';
            }

            cboElement.html(result);
            // $('#').select2();

        },
        error: function (data, xhr, status) {
            result = '<option value="0" selected disabled> -- Reload Again -- </option>';
            cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}