<?php
if(!defined('BASEPATH')) exit();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ghost - House Control</title>
    <link href="resources/lightblue/css/application.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="resources/mystyle/image/ghost.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type='text/javascript'>
	var base_url = <?php echo "'".base_url()."';";?>
	</script>
</head>
<body class="background-light">
<div class="logo">
    <h4><a>Ghost <strong>Informatika</strong></a></h4>
</div>
<nav id="sidebar" class="sidebar nav-collapse collapse">
    <ul id="side-nav" class="side-nav">
        <li class="" onclick='showPage("das");' style='cursor : pointer;'>
            <a><i class="icon-desktop"></i> <span class="name">Dashboard</span></a>
        </li>
        <li class="accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#forms-collapse"><i class="icon-plus"></i> <span class="name">Add</span></a>
            <ul id="forms-collapse" class="accordion-body collapse">
                <li  style='cursor : pointer;'  onclick='showPage("api");'><a>Api Integrated</a></li>
                <li  style='cursor : pointer;'  onclick='showPage("mem");'><a>Employee's</a></li>
                <li  style='cursor : pointer;' onclick='showPage("stu");'><a>Student's</a></li>
            </ul>
        </li>
        <li  onclick='showPage("setting");'>
            <a><i class="icon-cog" style='cursor : pointer;'></i> <span class="name">Settings</span></a>
        </li>
    </ul>
</nav>
<div class="wrap">
    <header class="page-header">
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="nav pull-right">
                    <li class="visible-phone-landscape">
                        <a href="#" id="search-toggle">
                            <i class="icon-search"></i>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="hidden-phone">
                        <a href="#" id="settings" title="Settings" data-toggle="popover" data-placement="bottom">
                            <i class="icon-cog"></i>
                        </a>
                    </li>
                    <li class="hidden-phone dropdown">
                        <a href="#" title="Account" id="account" class="dropdown-toggle" data-toggle="popover" data-placement='bottom'>
                            <i class="icon-user"></i>
                        </a>
                        <ul id="account-menu" class="dropdown-menu account" role="menu">
                            <li role="presentation" class="account-picture">
                                <img src="img/2.jpg" alt="" />
                                Philip Daineka
                            </li>
                            <li role="presentation">
                                <a href="form_account.html" class="link">
                                    <i class="icon-user"></i>
                                    Profile
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="component_calendar.html" class="link">
                                    <i class="icon-calendar"></i>
                                    Calendar
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="link">
                                    <i class="icon-inbox"></i>
                                    Inbox
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="visible-phone">
                        <a href="#" class="btn-navbar" data-toggle="collapse" data-target=".sidebar" title="">
                            <i class="icon-reorder"></i>
                        </a>
                    </li>
                    <li class="hidden-phone">
						<a href="#" id='tryLogOut' title='logout' data-toggle='popover' data-placement='bottom'>
							<i class="icon-signout"></i>
						</a>
					</li>
                </ul>
                <form id="search-form" class="navbar-search pull-right" />
                    <input type="search" class="search-query" placeholder="Search..." />
                </form>
                <div class="notifications pull-right">
                    <div class="alert pull-right">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <i class="icon-info-sign"></i> Check out Theme <a id="notification-link" href="#">settings</a> on the right!
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="content container-fluid" id="content-ghost">
	<!-- Content-->
		
		
		
		
		
		
		
		
    </div>
</div>
<div style='position : fixed; right : 20px; bottom : 20px; display : none;' id="loading-icon">
	<img style='width : 45px;' src="<?php echo base_url()."resources/mystyle/image/loader_content.gif";?>">
</div>
<div id="warning-message" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><i class="eicon-cancel"></i></button>
		<h4 id="myModalLabel1">Attention</h4>
	</div>
	<div class="modal-body">
		<p id="warning-message-content"></p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal">Close</button>
	</div>
</div>
<div id="warning-message-2" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><i class="eicon-cancel"></i></button>
		<h4 id="myModalLabel2">Attention</h4>
	</div>
	<div class="modal-body">
		<p id="warning-message-2-content"></p>
	</div>
	<div class="modal-footer">
		<button class="btn" id="warning-message-2-agree" onclick="warningMessage2agree();">Agree</button>
		<button class="btn" data-dismiss="modal">Dissagre</button>
	</div>
</div>
<div id="warning-message-3" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><i class="eicon-cancel"></i></button>
		<h4 id="myModalLabel3">Detail Personal Info</h4>
	</div>
	<div  id="warning-message-3-content" class="modal-body">
		
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal">Close</button>
	</div>
</div>
<!-- jquery and friends -->
<script src="resources/lightblue/lib/jquery/jquery.1.9.0.min.js"> </script>
<script src="resources/lightblue/lib/jquery/jquery-migrate-1.1.0.min.js"> </script>

<!-- jquery plugins -->
<script src="resources/lightblue/lib/uniform/js/jquery.uniform.js"></script>
<script src="resources/lightblue/lib/sparkline/jquery.sparkline.js"></script>
<script src="resources/lightblue/lib/jquery-ui-1.10.1.custom.js"></script>
<script src="resources/lightblue/lib/jquery.slimscroll.js"></script>

<!-- d3, nvd3-->
<script src="resources/lightblue/lib/nvd3/lib/d3.v2.js"></script>
<script src="resources/lightblue/lib/nvd3/nv.d3.custom.js"></script>

<!-- nvd3 models -->
<script src="resources/lightblue/lib/nvd3/src/models/scatter.js"></script>
<script src="resources/lightblue/lib/nvd3/src/models/axis.js"></script>
<script src="resources/lightblue/lib/nvd3/src/models/legend.js"></script>
<script src="resources/lightblue/lib/nvd3/src/models/multiBar.js"></script>
<script src="resources/lightblue/lib/nvd3/src/models/multiBarChart.js"></script>
<script src="resources/lightblue/lib/nvd3/src/models/line.js"></script>
<script src="resources/lightblue/lib/nvd3/src/models/lineChart.js"></script>
<script src="resources/lightblue/lib/nvd3/stream_layers.js"></script>

<!--backbone and friends -->
<script src="resources/lightblue/lib/backbone/underscore-min.js"></script>
<script src="resources/lightblue/lib/backbone/backbone-min.js"></script>
<script src="resources/lightblue/lib/backbone/backbone.localStorage-min.js"></script>
<script src="resources/lightblue/lib/bootstrap-select/bootstrap-select.js"></script>
<script src="resources/lightblue/lib/wysihtml5/wysihtml5-0.3.0_rc2.js"></script>
<script src="resources/lightblue/lib/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<!-- bootstrap default plugins -->
<script src="resources/lightblue/lib/bootstrap-switch.js"></script>
<script src="resources/lightblue/js/bootstrap/bootstrap-transition.js"></script>
<script src="resources/lightblue/js/bootstrap/bootstrap-collapse.js"></script>
<script src="resources/lightblue/js/bootstrap/bootstrap-alert.js"></script>
<script src="resources/lightblue/js/bootstrap/bootstrap-tooltip.js"></script>
<script src="resources/lightblue/js/bootstrap/bootstrap-button.js"></script>
<script src="resources/lightblue/js/bootstrap/bootstrap-modal.js"></script>
<script src="resources/lightblue/js/bootstrap/bootstrap-popover.js"></script>
<script src="resources/lightblue/js/bootstrap/bootstrap-button.js"></script>
<script src="resources/lightblue/js/bootstrap/bootstrap-tab.js"> </script>
<script src="resources/lightblue/js/bootstrap/bootstrap-dropdown.js"></script>
<script src="resources/lightblue/js/bootstrap/bootstrap-tooltip.js"></script>

<!-- basic application js-->
<script src="resources/lightblue/js/app.js"></script>
<script src="resources/lightblue/js/settings.js"></script>

<!-- page specific -->
<script src="resources/lightblue/js/index.js"></script>
<script src="resources/lightblue/js/chat.js"></script>

<!-- page specific -->
<script src="resources/LibraryJaserv/js/jaserv.min.dev.js"></script>
<script src="resources/mystyle/js/ghostarea.js"></script>
<script src="resources/mystyle/js/ghostareaemployee.js"></script>
<script src="resources/mystyle/js/ghostareaapicontrol.js"></script>
<script type="text/template" id="message-template">
        <div class="sender pull-left">
            <div class="icon">
                <img src="img/2.jpg" class="img-circle" alt="">
            </div>
            <div class="time">
                just now
            </div>
        </div>
        <div class="chat-message-body">
            <span class="arrow"></span>
            <div class="sender">Tikhon Laninga</div>
            <div class="text">
                <%- text %>
            </div>
        </div>
</script>

<script type="text/template" id="settings-template">
    <div class="setting clearfix">
        <div>Background</div>
        <div id="background-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% dark = background == 'dark'; light = background == 'light';%>
            <button type="button" data-value="dark" class="btn btn-small btn-transparent <%= dark? 'active' : '' %>">Dark</button>
            <button type="button" data-value="light" class="btn btn-small btn-transparent <%= light? 'active' : '' %>">Light</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar on the</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-small btn-transparent <%= onRight? '' : 'active' %>">Left</button>
            <button type="button" data-value="right" class="btn btn-small btn-transparent <%= onRight? 'active' : '' %>">Right</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-small btn-transparent <%= display? 'active' : '' %>">Show</button>
            <button type="button" data-value="false" class="btn btn-small btn-transparent <%= display? '' : 'active' %>">Hide</button>
        </div>
    </div>
</script>

<script type="text/template" id="sidebar-settings-template">
    <% auto = sidebarState == 'auto'%>
    <% if (auto) {%>
    <button type="button"
            data-value="icons"
            class="btn-icons btn btn-transparent btn-small">Icons</button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-small">Auto</button>
    <%} else {%>
    <button type="button"
            data-value="auto"
            class="btn btn-transparent btn-small">Auto</button>
    <% } %>
</script>

</body>
</html>