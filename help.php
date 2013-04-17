<?php
/*
 *      OSCLass – software for creating and publishing online classified
 *                           advertising platforms
 *
 *                        Copyright (C) 2010 OSCLASS
 *
 *       This program is free software: you can redistribute it and/or
 *     modify it under the terms of the GNU Affero General Public License
 *     as published by the Free Software Foundation, either version 3 of
 *            the License, or (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful, but
 *         WITHOUT ANY WARRANTY; without even the implied warranty of
 *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *             GNU Affero General Public License for more details.
 *
 *      You should have received a copy of the GNU Affero General Public
 * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
?>

<div id="settings_form" style="border: 4px solid #e1e1e1; background:#ffffff;border-radius:6px; ">
    <div style="padding: 0 20px 20px; margin-top:20px">
        <div>
            <fieldset>
                
                <legend>
                    <h2><?php _e('<b>Related Ads Help</b>', 'related'); ?></h2>
                </legend>
                <br />
    
                <h3>
                    <?php _e('1.What is Related Ads Plugin?', 'related'); ?>
                </h3>
                <p>
                    <?php _e('    Related ads plugin is very easy to use plugin which will show latest related ads on Item page and helps you to reduce bounce rate of your classified portal', 'related'); ?>
                </p>
                <h3>
                    <?php _e('2.How does Related Ads plugin work?', 'related'); ?>
                </h3>
                <p>
                    <?php _e('In order to use this plugin, you should enable Auto-embed feature in plugin configuration screen or edit your theme file <b>item.php</b> and add the following line anywhere in the code you want related ads to display.', 'related'); ?>
                </p>
                <pre>
                    &lt;?php if (function_exists('related_ads_start')) {related_ads_start();} ?&gt;
                </pre>
                <h3>
                   <?php _e('3. How can I show related ads with pictures only?','related'); ?>
                </h3>
                <p>
                   <?php _e(' Set <b>Show ads with pictures only</b> option to Yes ', 'related'); ?>
                </p>
                <h3>
                   <?php _e('4.How can I change/disable default css for displaying related ads differently?','related'); ?>
                </h3>
                <p>
                   <?php _e('    You can edit style.css file in related ads plugin directory. ', 'related'); ?>
                </p>
                <p>
                <?php _e('You can also disable default stylesheet in plugin configuration screen and put your custom css in theme stylesheet', 'related'); ?>
                </p>
                <br />
                <p>
                   <?php _e('The plugin is tested with OSclass version 2.4 only but can work on other version too.', 'related'); ?>
                </p>
                <p>
                   <?php _e('Created by Navjot tomer as suggested by Jay with the help of Carousel for OSclass plugin.', 'related'); ?>
                </p>
            </fieldset>
        </div>
    </div>
</div>
