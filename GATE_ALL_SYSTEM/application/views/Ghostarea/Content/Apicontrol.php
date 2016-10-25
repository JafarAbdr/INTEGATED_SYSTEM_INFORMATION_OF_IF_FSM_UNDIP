<?php

?>
<div class="row-fluid">
	<div class="span12">
		<h2 class="page-title">Api's <small>Add and Setting Control</small></h2>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<section class="widget">
			<header>
				<h4>
					<i class="icon-file-alt"></i>
					Api connected table
				</h4>
				<div class="actions hidden-phone-portrait">
					<input id="search-name-api" type="search" placeholder="Enter Name" />
				</div>
			</header>
			<div class="body">
				<div id="chat-messages-2" class="chat-messages" style='max-height : 400px; overflow-y : auto;'>
					<table id="datatable-table-2" class="table table-striped">
						<thead>
							<tr>
								<th style='text-align : center;' >Domain</th>
								<th style='text-align : center;' class="no-sort">Email</th>
								<th style='text-align : center;' >Date Registered</th>
								<th style='text-align : center;' class="hidden-phone-landscape">Operation</th>
							</tr>
						</thead>
						<tbody id="table-list-api">
							<tr>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row-fluid non-responsive">
					<button class="btn btn-warning" id="api-add">
						<i class="icon-plus"></i>
						Add new
					</button>
					<button class="btn btn-inverse"  id="api-list">
						<i class="icon-refresh"></i>
						Refresh
					</button>
				</div>
			</div>
		</section>
	</div>
</div>
<div id="api-form" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><i class="eicon-cancel"></i></button>
		<h4 id="myModalLabel2">Add New Api connected</h4>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<section class="widget">
					<header>
						<h4><i class="icon-user"></i> Api Responsibility Standard's <small>Create new </small></h4>
					</header>
					<div class="body">
						<form id="user-form" class="form-horizontal label-left" novalidate="novalidate" method="post" data-validate="parsley" />
							<fieldset>
								<legend class="section">Info Responsibility <span style='font-size : 0.8em; color : red;' id="api-add-error"></span><span style='font-size : 0.8em; color : green;' id="api-add-succ"></span></legend>
								<div class="control-group">
									<label class="control-label" for="first-name">Domain <span class="required">*</span></label>
									<div class="controls controls-row">
										<input type="text" id="api-domain" name="api-domain" required="required" class="span11 parsley-validated">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="first-name">Email <span class="required">*</span></label>
									<div class="controls controls-row">
										<input type="text" id="api-email" name="api-domain" required="required" class="span11 parsley-validated">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Api Mahasiswa Register</label>
									<div class="controls controls-row">
										<input id="api-mahasiswa-register" type="hidden" onchange='' name="gender" value="1" />
										<div id="gender" class="btn-group" data-toggle="buttons-radio" data-target="api-register">
											<button id="api-mahasiswa-register-default" type="button" class="btn btn-primary active" onclick="$('#api-mahasiswa-register').val(1);" data-toggle-class="btn-primary" name="gender" value="1">&nbsp; Mahasiswa &nbsp;</button>
											<button type="button" class="btn" data-toggle-class="btn-primary"  onclick="$('#api-mahasiswa-register').val(2);"  name="gender" value="2"> Non-Mahasiswa </button>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Api Employee Register</label>
									<div class="controls controls-row">
										<input id="api-employee-register" type="hidden" onchange='' name="gender" value="1" />
										<div id="gender" class="btn-group" data-toggle="buttons-radio" data-target="api-register">
											<button id="api-employee-register-default" type="button" class="btn btn-primary active" onclick="$('#api-employee-register').val(1);" data-toggle-class="btn-primary" name="gender" value="1">&nbsp; Dosen IF &nbsp;</button>
											<button type="button" class="btn" data-toggle-class="btn-primary"  onclick="$('#api-employee-register').val(2);"  name="gender" value="2">Dosen Non-IF</button>
											<br>
											<button type="button" class="btn" data-toggle-class="btn-primary"  onclick="$('#api-employee-register').val(3);"  name="gender" value="2">Pegawai</button>
											<button type="button" class="btn" data-toggle-class="btn-primary"  onclick="$('#api-employee-register').val(4);"  name="gender" value="2">All</button>
											<button type="button" class="btn" data-toggle-class="btn-primary"  onclick="$('#api-employee-register').val(5);"  name="gender" value="2">Dosen All</button>
											<br>
											<button type="button" class="btn" data-toggle-class="btn-primary"  onclick="$('#api-employee-register').val(6);"  name="gender" value="2">Dosen IF with Pegawai</button>
											<br>
											<button type="button" class="btn" data-toggle-class="btn-primary"  onclick="$('#api-employee-register').val(7);"  name="gender" value="2">Dosen Non-IF with Pegawai</button>
											<button type="button" class="btn" data-toggle-class="btn-primary"  onclick="$('#api-employee-register').val(8);"  name="gender" value="2">Non-Pegawai</button>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</section>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" id="api-add-diss" data-dismiss="modal">Close</button>
		<button class="btn btn-primary" id="api-add-exe">Validate &amp; Add</button>
	</div>
</div>

<div id="api-actor-form" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-header">
		<h4 id="myModalLabel2">Add New Api Actor connected</h4>
	</div>
	<div class="modal-body">
		<div id="chat-messages-2" class="chat-messages" style='max-height : 250px; padding : 0;overflow-y : auto; background-color : rgba(0,0,0,0.4);'>
			<table id="datatable-table-2" class="table table-striped" style=''>
				<thead>
					<tr>
						<th style='text-align : center;' class="no-sort">Level</th>
						<th style='text-align : center;' >Nip</th>
						<th style='text-align : center;' >Date Registered</th>
						<th style='text-align : center;' class="hidden-phone-landscape">Operation</th>
					</tr>
				</thead>
				<tbody id="table-list-api-actor">
					<tr>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="chat-messages" style='background-color : rgba(0,0,0,0.4);padding : 0;'>
			<table id="datatable-table-2" class="table table-striped" style=''>
				<thead>
					<tr>
						<th style='text-align : center;' ><input type="number" id='api-actor-level' min='0' max='99'></th>
						<th style='text-align : center;' class="no-sort"><select id="api-actor-nip" class='chosen-select form-control'></select></th>
					</tr>
				</thead>
			</table>
		</div>
		<div class="row-fluid non-responsive">
			<button class="btn btn-warning"  onclick="addNewApiActor()" id="api-actor-add">
				<i class="icon-plus" ></i>
				Add new
			</button>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" id="api-actor-add-diss" data-dismiss="modal">Close</button>
	</div>
</div>