<?php

?>

<div class="row-fluid">
	<div class="span12">
		<h2 class="page-title">Dashboard <small>Statistics and more</small></h2>
	</div>
</div>
<div class="row-fluid">
	<div class="span8">
		<section class="widget">
			<header>
				<h4>
					<i class="icon-group"></i>
					Visits
					<small>
						Based on a three months data
					</small>
				</h4>
			</header>
			<div class="body no-margin">
				<div id="visits-chart" class="chart visits-chart">
					<svg></svg>
				</div>
				<div class="visits-info well well-small">
					<div class="row-fluid">
						<div class="span3">
							<div class="key"><i class="eicon-users"></i> Total Traffic</div>
							<div class="value">24 541 <i class="icon-caret-up color-green"></i></div>
						</div>
						<div class="span3">
							<div class="key"><i class="eicon-user"></i> Unique Visits</div>
							<div class="value">14 778 <i class="icon-caret-down color-red"></i></div>
						</div>
						<div class="span3">
							<div class="key"><i class="icon-plus-sign-alt"></i> Revenue</div>
							<div class="value">$3 583.18 <i class="icon-caret-up color-green"></i></div>
						</div>
						<div class="span3">
							<div class="key"><i class="icon-user"></i> Total Sales</div>
							<div class="value">$59 871.12 <i class="icon-caret-down color-red"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label for="simple-switch" class="control-label">Switches</label>
				<div class="controls">
					<label class="checkbox inline">
						<span class="switch switch-small" data-on="primary" data-off="danger">
							<input id="simple-switch" type="checkbox" checked="checked" />
						</span>
					</label>
					<label class="checkbox inline">
						<span class="switch switch-small" data-on="success" data-off="warning">
							<input id="simple-switch-2" type="checkbox" />
						</span>
					</label>
				</div>
			</div>
		</section>
	</div>
	<div class="span4">
		<section class="widget widget-tabs">
			<header>
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#stats" data-toggle="tab">Users</a>
					</li>
					<li>
						<a href="#report" data-toggle="tab">Favorites</a>
					</li>
					<li>
						<a href="#dropdown1" data-toggle="tab">Commenters</a>
					</li>
				</ul>
			</header>
			<div class="body tab-content">
				<div id="stats" class="tab-pane active clearfix">
					<h5 class="tab-header"><i class="icon-group"></i> Last logged-in users</h5>
					<ul class="users-list">
						<li>
							<img src="img/1.jpg" alt="" class="pull-left img-circle" />
							<div class="user-info">
								<div class="name"><a href="#">Finees Lund</a></div>
								<div class="position">Product Designer</div>
								<div class="time">Last logged-in: Mar 20, 18:46</div>
							</div>
						</li>
						<li>
							<img src="img/3.jpg" alt="" class="pull-left img-circle" />
							<div class="user-info">
								<div class="name"><a href="#">Erebus Novak</a></div>
								<div class="position">Software Engineer</div>
								<div class="time">Last logged-in: Mar 23, 9:02</div>
							</div>
						</li>
					</ul>
				</div>
				<div id="report" class="tab-pane">
					<h5 class="tab-header"><i class="icon-star"></i> Popular contacts</h5>
					<ul class="users-list user-list-no-hover">
						<li>
							<img src="img/14.jpg" alt="" class="pull-left img-circle" />
							<div class="user-info">
								<div class="name"><a href="#">Jessica Johnsson</a></div>
								<div class="options">
									<button class="btn btn-mini btn-success">
										<i class="icon-phone"></i>
										Call
									</button>
									<button class="btn btn-mini btn-warning">
										<i class="icon-envelope-alt"></i>
										Message
									</button>
								</div>
							</div>
						</li>
						<li>
							<img src="img/13.jpg" alt="" class="pull-left img-circle" />
							<div class="user-info">
								<div class="name"><a href="#">Frans Garey</a></div>
								<div class="options">
									<button class="btn btn-mini btn-success">
										<i class="icon-phone"></i>
										Call
									</button>
									<button class="btn btn-mini btn-warning">
										<i class="icon-envelope-alt"></i>
										Message
									</button>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div id="dropdown1" class="tab-pane">
					<h5 class="tab-header"><i class="icon-comments"></i> Top Commenters</h5>
					<ul class="users-list">
						<li>
							<img src="img/13.jpg" alt="" class="pull-left img-circle" />
							<div class="user-info">
								<div class="name"><a href="#">Frans Garey</a></div>
								<div class="comment">
									Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
									sed quia
								</div>
							</div>
						</li>
						<li>
							<img src="img/1.jpg" alt="" class="pull-left img-circle" />
							<div class="user-info">
								<div class="name"><a href="#">Finees Lund</a></div>
								<div class="comment">
									Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
									eu fugiat.
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</section>
	</div>
</div>