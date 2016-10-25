<?php

?>
<div class="row-fluid">
	<div class="span12">
		<h2 class="page-title">Student's <small>Add and Setting Control</small></h2>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<section class="widget">
			<header>
				<h4>
					<i class="icon-file-alt"></i>
					Student table
				</h4>
				<div class="actions hidden-phone-portrait">
					<input id="search" type="search" placeholder="Enter Name" />
				</div>
			</header>
			<div class="body">
				<div id="chat-messages-2" class="chat-messages" style='max-height : 400px; overflow-y : auto;'>
					<table id="datatable-table-2" class="table table-striped">
						<thead>
							<tr>
								<th>Nim</th>
								<th class="no-sort">Photo</th>
								<th>Name</th>
								<th class="no-sort hidden-phone-landscape">Date</th>
								<th class="hidden-phone-landscape">Operation</th>
							</tr>
						</thead>
						<tbody>
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
					<button class="btn btn-warning">
						<i class="icon-plus"></i>
						Add new
					</button>
					<button class="btn btn-inverse">
						<i class="icon-refresh"></i>
						Refresh
					</button>
					<button class="btn btn-inverse">
						<i class="icon-exchange"></i>
						Test connection
					</button>
				</div>
			</div>
		</section>
	</div>
</div>