@extends('layouts.master_layout')
@section('title', 'Module')

@section('content')
	<div class="app-content content container-fluid">
	  <div class="content-wrapper">
		<div class="content-header row">
		  <div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">Module</h2>
		  </div>
		  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
			<div class="breadcrumb-wrapper col-xs-12">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/RapidX">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Module
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
									<button class="btn btn-success" id="btnShowAddModuleModal" data-toggle="modal" data-target="#modalAddModule" data-keyboard="false"><i class="icon-person-add
"></i> Add Module</button>
								  </div>
									<br><br>
								  <div class="table-responsive">
									  <table class="table table-hover table-striped table-bordered" id="tblModules" width="100%">
										  <thead>
											  <tr>
												  <th>Module ID</th>
												  <th>Module Name</th>
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
	<div class="modal fade text-xs-left" id="modalAddModule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
	  <div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formAddModule">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Add Module</h4>
			  </div>
				<div class="modal-body">
					<div class="form-body">
						<div class="form-group">
							<label for="projectinput1">Module Name</label>
							<input type="text" id="projectinput1" class="form-control" placeholder="Module Name" name="module_name">
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

	<div class="modal fade text-xs-left" id="modalEditModule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
	  <div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formEditModule">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Edit Module</h4>
			  </div>
				<div class="modal-body">
					<div class="form-body">
						<div class="form-group">
							<label for="projectinput1">Module Name</label>
							<input type="hidden" id="txtEditModuleId" class="form-control" placeholder="Module ID" name="module_id">
							<input type="text" id="txtEditModuleName" class="form-control" placeholder="Module Name" name="module_name">
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
	<div class="modal fade text-xs-left" id="modalArchiveModule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formArchiveModule">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Archive Module</h4>
			  </div>
			  <div class="modal-body">
					<p>Are you sure to archive this selected module?</p>
					<input type="hidden" name="module_id" id="txtArchiveModuleId">
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
	<div class="modal fade text-xs-left" id="modalRestoreModule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" data-backdrop="static">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form class="form" method="post" id="formRestoreModule">
				@csrf
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel3"><i class="icon-person-add"></i> Restore Module</h4>
			  </div>
			  <div class="modal-body">
					<p>Are you sure to restore this selected module?</p>
					<input type="hidden" name="module_id" id="txtRestoreModuleId">
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
		let dataTableModules;

		$(document).ready(function(){			
			dataTableModules = $("#tblModules").DataTable({
				"processing" : false,
				"serverSide" : true,
				"ajax" : {
					url: "view_module_by_stat",
					"data": function (param){
					    param.module_stat = 0;
					}
				},
				
				"columns":[
					{ "data" : "module_id" },
					{ "data" : "module_name" },
					{ "data" : "action1" },
					{ "data" : "label1", orderable:false, searchable:false }
				],
			});//end of dataTableModules
			$("#formAddModule").submit(function(event){
				event.preventDefault();
		        AddModule();
			});

			$(document).on('click', '.aArchiveModule', function(){
				let moduleId = $(this).attr('module-id');
				$("#txtArchiveModuleId").val(moduleId);
			});

			$("#formArchiveModule").submit(function(event){
				event.preventDefault();
		        ArchiveModule();
			});

			$(document).on('click', '.aRestoreModule', function(){
				let moduleId = $(this).attr('module-id');
				$("#txtRestoreModuleId").val(moduleId);
			});

			$("#formRestoreModule").submit(function(event){
				event.preventDefault();
		        RestoreModule();
			});

			$(document).on('click', '.aEditModule', function(){
				let moduleId = $(this).attr('module-id');
				$("#txtEditModuleId").val(moduleId);
				GetModuleByIdToEdit(moduleId);
			});

			$("#formEditModule").submit(function(event){
				event.preventDefault();
		        EditModule();
			});
		});
	</script>
@endsection