@extends('layouts.master_layout')
@section('title', 'User Access')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title">User Access</h2>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/RapidX">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">User Access
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Feather icons section start -->
                <section id="feather-icons">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                        <div style="float: right;">
                                            <button class="btn btn-success" id="btnShowAddUserAccessModal"
                                                data-toggle="modal" data-target="#modalAddUserAccess"
                                                data-keyboard="false"><i class="icon-person-add
"></i> Add User
                                                Access</button>
                                        </div>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped table-bordered" id="tblUserAccess"
                                                width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Module Name</th>
                                                        <th>User Level</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Feather icons section end -->
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- MODALS -->
    <div class="modal fade text-xs-left" id="modalAddUserAccess" role="dialog" aria-labelledby="myModalLabel3"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form class="form" method="post" id="formAddUserAccess">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Add User Access</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="form-group">
                                <label for="projectinput1">User Level</label>
                                <select class="form-control" id="selAddUserAccessUserLevelId" name="user_level_id">
                                    <option disabled selected>-- Select User Level --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="projectinput1">Module</label>
                                <select class="js-example-basic-single form-control" id="selAddUserAccessModuleId"
                                    name="module_id">
                                    <option disabled selected>-- Select User --</option>
                                </select>
                                <!-- <option value="AL">Alabama</option> <option value="WY">Wyoming</option></select> -->
                            </div>
                            <div class="form-group">
                                <label for="projectinput1">User</label>
                                <select class="form-control select2autocomplete select2bs4" id="selAddUserAccessUserId"
                                    name="user_id" style="width: 100%;">
                                    <!-- <option disabled selected>-- Select User --</option> <option value="AL">Alabama</option> -->
                                    <!-- <option value="WY">Wyoming</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-xs-left" id="modalEditUserAccess" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form class="form" method="post" id="formEditUserAccess">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class="fa "></i> Edit User Access</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="txtEditUserAccessId" name="user_access_id">
                                <label for="projectinput1">User Level</label>
                                <select class="form-control" id="selEditUserAccessUserLevelId" name="user_level_id">
                                    <option disabled selected>-- Select User Level --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="projectinput1">Module</label>
                                <select class="js-example-basic-single form-control" id="selEditUserAccessModuleId"
                                    name="module_id">
                                    <option disabled selected>-- Select Module --</option>
                                </select>
                                <!-- <option value="AL">Alabama</option> -->
                                <!-- <option value="WY">Wyoming</option> -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="projectinput1">User</label>
                                <select class="form-control" id="selEditUserAccessUserId" name="user_id"
                                    style="width: 100%;">
                                    <option disabled selected>-- Select User --</option>
                                    <!-- <option value="AL">Alabama</option> -->
                                    <!-- <option value="WY">Wyoming</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Deactivate User -->
    <div class="modal fade text-xs-left" id="modalArchiveUserAccess" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="form" method="post" id="formArchiveUserAccess">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Archive User Access
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to archive this selected user access?</p>
                        <input type="hidden" name="user_access_id" id="txtArchiveUserAccessId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Activate User -->
    <div class="modal fade text-xs-left" id="modalRestoreUserAccess" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="form" method="post" id="formRestoreUserAccess">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Restore User Access
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to restore this selected user access?</p>
                        <input type="hidden" name="user_access_id" id="txtRestoreUserAccessId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_content')
    <script type="text/javascript">
        let dataTableUserAccess;

        $(document).ready(function() {
            dataTableUserAccess = $("#tblUserAccess").DataTable({
                "processing": false,
                "serverSide": true,
                "ajax": {
                    url: "view_user_access_by_stat",
                    "data": function(param) {
                        param.user_access_stat = 0;
                    }
                },

                "columns": [{
                        "data": "name"
                    },
                    {
                        "data": "module_name"
                    },
                    {
                        "data": "user_level_name"
                    },
                    {
                        "data": "action1"
                    },
                    {
                        "data": "label1",
                        orderable: false,
                        searchable: false
                    }
                ],
            }); //end of dataTableUserAccess

            GetUsersByStat(1, $("#selAddUserAccessUserId"));
            GetModuleByStat(1, $("#selAddUserAccessModuleId"));
            GetUserLevelByStatToAddUserAccess(1, $("#selAddUserAccessUserLevelId"));

            GetUsersByStat(1, $("#selEditUserAccessUserId"));
            GetModuleByStat(1, $("#selEditUserAccessModuleId"));
            GetUserLevelByStatToAddUserAccess(1, $("#selEditUserAccessUserLevelId"));

            $("#formAddUserAccess").submit(function(event) {
                event.preventDefault();
                AddUserAccess();
            });

            $(document).on('click', '.aArchiveUserAccess', function() {
                let userAccessId = $(this).attr('user-access-id');
                $("#txtArchiveUserAccessId").val(userAccessId);
            });

            $("#formArchiveUserAccess").submit(function(event) {
                event.preventDefault();
                ArchiveUserAccess();
            });

            $(document).on('click', '.aRestoreUserAccess', function() {
                let userAccessId = $(this).attr('user-access-id');
                $("#txtRestoreUserAccessId").val(userAccessId);
            });

            $("#formRestoreUserAccess").submit(function(event) {
                event.preventDefault();
                RestoreUserAccess();
            });

            $(document).on('click', '.aEditUserAccess', function() {
                let userAccessId = $(this).attr('user-access-id');
                $("#txtEditUserAccessId").val(userAccessId);
                GetUserAccessByIdToEdit(userAccessId);
            });

            $("#formEditUserAccess").submit(function(event) {
                event.preventDefault();
                EditUserAccess();
            });

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });

        function GetUsersByStat(userStat, cboElement) {
            let result = '<option value="0" disabled selected>--Select User--</option>';
            $.ajax({
                url: 'get_users_by_stat',
                method: 'get',
                data: {
                    'user_stat': userStat
                },
                dataType: 'json',
                beforeSend: function() {
                    result = '<option value="0" disabled selected>--Loading--</option>';
                    cboElement.html(result);
                },
                success: function(JsonObject) {
                    if (JsonObject['users'].length > 0) {
                        result = '<option value="0" disabled selected>--Select User--</option>';
                        for (let index = 0; index < JsonObject['users'].length; index++) {
                            result += '<option value="' + JsonObject['users'][index].id + '">' + JsonObject[
                                'users'][index].name + '</option>';
                        }
                    } else {
                        result = '<option value="0" selected disabled> -- No record found -- </option>';
                    }
                    cboElement.html(result);
                    $("#selAddUserAccessUserId").select2();
                },
                error: function(data, xhr, status) {
                    result = '<option value="0" selected disabled> -- Reload Again -- </option>';
                    cboElement.html(result);
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }
    </script>
@endsection
