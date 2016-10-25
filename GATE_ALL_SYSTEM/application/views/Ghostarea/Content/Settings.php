<?php

?>
<div class="row-fluid">
	<div class="span12">
		<h2 class="page-title">Settings <small>Core of Ghost functionally</small></h2>
	</div>
</div>
<div class="row-fluid">
	<div class="span7">
		<section class="widget">
			<header>
				<h4><i class="icon-user"></i> Account Profile <small>Create new or edit existing user</small></h4>
			</header>
			<div class="body">
				<form id="user-form" class="form-horizontal label-left" novalidate="novalidate" method="post" data-validate="parsley" />
					<fieldset>
						<legend class="section">Setting Register Account Global</legend>
						<div class="control-group">
							<label class="control-label">Employee Register</label>
							<div class="controls controls-row">
								<input id="gender-input" type="hidden" name="gender" value="female" />
								<div id="gender" class="btn-group" data-toggle="buttons-radio" data-target="gender-input">
									<button type="button" class="btn" data-toggle-class="btn-primary" name="gender" value="male">&nbsp; Male &nbsp;</button>
									<button type="button" class="btn btn-primary active" data-toggle-class="btn-primary" name="gender" value="female">Female</button>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Student Register</label>
							<div class="controls controls-row">
								<input id="gender-input" type="hidden" name="gender" value="female" />
								<div id="gender" class="btn-group" data-toggle="buttons-radio" data-target="gender-input">
									<button type="button" class="btn" data-toggle-class="btn-primary" name="gender" value="male">&nbsp; Male &nbsp;</button>
									<button type="button" class="btn btn-primary active" data-toggle-class="btn-primary" name="gender" value="female">Female</button>
								</div>
							</div>
						</div>
					</fieldset>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Validate &amp; Submit</button>
						<button type="button" class="btn">Cancel</button>
					</div>
					<legend class='section'>Setting Stucture Organization Program Study</legend>
					<fieldset>
						<div class="control-group">
							<label for="phone" class="control-label">Head of Department <span class="required">*</span></label>
							<div class="controls controls-row">
								<div class="input-append span12">
									<select id="phone-type" class="selectpicker">
										<option />Mobile
										<option />Home
										<option />Work
									</select>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label for="phone" class="control-label">Deputy of Department <span class="required">*</span></label>
							<div class="controls controls-row">
								<div class="input-append span12">
									<select id="phone-type" class="selectpicker">
										<option />Mobile
										<option />Home
										<option />Work
									</select>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label for="phone" class="control-label">Admin of Department <span class="required">*</span></label>
							<div class="controls controls-row">
								<div class="input-append span12">
									<select id="phone-type" class="selectpicker">
										<option />Mobile
										<option />Home
										<option />Work
									</select>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label for="phone" class="control-label">Coordinator (TA) <span class="required">*</span></label>
							<div class="controls controls-row">
								<div class="input-append span12">
									<select id="phone-type" class="selectpicker">
										<option />Mobile
										<option />Home
										<option />Work
									</select>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label for="phone" class="control-label">Coordinator (PKL) <span class="required">*</span></label>
							<div class="controls controls-row">
								<div class="input-append span12">
									<select id="phone-type" class="selectpicker">
										<option />Mobile
										<option />Home
										<option />Work
									</select>
								</div>
							</div>
						</div>
					</fieldset>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Validate &amp; Submit</button>
						<button type="button" class="btn">Cancel</button>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>