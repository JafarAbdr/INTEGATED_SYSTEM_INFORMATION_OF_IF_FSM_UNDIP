<?php

?>
<div class="row-fluid">
	<div class="span12">
		<h2 class="page-title">Employee's <small>Add and Setting Control</small></h2>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<section class="widget">
			<header>
				<h4>
					<i class="icon-file-alt"></i>
					Employee table
				</h4>
				<div class="actions hidden-phone-portrait">
					<input id="search-name-employee" type="search" placeholder="Enter Name" />
				</div>
			</header>
			<div class="body">
				<div id="chat-messages-2" class="chat-messages" style='max-height : 400px; overflow-y : auto;'>
					<table id="datatable-table-2" class="table table-striped">
						<thead>
							<tr>
								<th style='text-align : center;' >Nip</th>
								<th style='text-align : center;' class="no-sort">Photo</th>
								<th style='text-align : center;' >Name</th>
								<th style='text-align : center;' class="no-sort hidden-phone-landscape">Date</th>
								<th style='text-align : center;' class="hidden-phone-landscape">Operation</th>
							</tr>
						</thead>
						<tbody id="table-list-employee">
							<tr>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row-fluid non-responsive">
					<button class="btn btn-warning" id="employee-add">
						<i class="icon-plus"></i>
						Add new
					</button>
					<button class="btn btn-inverse"  id="employee-list">
						<i class="icon-refresh"></i>
						Refresh
					</button>
				</div>
			</div>
		</section>
	</div>
</div>
<div id="employee-form" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><i class="eicon-cancel"></i></button>
		<h4 id="myModalLabel2">Add New Employee</h4>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<section class="widget">
					<header>
						<h4><i class="icon-user"></i> Employee Profile Standard's <small>Create new </small></h4>
					</header>
					<div class="body">
						<form id="user-form" class="form-horizontal label-left" novalidate="novalidate" method="post" data-validate="parsley" />
							<fieldset>
								<legend class="section">Info Personal <span style='font-size : 0.8em; color : red;' id="employee-add-error"></span><span style='font-size : 0.8em; color : green;' id="employee-add-succ"></span></legend>
								<div class="control-group">
									<label class="control-label" for="first-name">Nip <span class="required">*</span></label>
									<div class="controls controls-row">
										<input type="text" id="employee-nip" name="first-name" required="required" class="span11 parsley-validated">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="first-name">Name <span class="required">*</span></label>
									<div class="controls controls-row">
										<input type="text" id="employee-name" name="first-name" required="required" class="span11 parsley-validated">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Employee Register</label>
									<div class="controls controls-row">
										<input id="employee-register" type="hidden" onchange='alert(this.value);' name="gender" value="1" />
										<div id="gender" class="btn-group" data-toggle="buttons-radio" data-target="employee-register">
											<button id="employee-register-default" type="button" class="btn btn-primary active" onclick="$('#employee-register').val(1);" data-toggle-class="btn-primary" name="gender" value="1">&nbsp; Mentor IF &nbsp;</button>
											<button type="button" class="btn" data-toggle-class="btn-primary"  onclick="$('#employee-register').val(2);"  name="gender" value="2">Mentor Non-IF</button><br>
											<button type="button" class="btn" data-toggle-class="btn-primary"  onclick="$('#employee-register').val(3);"  name="gender" value="2">Just Pegawai</button>
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
		<button class="btn" id="employee-add-diss" data-dismiss="modal">Close</button>
		<button class="btn btn-primary" id="employee-add-exe">Validate &amp; Add</button>
	</div>
</div>