<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="robots" content="noindex">
	<meta name="google" value="notranslate">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<title>Custom Login Pro</title>
	<style>
		body,html {
    		overflow: hidden;
    	}

		.clp-iframe-loader{
			display: block;
		    width: 100%;
		    height: 100%;
		    top: 0;
		    left: 0;
		    position: fixed;
		    background-size: 24px;
		    background-color: #F1F1F1;
		    background-image: url(data:image/gif;base64,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);
		    background-repeat: no-repeat;
		    background-position: center calc(50% - 12px);
		    background-position: center -webkit-calc(50% - 13px);
		    background-position: center -moz-calc(50% - 13px);
		    background-position: center -o-calc(50% - 13px);
		    z-index: 2147483647;
		    font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Helvetica, Arial, sans-serif !important;
		}

		body:not(.clp-custom-login-pro-loaded) #iframe{
			width: -webkit-calc(100% - 49px);
			width: -moz-calc(100% - 49px);
			width: -ms-calc(100% - 49px);
			width: -o-calc(100% - 49px);
			width: calc(100% - 49px);
			height: 100%;
			position: fixed;
			top: 0;
			left: 0;
			border-width: 0;
			z-index: 99;
			background: #FFF;
			margin-left:0px;
			padding-left: 49px;
		}

		.loading-files{
		    width: 130px;
		    height: 24px;
		    top: 50%;
		    color:#7a7a7a;
		    text-align:center;
		    font-size:12px;
		    left: 50%;
		    position: fixed;
		    margin-left: -65px;
		    margin-top: 13px;
		    font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Helvetica, Arial, sans-serif !important;
		    font-weight:600;
		}
	</style>
	<link rel="icon" type="image/ico" href="<?php echo esc_url(plugins_url( 'img/favicon.png' , __FILE__ )); ?>"/>
	<script type="text/javascript">

	// Vars
	var protocol = "<?php if(is_ssl()){echo 'https';}else{echo 'http';} ?>";
	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	var siteurl = "<?php echo get_site_url(); ?>";

	</script>
</head><?php

	// Default Classes
	$classes[] = 'clp-custom-login-pro clp-metric-disable clp-body-selector-mode-active';

	// Browser
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'CriOS') !== false) {
	    $classes[] = 'browser_chrome';
	}

	// Trim classes
	$classesReturn = '';
	foreach ($classes as $class){
		$classesReturn .= ' '.$class;
	}

?>
<body class="<?php echo trim($classesReturn); ?>">

	<?php

		// Rand
    	$rand = rand(136900, 963100);

		$frame = add_query_arg(array('custom_login_pro_frame' => '','clp_rand' => $rand), esc_url(wp_login_url()));

		$protocol = is_ssl() ? 'https' : 'http';

		$frameNew = esc_url($frame,array($protocol));

		if(empty($frameNew) == true && strstr($frame,'://') == true){
			$frameNew = explode("://",$frame);
			$frameNew = $protocol.'://'.$frameNew[1];
		}elseif(empty($frameNew) == true && strstr($frame,'://') == false){
			$frameNew = $protocol.'://'.$frame;
		}

		// Cleans the links
		$frameNew = str_replace("&#038;", "&amp;", $frameNew);
		$frameNew = str_replace("&#38;", "&amp;", $frameNew);
		$frameNew = str_replace("#038;", "&amp;", $frameNew);

	?>
	<iframe id="iframe" class="custom_login_pro_iframe" data-href="<?php echo $frameNew; ?>" tabindex="-1"></iframe>

	<div id="visual-css-view">
		<div class="css-view-top">
			<input id="visual-rule-filter" placeholder="filter.." type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" />
			<div class="visual-manager-close"></div>
		</div>
		<div id="visual-css-content"></div>
	</div>

	<span class='dashicons dashicons-admin-collapse clp-panel-show'></span>

	<style id="clp-animate-helper"></style>

	<div class="clp-animate-manager">

		<h3 class="animation-manager-empty">There is no animation on this page.<small>Select an element to add animation</small>.</h3>

		<div class="clp-anim-list-menu"><ul></ul></div>

		<div class="clp-anim-control-overflow">
			<div class="clp-anim-controls">
				<div class="clp-anim-control-left">
					<div class="clp-anim-manager-control">
						<a class="clp-anim-control-btn clp-anim-control-close" data-toggle='tooltipAnim' data-placement='top' title='Close'><span class="dashicons dashicons-no-alt"></span></a>
						<a class="clp-anim-control-btn clp-anim-control-pause" data-toggle='tooltipAnim' data-placement='top' title='Stop'><span class="dashicons dashicons-controls-pause"></span></a>
						<a class="clp-anim-control-btn clp-anim-control-play" data-toggle='tooltipAnim' data-placement='top' title='Play'><span class="dashicons dashicons-controls-play"></span></a>
						<span class="clp-anim-current-duration"><span class="clp-counter-min">00</span>:<span class="clp-counter-second">00</span>.<span class="clp-counter-ms">00</span></span>
					</div>
				</div>
				<div class="clp-anim-control-right">
					<div class="clp-anim-playing-border"></div>
					<div class="clp-anim-metric">
					</div>
				</div>
				<div class="clp-clear"></div>
			</div>
		</div>

		<div class="clp-animate-manager-inner">

			<div class="clp-anim-left-part-column"></div>
			<div class="clp-anim-right-part-column">
				<div class="clp-anim-playing-over"></div>
				<div class="clp-anim-playing-border"></div>
			</div>
			<div class="clp-clear"></div>

		</div>

	</div>

	<div class="responsive-right-handle"></div>

	<div class="responsive-size-text default-responsive-text">Customizing for <span class='device-size'></span>px and <span class='media-control' data-code='max-width'>below</span> screen sizes. <span class="device-name"></span></div>
	<div class="responsive-size-text">Customizing <span class='property-size-text'></span>.</div>

	<?php clp_custom_login_pro_bar(); ?>
	
	<div class="top-area-btn-group">
		<div class="top-area-btn cursor-main-btn clp-selector-mode active"><span class="no-aiming-icon"></span><span class="aiming-icon"></span><span class="sharp-selector-icon"></span></div>
		<div data-toggle='tooltip-bar' data-placement='right' title='Find An Element <span class="clp-s-shortcut">(F)</span><span class="clp-tooltip-shortcut">Find elements by CSS selector.</span>' class="top-area-btn clp-search-btn active"><span class="search-selector-icon"></span></div>
		<div data-toggle='tooltip-bar' data-placement='right' title='CSS Editor <span class="clp-s-shortcut">(É)</span><span class="clp-tooltip-shortcut">Edit style codes.</span>' class="top-area-btn css-editor-btn"><span class="css-editor-icon"></span></div>
		<div data-toggle='tooltip-bar' data-placement='right' title='Responsive Mode <span class="clp-s-shortcut">(R)</span><span class="clp-tooltip-shortcut">Edit for a specific screen size.</span>' class="top-area-btn clp-responsive-btn active"><span class="responsive-icon"></span></div>
		<div data-toggle='tooltip-bar' data-placement='right' title='Measuring Tool <span class="clp-s-shortcut">(M)</span><span class="clp-tooltip-shortcut">Measure elements.</span>' class="top-area-btn clp-ruler-btn"><span class="ruler-icon"></span></div>
		<div data-toggle='tooltip-bar' data-placement='right' title='Wireframe <span class="clp-s-shortcut">(W)</span><span class="clp-tooltip-shortcut">Work on the layout easily.</span>' class="top-area-btn clp-wireframe-btn"><span class="wireframe-icon"></span></div>
		<div data-toggle='tooltip-bar' data-placement='right' title='Design Information <span class="clp-s-shortcut">(D)</span><span class="clp-tooltip-shortcut">Typography, sizes and others.</span>' class="top-area-btn info-btn"><span class="design-information-icon"></span></div>

		<div data-toggle='tooltip-bar' data-placement='right' title='Animation Manager <span class="clp-tooltip-shortcut">Manage animations visually.</span>' class="top-area-btn animation-manager-btn"><span class="animation-manager-icon"></span></div>

		<div data-toggle='tooltip-bar' data-placement='right' title='Undo <span class="clp-tooltip-shortcut">CTRL + Z</span>' class="top-area-btn top-area-center undo-btn"><span class="undo-icon"></span></div>
		<div data-toggle='tooltip-bar' data-placement='right' title='Redo <span class="clp-tooltip-shortcut">CTRL + Y</span>' class="top-area-btn redo-btn"><span class="redo-icon"></span></div>

		<div class="left-menu-sublist inspector-sublist">
			<ul>
				<li class="inspector-sublist-default active" data-cursor-action="default">Flexible Inspector</li>
				<li class="inspector-sublist-single" data-cursor-action="single">Single Inspector</li>
			</ul>
		</div>
	</div>

	<div class="clp-right-panel-placeholder"></div>
	<div class="breakpoint-bar"></div>
	<div class="metric"></div>

	<div class="metric-left-border"></div>
	<div class="metric-top-border"></div>
	<div class="metric-top-tooltip">Y: <span></span> px</div>
	<div class="metric-left-tooltip">X: <span></span> px</div>

	<div class="search-box">
		<div class="search-close-link"><span class="dashicons dashicons-arrow-left-alt2"></span></div>
		<div class="search-box-topbar">Find By CSS Selector</div>
		<div class="search-input-area">
			<input id="search" type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" placeholder="Search by class, ID or HTML tag." />
			<div class="clp-clear"></div>
		</div>
		<div class="search-box-inner">
			<ul class="search-live-result"></ul>
		</div>
	</div>

	<div class="advanced-info-box">
		<div class="advanced-close-link"><span class="dashicons dashicons-arrow-left-alt2"></span></div>
		<div class="advanced-info-box-menu">
			<span class="advance-info-btns element-btn">Element</span> <span class="advance-info-btns typography-btn">Typography</span> <span class="advance-info-btns advanced-btn">Advanced</span>
		</div>
		<div class="advanced-info-box-inner">

			<div class="typography-content advanced-info-box-content">

				<h3>Color Scheme</h3>
				<div class="info-color-scheme-list">
				</div>

				<h3 class="no-top">Basic</h3>
				<ul class="info-basic-typography-list">
				</ul>

				<h3>Font Families</h3>
				<ul class="info-font-family-list">
				</ul>

				<h3 id="animations-heading">Animations</h3>
				<ul class="info-animation-list">
				</ul>

			</div>

			<div class="element-content advanced-info-box-content">

				<div class="info-element-selected-section">

					<div class="info-element-selector-section">
						<h3 class="no-top">CSS Selector</h3>
						<ul class="info-element-selector-list">
						</ul>
					</div>
					
					<h3>General</h3>
					<ul class="info-element-general">
					</ul>

					<div class="info-element-classes-section">
						<h3>Classes</h3>
						<ul class="info-element-class-list">
						</ul>
					</div>

					<h3>Box Model</h3>
					<div id="box-element-view">

						<div class="box-element-view-inner">

							<div class="box-view-section">
								<i class="model-view-margin"><span>margin</span></i>
								<i class="model-view-margin"></i>
								<i class="model-view-margin"></i>
								<i class="model-view-margin model-margin-top"></i>
								<i class="model-view-margin"></i>
								<i class="model-view-margin"></i>
								<i class="model-view-margin"></i>
							</div>

							<div class="box-view-section">
								<i class="model-view-margin"></i>
								<i class="model-view-border"><span>border</span></i>
								<i class="model-view-border"></i>
								<i class="model-view-border model-border-top"></i>
								<i class="model-view-border"></i>
								<i class="model-view-border"></i>
								<i class="model-view-margin"></i>
							</div>

							<div class="box-view-section">
								<i class="model-view-margin"></i>
								<i class="model-view-border"></i>
								<i class="model-view-padding"><span>padding</span></i>
								<i class="model-view-padding model-padding-top"></i>
								<i class="model-view-padding"></i>
								<i class="model-view-border"></i>
								<i class="model-view-margin"></i>
							</div>

							<div class="box-view-section">
								<i class="model-view-margin model-margin-left"></i>
								<i class="model-view-border model-border-left"></i>
								<i class="model-view-padding model-padding-left"></i>
								<i class="model-view-size model-size"></i>
								<i class="model-view-padding model-padding-right"></i>
								<i class="model-view-border model-border-right"></i>
								<i class="model-view-margin model-margin-right"></i>
							</div>

							<div class="box-view-section">
								<i class="model-view-margin"></i>
								<i class="model-view-border"></i>
								<i class="model-view-padding"></i>
								<i class="model-view-padding model-padding-bottom"></i>
								<i class="model-view-padding"></i>
								<i class="model-view-border"></i>
								<i class="model-view-margin"></i>
							</div>

							<div class="box-view-section">
								<i class="model-view-margin"></i>
								<i class="model-view-border"></i>
								<i class="model-view-border"></i>
								<i class="model-view-border model-border-bottom"></i>
								<i class="model-view-border"></i>
								<i class="model-view-border"></i>
								<i class="model-view-margin"></i>
							</div>

							<div class="box-view-section">
								<i class="model-view-margin"></i>
								<i class="model-view-margin"></i>
								<i class="model-view-margin"></i>
								<i class="model-view-margin model-margin-bottom"></i>
								<i class="model-view-margin"></i>
								<i class="model-view-margin"></i>
								<i class="model-view-margin"></i>
							</div>

						</div>

					</div>

					<h3>DOM Code</h3>
					<textarea disabled="disabled" class="info-element-dom"></textarea>

				</div>

				<p class="info-no-element-selected">Please select an element to show information.</p>

			</div>

			<div class="advanced-content advanced-info-box-content">
				<h3>Dimensions</h3>
				<ul class="info-basic-size-list">
				</ul>
				<h3>All Ids</h3>
				<ul class="info-global-id-list">
				</ul>
				<h3>All Classes</h3>
				<ul class="info-global-class-list">
				</ul>
			</div>

		</div>
	</div>

	<div class="clp-iframe-loader">
		<div class="loading-files"></div>
	</div>

	<div class="unvalid-css-cover"></div>

	<div id="image_uploader">
		<iframe data-url="<?php echo admin_url('media-upload.php?TB_iframe=true&reauth=1&clp_uploader=1'); ?>"></iframe>
	</div>
	<div id="image_uploader_background"></div>

	<div id="selector-editor-box">
		<p class="selector-editor-notice">Press Enter to select, ESC cancel.</p>
		<input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type='text' class='clp-selector-editor' placeholder='Search by class, ID or HTML tag.' id='clp-selector-editor' />
		<ul id="autocomplate-selector-list"><li>a</li></ul>
	</div>
	<div id="selector-editor-background"></div>

	<div id="leftAreaEditor">
		<div id="cssData"></div>
		<div id="cssEditorBar">
			<span class="dashicons clp-css-close-btn dashicons-no-alt" title='Hide (ESC)'></span>
			<span class="editor-tabs single-tab" title="The styles applied to the current page." data-type-value="single">Single<i></i></span>
			<span class="editor-tabs template-tab" title="The styles applied to all pages of the current post type." data-type-value="template">Custom CSS<i></i></span>
			<span class="editor-tabs global-tab" title="The styles applied to the entire website." data-type-value="global">Global<i></i></span>
			<div class="editor-tab-border"></div>
		</div>
		<div class="unvalid-css-error">Error: <span></span></div>
	</div>

	<div class="anim-bar">
		<div class="anim-bar-title">
			<div class="anim-title">Animation Generator</div>
			<div class="clp-anim-save clp-anim-btn" data-toggle="tooltipAnimGenerator" data-placement="top" title="Done"><span class="dashicons dashicons-flag"></span></div>
			<div class="clp-anim-play clp-anim-btn" data-toggle="tooltipAnimGenerator" data-placement="top" title="Play"><span class="dashicons dashicons-controls-play"></span></div>
			<div class="clp-anim-cancel clp-anim-btn" data-toggle="tooltipAnimGenerator" data-placement="top" title="Cancel"><span class="dashicons dashicons-no-alt"></span></div>
			<div class="clp-clear"></div>
		</div>
		<div class="scenes">
			<div class="scene scene-active scene-1" data-scene="scene-1"><p><span class="scene-info">i</span>Scene 1 <span><input autocomplete="off" type='text' value='0' /></span></p></div>
			<div class="scene scene-2 scene-no-click-yet" data-scene="scene-2"><p><span class="scene-info">i</span>Scene 2 <span><input type='text' autocomplete="off" value='100' /></span></p></div>
			<div class="scene scene-add"><span class="dashicons dashicons-plus"></span></div>
			<div class="clp-clear"></div>
		</div>
	</div>

	<script src='<?php echo includes_url( 'js/jquery/jquery.js?ver='.CLP_VERSION.'' , __FILE__ ); ?>'></script>

	<script>
	(function($){

		// Reload the page after browser undo & undo
		if (!!window.performance && window.performance.navigation.type === 2) {
            clp_load_note("Editor Reloading..");
            window.location.reload();
        }

		// All plugin element list
        window.plugin_classes_list = 'custom-login-pro-canvas|clp-css-editor-disable|custom-login-pro-focus-canvas|custom-login-pro-extra-canvas|custom-login-pro-other-canvas|clp-high-performance|clp-no-wireframe|clp-element-not-visible|clp-iframe-placeholder|clp-element-picker-active|clp-data-updated|clp-animate-data|clp-inline-data|clp-animating|clp-scene-1|clp-sharp-selector-mode-active|clp-scene-2|clp-scene-3|clp-scene-4|clp-scene-5|clp-scene-6|clp-anim-creator|data-anim-scene|clp-animate-test-playing|ui-draggable-handle|clp-custom-login-pro-demo-mode|clp-custom-login-pro-loaded|clp-element-resized|resize-time-delay|clp_onscreen|clp_hover|clp_click|clp_focus|clp-recent-hover-element|clp-selected-others|clp-multiple-selected|clp-demo-link|clp-live-editor-link|clp-custom-login-pro|clp-content-selected|clp-hide-borders-now|ui-draggable|clp-selector-editor-active|clp-responsive-device-mode|clp-metric-disable|clp-css-editor-active|clp-clean-look|clp-has-transform|clp-will-selected|clp-selected|clp-element-resizing|clp-element-resizing-width-right|clp-element-resizing-height-bottom|context-menu-active|clp-selectors-hide|clp-control-key-down|clp-selected-others-multiple-box|clp-iframe-mouseleave|clp-selected-boxed-top|clp-selected-boxed-bottom|clp-selected-boxed-left|clp-selected-boxed-right|clp-selected-boxed-margin-left|clp-zero-margin-w|clp-animate-manager-active|clp-wireframe-mode|clp-selector-hover|clp-size-handle|ypdw|ypdh|clp-body-selector-mode-active|clp-selected-boxed-margin-top|clp-selected-boxed-margin-bottom|clp-selected-boxed-margin-right|clp-selected-boxed-padding-left|clp-selected-boxed-padding-top|clp-selected-boxed-padding-bottom|clp-selected-boxed-padding-right|clp-selected-tooltip|clp-edit-tooltip|clp-edit-menu|clp-resorted|clp-full-width-selected|clp-zero-margin-h|clp-tooltip-small';

        // Replace all parent ways
        for(var s = 0; s < 51; s++){
        	window.plugin_classes_list += "|clp-parent-way-" + s;
        }

        window.selectorComments = {};

        // Any visible element.
        window.simple_not_selector = 'head, script, style, link, meta, title, noscript, svg, canvas, br';

        // basic simple.
        window.basic_not_selector = '*:not(script):not(style):not(link):not(meta):not(title):not(noscript):not(head):not(circle):not(rect):not(polygon):not(defs):not(linearGradient):not(stop):not(ellipse):not(text):not(canvas):not(line):not(polyline):not(path):not(g):not(tspan)';
        
		// Variable
		window.loadStatus = false;

		// Document Load Note:
		clp_load_note("Editor loading..");

		// Document ready.
		$(document).ready(function(){

			// Load iframe.
	        ($('#iframe')[0].contentWindow || $('#iframe')[0].contentDocument).location.replace($("#iframe").attr("data-href"));

	        // Frame load note:
	        clp_load_note("Reading styles..");

	        // Frame ready
	        $('#iframe').on('load', function(){

	        	var iframe = $($('#iframe').contents().get(0));
            	var iframeHead = iframe.find("head");
            	var iframeBody = iframe.find("body");
            	var body = $(document.body).add(iframeBody);

            	// To close auto recommend popup
            	iframe.find("input").hide().blur();

            	// Demo message notice
            	iframe.find("#login > h1").after('<p class="message register">Demo Message to Design.</p>');

            	// Get iframe in JS
            	var iframejs = document.getElementById('iframe');
            	var iframeContentWindow = (iframejs.contentWindow || iframejs.contentDocument);
            	var iframeURL = iframeContentWindow.location.href;

            	// Moving styles to iframe
				var editorData = $("#custom-login-pro-iframe-data");
				iframeHead.append(editorData.html().replace(/(^\<\!\-\-|\-\-\>$)/g, ""));
				editorData.remove();
				iframeBody.append('<div id="clp-animate-data">'+iframeHead.find("#clp-animate-data").html()+'</div>');
				iframeHead.find("#clp-animate-data").remove();


		        // Adding clp-animating class to animating elements.
		        iframe.find(window.basic_not_selector).on('animationstart webkitAnimationStart oanimationstart MSAnimationStart',function(){

		        		// Stop if any yp animation tool works
		        		if(body.hasClass("clp-anim-creator") || body.hasClass("clp-animate-manager-active")){
		        			return false;
		        		}

	                	var element = $(this);

	                	// Add an animating class.
	                    if(!element.hasClass("clp-animating")){
	                        element.addClass("clp-animating");
	                       }

	                    // Set outline selected style if selected element has animating.
	                    if(element.hasClass("clp-selected") && body.hasClass("clp-has-transform") == false && body.hasClass("clp-content-selected") == true){
							body.addClass("clp-has-transform");
	                    }

	                    return false;

	            });

	        	// Loading Styles
				var styles = [
					"<?php echo esc_url(includes_url( 'css/dashicons.min.css' , __FILE__ )); ?>",
					"<?php $prtcl = is_ssl() ? 'https' : 'http'; echo $prtcl; ?>://fonts.googleapis.com/css?family=Roboto+Mono|Roboto:400,500",
					"<?php echo esc_url(plugins_url( 'css/custom-login-pro.css?ver='.CLP_VERSION.'' , __FILE__ )); ?>"
				];

				// Load styles in iframe
				iframeHead.append("<link rel='stylesheet' id='custom-login-pro-frame'  href='<?php echo plugins_url('css/frame.css', __FILE__); ?>' type='text/css' media='all' />");
				iframeHead.append("<link rel='stylesheet' id='custom-login-pro-animate'  href='<?php echo plugins_url('css/animate.css', __FILE__); ?>' type='text/css' media='all' />");

				// Loading.
				for(var i = 0; i < styles.length; i++){
					clp_load_css(styles[i]);
				}

				// let the user feel as that loads quickly.
				setTimeout(function(){
					clp_load_note("Analyzes the page..");
				},1600);

				setTimeout(function(){
					clp_load_note("Playing with codes..");
				},3200);

				setTimeout(function(){
					clp_load_note("Almost ready..");
				},6400);

				// Ace Code Editor Base.
				window.aceEditorBase = "<?php echo (plugins_url( 'ace/' , __FILE__ )); ?>";

				var scripts   = [
					"<?php echo includes_url( 'js/jquery/ui/core.min.js' , __FILE__ ); ?>",
					"<?php echo includes_url( 'js/jquery/ui/widget.min.js' , __FILE__ ); ?>",
					"<?php echo includes_url( 'js/jquery/ui/mouse.min.js' , __FILE__ ); ?>",
					"<?php echo includes_url( 'js/jquery/ui/slider.min.js' , __FILE__ ); ?>",
					"<?php echo includes_url( 'js/jquery/ui/draggable.min.js' , __FILE__ ); ?>",
					"<?php echo includes_url( 'js/jquery/ui/resizable.min.js' , __FILE__ ); ?>",
					"<?php echo includes_url( 'js/jquery/ui/menu.min.js' , __FILE__ ); ?>",
					"<?php echo includes_url( 'js/jquery/ui/autocomplete.min.js' , __FILE__ ); ?>",
					"<?php echo plugins_url( 'ace/ace.js' , __FILE__ ); ?>",
					"<?php echo plugins_url( 'ace/ext-language_tools.js' , __FILE__ ); ?>",
					"<?php echo plugins_url( 'js/custom-login-pro.js?ver='.CLP_VERSION.'' , __FILE__ ); ?>"
				];

				//setup object to store results of AJAX requests
				var responses = {};

				var i = 0;
				function eval_scripts_with_delay() {

					// 200ms delay for each script
					setTimeout(function () {

					   	// Eval
						eval(responses[scripts[i]]);

						// Count
						i++;

						// Continue
						if (i < scripts.length) {
							eval_scripts_with_delay();
						}

					}, 200);

				}

				//create function that evaluates each response in order
				function clp_eval_scripts() {

					// Loop with delay
				    eval_scripts_with_delay();

				    // Start the editor, loading stylesheets while user start customization.
				    setTimeout(function(){
				    	clp_start_editor();
					}, scripts.length * 200);

				}


				// Stop load and call editor function.
		        function clp_start_editor(){

		            // Ready!:
		            clp_load_note("Just a sec!");

		            iframe.find("input").show().blur();

		            // Set true.
		            window.loadStatus = true;

		        }


				$.each(scripts, function (index, value) {

					$.ajax({

					    url      : scripts[index],

					    //force the dataType to be "text" rather than "script"
					    dataType : 'text',

					    success  : function (textScript) {

					        //add the response to the "responses" object
					        responses[value] = textScript;

					        //check if the "responses" object has the same length as the "scripts" array,
					        //if so then evaluate the scripts
					        if (Object.keys(responses).length === scripts.length) {
					            clp_eval_scripts();
					        }

					    },

					    error : function (jqXHR, textStatus, errorThrown){
					        alert('An error occurred while loading.');
					    }

					});

				}); // frame ready

			}); // Document ready.

		});
	
	// CSS Loader
	function clp_load_css(link){
		$('<link>').appendTo('head').attr({type: 'text/css',rel: 'stylesheet',href: link});
	}

	// Update loading notes.
	function clp_load_note(text){
		if(window.loadStatus == false){
			$(".loading-files").html(text);
		}
	}

	})(jQuery);
	</script>

	<?php clp_editor_styles(); ?>
	</body>
</html>