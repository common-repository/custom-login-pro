<?php
/*
Plugin Name: Custom Login Pro
Plugin URI: https://waspthemes.com
Description: The most advanced Login page customizer. Customize login page in real-time without coding.
Version: 1.0.3
Author: WaspThemes
Author URI: https://www.waspthemes.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


/* ---------------------------------------------------- */
/* Basic 												*/
/* ---------------------------------------------------- */
if (!defined('ABSPATH')) {
    die('-1');
}



/* ---------------------------------------------------- */
/* Define 												*/
/* ---------------------------------------------------- */
define('CLP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CLP_PLUGIN_URL', plugin_dir_url(__FILE__));
define('CLP_VERSION', "1.0.3");



/* ---------------------------------------------------- */
/* Register CustomLoginPro Panel                       */
/* ---------------------------------------------------- */
function clp_custom_login_pro_bar() {

    // Get protocol
    $protocol = is_ssl() ? 'https' : 'http';

    // Page Link
    $href = esc_url(wp_login_url());

    // YP Rand, Not must
    $href = add_query_arg(array('clp_rand' => rand(136900, 963100)), $href);
    
    echo "<div class='clp-select-bar clp-disable-cancel'>
        <div class='clp-editor-top'>
            
            <a href='".$href."' class='wf-close-btn-link' tabindex='-1'><span data-toggle='tooltip' data-placement='left' title='Close Editor' class='clp-close-btn'></span></a>

            <a class='clp-button clp-save-btn clp-disabled'>Saved</a>

            <a data-toggle='tooltipTopBottom' data-placement='bottom' title='Review Changes' class='clp-button-manage'></a>

            <a data-toggle='tooltipTopBottom' data-placement='bottom' title='' class='live-reset' data-original-title='Reset Styles'></a>
                
            <div class='clp-clear'></div>

        </div>";

        echo "<div class='clp-editor-panel'>";

        echo "<div class='clp-customizing-section'>
                <div class='clp-customizing-inner'>
                <a id='clp-current-page' title='WordPress Login Page'>WordPress Login Page</a>
                <div class='clp-clear'></div>
                <div id='customizing-mode' class='clp-type-menu-link'>custom.css <span class='live-bayt'>(empty)</span></div>
                <div id='customizing-type-list'><ul>".clp_customizing_options()."</ul></div>
                </div>
        </div>";        
        
        // Options
        include( CLP_PLUGIN_DIR . 'settings.php' );

        echo "<div class='clp-panel-no-selection'><div class='starter-notice'><div class='clp-hand'></div><div class='clp-hand-after'></div>Click on any element that you want to customize.</div></div>";
        
        echo "<div class='clp-panel-footer'>
            <h3>CUSTOM LOGIN PRO / V ".CLP_VERSION."</h3>
        </div>";

        echo "</div>"; // Editor panel
        
    echo "</div>";
    
}


/* ---------------------------------------------------- */
/* Get ID of rule                                       */
/* ---------------------------------------------------- */
function clp_css_id($css){

    // No webkit
    $css = str_replace("-webkit-", "", $css);

    // Update transfrom parts
    if(strrpos($css, "-transform") !== false && $css != 'text-transform'){
        $css = 'transform';
    }

    // Update filter parts
    if(strrpos($css, "-filter") !== false){
        $css = 'filter';
    }

    // Update filter parts
    if(strrpos($css, "box-shadow-") !== false){
        $css = 'box-shadow';
    }

    // Return
    return $css;

}



/* ---------------------------------------------------- */
/* Get Font Families                                    */
/* ---------------------------------------------------- */
function clp_load_fonts() {
    $css = clp_login_styles(true);
    clp_get_font_families($css);
}



/* ---------------------------------------------------- */
/* Getting font Families By CSS OUTPUT					*/
/* ---------------------------------------------------- */
function clp_get_font_families($css) {
    
    $protocol = is_ssl() ? 'https' : 'http';
    
    preg_match_all('/font-family:(.*?);/', $css, $r);
    
    foreach ($r['1'] as &$k) {
        $k = clp_font_name($k);
    }
    
    foreach (array_unique($r['1']) as $family) {
        
        $id = str_replace("+", "-", strtolower($family));
        
        $id = str_replace("\\", "", $id);
        
        if ($id == 'arial' || $id == 'helvetica' || $id == 'georgia' || $id == 'serif' || $id == 'helvetica-neue' || $id == 'times-new-roman' || $id == 'times' || $id == 'sans-serif' || $id == 'arial-black' || $id == 'gadget' || $id == 'impact' || $id == 'charcoal' || $id == 'tahoma' || $id == 'geneva' || $id == 'verdana' || $id == 'inherit') {
            return false;
        }
        
        if ($id == '' || $id == ' ') {
            return false;
        }
        
        wp_enqueue_style($id, esc_url('' . $protocol . '://fonts.googleapis.com/css?family=' . $family . ':300,300italic,400,400italic,500,500italic,600,600italic,700,700italic'));
        
    }
    
}



/* ---------------------------------------------------- */
/* Finding Font Names From CSS data     				*/
/* ---------------------------------------------------- */
function clp_font_name($a) {
    
    $a = str_replace(array(
        
        "font-family:",
        '"',
        "'",
        " ",
        "+!important",
        "!important"
        
    ), array(
        
        "",
        "",
        "",
        "+",
        "",
        ""
        
    ), $a);
    
    if (strstr($a, ",")) {
        $array = explode(",", $a);
        return $array[0];
    } else {
        return $a;
    }
    
}


/* ---------------------------------------------------- */
/* Adding Link To Admin Appearance Menu					*/
/* ---------------------------------------------------- */
function clp_menu() {
    add_options_page('Custom Login Pro', 'Custom Login Pro', 'edit_theme_options', 'custom-login-pro', 'clp_menu_function', 999);
}


/*
/* ---------------------------------------------------- */
/* Appearance page Loading And Location                 */
/* ---------------------------------------------------- */
function clp_menu_function() {
    
}

add_action('admin_menu', 'clp_menu');


/* ---------------------------------------------------- */
/* Appearance page Loading And Location                 */
/* ---------------------------------------------------- */
function clp_admin_headr() {

    if(!isset($_GET['page'])){
        return false;
    }

    if($_GET['page'] != 'custom-login-pro'){
        return false;
    }

    // Redirect
    wp_safe_redirect(admin_url('admin.php?page=clp-editor'));
    
}

add_action('admin_init', 'clp_admin_headr');


/* ---------------------------------------------------- */
/* Helper tool to print login styles                    */
/* ---------------------------------------------------- */
/* CSS codes, library.js, animate.css, custom-anims     */
function clp_login_styles($r){

    $onlyCSS = "";

    // Login
    if($GLOBALS['pagenow'] === 'wp-login.php'){
        $onlyCSS .= get_option("clp_login_css");
    }

    if($r == true){
        return $onlyCSS;
    }

    // No print
    if(count($onlyCSS) == 0){
        return false;
    }

    // Delete CSS Comments
    $onlyCSS = preg_replace("!/\*[^*]*\*+([^/][^*]*\*+)*/!","", $onlyCSS);

    // Return
    $return = '<style id="custom-login-pro">';
        
    // process
    $onlyCSS = clp_stripslashes(clp_auto_prefix($onlyCSS));
        
    // min and add
    $return .= str_replace(array(
        "\n",
        "\r",
        "\t"
    ), '', $onlyCSS);
    
    // Close style
    $return .= "\n" . '</style>';
    
    // Print
    echo $return;

    // Animate library.
    if (strstr($onlyCSS, "animation-name:")) {
        wp_enqueue_style('custom-login-pro-animate', plugins_url('css/animate.css', __FILE__));
    }

    // Check if there any animation
    if (strstr($onlyCSS, "animation-name:") == true || strstr($onlyCSS, "animation-duration:") == true || strstr($onlyCSS, "animation-delay:") == true) {
            
        // Load library and jQuery
        wp_enqueue_script('custom-login-pro-library', plugins_url('js/library.js', __FILE__), 'jquery', '1.0', TRUE);
        wp_enqueue_script('jquery');
            
    }

}

if(isset($_GET["custom_login_pro_frame"]) == false){
    add_action('login_head', 'clp_login_styles', 999999999);
}


/* ---------------------------------------------------- */
/* Adding Prefix To Some CSS Rules                      */
/* ---------------------------------------------------- */
function clp_auto_prefix($css) {
    
    // last 9 version of browsers
    // 10.1.2018

    // clean ms and webkit if available
    $css = preg_replace('@\t(-webkit-|-ms-)(.*?):(.*?);@si', "", $css);
    
    // Webkit prefixes
    $webkit = array(
        "background-size",
        "background-clip",
        "box-sizing",
        "animation-name",
        "animation-iteration-count",
        "animation-duration",
        "animation-delay",
        "animation-fill-mode",
        "box-shadow",
        "filter",
        "transform",
        "flex-direction",
        "flex-wrap",
        "justify-content",
        "align-items",
        "align-content",
        "flex-basis",
        "align-self",
        "flex-grow",
        "flex-shrink",
        "perspective",
        "transform-origin",
        "backface-visibility"
    );

    // Ms prefixes
    $ms = array(
        "transform",
        "flex-direction",
        "flex-wrap",
        "justify-content",
        "align-items",
        "align-content",
        "flex-basis",
        "align-self",
        "flex-grow",
        "flex-shrink",
        "transform-origin",
        "backface-visibility"
    );
    
    // Webkit
    foreach ($webkit as $prefix) {
        
        if($prefix == "justify-content"){
            $css = preg_replace('@(?<!-)' . $prefix . ':([^\{\;]+);@i', "-webkit-box-pack:$1;\r\t" . $prefix . ":$1;", $css);
        }else if($prefix == "align-items"){
            $css = preg_replace('@(?<!-)' . $prefix . ':([^\{\;]+);@i', "-webkit-box-align:$1;\r\t" . $prefix . ":$1;", $css);
        }else if($prefix == "flex-grow"){
            $css = preg_replace('@(?<!-)' . $prefix . ':([^\{\;]+);@i', "-webkit-box-flex:$1;\r\t" . $prefix . ":$1;", $css);
        }else{
            $css = preg_replace('@(?<!-)' . $prefix . ':([^\{\;]+);@i', "-webkit-" . $prefix . ":$1;\r\t" . $prefix . ":$1;", $css);
        }
        
    }

    // MS
    foreach ($ms as $prefix) {
        
        if($prefix == "justify-content"){
            $css = preg_replace('@(?<!-)' . $prefix . ':([^\{\;]+);@i', "-ms-flex-pack:$1;\r\t" . $prefix . ":$1;", $css);
        }else if($prefix == "align-items"){
            $css = preg_replace('@(?<!-)' . $prefix . ':([^\{\;]+);@i', "-ms-flex-align:$1;\r\t" . $prefix . ":$1;", $css);
        }else if($prefix == "align-content"){
            $css = preg_replace('@(?<!-)' . $prefix . ':([^\{\;]+);@i', "-ms-flex-line-pack:$1;\r\t" . $prefix . ":$1;", $css);
        }else if($prefix == "flex-basis"){
            $css = preg_replace('@(?<!-)' . $prefix . ':([^\{\;]+);@i', "-ms-flex-preferred-size:$1;\r\t" . $prefix . ":$1;", $css);
        }else if($prefix == "align-self"){
            $css = preg_replace('@(?<!-)' . $prefix . ':([^\{\;]+);@i', "-ms-flex-item-align:$1;\r\t" . $prefix . ":$1;", $css);
        }else if($prefix == "flex-grow"){
            $css = preg_replace('@(?<!-)' . $prefix . ':([^\{\;]+);@i', "-ms-flex-positive:$1;\r\t" . $prefix . ":$1;", $css);
        }else if($prefix == "flex-shrink"){
            $css = preg_replace('@(?<!-)' . $prefix . ':([^\{\;]+);@i', "-ms-flex-negative:$1;\r\t" . $prefix . ":$1;", $css);
        }else{
            $css = preg_replace('@(?<!-)' . $prefix . ':([^\{\;]+);@i', "-ms-" . $prefix . ":$1;\r\t" . $prefix . ":$1;", $css);
        }
        
    }

    // Display: flex
    $css = preg_replace('@display(\s+)?:(\s+)?flex(\s+)?(\!important)?;@i', "display:-webkit-box$3$4;\r\tdisplay:-webkit-flex$3$4;\r\tdisplay:-ms-flexbox$3$4;\r\tdisplay:flex$3$4;", $css);


    // Load Gradient one time only.
    if(!function_exists("clp_linear_gradient_support")){

        // Linear gradient prefix support
        function clp_linear_gradient_support(array $match){

            // only gradient content
            $gradientOriginal = $match[4];
            $gradient = $gradientOriginal;

            // get first part
            preg_match('/linear-gradient\(([^,]+)/i', "linear-gradient(".$gradientOriginal, $matches);

            // direction available
            if(isset($matches[1])){

                $direction = strtolower(trim($matches[1]));

                // is valid
                if(preg_match('/(deg|top|left|right|bottom)/i', $direction)){

                    // Is deg
                    if(preg_match('/deg/i', $direction)){

                        // get deg
                        $deg = preg_replace("/[^0-9.]/", "", $direction);

                        // reverse direction for o and webkit
                        if($deg == "0"){
                            $deg = "bottom";
                        }elseif($deg == "90"){
                            $deg = "left";
                        }elseif($deg == "180"){
                            $deg = "top";
                        }elseif($deg == "270"){
                            $deg = "right";
                        }elseif($deg == "360"){
                            $deg = "bottom";
                        }else if($deg < 90){
                            $deg = 90 - $deg."deg";
                        }else if($deg > 90){
                            $deg = 360 - ($deg - 90)."deg";
                        }

                        // Update gradient
                        $gradient = preg_replace("/linear-gradient\(([^,]+)/", $deg, "linear-gradient(".$gradient);

                    // top, left etc
                    }else{

                        // to left..
                        if(preg_match('/to /i', $direction)){

                            if($direction == "to left"){
                                $direction = "right";
                            }else if($direction == "to right"){
                                $direction = "left";
                            }else if($direction == "to top"){
                                $direction = "bottom";
                            }else if($direction == "to bottom"){
                                $direction = "top";
                            }

                            // Update Gradient
                            $gradient = preg_replace("/linear-gradient\(([^,]+)/", $direction, "linear-gradient(".$gradient);

                        }

                    }

                }

            }

            // Default no important
            $important = "";

            // Checks important tag
            if(isset($match[6])){
                $important = " ".$match[6];
            }

            // Generate result gradient
            $result = $match[1].":-webkit-linear-gradient(".$gradient.")".$important.";\r\t";
            $result .= $match[1].":-o-linear-gradient(".$gradient.")".$important.";\r\t";
            $result .= $match[1].":linear-gradient(".$gradientOriginal.")".$important.";";

            // return result
            return $result;

        }

    }
    
    // linear gradient support (-webkit-gradient is not supported)
    $css = preg_replace_callback("@(background-image|background)(\s+)?:(\s+)?linear-gradient\((.*?)\)(\s+)?(\!important)?;@i", 'clp_linear_gradient_support', $css);

    return $css;
    
}



/* ---------------------------------------------------- */
/* Adding no-index meta to head for demo mode YP Links!	*/
/* ---------------------------------------------------- */
function clp_head_meta() {
    echo '<meta name="robots" content="noindex, follow">' . "\n";
}



/* ---------------------------------------------------- */
/* Advanced link replacer                               */
/* ---------------------------------------------------- */
function clp_advanced_link_replace($match){

    // be sure this is stylesheet
    if(preg_match("/rel=(\"|\'|\s+)?stylesheet(\"|\'|\s+)?/", $match[0]) == false){
        return $match[0];
    }

    // getting protocol
    $protocol = is_ssl() ? 'https://' : 'http://';

    // getting domain / Getting editor URL, has WWW or no, must be same with iframe contents
    $domain = get_admin_url();

    $www = false;

    // has www
    if(strpos($domain, "://www.") == true){
        $www = true;
    }

    // The link href
    $href = $match[8];

    // not available
    if(isset($href) == false){
        return $match[0];
    }

    // Delete WWW from domain
    $domain = str_replace("://www.", "://", $domain);

    // check if href match
    if(strpos($href, "://".$domain) == false){

        // if domain still not match when have WWW too
        if(strpos($href, "://www.".$domain) == false){
            return $match[0];
        }

    }

    // If have any https or http protocol
    if(strpos($href, "https://") !== false || strpos($href, "http://") !== false){

        // is href doesnt use current protocol
        if(strpos($href, $protocol) === false){

            // convert http:// to https://
            if($protocol == "https://"){

                // Href
                $href = str_replace("http://", "https://", $href);

            // convert https:// to http://
            }else{
                $href = str_replace("https://", "http://", $href);
            }

        }

    }

    // If this link has www and current domain not have
    if(strpos($href, "://www.") == true && $www == false){
        $href = str_replace("://www.", "://", $href);
    }

    // If this link not has www and current domain have
    if(strpos($href, "://www.") == false && $www == true){
        $href = str_replace("://", "://www.", $href);
    }

    // Update href and return
    return preg_replace('@href=("|\')?(.*?)("|\'|\s\'|\s"|\s)@', "href=$1".$href."$3", $match[0]);

}


/* ---------------------------------------------------- */
/* Prepare the CSS links before load the page           */
/* ---------------------------------------------------- */
function clp_link_replace($buffer){

    // Replace links
    $buffer = preg_replace_callback('@\<link(\s+)?(.*?)?(\s+)?(\s+)?(.*?)?(\s+)?href=("|\')?(.*?)("|\'|\s\'|\s"|\s)(\s+)?(.*?)?(\s+)?(\s+)?(.*?)?(\s+)?(/>|>)@', "clp_advanced_link_replace", $buffer);

    return $buffer;

}


/* ---------------------------------------------------- */
/* Adding other CSS Data to Editor frame                */
/* ---------------------------------------------------- */
if (isset($_GET['custom_login_pro_frame']) == true) {
    add_action('wp_head', 'clp_head_meta', 9997);
    ob_start("clp_link_replace");
}


/* ------------------------------------------------------------------- */
/* Other CSS Codes (All CSS Codes excluding current editing type CSS)  */
/* ------------------------------------------------------------------- */
function clp_editor_styles() {
    
    $get_type_option = '';
    

    $template = '';
    
    // Get Global, template, single data
    $get_type_option = get_option("clp_login_styles");

    // get template data
    if (empty($get_type_option) == false) {
        $template .= $get_type_option;
    }

    // Data Layout
    $return = '<div id="custom-login-pro-iframe-data"><!-- 

    <style class="clp-inline-data" data-source-mode="global"></style>
    <style class="clp-inline-data" id="clp-styles-area" data-source-mode="template">'.$template.'</style>
    <style class="clp-inline-data" data-source-mode="single"></style>';

    // return animations
    $return .= '<div id="clp-animate-data"><style></style></div> --></div>';
    
    // return editor data
    echo clp_stripslashes($return);
    
}




/* ---------------------------------------------------- */
/* Include options Library								*/
/* ---------------------------------------------------- */
include_once(CLP_PLUGIN_DIR . 'base.php');



/*-------------------------------------------------------*/
/*  Ajax Real Save Callback                              */
/*-------------------------------------------------------*/
function clp_ajax_save() {
    
    if (current_user_can("edit_theme_options") == true) {
        
        // Getting data
        $css = wp_strip_all_tags($_POST['clp_data']);
        $styles = trim(wp_strip_all_tags($_POST['clp_editor_data']));

        // replace ] */ to fix ajax problems.
        $styles = str_replace("YPOGRP", "/* [", $styles);
        $styles = str_replace("YPEGRP", "] */", $styles);
        
        // CSS Data
        if (empty($css) == false) {
            if (!update_option('clp_login_css', $css)) {
                add_option('clp_login_css', $css);
            }
        } else {
            delete_option('clp_login_css');
        }
            
        // Styles
        if (empty($css) == false) {
            if (!update_option('clp_login_styles', $styles)) {
                add_option('clp_login_styles', $styles);
            }
        } else {
            delete_option('clp_login_styles');
        }

    }
    
    wp_die();
    
}

add_action('wp_ajax_clp_ajax_save', 'clp_ajax_save');



/* ---------------------------------------------------- */
/* Getting customizing types like a list                */
/* ---------------------------------------------------- */
function clp_customizing_options(){

    // Options
    $result = "<li data-value='single' class='type-disabled'><i class='manage-this-type'></i><i class='reset-this-type'></i><h6><span>Single Customization</span><small class='type-bayt'><span>empty</span><i>changed</i></small></h6><span class='current-type'>current</span><p>apply style just to the current page.</p></li>";
    $result .= '<li data-value="template" class="active-customizing-list"><i class="manage-this-type"></i><i class="reset-this-type"></i><h6><span>Template Customization</span><small class="type-bayt"><span>empty</span><i>changed</i></small></h6><span class="current-type">current</span><p>apply style to all pages of the current post type.</p></li>';
    $result .= '<li data-value="global" class="type-disabled"><i class="manage-this-type"></i><i class="reset-this-type"></i><h6><span>Global Customization</span><small class="type-bayt"><span>empty</span><i>changed</i></small></h6><span class="current-type">current</span><p>apply style to the entire website.</p></li>';

    return $result;

}


/* ---------------------------------------------------- */
/* Adding Body Classes									*/
/* ---------------------------------------------------- */
function clp_body_class($classes) {
    
    $classes[] = 'clp-custom-login-pro';
    
    return $classes;
    
}


/* ---------------------------------------------------- */
/* Install the plugin									*/
/* ---------------------------------------------------- */
function clp_init() {
        
    
    // Iframe Settings.
    // Disable admin bar in iframe
    // Add Classes to iframe body.
    // Add Styles for iframe.
    if (current_user_can("edit_theme_options") == true && isset($_GET['custom_login_pro_frame']) == true) {
        show_admin_bar(false);
        add_filter('body_class', 'clp_body_class');
    }

    // Getting Current font families.
    add_action('login_enqueue_scripts', 'clp_load_fonts', 999999998);
    
    
}

add_action("init", "clp_init");




/* ---------------------------------------------------- */
/* Uploader Style 										*/
/* ---------------------------------------------------- */
function clp_uploader_style() {
    
    if (isset($_GET['clp_uploader'])) {
        
        if ($_GET['clp_uploader'] == 1) {
            
            echo '<style>
				tr.url,tr.post_content,tr.post_excerpt,tr.field,tr.label,tr.align,tr.image-size,tr.post_title,tr.image_alt,.del-link,#tab-type_url{display:none !important;}
				.media-item-info > tr > td > p:last-child,.savebutton,.ml-submit{display:none !important;}
				#media-upload #filter{width:auto !important;}
                .subsubsub{display:none !important;}
                .tablenav .alignleft.actions{display:none !important;}
                .tablenav{height:auto !important;margin:0 !important;}
                .tablenav-pages{margin:0px !important;text-align: right !important;}
                .media-upload-form{margin-top:0px !important;}
                #filter{margin-bottom:10px !important;}
                #media-search{display:none !important;}
                .tablenav .tablenav-pages a, .tablenav-pages-navspan{min-width: auto !important;font-size: 13px !important;}
				.media-item .describe input[type="text"], .media-item .describe textarea{width:334px;}
                .max-upload-size{opacity:0.7 !important;}
			</style>';
            
        }
        
    }
    
}

add_action('admin_head', 'clp_uploader_style');



/* ---------------------------------------------------- */
/* Iframe Admin Page									*/
/* ---------------------------------------------------- */
function clp_custom_login_pro_editor() {
    
    $hook = add_submenu_page(null, "CustomLoginPro Editor", "CustomLoginPro Editor", 'edit_theme_options', 'clp-editor', 'clp_editor_func');
    
}

add_action('admin_menu', 'clp_custom_login_pro_editor');



/* ---------------------------------------------------- */
/*  We need an blank page (hack)						*/
/* ---------------------------------------------------- */
function clp_editor_func() {
    
}

add_action('load-admin_page_clp-editor', 'clp_frame_output');


/* ---------------------------------------------------- */
/* Editor Page Markup 									*/
/* ---------------------------------------------------- */
function clp_frame_output() {
    
    // Get protocol        
    $protocol = is_ssl() ? 'https' : 'http';
    $protocol = $protocol . '://';
    
    // Editor Markup
    include(CLP_PLUGIN_DIR . 'editor.php');
    
    exit;
    
}


/* ---------------------------------------------------- */
/* stripslashes data                                    */
/* ---------------------------------------------------- */
function clp_stripslashes($v){

    $v = preg_replace("/\\\\\\\\\\\(@|\.|\/|!|\*|#|\?|\+)/i", "\\\\$1", $v); // multiple \\\\
    $v = preg_replace("/\\\\\\\(@|\.|\/|!|\*|#|\?|\+)/i", "\\\\$1", $v); // multiple \\
    $v = preg_replace("/\\\\(@|\.|\/|!|\*|#|\?|\+)/i", "TP09BX$1", $v);
    $v = stripslashes($v);
    $v = preg_replace("/(TP09BX)/i", "\\", $v);

    return $v;

}