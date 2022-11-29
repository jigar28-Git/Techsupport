<?php	header("Content-Type: text/css");
		include('../include/config.inc.php');
		
		
$sql = 'SELECT `t_css` FROM `theme_master`
		INNER JOIN user_master on user_theme=t_id
		WHERE `user_id`="'.$_SESSION['user']['id'].'"';
		
$rs_theme = mysqli_query($db, $sql);
$row_theme = mysqli_fetch_assoc($rs_theme);
$theme_css = $row_theme['t_css'];
	
if(isset($theme_css) && $theme_css <> "")
{
	echo $theme_css;
} 
else {
/*** default theme style **/
echo '
	body, 
	#mws-container
	{
		background-image:url("../images/core/bg/paper.png");
	}
	
	#mws-sidebar, 
	#mws-sidebar-bg, 
	#mws-header, 
	.mws-panel .mws-panel-header, 
	#mws-login, 
	#mws-login .mws-login-lock, 
	.ui-accordion .ui-accordion-header, 
	.ui-tabs .ui-tabs-nav, 
	.ui-datepicker, 
	.fc-event-skin, 
	.ui-dialog .ui-dialog-titlebar, 
	.jGrowl .jGrowl-notification, .jGrowl .jGrowl-closer, 
	#mws-user-tools .mws-dropdown-menu .mws-dropdown-box, 
	#mws-user-tools .mws-dropdown-menu.open .mws-dropdown-trigger
	{
		background-color:#064966;
	}
	
	#mws-header
	{
		border-color:#c5d52b;
	}
	
	.mws-panel .mws-panel-header span, 
	#mws-navigation ul li.active a, 
	#mws-navigation ul li.active span, 
	#mws-user-tools #mws-username, 
	#mws-navigation ul li .mws-nav-tooltip, 
	#mws-user-tools #mws-user-info #mws-user-functions #mws-username, 
	.ui-dialog .ui-dialog-title, 
	.ui-state-default, 
	.ui-state-active, 
	.ui-state-hover, 
	.ui-state-focus, 
	.ui-state-default a, 
	.ui-state-active a, 
	.ui-state-hover a, 
	.ui-state-focus a
	{
		color:#c5d52b;
		text-shadow:0 0 6px rgba(197, 213, 42, 0.5);
	}
	
	#mws-searchbox .mws-search-submit, 
	.mws-panel .mws-panel-header .mws-collapse-button span, 
	.dataTables_wrapper .dataTables_paginate .paginate_disabled_previous, 
	.dataTables_wrapper .dataTables_paginate .paginate_enabled_previous, 
	.dataTables_wrapper .dataTables_paginate .paginate_disabled_next, 
	.dataTables_wrapper .dataTables_paginate .paginate_enabled_next, 
	.dataTables_wrapper .dataTables_paginate .paginate_active, 
	.mws-table tbody tr.odd:hover td, 
	.mws-table tbody tr.even:hover td, 
	.ui-slider-horizontal .ui-slider-range, 
	.ui-slider-vertical .ui-slider-range, 
	.ui-progressbar .ui-progressbar-value, 
	.ui-datepicker td.ui-datepicker-current-day, 
	.ui-datepicker .ui-datepicker-prev, 
	.ui-datepicker .ui-datepicker-next, 
	.ui-accordion-header .ui-accordion-header-icon, 
	.ui-dialog-titlebar-close
	{
		background-color:#c5d52b;
	}
';
}
?>