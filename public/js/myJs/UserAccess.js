function AddUserAccess() {
    $.ajax({
        url: "add_user_access",
        method: "post",
        data: $('#formAddUserAccess').serialize(),
        dataType: "json",
        beforeSend: function () {

        },
        success: function (JsonObject) {
            if (JsonObject['result'] == 1) {
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Saved Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalAddUserAccess").modal('hide');
                $("#formAddUserAccess")[0].reset();
                dataTableUserAccess.draw();
            }
            else {
                alert("Failed");
            }
        },
        error: function (data, xhr, status) {
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function EditUserAccess() {
    $.ajax({
        url: "edit_user_access",
        method: "post",
        data: $('#formEditUserAccess').serialize(),
        dataType: "json",
        beforeSend: function () {

        },
        success: function (JsonObject) {
            if (JsonObject['result'] == 1) {
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Updated Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalEditUserAccess").modal('hide');
                $("#formEditUserAccess")[0].reset();
                dataTableUserAccess.draw();
            }
            else {
                alert("Failed");
            }
        },
        error: function (data, xhr, status) {
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ArchiveUserAccess() {
    $.ajax({
        url: "archive_user_access",
        method: "post",
        data: $('#formArchiveUserAccess').serialize(),
        dataType: "json",
        beforeSend: function () {

        },
        success: function (JsonObject) {
            if (JsonObject['result'] == 1) {
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Archived Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalArchiveUserAccess").modal('hide');
                $("#formArchiveUserAccess")[0].reset();
                dataTableUserAccess.draw();
            }
            else {
                alert("Failed");
            }
        },
        error: function (data, xhr, status) {
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function RestoreUserAccess() {
    $.ajax({
        url: "restore_user_access",
        method: "post",
        data: $('#formRestoreUserAccess').serialize(),
        dataType: "json",
        beforeSend: function () {

        },
        success: function (JsonObject) {
            if (JsonObject['result'] == 1) {
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Restored Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalRestoreUserAccess").modal('hide');
                $("#formRestoreUserAccess")[0].reset();
                dataTableUserAccess.draw();
            }
            else {
                alert("Failed");
            }
        },
        error: function (data, xhr, status) {
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetUserAccessByIdToEdit(userAccessId) {
    $.ajax({
        url: 'get_user_access_by_id',
        method: 'get',
        data: {
            'user_access_id': userAccessId
        },
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (JsonObject) {
            if (JsonObject['user_access'].length > 0) {
                $("#selEditUserAccessUserLevelId").val(JsonObject['user_access'][0].user_level_id);
                $("#selEditUserAccessModuleId").val(JsonObject['user_access'][0].module_id);
                $("#selEditUserAccessUserId").val(JsonObject['user_access'][0].user_id);
            }
            else {
                $("#selEditUserAccessUserLevelId").val("0");
                $("#selEditUserAccessModuleId").val("0");
                $("#selEditUserAccessUserId").val("0");
            }
        },
        error: function (data, xhr, status) {
            $("#txtEditModuleName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function AddUserAccess() {
    $.ajax({
        url: "add_user_access",
        method: "post",
        data: $('#formAddUserAccess').serialize(),
        dataType: "json",
        beforeSend: function () {

        },
        success: function (JsonObject) {
            if (JsonObject['result'] == 1) {
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Saved Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalAddUserAccess").modal('hide');
                $("#formAddUserAccess")[0].reset();
                dataTableUserAccess.draw();
            }
            else {
                alert("Failed");
            }
        },
        error: function (data, xhr, status) {
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function EditUserAccess() {
    $.ajax({
        url: "edit_user_access",
        method: "post",
        data: $('#formEditUserAccess').serialize(),
        dataType: "json",
        beforeSend: function () {

        },
        success: function (JsonObject) {
            if (JsonObject['result'] == 1) {
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Updated Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalEditUserAccess").modal('hide');
                $("#formEditUserAccess")[0].reset();
                dataTableUserAccess.draw();
            }
            else {
                alert("Failed");
            }
        },
        error: function (data, xhr, status) {
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function ArchiveUserAccess() {
    $.ajax({
        url: "archive_user_access",
        method: "post",
        data: $('#formArchiveUserAccess').serialize(),
        dataType: "json",
        beforeSend: function () {

        },
        success: function (JsonObject) {
            if (JsonObject['result'] == 1) {
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Archived Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalArchiveUserAccess").modal('hide');
                $("#formArchiveUserAccess")[0].reset();
                dataTableUserAccess.draw();
            }
            else {
                alert("Failed");
            }
        },
        error: function (data, xhr, status) {
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function RestoreUserAccess() {
    $.ajax({
        url: "restore_user_access",
        method: "post",
        data: $('#formRestoreUserAccess').serialize(),
        dataType: "json",
        beforeSend: function () {

        },
        success: function (JsonObject) {
            if (JsonObject['result'] == 1) {
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Restored Successfully!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: 'swal-wide',
                });
                $("#modalRestoreUserAccess").modal('hide');
                $("#formRestoreUserAccess")[0].reset();
                dataTableUserAccess.draw();
            }
            else {
                alert("Failed");
            }
        },
        error: function (data, xhr, status) {
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function GetUserAccessByIdToEdit(userAccessId) {
    $.ajax({
        url: 'get_user_access_by_id',
        method: 'get',
        data: {
            'user_access_id': userAccessId
        },
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (JsonObject) {
            if (JsonObject['user_access'].length > 0) {
                $("#selEditUserAccessUserLevelId").val(JsonObject['user_access'][0].user_level_id);
                $("#selEditUserAccessModuleId").val(JsonObject['user_access'][0].module_id);
                $("#selEditUserAccessUserId").val(JsonObject['user_access'][0].user_id);
            }
            else {
                $("#selEditUserAccessUserLevelId").val("0");
                $("#selEditUserAccessModuleId").val("0");
                $("#selEditUserAccessUserId").val("0");
            }
        },
        error: function (data, xhr, status) {
            $("#txtEditModuleName").val("Reload Again!");
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getUserAccess(user_level_id) {
    $.ajax({
        url: "getUserAccess",
        method: "get",
        data: {
            'user_id': user_level_id
        },
        dataType: "json",
        success: function (data) {
            var datas = data['user_id'];
            var module_assigned = new Array();

            for (i = 0; i < datas.length; i++) {
                module_assigned.push(datas[i]['module_id']);
            }

            if (jQuery.inArray(1, module_assigned) != -1) {
                console.log("1-QUADS is in array");

                /**
                 * Old code
                 */
                // $("#quadsnav").css("display", '');
                // $("#quadsdiv").css("display", '');
                // $("#quadsdiv1").css("display", '');

                $("#quadsnav").css("display", '');
                $("#quadsnav").css("display", 'block');
            }

            if (jQuery.inArray(2, module_assigned) != -1) {
                console.log("2-ARDS is in array");
                $("#ardsnav").css("display", '');
            }

            if (jQuery.inArray(3, module_assigned) != -1) {
                console.log("3-QC PATROL is in array");

                /**
                 * Old code
                 */
                // $("#qcpatrolnav").css("display", '');

                $("#quadsnav").css("display", '');
                $("#quadsnav").css("display", 'block');
                $("#qcpatrolnav").css("display", '');
                $("#qcpatrolnav").css("display", 'block');
            }
            if (jQuery.inArray(4, module_assigned) != -1) {
                console.log("4-AIDRC is in array");

                $("#aidrcnav").css("display", '');
                $("#aidrcdiv").css("display", '');
                $("#aidrcdiv1").css("display", '');
            }

            if (jQuery.inArray(5, module_assigned) != -1) {
                console.log("5-DSTLMS is in array");

                $("#dstlmsnav").css("display", '');
                $("#dstlmsdiv").css("display", '');
                $("#dstlmsdiv1").css("display", '');
            }

            if (jQuery.inArray(6, module_assigned) != -1) {
                console.log("6-JORV2 is in array");

                $("#jorv2nav").css("display", '');
                $("#jorv2div").css("display", '');
                $("#jorv2div1").css("display", '');
            }
            if (jQuery.inArray(7, module_assigned) != -1) {
                console.log("7-CHAS is in array");

                $("#chasnav").css("display", '');
                $("#chasdiv").css("display", '');
                $("#chasdiv1").css("display", '');
            }
            if (jQuery.inArray(8, module_assigned) != -1) {
                console.log("8-Status Board is in array");

                $("#statboardnav").css("display", '');
                $("#statboarddiv").css("display", '');
            }

            if (jQuery.inArray(9, module_assigned) != -1) {
                console.log("9-PMCSFES is in array");

                $("#pmcsfesnav").css("display", '');
                $("#pmcsfesdiv").css("display", '');
                $("#pmcsfesdiv1").css("display", '');
            }


            if (jQuery.inArray(10, module_assigned) != -1) {
                console.log("10-BBTFS is in array");

                $("#bbtfsnav").css("display", '');
                $("#bbtfsdiv").css("display", '');
                $("#bbtfsdiv1").css("display", '');
            }

            // 11-Customer Claim Database System
            if (jQuery.inArray(11, module_assigned) != -1) {
                console.log("11-Customer Claim Database System is in array");

                $("#customerClaimDatabaseSystem").css("display", '');
                $("#customerClaimDatabaseSystem").css("display", 'block');
            }

            // 12-Cash Advance
            if (jQuery.inArray(12, module_assigned) != -1) {
                console.log("12-Cash Advance is in array");
                $("#CashAdvanceId").css("display", '');
                $("#CashAdvanceDivId").css("display", '');
                $("#CashAdvanceDivId1").css("display", '');
            }

            // 13-Work Permit
            if (jQuery.inArray(13, module_assigned) != -1) {
                console.log("13-OHS Work Permit is in array");

                $("#workPermitId").css("display", '');
                $("#workPermitDivId").css("display", '');
                $("#workPermitDivId1").css("display", '');
            }

            // 14- Grinding Inventory
            if (jQuery.inArray(14, module_assigned) != -1) {
                console.log("14-Grinding Inventory is in array");
                $("#grindingInventoryId").css("display", '');
                $("#inventoryGrindingId").css("display", '');
                $("#inventoryGrindingId1").css("display", '');
            }

            // 15-General Knowledge Online Theoretical Examination
            // if (jQuery.inArray(15, module_assigned) != -1) {
            //     console.log("15-General Knowledge Online Theoretical Examination is in array");

            //     $("#generalKnowledgeExaminationId").css("display", '');
            //     $("#generalKnowledgeExaminationDivId").css("display", '');
            //     $("#generalKnowledgeExaminationDivId1").css("display", '');
            // }

            if (jQuery.inArray(16, module_assigned) != -1) {
                console.log("16-Online Key 4 Monitoring System is in array");
                $("#key4MonitoringId").css("display", '');
                $("#key4MonitoringDivId").css("display", '');
                $("#key4MonitoringDivId1").css("display", '');
            }

            if (jQuery.inArray(17, module_assigned) != -1) {
                console.log("16-JO TEST");

                $("#jorv2navCopy").css("display", '');
                $("#jorv2divCopy").css("display", '');
            }

            //Key 15 - CTMS
            if (jQuery.inArray(18, module_assigned) != -1) {
                console.log("18-Key 15 - CTMS");

                $("#key15MonitoringId").css("display", '');
                $("#key15MonitoringDivId").css("display", '');
            }

            if (jQuery.inArray(19, module_assigned) != -1) {
                console.log("19-AIDRC TEST");
                $("#aidrcCopydiv1").css("display", '');
                $("#aidrcCopydiv").css("display", '');
            }

            if (jQuery.inArray(20, module_assigned) != -1) {
                console.log("20-JSOX TEST");

                $("#JsoxDivId1").css("display", '');
                $("#JsoxId").css("display", '');
                $("#JsoxDivId").css("display", '');
            }

            if (jQuery.inArray(21, module_assigned) != -1) {
                console.log("20-ILQCM");

                $("#ilqcmdiv").css("display", '');
                $("#ilqcmdiv1").css("display", '');
                $("#ilqcmnav").css("display", '');
            }

            if (jQuery.inArray(22, module_assigned) != -1) {
                console.log("22-PreShipment");

                $("#PreshipmentDivId1").css("display", '');
                $("#PreshipmentId").css("display", '');
                $("#PreshipmentDivId").css("display", '');
            }

            if (jQuery.inArray(23, module_assigned) != -1) {
                console.log("23-System Development & Change Request Status is in array");

                $("#SDCRSId").css("display", '');
                $("#SDCRSId").css("display", 'block');
            }

            if (jQuery.inArray(24, module_assigned) != -1) {
                console.log("24-FAC - ETLS");

                $("#FAC_ETLSId").css("display", '');
                $("#FAC_ETLSDivId").css("display", '');
                $("#FAC_ETLSDivId1").css("display", '');
            }

            if (jQuery.inArray(25, module_assigned) != -1) {
                console.log("25-RTRH Monitoring System");

                $("#RTRHDivId1").css("display", '');
                $("#RTRHId").css("display", '');
                $("#RTRHDivId").css("display", '');

            }

            if (jQuery.inArray(26, module_assigned) != -1) {
                console.log("26-ISS ATTS");

                $("#issAttsDiv1").css("display", '');
                $("#IssAttsId").css("display", '');
                $("#IssAttsDivId").css("display", '');

            }

            // 27-Recall Exam
            if (jQuery.inArray(27, module_assigned) != -1) {
                console.log("27-Recall Exam");

                $("#recallexamnav").css("display", '');
                $("#recallExamDivId").css("display", '');
            }

            // 28- WBS Warehouse Barcode Generator
            if (jQuery.inArray(28, module_assigned) != -1) {
                console.log("28-WBS QR Code Generator");
                $("#wbsBarcodeGenNav").css("display", '');
                $("#wbsBarcodeGen").css("display", '');
                $("#wbsBarcodeGen1").css("display", '');
            }

            // 30-ShuttleAllocationSystemId
            if (jQuery.inArray(29, module_assigned) != -1) {
                console.log("29-PPS IMS");
                $("#ppsImsId").css("display", '');
            }
            // 30-ShuttleAllocationSystemId
            if (jQuery.inArray(30, module_assigned) != -1) {
                console.log("30-Shuttle Allocation System is in array");
                $("#shuttleAllocationSystemId").css("display", '');
            }

            if (jQuery.inArray(31, module_assigned) != -1) {
                console.log("31-DMR & PQC");

                $("#DMRPQCId").css("display", '');
                $("#DMRPQCDivId").css("display", '');
                $("#DMRPQCDivId1").css("display", '');
            }
        }
    });
}
