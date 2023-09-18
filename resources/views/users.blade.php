@extends('layouts.master_layout')
@section('title', 'Users')

@section('content')
	<div class="app-content content container-fluid">
	  <div class="content-wrapper">
		<div class="content-header row">
		  <div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">Users</h2>
		  </div>
		  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
			<div class="breadcrumb-wrapper col-xs-12">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/RapidX">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Users
				</li>
			  </ol>
			</div>
		  </div>
		</div>
		<div class="content-body"><!-- Feather icons section start -->
		  <section id="feather-icons">
			  <div class="row">
				  <div class="col-xs-12">
					  <div class="card">
						  <!-- <div class="card-header">
							  <h4 class="card-title">Users</h4>
							  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
							  <div class="heading-elements">
								  <ul class="list-inline mb-0">
									  <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
									  <li><a data-action="reload"><i class="icon-reload"></i></a></li>
									  <li><a data-action="close"><i class="icon-cross2"></i></a></li>
								  </ul>
							  </div>
						  </div> -->
						  <div class="card-body collapse in">
							  <div class="card-block">
								  <div style="float: right;">
									<button class="btn btn-success" id="btnShowAddUserModal" data-toggle="modal" data-target="#modalAddUser" data-keyboard="false"><i class="icon-person-add
"></i> Add User</button>
								  </div>
									<br><br>
								  <div class="table-responsive">
									  <table class="table table-hover table-striped table-bordered" id="tblUsers" width="100%">
										  <thead>
											  <tr>
												  <th>Name</th>
												  <th>Employee No.</th>
												  <th>Username</th>
												  <th>Email</th>
												  <th>Department</th>
												  <th>User Level</th>
												  <th>No. of Access</th>
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
	<div class="modal fade text-xs-left" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
	  <div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formAddUser">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Add User</h4>
			  </div>
				<div class="modal-body">
					<div class="form-body">
						<div class="form-group">
							<label>Employee No.</label>
							<input type="text" id="projectinput1" class="form-control" placeholder="Employee No." name="employee_number">
						</div>

						<div class="form-group">
							<label>Name</label>
							<input type="text" id="projectinput1" class="form-control" placeholder="Name" name="name">
						</div>
						<div class="form-group">
							<label for="projectinput2">Department</label>
							<select class="form-control selDepartment" name="department_id" id="selAddUserDepartment">
								<!-- Code generated -->
								<option value="0" selected disabled> -- Select Department -- </option>
							</select>
						</div>
						<div class="form-group">
							<label for="projectinput2">User Level</label>
							<select class="form-control selUserLevel" name="user_level_id" id="selAddUserLevel">
								<!-- Code generated -->
								<option value="0" selected disabled> -- Select User Level -- </option>
							</select>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="projectinput1" class="form-control" placeholder="Email" name="email">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" id="projectinput1" class="form-control" placeholder="Username" name="username">
						</div>
					</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline-primary">Save changes</button>
			  </div>
			</form>
		</div>
	  </div>
	</div>

	<!-- Modal Deactivate User -->
	<div class="modal fade text-xs-left" id="modalDeactivateUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formDeactivateUser">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Deactivate User</h4>
			  </div>
			  <div class="modal-body">
					<p>Are you sure to deactivate this selected user?</p>
					<input type="hidden" name="user_id" id="txtDeactivateUserId">
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
	<div class="modal fade text-xs-left" id="modalActivateUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formActivateUser">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Activate User</h4>
			  </div>
			  <div class="modal-body">
					<p>Are you sure to activate this selected user?</p>
					<input type="hidden" name="user_id" id="txtActivateUserId">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-outline-primary">Yes</button>
			  </div>
			</form>
		</div>
	  </div>
	</div>

	<!-- Modal Reset User Password -->
	<div class="modal fade text-xs-left" id="modalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formResetPassword">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Reset User Password</h4>
			  </div>
			  <div class="modal-body">
					<p>Are you sure to reset password of this selected user?</p>
					<input type="hidden" name="user_id" id="txtResetPasswordUserId">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-outline-primary">Yes</button>
			  </div>
			</form>
		</div>
	  </div>
	</div>

	<div class="modal fade text-xs-left" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
	  <div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formEditUser">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person"></i> Edit User</h4>
			  </div>
				<div class="modal-body">
					<div class="form-body">
						<div class="form-group">
							<input type="hidden" id="txtEditUserId" class="form-control" placeholder="User Id" name="user_id">
							<label>Name</label>
							<input type="text" id="txtEditUserName" class="form-control" placeholder="Name" name="name">
						</div>
						<div class="form-group">
							<label>Employee No.</label>
							<input type="text" id="txtEditEmployeeNumber" class="form-control" placeholder="Employee No." name="employee_number">
						</div>
						<div class="form-group">
							<label for="projectinput2">Department</label>
							<select class="form-control selDepartment" name="department_id" id="selEditUserDepartment">
								<!-- Code generated -->
								<option value="0" selected disabled> -- Select Department -- </option>
							</select>
						</div>
						<div class="form-group">
							<label for="projectinput2">User Level</label>
							<select class="form-control selUserLevel" name="user_level_id" id="selEditUserLevel">
								<!-- Code generated -->
								<option value="0" selected disabled> -- Select User Level -- </option>
							</select>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="txtEditUserEmail" class="form-control" placeholder="Email" name="email">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" id="txtEditUserUsername" class="form-control" placeholder="Username" name="username">
						</div>

						<div class="form-group">
							<label>Password</label>
							<div class="input-group">
								<span class="input-group-addon"><input type="checkbox" name="is_change_pass" value="1"></span>
								<input type="text" class="form-control" placeholder="Password" name="password" disabled>
							</div>
						</div>

					</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-outline-primary">Save changes</button>
			  </div>
			</form>
		</div>
	  </div>
	</div>
@endsection

@section('js_content')
	<script type="text/javascript">
		let dataTableUsers;

		$(document).ready(function(){
			dataTableUsers = $("#tblUsers").DataTable({
				"processing" : false,
				"serverSide" : true,
				"ajax" : {
					url: "view_users"
					// data: function (d){
					//     d.status = $("#selEmpStat").val();
					// }
				},
				
				"columns":[
					{ "data" : "name" },
					{ "data" : "employee_number" },
					{ "data" : "username" },
					{ "data" : "email" },
					{ "data" : "department_info.department_name" },
					{ "data" : "user_level_info.user_level_name" },
					{ "data" : "raw_user_access_count" },
					// { "data" : function(d2){
					//     return d2.lastname + ', ' + d2.firstname + ' ' + d2.middlename;
					// } },
					{ "data" : "action1" },
					{ "data" : "label1", orderable:false, searchable:false }
				],
			});//end of dataTableUsers

			GetDepartmentByStat(1, $(".selDepartment"));

			// Get Active User Level
			GetUserLevelByStatToAddUser(1, $(".selUserLevel"));

			$("#btnShowAddUserModal").click(function(){
				// Get Active Departments
				GetDepartmentByStat(1, $(".selDepartment"));

				// Get Active User Level
				GetUserLevelByStatToAddUser(1, $(".selUserLevel"));
			});
			
			$("#formAddUser").submit(function(event){
				event.preventDefault();
		        AddUser();
			});

			$(document).on('click', '.aDeactivateUser', function(){
				let userId = $(this).attr('user-id');
				$("#txtDeactivateUserId").val(userId);
			});

			$("#formDeactivateUser").submit(function(event){
				event.preventDefault();
		        DeactivateUser();
			});

			$(document).on('click', '.aActivateUser', function(){
				let userId = $(this).attr('user-id');
				$("#txtActivateUserId").val(userId);
			});

			$("#formActivateUser").submit(function(event){
				event.preventDefault();
		        ActivateUser();
			});

			$(document).on('click', '.aResetPassword', function(){
				let userId = $(this).attr('user-id');
				$("#txtResetPasswordUserId").val(userId);
			});

			$("#formResetPassword").submit(function(event){
				event.preventDefault();
		        ResetPassword();
			});

			$(document).on('click', '.aEditUser', function(){
				let userId = $(this).attr('user-id');
				$("#txtEditUserId").val(userId);
				GetUserById(userId);
				$("input[name='password']", $("#formEditUser")).prop('disabled', true);
				$("input[name='password']", $("#formEditUser")).val('');
				$("input[name='is_change_pass']", $("#formEditUser")).prop('checked', false);
			});

			$("#formEditUser").submit(function(event){
				event.preventDefault();
		        EditUser();
			});

			$("input[name='is_change_pass']", $("#formEditUser")).click(function(){
				let genPass = getRandomString(10);
				if($(this).prop('checked')){
					$("input[name='password']", $("#formEditUser")).prop('disabled', false);
					$("input[name='password']", $("#formEditUser")).val(genPass);
				}
				else{
					$("input[name='password']", $("#formEditUser")).prop('disabled', true);
					$("input[name='password']", $("#formEditUser")).val('');
				}
			});
		});

		function getRandomString(length) {
		    var randomChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		    var result = '';
		    for ( var i = 0; i < length; i++ ) {
		        result += randomChars.charAt(Math.floor(Math.random() * randomChars.length));
		    }
		    return result;
		}

	</script>
@endsection