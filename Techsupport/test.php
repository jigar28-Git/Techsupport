<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="plugins/imgareaselect/css/imgareaselect-default.css" media="screen">
<link rel="stylesheet" type="text/css" href="plugins/jgrowl/jquery.jgrowl.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="jui/css/jquery.ui.timepicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/themer.css" media="screen">

<title>MWS Admin - Widgets</title>

</head>

<body>

	<!-- Themer (Remove if not needed) -->  
	<div id="mws-themer">
        <div id="mws-themer-content">
        	<div id="mws-themer-ribbon"></div>
            <div id="mws-themer-toggle">
                <i class="icon-bended-arrow-left"></i> 
                <i class="icon-bended-arrow-right"></i>
            </div>
        	<div id="mws-theme-presets-container" class="mws-themer-section">
	        	<label for="mws-theme-presets">Color Presets</label>
            </div>
            <div class="mws-themer-separator"></div>
        	<div id="mws-theme-pattern-container" class="mws-themer-section">
	        	<label for="mws-theme-patterns">Background</label>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <ul>
                    <li class="clearfix"><span>Base Color</span> <div id="mws-base-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Highlight Color</span> <div id="mws-highlight-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Color</span> <div id="mws-text-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Color</span> <div id="mws-textglow-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Opacity</span> <div id="mws-textglow-op"></div></li>
                </ul>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
	            <button class="btn btn-danger small" id="mws-themer-getcss">Get CSS</button>
            </div>
        </div>
        <div id="mws-themer-css-dialog">
        	<form class="mws-form">
            	<div class="mws-form-row">
		        	<div class="mws-form-item">
                    	<textarea cols="auto" rows="auto" readonly></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Themer End -->

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="images/mws-logo.png" alt="mws admin">
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	<div id="mws-user-notif" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>
                
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>
                
                <!-- Unred messages count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-messages">
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, John Doe
                    </div>
                    <ul>
                    	<li><a href="#">Profile</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li><a href="index.html">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">

            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>

        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li><a href="dashboard.html"><i class="icon-home"></i> Dashboard</a></li>
                    <li><a href="charts.html"><i class="icon-graph"></i> Charts</a></li>
                    <li><a href="calendar.html"><i class="icon-calendar"></i> Calendar</a></li>
                    <li><a href="files.html"><i class="icon-folder-closed"></i> File Manager</a></li>
                    <li><a href="table.html"><i class="icon-table"></i> Table</a></li>
                    <li>
                        <a href="#"><i class="icon-list"></i> Forms</a>
                        <ul>
                            <li><a href="form_layouts.html">Layouts</a></li>
                            <li><a href="form_elements.html">Elements</a></li>
                            <li><a href="form_wizard.html">Wizard</a></li>
                        </ul>
                    </li>
                    <li class="active"><a href="widgets.html"><i class="icon-cogs"></i> Widgets</a></li>
                    <li><a href="typography.html"><i class="icon-font"></i> Typography</a></li>
                    <li><a href="grids.html"><i class="icon-th"></i> Grids &amp; Panels</a></li>
                    <li><a href="gallery.html"><i class="icon-pictures"></i> Gallery</a></li>
                    <li><a href="error.html"><i class="icon-warning-sign"></i> Error Page</a></li>
                    <li>
                        <a href="icons.html">
                            <i class="icon-pacman"></i> 
                            Icons <span class="mws-nav-tooltip">2000+</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
            
            	<!-- Statistics Button Container -->
            	<div class="mws-stat-container clearfix">
                	
                    <!-- Statistic Item -->
                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-building"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<span class="mws-stat-title">Floors Climbed</span>
                            <span class="mws-stat-value">324</span>
                        </span>
                    </a>

                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-sport"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<span class="mws-stat-title">Calories Burned</span>
                            <span class="mws-stat-value down">74%</span>
                        </span>
                    </a>

                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-walk"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<span class="mws-stat-title">Kilometers Walked</span>
                            <span class="mws-stat-value">14</span>
                        </span>
                    </a>
                    
                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-bug"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<span class="mws-stat-title">Bugs Fixed</span>
                            <span class="mws-stat-value up">22%</span>
                        </span>
                    </a>
                    
                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-car"></span>

                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<span class="mws-stat-title">Cars Repaired</span>
                            <span class="mws-stat-value">77</span>
                        </span>
                    </a>
                </div>
                
                <!-- Panels Start -->
                
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-settings"></i> Sliders</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="widgets.html">
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">Default Slider</label>
                                	<div class="mws-form-item">
                                    	<div class="mws-slider"></div>
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">Range Slider</label>
                                	<div class="mws-form-item">
                                    	<div class="mws-range-slider"></div>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Tooltip Slider</label>
                                    <div class="mws-form-item">
                                        <div class="mws-tooltip-slider"></div>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Slider with Ticks</label>
                                    <div class="mws-form-item">
                                        <div class="mws-ticks-slider"></div>
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">Vertical Sliders</label>
                                	<div class="mws-form-item">
                                        <div id="eq" class="clearfix">
                                            <span>88</span>
                                            <span>77</span>
                                            <span>55</span>
                                            <span>33</span>
                                            <span>40</span>
                                            <span>45</span>
                                            <span>70</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>    	
                </div>
                
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-loading"></i> Progress Bar</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="widgets.html">
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">Default Progress Bar</label>
                                	<div class="mws-form-item">
                                    	<div class="mws-progressbar"></div>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Progress Bar With Value</label>
                                    <div class="mws-form-item">
                                        <div class="mws-progressbar-val"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>    	
                </div>
                
                <div class="mws-panel grid_4">
                	<div class="mws-panel-header">
                    	<span>jQuery-UI Buttons</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form">
                            <div class="mws-form-row">
                                <label class="mws-form-label">UI Buttons</label>
                                <div class="mws-form-item">
                                    <button class="mws-ui-button">A button element</button>
                                    <input type="submit" value="A submit button" class="mws-ui-button">
                                    <a href="#" class="mws-ui-button">An anchor</a>
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <label class="mws-form-label">Radio UI Buttons</label>
                                <div class="mws-form-item">
                                    <div id="mws-ui-button-radio">
                                        <input type="radio" id="radio1" name="radio"><label for="radio1">Choice 1</label>
                                        <input type="radio" id="radio2" name="radio" checked="checked"><label for="radio2">Choice 2</label>
                                        <input type="radio" id="radio3" name="radio"><label for="radio3">Choice 3</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <label class="mws-form-label">Checkbox UI Buttons</label>
                                <div class="mws-form-item">
                                    <div id="mws-ui-button-cb">
                                        <input type="checkbox" id="check1"><label for="check1">B</label>
                                        <input type="checkbox" id="check2"><label for="check2">I</label>
                                        <input type="checkbox" id="check3"><label for="check3">U</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <label class="mws-form-label">Icon UI Buttons</label>
                                <div class="mws-form-item">
                                    <div id="mws-ui-button-icon">
                                        <button>Button with icon only</button>
                                        <button>Button with icon on the left</button>
                                        <button>Button with two icons</button>
                                        <button>Button with two icons and no text</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mws-panel grid_4">
                    <div class="mws-panel-header">
                        <span>Default Buttons (Bootstrap)</span>
                    </div>
                    <div class="mws-panel-body">
                        <div class="mws-panel-content">
                            <div style="margin-bottom:16px;">
                                <p style="margin:0;">Small Buttons</p>
                                <div class="btn-toolbar">
                                    <button type="button" class="btn btn-success btn-small">Green</button>
                                    <button type="button" class="btn btn-danger btn-small">Red</button>
                                    <button type="button" class="btn btn-primary btn-small">Blue</button>
                                    <button type="button" class="btn  btn-small">Gray</button>
                                    <button type="button" class="btn btn-inverse btn-small">Black</button>
                                    <button type="button" class="btn btn-warning btn-small">Orange</button>
                                    <button type="button" class="btn btn-small" disabled="disabled">Disabled</button>
                                </div>
                            </div>
                            
                            <div style="margin-bottom:16px;">
                                <p style="margin:0;">Default Buttons</p>
                                <div class="btn-toolbar">
                                    <button type="button" class="btn btn-success">Green</button>
                                    <button type="button" class="btn btn-danger">Red</button>
                                    <button type="button" class="btn btn-primary">Blue</button>
                                    <button type="button" class="btn ">Gray</button>
                                    <button type="button" class="btn btn-inverse">Black</button>
                                    <button type="button" class="btn btn-warning">Orange</button>
                                    <button type="button" class="btn" disabled="disabled">Disabled</button>
                                </div>
                            </div>
                            
                            <div style="margin-bottom:16px;">
                                <p style="margin:0;">Large Buttons</p>
                                <div class="btn-toolbar">
                                    <button type="button" class="btn btn-success btn-large">Green</button>
                                    <button type="button" class="btn btn-danger btn-large">Red</button>
                                    <button type="button" class="btn btn-primary btn-large">Blue</button>
                                    <button type="button" class="btn  btn-large">Gray</button>
                                    <button type="button" class="btn btn-inverse btn-large">Black</button>
                                    <button type="button" class="btn btn-warning btn-large">Orange</button>
                                    <button type="button" class="btn btn-large" disabled="disabled">Disabled</button>
                                </div>
                            </div>
                            
                            <div style="margin-bottom:16px;">
                                <p style="margin:0;">With Icons</p>
                                <div class="btn-toolbar">
                                    <button type="button" class="btn btn-success"><i class="icon-cyclop"></i> Green</button>
                                    <button type="button" class="btn btn-danger"><i class="icon-pacman"></i> Red</button>
                                    <button type="button" class="btn btn-primary"><i class="icon-support"></i> Blue</button>
                                    <button type="button" class="btn"><i class="icon-road"></i> Gray</button>
                                    <button type="button" class="btn btn-inverse"><i class="icon-music"></i> Black</button>
                                    <button type="button" class="btn btn-warning"><i class="icon-search"></i> Orange</button>
                                    <button type="button" class="btn" disabled="disabled"><i class="icon-cogs"></i> Disabled</button>
                                </div>
                            </div>

                            <div style="margin-bottom:16px;">
                                <p style="margin:0;">Button Group</p>
                                <div class="btn-toolbar">
                                    <div class="btn-group">
                                        <button type="button" class="btn"><i class="icol-text-align-left"></i></button>
                                        <button type="button" class="btn"><i class="icol-text-align-center"></i></button>
                                        <button type="button" class="btn"><i class="icol-text-align-right"></i></button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn">Button</button>
                                        <button type="button" class="btn" disabled="disabled">Disabled</button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn"><i class="icon-fast-backward"></i></button>
                                        <button type="button" class="btn"><i class="icon-play"></i></button>
                                        <button type="button" class="btn"><i class="icon-fast-forward"></i></button>
                                        <button type="button" class="btn"><i class="icon-stop"></i></button>
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#">Search Music Online</a></li>
                                            <li><a href="#">Music News</a></li>
                                            <li><a href="#">Exit Media Player</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clear"></div>
                
                <div class="mws-panel grid_4">
                	<div class="mws-accordion">
                        <h3><a href="#">Section 1</a></h3>
                        <div>
                            <p>
                            Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                            ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                            amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                            odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                            </p>
                        </div>
                        <h3><a href="#">Section 2</a></h3>
                        <div>
                            <p>
                            Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                            purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                            velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                            suscipit faucibus urna.
                            </p>
                        </div>
                        <h3><a href="#">Section 3</a></h3>
                        <div>
                            <p>
                            Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                            Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                            ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                            lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                            </p>
                            <ul>
                                <li>List item one</li>
                                <li>List item two</li>
                                <li>List item three</li>
                            </ul>
                        </div>
                        <h3><a href="#">Section 4</a></h3>
                        <div>
                            <p>
                            Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                            et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                            faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                            mauris vel est.
                            </p>
                            <p>
                            Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                            inceptos himenaeos.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="mws-panel grid_4">
                    <div class="mws-tabs">

                        <ul>
                            <li><a href="#tab-1">Tab 1</a></li>
                            <li><a href="#tab-2">Tab 2</a></li>
                            <li><a href="#tab-3">Tab 3</a></li>
                        </ul>
                        
                        <div id="tab-1">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultrices tempus tortor eget malesuada. Nunc ac euismod nisi. Pellentesque interdum bibendum enim ut accumsan. Cras fermentum tincidunt aliquet. Fusce pretium bibendum justo, et tristique risus sagittis id. Vivamus posuere, velit sit amet blandit tincidunt, leo felis porttitor diam, a vulputate ante lectus sed ipsum. In consequat, orci quis auctor viverra, dolor nisl lacinia lectus, ac placerat sapien erat volutpat sapien. Aliquam vel purus augue, et ultrices ante. Vestibulum eget mi lacus. Suspendisse vel erat elit. Quisque nibh orci, auctor vitae consectetur ornare, vestibulum eget urna. Vivamus lacinia molestie urna non posuere. Nam ipsum dui, pulvinar tincidunt convallis eget, facilisis ut felis.</p>
                        </div>
                        
                        <div id="tab-2">
                            <p>Praesent eu mauris ac felis molestie dictum. Sed volutpat ullamcorper iaculis. Praesent sed accumsan massa. Donec molestie vulputate massa vitae viverra. Nulla vitae hendrerit urna. Ut sit amet lectus non nunc venenatis vehicula et ut justo. Phasellus varius quam eu felis feugiat non consequat magna fermentum. Pellentesque consequat risus non est aliquam eu consectetur dui laoreet. Aliquam turpis est, aliquam non pellentesque ac, volutpat id nisi.</p>
                        </div>
                        
                        <div id="tab-3">
                            <p>Suspendisse lacinia euismod ligula. Nullam sed est sem, nec sodales erat. Phasellus ipsum orci, scelerisque non faucibus ac, hendrerit ut massa. Praesent ornare justo non turpis convallis sit amet porta urna adipiscing. Donec ac neque non risus tristique commodo non et neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris tincidunt augue vitae risus lacinia sed tempor ligula dapibus. Proin et turpis lacus, eget convallis risus.</p>
                        </div>
                    </div>
                </div>
                
                <div class="clear"></div>
                
            	<div class="mws-panel grid_4">
                	<div class="mws-panel-header">
                    	<span><i class="icon-calendar"></i> Datetime Pickers</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="widgets.html">
                        	<div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Basic Datepicker</label>
                                    <div class="mws-form-item">
                                    	<input type="text" class="mws-datepicker large" readonly>
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Inline datepicker</label>
                                    <div class="mws-form-item">
                                    	<div class="mws-datepicker"></div>
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Datetime Picker</label>
                                    <div class="mws-form-item">
                                    	<input type="text" class="mws-dtpicker large" readonly>
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Time Picker</label>
                                    <div class="mws-form-item">
                                    	<input type="text" class="mws-tpicker large" readonly>
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Datepicker with Week</label>
                                    <div class="mws-form-item">
                                    	<input type="text" class="mws-datepicker-wk large" readonly>
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Daterange Picker</label>
                                    <div class="mws-form-item">
                                        <div class="mws-form-cols">
                                            <div class="mws-form-col-4-8">
                                                <div class="mws-form-item">
                                                    <input type="text" id="mws-datepicker-from" readonly>
                                                </div>
                                            </div>
                                            <div class="mws-form-col-4-8">
                                                <div class="mws-form-item">
                                                    <input type="text" id="mws-datepicker-to" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            	<div class="mws-panel grid_4">
                	<div class="mws-panel-header">
                    	<span><i class="icon-picture"></i> Image Cropper</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="widgets.html">
                        	<div class="mws-form-block">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Image</label>
                                    <div id="mws-crop-parent" class="mws-form-item">
                                        <img src="example/scottwills_squirrel.jpg" class="mws-crop-target" alt="Crop">
                                    </div>
								</div>
                                <div class="mws-form-row">
                                    <div class="mws-form-cols">
                                        <div class="mws-form-col-2-8">
                                            <label class="mws-form-label">X1</label>
                                            <div class="mws-form-item">
                                                <input type="text" id="crop_x1" readonly value="32">
                                            </div>
                                        </div>
                                        <div class="mws-form-col-2-8">
                                            <label class="mws-form-label">Y1</label>
                                            <div class="mws-form-item">
                                                <input type="text" id="crop_y1" readonly value="32">
                                            </div>
                                        </div>
                                        <div class="mws-form-col-2-8">
                                            <label class="mws-form-label">X2</label>
                                            <div class="mws-form-item">
                                                <input type="text" id="crop_x2" readonly value="132">
                                            </div>
                                        </div>
                                        <div class="mws-form-col-2-8">
                                            <label class="mws-form-label">Y2</label>
                                            <div class="mws-form-item">
                                                <input type="text" id="crop_y2" readonly value="132">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                            	<input type="submit" value="Crop" class="btn btn-success">
                            	<input type="reset" value="Reset" class="btn ">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="clear"></div>
                
            	<div class="mws-panel grid_4">
                	<div class="mws-panel-header">
                    	<span><i class="icon-warning-sign"></i> jQuery-UI Dialog</span>
                    </div>
                    <div class="mws-panel-body" style="text-align: center">
                    	<div class="mws-panel-content">
                        	<input type="button" id="mws-jui-dialog-btn" class="btn btn-danger" value="Show Dialog">
                        	<input type="button" id="mws-jui-dialog-mdl-btn" class="btn btn-primary" value="Show Modal Dialog">
                        	<input type="button" id="mws-form-dialog-mdl-btn" class="btn btn-success" value="Show Modal Form">
                            
                            <div id="mws-jui-dialog">
                        		<div class="mws-dialog-inner">
                            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nisi tellus, faucibus tristique faucibus sit amet, lacinia at velit. Proin pretium vulputate orci, nec luctus odio volutpat ac. Curabitur semper adipiscing tellus sed venenatis. Integer vitae diam dui. Ut ut quam ac ante eleifend aliquam. Cras tincidunt pulvinar sollicitudin. Nullam mattis justo nec nisl adipiscing ullamcorper. Curabitur fermentum egestas massa, eu dictum ligula accumsan id. Duis elit arcu, adipiscing vel consectetur ac, fermentum ac nisl. Quisque varius ipsum vitae mauris cursus eu tristique velit dapibus. Cras eu viverra neque.</p>
                                </div>
                            </div>
                            
                            <div id="mws-form-dialog">
                                <form id="mws-validate" class="mws-form" action="form_elements.html">
                                    <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                                    <div class="mws-form-inline">
                                        <div class="mws-form-row">
                                            <label class="mws-form-label">Required Validation</label>
                                            <div class="mws-form-item">
                                                <input type="text" name="reqField" class="required">
                                            </div>
                                        </div>
                                        <div class="mws-form-row">
                                            <label class="mws-form-label">Email Validation</label>
                                            <div class="mws-form-item">
                                                <input type="text" name="emailField" class="required email">
                                            </div>
                                        </div>
                                        <div class="mws-form-row">
                                            <label class="mws-form-label">URL Validation</label>
                                            <div class="mws-form-item">
                                                <input type="text" name="urlField" class="required url">
                                            </div>
                                        </div>
                                        <div class="mws-form-row">
                                            <label class="mws-form-label">Date Validation</label>
                                            <div class="mws-form-item">
                                                <input type="text" class="mws-datepicker required date" readonly>
                                            </div>
                                        </div>
                                        <div class="mws-form-row">
                                            <label class="mws-form-label">Select Box Validation</label>
                                            <div class="mws-form-item">
                                                <select class="required" name="selectBox">
                                                    <option></option>
                                                    <option>Option 1</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mws-form-row">
                                            <label class="mws-form-label">File Input Validation</label>
                                            <div class="mws-form-item">
                                                <input type="file" name="picture" class="required">
                                                <label for="picture" class="error" generated="true" style="display:none"></label>
                                            </div>
                                        </div>
                                        <div class="mws-form-row">
                                            <label class="mws-form-label">Spinner Validation</label>
                                            <div class="mws-form-item">
                                                <input type="text" id="s1" name="spinner" class="required mws-spinner" value="10.5">
                                                <label for="s1" class="error" generated="true" style="display:none"></label>
                                            </div>
                                        </div>
                                        <div class="mws-form-row">
                                            <label class="mws-form-label">Radiobutton Validation</label>
                                            <div class="mws-form-item">
                                                <ul class="mws-form-list">
                                                    <li><input id="gender_male" type="radio" name="gender" class="required"> <label for="gender_male">Male</label></li>
                                                    <li><input id="gender_female" type="radio" name="gender"> <label for="gender_female">Female</label></li>
                                                </ul>
                                                <label for="gender" class="error plain" generated="true" style="display:none"></label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>    	
                </div>
                
            	<div class="mws-panel grid_4">
                	<div class="mws-panel-header">
                    	<span><i class="icon-comments"></i> Growl Notifications</span>
                    </div>
                    <div class="mws-panel-body" style="text-align: center">
                    	<div class="mws-panel-content">
                        	<input type="button" id="mws-growl-btn" class="btn btn-primary" value="Basic Notification">
                        	<input type="button" id="mws-growl-btn-1" class="btn btn-danger" value="Sticky Notification">
                        	<input type="button" id="mws-growl-btn-2" class="btn btn-success" value="Notification with Header">
                        </div>
                    </div>    	
                </div>
                
            	<div class="mws-panel grid_4">
                	<div class="mws-panel-header">
                    	<span><i class="icon-comment"></i> Tooltips</span>
                    </div>
                    <div class="mws-panel-body" style="text-align: center">
                    	<div class="mws-panel-content">
                    	   <div rel="tooltip" data-placement="top" class="btn" value="Top" title="This is a tooltip">Top</div>
                    	   <div rel="tooltip" data-placement="right" class="btn" value="Right" title="This is a tooltip">Left</div>
                    	   <div rel="tooltip" data-placement="bottom" class="btn" value="Bottom" title="This is a tooltip">Right</div>
                    	   <div rel="tooltip" data-placement="left" class="btn" value="Left" title="This is a tooltip">Bottom</div>
                        </div>
                    </div>    	
                </div>
                <div class="mws-panel grid_4">
                    <div class="mws-panel-header">
                        <span><i class="icon-comment"></i> Popovers</span>
                    </div>
                    <div class="mws-panel-body" style="text-align: center">
                        <div class="mws-panel-content">
                            <div class="btn" rel="popover" data-trigger="hover" data-placement="top" data-content="Euphoria (semantically opposite of dysphoria) is medically recognized as a mental and emotional condition in which a person experiences intense feelings of well-being, elation, happiness, ecstasy, excitement, and joy." data-original-title="Euphoria">Top</div>
                            <div class="btn" rel="popover" data-trigger="hover" data-placement="left" data-content="Asthma is the common chronic inflammatory disease of the airways characterized by variable and recurring symptoms, reversible airflow obstruction, and bronchospasm." data-original-title="Asthma">Left</div>
                            <div class="btn" rel="popover" data-trigger="hover" data-placement="right" data-content="A wing is an appendage with a surface that produces lift for flight or propulsion through the atmosphere, or through another gaseous or liquid fluid. A wing is an airfoil, which has a streamlined cross-sectional shape producing a useful lift to drag ratio." data-original-title="Wing">Right</div>
                            <div class="btn" rel="popover" data-trigger="hover" data-placement="bottom" data-content="Silicones are inert, synthetic compounds with a variety of forms and uses. Typically heat-resistant and rubber-like, they are used in sealants, adhesives, lubricants, medical applications (e.g., breast implants), cookware, and insulation." data-original-title="Sillicone">Bottom</div>
                        </div>
                    </div>      
                </div>

                <div class="mws-panel grid_4">
                    <div class="mws-panel-header">
                        <span><i class="icon-cogs"></i> Toolbar (Top)</span>
                    </div>
                    <div class="mws-panel-toolbar">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <a href="#" class="btn"><i class="icol-accept"></i> Accept</a>
                                <a href="#" class="btn"><i class="icol-cross"></i> Reject</a>
                                <a href="#" class="btn"><i class="icol-printer"></i> Print</a>
                                <a href="#" class="btn"><i class="icol-arrow-refresh"></i> Renew</a>
                                <a href="#" class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#"><i class="icol-disconnect"></i> Disconnect From Server</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-submenu">
                                        <a href="#">More Options</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Contact Administrator</a></li>
                                            <li><a href="#">Destroy Table</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mws-panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nisi tellus, faucibus tristique faucibus sit amet, lacinia at velit. Proin pretium vulputate orci, nec luctus odio volutpat ac. Curabitur semper adipiscing tellus sed venenatis. Integer vitae diam dui. Ut ut quam ac ante eleifend aliquam. Cras tincidunt pulvinar sollicitudin. Nullam mattis justo nec nisl adipiscing ullamcorper. Curabitur fermentum egestas massa, eu dictum ligula accumsan id. Duis elit arcu, adipiscing vel consectetur ac, fermentum ac nisl. Quisque varius ipsum vitae mauris cursus eu tristique velit dapibus. Cras eu viverra neque.</p>
                    </div>      
                </div>
                
                <div class="mws-panel grid_4">
                    <div class="mws-panel-header">
                        <span><i class="icon-cogs"></i> Toolbar (Bottom)</span>
                    </div>
                    <div class="mws-panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nisi tellus, faucibus tristique faucibus sit amet, lacinia at velit. Proin pretium vulputate orci, nec luctus odio volutpat ac. Curabitur semper adipiscing tellus sed venenatis. Integer vitae diam dui. Ut ut quam ac ante eleifend aliquam. Cras tincidunt pulvinar sollicitudin. Nullam mattis justo nec nisl adipiscing ullamcorper. Curabitur fermentum egestas massa, eu dictum ligula accumsan id. Duis elit arcu, adipiscing vel consectetur ac, fermentum ac nisl. Quisque varius ipsum vitae mauris cursus eu tristique velit dapibus. Cras eu viverra neque.</p>
                    </div>
                    <div class="mws-panel-toolbar">
                        <div class="btn-toolbar">
                            <div class="btn-group dropup">
                                <a href="#" class="btn"><i class="icol-accept"></i> Accept</a>
                                <a href="#" class="btn"><i class="icol-cross"></i> Reject</a>
                                <a href="#" class="btn"><i class="icol-printer"></i> Print</a>
                                <a href="#" class="btn"><i class="icol-arrow-refresh"></i> Renew</a>
                                <a href="#" class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#"><i class="icol-disconnect"></i> Disconnect From Server</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-submenu">
                                        <a href="#">More Options</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Contact Administrator</a></li>
                                            <li><a href="#">Destroy Table</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.mousewheel.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="jui/jquery-ui.custom.min.js"></script>
    <script src="jui/js/jquery.ui.touch-punch.js"></script>
    <script src="jui/js/timepicker/jquery-ui-timepicker.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="plugins/imgareaselect/jquery.imgareaselect.min.js"></script>
    <script src="plugins/jgrowl/jquery.jgrowl-min.js"></script>
    <script src="plugins/validate/jquery.validate-min.js"></script>
    <script src="plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="js/demo/demo.widget.js"></script>

</body>
</html>
