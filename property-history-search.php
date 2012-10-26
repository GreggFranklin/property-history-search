<?php
/*
Plugin Name: Property History Search
Description: Custom shortcode for Property History Search Widget. Use [property_history_search] in posts or pages.
Version: 1.0
Author: Gregg Franklin
Author URI: http://greggfranklin.com
*/
 
/*
 * Provided by BuildFax
 * URL: http://www.buildfax.com/widget/widget20121023.html
*/

/* Add stylesheet
 * You can use your own style sheet
*/
function phs_css(){
    echo apply_filters( 'reset', '<link rel="stylesheet" href="http://www.buildfax.com/media/css/reset_compressed.css" type="text/css" />' );
    echo apply_filters( 'phs_css', '<link rel="stylesheet" href="http://www.buildfax.com/widget/widget_styles.css" type="text/css" />' );
 }
 add_action( 'wp_head', 'phs_css' );

// Add scripts
function phs_scripts(){ 
	wp_enqueue_script('latest', 'http://www.buildfax.com/media/js/jquery.latest.js', __FILE__);
	wp_enqueue_script('tools', 'http://www.buildfax.com/media/js/jquery.tools.min.js', __FILE__);
	wp_enqueue_script('custom', plugins_url('/property-history-search/scripts/phs.js'), __FILE__);
}
 add_action( 'wp_head', 'phs_scripts' );

// Create shortcode    
function gf_property_history_search() {
	 
	 $code ='<div id="singlereportwidget">
	 			<h4>Property History Search</h4>
	 			<div id="bfsearchwidget">
	 				<p class="wdgt">Search an address below to determine whether a BuildFax Permitted Construction History Report&trade; is available for that property.</p>

	 				<div id="bfreport"></div>
	 					<p class="wdgt"><small>Enter the address and ZIP in this format: 16 Biltmore Ave, 28801</small></p>		
	 				</div><!-- #bfreport -->
	 			</div><!-- #bfsearchwidget -->  

	 			<div id="bfoverlay">
	 				<div id="bfoverlay_close" class="close">X</div>
	 				<div id="bfoverlay_topcontent">&nbsp;</div>
	 				<div id="bfoverlay_bottomcontent">&nbsp;</div>
	 			</div><!-- #bfoverlay -->
	 		</div><!-- #singlereportwidget -->';
	 
	 return $code;
 }
 add_shortcode( 'property_history_search', 'gf_property_history_search' );
?>