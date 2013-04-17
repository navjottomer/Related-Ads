<?php
/*
Plugin Name: Related Ads
Plugin URI: http://www.osclass.org
Description: Display Related ads on Item Page
Version: 2.1
Author: Navjot Tomer - nav@tuffclassified.com
Author URI: http://tuffclassified.org/
Short Name: related_ads
*/
	 
function relatedads_call_after_install() {
        // Insert here the code you want to execute after the plugin's install
        // for example you might want to create a table or modify some values
	    
        
	     osc_set_preference('related_ra_numads'    	, '4','related_ads','INTEGER');
	     osc_set_preference('related_ra_country'    , '0','related_ads','INTEGER');
	     osc_set_preference('related_ra_category'   , '1','related_ads','INTEGER');
	     osc_set_preference('related_ra_region'    	, '0','related_ads','INTEGER');
	     osc_set_preference('related_picOnly'      	, '0','related_ads','INTEGER');
	     osc_set_preference('related_css'          	, '0','related_ads','INTEGER');
	     osc_set_preference('related_autoembed'    	, '0','related_ads','INTEGER');
	     osc_set_preference('related_version'      	, '2.1','related_ads','STRING');
   	 
           }

    function relatedads_call_after_uninstall() {
        // Insert here the code you want to execute after the plugin's uninstall
        // for example you might want to drop/remove a table or modify some values
		 
				osc_delete_preference('related_ra_numads'  		,'related_ads');
				osc_delete_preference('related_ra_country'  	,'related_ads');
				osc_delete_preference('related_ra_category'  	,'related_ads');
				osc_delete_preference('related_ra_region'  		,'related_ads');
	            osc_delete_preference('related_picOnly'   		,'related_ads');
	            osc_delete_preference('related_css'        	 	,'related_ads');
	            osc_delete_preference('related_autoembed'  		,'related_ads');
	            osc_delete_preference('related_version'   		,'related_ads');
			}
    
    
    function osc_related_ra_numads() {
        return(osc_get_preference('related_ra_numads', 'related_ads')) ;
    }
    
    function osc_related_category() {
        return(osc_get_preference('related_ra_category', 'related_ads')) ;
    }
    
    function osc_related_country() {
        return(osc_get_preference('related_ra_country', 'related_ads')) ;
    }
    
    function osc_related_region() {
        return(osc_get_preference('related_ra_region', 'related_ads')) ;
    }
    
    function osc_related_picOnly() {
        return(osc_get_preference('related_picOnly', 'related_ads')) ;
    }
    
    function osc_related_css() {
    	return(osc_get_preference('related_css', 'related_ads')) ;
    }
    
    function osc_related_autoembed() {
    	return(osc_get_preference('related_autoembed', 'related_ads')) ;
    }
// Manual function to show related Ads    	 
function related_ads_start() {
    $rmItemId = osc_item_id() ;
    $ra_numads = (osc_related_ra_numads() != '') ? osc_related_ra_numads() : '' ;
    $country = (osc_related_country() != '') ? osc_related_country() : '' ;
    $region = (osc_related_region() != '') ? osc_related_region() : '' ;
    $category = (osc_related_category() != '') ? osc_related_category() : '' ;
    $picOnly = (osc_related_picOnly() != '') ? osc_related_picOnly() : ''; 
    $mSearch = new Search() ;
    $mSearch->dao->where(sprintf("%st_item.pk_i_id <> $rmItemId", DB_TABLE_PREFIX));
    if($country ==1){
    $mSearch->addCountry(osc_item_country()) ;
    }
    if($region ==1) {
    $mSearch->addRegion(osc_item_region()) ;
    }
    if($category ==1) {
    $mSearch->addCategory(osc_item_category_id()) ;
    }
    if($picOnly == 1 ) {
    $mSearch->withPicture(true); //Search only Item which have pictures
    }
    $mSearch->limit(0, $ra_numads) ; // fetch number of ads to show set in preference
    
    $aItems = $mSearch->doSearch();
     


	
	$global_items = View::newInstance()->_get('items') ; //save existing item array
	View::newInstance()->_exportVariableToView('items', $aItems); //exporting our searched item array

    
    require_once 'related_ads.php';


  
     //calling stored item array
    View::newInstance()->_exportVariableToView('items', $global_items); //restore original item array
    }

	
//Auto Embed Function 	
	function related_ads_auto() {
	$autoembed = (osc_related_autoembed() != '') ? osc_related_autoembed() : '' ;
	if($autoembed == 1 ) {
    related_ads_start();
    }
    }



	function related_ad_style(){
	$css = (osc_related_css() != '') ? osc_related_css() : '' ;
    if($css == 0 ) 
    	{
	 //path to stylesheet
   	echo '<link href="' . osc_base_url() . "oc-content/plugins/related_ads/style.css" . '" rel="stylesheet" type="text/css" />';
		}
	}

	function relatedads_admin_menu() {
        if( OSCLASS_VERSION < '2.4.0') {
  			echo '<h3><a href="#">Related Ads</a></h3>
        	<ul> 
        		<li><a href="' . osc_admin_render_plugin_url(osc_plugin_path(dirname(__FILE__)) . '/admin.php') . '">&raquo; ' . __('Configure',     'related') . '</a></li>
            <li><a href="' . osc_admin_render_plugin_url(osc_plugin_path(dirname(__FILE__)) . '/help.php') . '">&raquo; ' . __('Help', 'related') . '</a></li>
        </ul>';
				} else{
  			echo '<li id="related_ads"><h3><a href="#">Related Ads</a></h3>
        	<ul> 
        		<li><a href="' . osc_admin_render_plugin_url(osc_plugin_path(dirname(__FILE__)) . '/admin.php') . '">&raquo; ' . __('Configure',     'related') . '</a></li>
            <li><a href="' . osc_admin_render_plugin_url(osc_plugin_path(dirname(__FILE__)) . '/help.php') . '">&raquo; ' . __('Help', 'related') . '</a></li>
        </ul></li>';
	}

    } 
    
	function relatedads_admin() {
        osc_admin_render_plugin(osc_plugin_path(dirname(__FILE__)) . '/admin.php') ;
    }
    
    function related_before_url() {
		 return Params::getParam('page');
    }      


    // This is needed in order to be able to activate the plugin
    osc_register_plugin(osc_plugin_path(__FILE__), '') ;
    // This is a hack to show a Configure link at plugins table (you could also use some other hook to show a custom option panel)
    osc_add_hook(osc_plugin_path(__FILE__) . '_configure', 'relatedads_admin');
    // This is needed in order to be able to activate the plugin
    osc_register_plugin(osc_plugin_path(__FILE__), 'relatedads_call_after_install');
    // This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
    osc_add_hook(osc_plugin_path(__FILE__). '_uninstall', 'relatedads_call_after_uninstall');
    
    
    //Add style sheet to header
    osc_add_hook('header', 'related_ad_style');
    //Auto Embed Related ads automatically to Item detail page
    osc_add_hook('item_detail', 'related_ads_auto');
    // Add related ads menu in Dashboard
    osc_add_hook('admin_menu', 'relatedads_admin_menu');
    // before html 
    osc_add_hook('before_html', 'related_before_url');
    
?>