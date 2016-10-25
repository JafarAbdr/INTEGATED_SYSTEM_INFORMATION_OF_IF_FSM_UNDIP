<div class="row-fluid">
	<div class="span12">
		<section class="widget">
			<header>
				<h4  style="color : black;"><i class="icon-user"></i> Account Profile <small   style="color : black;">Create new or edit existing user</small></h4>
			</header>
			<div class="body">
				<form id="user-form" class="form-horizontal label-left" novalidate="novalidate" method="post" data-validate="parsley" />
					<div class="row-fluid">
						<div class="span4">
							<div class="text-align-center">
								<img class="img-circle" src="<?php echo $photo;?>" alt="64x64" style="height: 112px;" />
							</div>
						</div>
						<div class="span8">
							<h3 class="no-margin"  style="color : black;"><?php echo $name;?></h3>
							<address   style="color : black;">
								<strong style="color : black;"><?php echo $position;?></strong> at <strong><a href="#"   style="color : black;">Informathic, University of DIponegoro</a></strong><br />
								<abbr title="Work email"  style="color : black;">e-mail:</abbr> <a href="mailto:<?php echo $email;?>"  style="color : black;"><?php echo $email;?></a><br />
								<abbr title="Work Phone"   style="color : black;">phone:</abbr> <?php echo $phone;?>
							</address>
						</div>
					</div>
					<fieldset>
						<legend class="section">Personal edit</legend>
						<div class="control-group">
							<label class="control-label">Gender</label>
							<div class="controls controls-row">
								<input onchange='alert()' id="gender-input" type="hidden" name="gender" value="female" />
								<div id="gender" class="btn-group" data-toggle="buttons-radio" data-target="gender-input">
									<button type="button" class="btn" data-toggle-class="btn-primary" name="gender" value="male">&nbsp; Male &nbsp;</button>
									<button type="button" class="btn btn-primary active" data-toggle-class="btn-primary" name="gender" value="female">Female</button>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</section>
	</div>
</div>