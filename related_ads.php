<div class="related_ads">         
    
	<h2><strong>Related Ads</strong></h2>
	    <?php if( osc_count_items() == 0) { ?>
		<p class="empty">No Related Ads</p>
	    <?php } else { ?>
		<table border="0" cellspacing="0">
		    <tbody>
			<?php $class = "even"; ?>
			<?php while ( osc_has_items() ) { ?>
			 
			<tr class="<?php echo $class. (osc_item_is_premium()?" premium":"") ; ?>">
                                            <?php if( osc_images_enabled_at_items() ) { ?>
                                             <td class="photo">
                                                <?php if( osc_count_item_resources() ) { ?>
                                                    <a href="<?php echo osc_item_url() ; ?>">
                                                        <img src="<?php echo osc_resource_thumbnail_url() ; ?>" width="75px" height="56px" alt="<?php echo osc_item_title() ; ?>" />
                                                    </a>
                                                <?php } else { ?>
                                                    <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="No image available" width="75px" height="56px" />
                                                <?php } ?>
                                             </td>
                                            <?php } ?>
                                             <td class="text">
                                                 <h3><a href="<?php echo osc_item_url() ; ?>"><?php echo osc_item_title() ; ?></a></h3>
                                                 <p><strong> <a href="<?php echo osc_base_url(true);?>?page=search&sRegion&sCity=<?php  echo osc_item_city(); ?>"><?php  echo osc_item_city(); ?></a>  <?php echo osc_item_category(); ?></strong></p>
                                                 <p><?php echo osc_highlight( strip_tags( osc_item_description() ) ) ; ?></p>
                                             </td>                                       
                                         </tr>
			<?php $class = ($class == 'even') ? 'odd' : 'even' ; ?>
			<?php } ?>
		    </tbody>
		</table>
		<?php } ?>
		</div>		
 <br />
