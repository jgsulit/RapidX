@extends('layouts.master_layout')
@section('title', 'Departments')

@section('content')
	<div class="app-content content container-fluid">
	  <div class="content-wrapper">
		<div class="content-header row">
		  <div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">Departments</h2>
		  </div>
		  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
			<div class="breadcrumb-wrapper col-xs-12">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/RapidX">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Departments
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
									<button class="btn btn-success" id="btnShowAddDepartmentModal" data-toggle="modal" data-target="#modalAddDepartment" data-keyboard="false"><i class="icon-person-add
"></i> Add Department</button>
								  </div>
									<br><br>
								  <div class="table-responsive">
									  <table class="table table-hover table-striped table-bordered" id="tbDepartments" width="100%">
										  <thead>
											  <tr>
												  <th>Department Name</th>
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
	<div class="modal fade text-xs-left" id="modalAddDepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
	  <div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formAddDepartment">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Add Department</h4>
			  </div>
				<div class="modal-body">
					<div class="form-body">
						<div class="form-group">
							<label for="projectinput1">Department Name</label>
							<input type="text" id="projectinput1" class="form-control" placeholder="Department Name" name="department_name">
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

	<div class="modal fade text-xs-left" id="modalEditDepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
	  <div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formEditDepartment">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Edit Department</h4>
			  </div>
				<div class="modal-body">
					<div class="form-body">
						<div class="form-group">
							<label for="projectinput1">Department Name</label>
							<input type="hidden" id="txtEditDepartmentId" class="form-control" placeholder="Department ID" name="department_id">
							<input type="text" id="txtEditDepartmentName" class="form-control" placeholder="Department Name" name="department_name">
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

	<!-- Modal Archive Department -->
	<div class="modal fade text-xs-left" id="modalArchiveDepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formArchiveDepartment">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Archive Department</h4>
			  </div>
			  <div class="modal-body">
					<p>Are you sure to archive this selected department?</p>
					<input type="hidden" name="department_id" id="txtArchiveDepartmentId">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-outline-primary">Yes</button>
			  </div>
			</form>
		</div>
	  </div>
	</div>

	<!-- Modal Restore Department -->
	<div class="modal fade text-xs-left" id="modalRestoreDepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formRestoreDepartment">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Restore Department</h4>
			  </div>
			  <div class="modal-body">
					<p>Are you sure to restore this selected department?</p>
					<input type="hidden" name="department_id" id="txtRestoreDepartmentId">
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
	<div class="modal fade text-xs-left" id="modalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
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
@endsection

@section('js_content')
	<script type="text/javascript">
		let dataTableDepartments;


		$(document).ready(function(){
			dataTableDepartments = $("#tbDepartments").DataTable({
				"processing" : false,
				"serverSide" : true,
				"ajax" : {
					url: "view_department_by_stat",
					"data": function (param){
					    param.department_stat = 0;
					}
				},
				
				"columns":[
					{ "data" : "department_name" },
					// { "data" : function(d2){
					//     return d2.lastname + ', ' + d2.firstname + ' ' + d2.middlename;
					// } },
					{ "data" : "action1" },
					{ "data" : "label1", orderable:false, searchable:false }
				],
			});//end of dataTableDepartments
			// $("#btnShowAddDepartmentModal").click(function(){
			// 	// Get Active Departments
			// 	GetDepartmentByStat(1);

			// 	// Get Active User Level
			// 	GetUserLevelByStat(1);
			// });
			
			$("#formAddDepartment").submit(function(event){
				event.preventDefault();
		        AddDepartment();
			});

			$(document).on('click', '.aArchiveDepartment', function(){
				let departmentId = $(this).attr('department-id');
				$("#txtArchiveDepartmentId").val(departmentId);
			});

			$("#formArchiveDepartment").submit(function(event){
				event.preventDefault();
		        ArchiveDepartment();
			});

			$(document).on('click', '.aRestoreDepartment', function(){
				let departmentId = $(this).attr('department-id');
				$("#txtRestoreDepartmentId").val(departmentId);
			});

			$("#formRestoreDepartment").submit(function(event){
				event.preventDefault();
		        RestoreDepartment();
			});

			$(document).on('click', '.aEditDepartment', function(){
				let departmentId = $(this).attr('department-id');
				$("#txtEditDepartmentId").val(departmentId);
				GetDepartmentByIdToEdit(departmentId);
			});

			$("#formEditDepartment").submit(function(event){
				event.preventDefault();
		        EditDepartment();
			});
		});
	</script>
@endsection