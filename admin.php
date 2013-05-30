<?php if (!defined('OC_ADMIN') || OC_ADMIN!==true) exit('Access is not allowed.');
    
    $ra_numads            = '';
    $dao_preference = new Preference();
    if(Params::getParam('ra_numads') != '') {
        $ra_numads = Params::getParam('ra_numads');
    } else {
        $ra_numads = (osc_related_ra_numads() != '') ? osc_related_ra_numads() : '' ;
    }
    
    $category            = '';
    $dao_preference = new Preference();
    if(Params::getParam('ra_category') != '') {
        $category = Params::getParam('ra_category');
    } else {
        $category = (osc_related_category() != '') ? osc_related_category() : '' ;
    }
    
    $region            = '';
    $dao_preference = new Preference();
    if(Params::getParam('ra_region') != '') {
        $region = Params::getParam('ra_region');
    } else {
        $region = (osc_related_region() != '') ? osc_related_region() : '' ;
    }
    
    $country            = '';
    $dao_preference = new Preference();
    if(Params::getParam('ra_country') != '') {
        $country = Params::getParam('ra_country');
    } else {
        $country = (osc_related_country() != '') ? osc_related_country() : '' ;
    }
    
    $picOnly            = '';
    $dao_preference = new Preference();
    if(Params::getParam('picOnly') != '') {
        $picOnly = Params::getParam('picOnly');
    } else {
        $picOnly = (osc_related_picOnly() != '') ? osc_related_picOnly() : '' ;
    }
    
    $autoembed            = '';
    $dao_preference = new Preference();
    if(Params::getParam('autoembed') != '') {
        $autoembed = Params::getParam('autoembed');
    } else {
        $autoembed = (osc_related_autoembed() != '') ? osc_related_autoembed() : '' ;
    }
    
    $premiumonly            = '';
    $dao_preference = new Preference();
    if(Params::getParam('premiumonly') != '') {
        $premiumonly = Params::getParam('premiumonly');
    } else {
        $premiumonly = (osc_related_premiumOnly() != '') ? osc_related_premiumOnly() : '' ;
    }
    
    $css            = '';
    $dao_preference = new Preference();
    if(Params::getParam('css') != '') {
        $css = Params::getParam('css');
    } else {
        $css = (osc_related_css() != '') ? osc_related_css() : '' ;
    }
    
    
    if( Params::getParam('option') == 'stepone' ) {
        //$dao_preference->update(array("s_value" => $ra_numads), array("s_section" =>"related_ads", "s_name" => "related_ra_numads")) ;
        //$dao_preference->update(array("s_value" => $category), array("s_section" =>"related_ads", "s_name" => "related_ra_category")) ;
        //$dao_preference->update(array("s_value" => $country), array("s_section" =>"related_ads", "s_name" => "related_ra_country")) ;
        //$dao_preference->update(array("s_value" => $region), array("s_section" =>"related_ads", "s_name" => "related_ra_region")) ;
        //$dao_preference->update(array("s_value" => $picOnly), array("s_section" =>"related_ads", "s_name" => "related_picOnly")) ;
        //$dao_preference->update(array("s_value" => $autoembed), array("s_section" =>"related_ads", "s_name" => "related_autoembed")) ;
        //$dao_preference->update(array("s_value" => $css), array("s_section" =>"related_ads", "s_name" => "related_css")) ;
        
        //Now using new osclass functions
        osc_set_preference('related_ra_numads', ($ra_numads), 'related_ads');
        osc_set_preference('related_ra_category', ($category ? '1' : '0'), 'related_ads');
        osc_set_preference('related_ra_country', ($country ? '1' : '0'), 'related_ads');
        osc_set_preference('related_ra_region', ($region ? '1' : '0'), 'related_ads');
        osc_set_preference('related_picOnly', ($picOnly ? '1' : '0'), 'related_ads');
        osc_set_preference('related_autoembed', ($autoembed ? '1' : '0'), 'related_ads');
        osc_set_preference('related_css', ($css ? '1' : '0'), 'related_ads');
        osc_set_preference('related_premiumonly', ($premiumonly ? '1' : '0'), 'related_ads');


        osc_add_flash_ok_message(__('Setting saved successfully', 'related_ads'), 'admin');
                header('Location: ' . osc_admin_render_plugin_url('related_ads/admin.php')); exit;
    }
    unset($dao_preference) ;
    
?>
<h2 class="render-title "><?php _e('Related Ads Preferences', 'related_ads'); ?></h2>

<form action="<?php osc_admin_base_url(true); ?>" method="post">
    <input type="hidden" name="page" value="plugins" />
    <input type="hidden" name="action" value="renderplugin" />
    <input type="hidden" name="file" value="related_ads/admin.php" />
    <input type="hidden" name="option" value="stepone" />
    
    <fieldset>
        
<div class="form-horizontal">

        <div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="ra_numads" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Number of related ads  ', 'related_ads'); ?></label>:
        </div>
         
        <div class="form-controls"><input type="text" name="ra_numads" id="ra_numads" value="<?php echo $ra_numads; ?>" />
        <div class="help-box"><?php _e('Enter how many ads you want to show on Item Page (Default is 4)', 'related_ads'); ?></div>
       </div>
        </div>
        
        <div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="premiumonly" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Show only premium ads', 'related_ads'); ?></label>:
        </div>
        <div class="form-controls"><div class="form-label-selection">
        <select name="premiumonly" id="premiumonly">
        	<option <?php if($premiumonly ==0){echo 'selected="selected"';}?> value='0'><?php _e('No', 'related_ads'); ?></option>
        	<option <?php if($premiumonly ==1){echo 'selected="selected"';}?> value='1'><?php _e('Yes', 'related_ads'); ?></option>
        </select>
        <div class="help-box"><?php _e('Select Yes if you want to show premium ads only', 'related_ads'); ?></div>
        </div></div>
        </div>
        
        <div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="picOnly" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Show ads with pictures only', 'related_ads'); ?></label>:
        </div>
        <div class="form-controls"><div class="form-label-selection">
        <select name="picOnly" id="picOnly">
        	<option <?php if($picOnly ==0){echo 'selected="selected"';}?> value='0'><?php _e('No', 'related_ads'); ?></option>
        	<option <?php if($picOnly ==1){echo 'selected="selected"';}?> value='1'><?php _e('Yes', 'related_ads'); ?></option>
        </select>
        <div class="help-box"><?php _e('Select Yes if you want to show ads with picture only', 'related_ads'); ?></div>
        </div></div>
        </div>
       
       	<div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="ra_category" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Show ads with same category', 'related_ads'); ?></label>:
        </div>
        <div class="form-controls"><div class="form-label-selection">
        <select name="ra_category" id="ra_category">
        	<option <?php if($category ==0){echo 'selected="selected"';}?> value='0'><?php _e('No', 'related_ads'); ?></option>
        	<option <?php if($category ==1){echo 'selected="selected"';}?> value='1'><?php _e('Yes', 'related_ads'); ?></option>
        </select>
        <div class="help-box"><?php _e('Select Yes to Filter ads by Category', 'related_ads'); ?></div>
        </div></div>
        </div>
       
       	<div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="ra_country" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Show ads with same country', 'related_ads'); ?></label>:
        </div>
        <div class="form-controls"><div class="form-label-selection">
        <select name="ra_country" id="ra_country">
        	<option <?php if($country ==0){echo 'selected="selected"';}?> value='0'><?php _e('No', 'related_ads'); ?></option>
        	<option <?php if($country ==1){echo 'selected="selected"';}?> value='1'><?php _e('Yes', 'related_ads'); ?></option>
        </select>
        <div class="help-box"><?php _e('Select Yes to Filter ads by Country', 'related_ads'); ?></div>
        </div></div>
        </div>
        
        <div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="ra_region" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Show ads with same region', 'related_ads'); ?></label>:
        </div>
        <div class="form-controls"><div class="form-label-selection">
        <select name="ra_region" id="ra_region">
        	<option <?php if($region ==0){echo 'selected="selected"';}?> value='0'><?php _e('No', 'related_ads'); ?></option>
        	<option <?php if($region ==1){echo 'selected="selected"';}?> value='1'><?php _e('Yes', 'related_ads'); ?></option>
        </select>
        <div class="help-box"><?php _e('Select Yes to Filter ads by Region', 'related_ads'); ?></div>
        </div></div>
        </div>
        
        <div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="css" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Disable default Css ', 'related_ads'); ?></label>:
        </div>
        <div class="form-controls"><div class="form-label-selection">
        <select name="css" id="css">
        	<option <?php if($css ==0){echo 'selected="selected"';}?> value='0'><?php _e('No', 'related_ads'); ?></option>
        	<option <?php if($css ==1){echo 'selected="selected"';}?> value='1'><?php _e('Yes', 'related_ads'); ?></option>
        </select>
        <div class="help-box"><?php _e('Select Yes to disable included css and to use your own css'); ?></div>
        </div></div>
        </div>
        
        <div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="autoembed" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Related Ads AutoEmbed ', 'related_ads'); ?></label>:
        </div>
        <div class="form-controls"><div class="form-label-selection">
        <select name="autoembed" id="autoembed">
        	<option <?php if($autoembed ==0){echo 'selected="selected"';}?> value='0'><?php _e('Disable', 'related_ads'); ?></option>
        	<option <?php if($autoembed ==1){echo 'selected="selected"';}?> value='1'><?php _e('Enable', 'related_ads'); ?></option>
        </select>
        <div class="help-box"><?php _e('Choose Enable to Autoembed related ads in your Item page', 'related_ads'); ?></div>
        <div class="help-box"><?php _e('If you disable this feature than copy this function to your Item Page', 'related_ads'); ?>
        <pre style="width:610px;"> &lt;?php if (function_exists('related_ads_start')) {related_ads_start();} ?&gt; </pre>
        </div>
        </div></div>
        </div>

</div>
        
        <input type="submit" value="<?php _e('Save Related Ads Settings', 'related_ads'); ?>" class="btn btn-submit" style="margin-left:150px; padding:7px 40px;"/>
        
     </fieldset>
    
</form>
