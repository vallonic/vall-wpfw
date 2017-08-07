<?php
// Pagina's registreren, in dashboard menu
add_action('admin_menu', 'vall_wpfw_createAdminMenu');

function vall_wpfw_createAdminMenu() {

	//create new top-level menu
	add_menu_page('vallonic-wpf', 'Vallonic', 'administrator', 'vall-wpfw-general', 'vall_wpfw_createAdminPage_generalInfo' , 'dashicons-smiley');
  add_submenu_page('vall-wpfw-general', 'Vallonic Wordpress Framework — Informatie', 'Informatie', 'administrator', 'vall-wpfw-general', 'vall_wpfw_createAdminPage_generalInfo');
  add_submenu_page('vall-wpfw-general', 'Vallonic Wordpress Framework — Algemene Instellingen', 'Algemene Instellingen', 'administrator', 'vall-wpfw-settingsgeneral', 'vall_wpfw_createAdminPage_settingsGeneral');
}

##########################################
## Dashboard pagina: Algemene informatie

function vall_wpfw_createAdminPage_generalInfo() {
  global $plugin_data;
?>
<div class="wrap">
  <h1><?php echo $plugin_data['Name']; ?></h1>
  <div class="card">
    <h1>
      <?php _e('Plugin Informatie', 'vall-wpfw');?>
    </h1>
    <?php echo _e('Plugin versie', 'vall-wpfw') . " " . $plugin_data['Version']; ?> | <a class="vall dashboard-link-simpel" href="<?php echo $plugin_data['url']; ?> "><?php _e('Naar de website van Vallonic', 'vall-wpfw'); ?></a>
    <hr class="vall dashboard-hr" />
		<?php
			if (vall_wpfw_siteChecker() == 'true') {
    		echo '<b>Deze website is eigendom van Vallonic —> Speciale functies staan aan <hr class="vall dashboard-hr" />';
			}
		?>
  </div>
</div>
<?php }

##########################################
## Dashboard pagina: Algemene Instellingen

function vall_wpfw_registerSettings_settingsGeneral() {
	//register our settings
	register_setting( 'vall_wpfw_settingsGroup_settingsGeneral', 'vall_wpfw_option_general_toggle_admin_rss_module' );
  register_setting( 'vall_wpfw_settingsGroup_settingsGeneral', 'vall_wpfw_option_general_toggle_pageprotection_module' );
  register_setting( 'vall_wpfw_settingsGroup_settingsGeneral', 'vall_wpfw_option_general_toggle_shortcodes' );
	register_setting( 'vall_wpfw_settingsGroup_settingsGeneral', 'vall_wpfw_option_general_toggle_wp_wpdashboardwidgets' );
}
add_action( 'admin_init', 'vall_wpfw_registerSettings_settingsGeneral' );



function vall_wpfw_createAdminPage_settingsGeneral() { ?>


	<div class="wrap vall_wpfw settings-page-wrapper">
  	<img class="vallonic-logo"src="http://dab.s1.vallonic.com/vallonic_logo/logo_vallonic-green.png" />
  	<h1>Vallonic WordPress Framework</h1>
  	<div class="" style="padding-top: 15px;">
    	<div class="settings-container">
      	<form method="post" action="options.php">
        	<?php settings_fields( 'vall_wpfw_settingsGroup_settingsGeneral' ); ?>
        	<?php do_settings_sections( 'vall_wpfw_settingsGroup_settingsGeneral' ); ?>
					<?php if (vall_wpfw_siteChecker() == "true") {
						// Volgende alleen tonen indien er "vallonic." in het domeinnaam staat ?>
						<table class="settings-table">
							<tbody>
								<tr>
									<th class="header" scope="row" colspan="2">
									<h3><?php _e('Instellingen Alleen voor Vallonic.nl/.nl ', 'vall-wpfw'); ?></h3>
									</th>
								</tr>
							<tr>
								<th scope="row" class="first">
								<span class="type"><?php _e('Module','vall-wpfw'); ?>:</span> <?php _e('ook kunnen doorsturen naar CD indien niet ingelogd','vall-wpfw'); ?>
								</th>
								<td>
									<input name="vall_wpfw_option_general_toggle_pageprotection_module_redirecttocd" id="vall_wpfw_option_general_toggle_pageprotection_module_redirecttocd" type="checkbox" value="true" <?php checked( 'true', get_option( 'vall_wpfw_option_general_toggle_pageprotection_module' ) ); ?> />
									<label for="vall_wpfw_option_general_toggle_pageprotection_module_redirecttocd">
										<?php _e('Inschakelen', 'vall-wpfw'); ?>
									</label>
								</td>
							</tr>
						</tbody>
						</table>

						<?php }
						// Het volgende altijd tonen ?>

        	<table class="settings-table">
          	<tbody>
            	<tr>
              	<th class="header" scope="row" colspan="2">
                <h3><?php _e('Algemene Instellingen', 'vall-wpfw'); ?></h3>
              	</th>
            	</tr>
            	<tr>
              	<th scope="row" class="first">
                	<span class="type"><?php _e('Dashboard widget', 'vall-wpfw'); ?>:</span> <?php _e('RSS-feed van', 'vall-wpfw'); ?> Vallonic.com
              	</th>
              	<td>
                	<input name="vall_wpfw_option_general_toggle_admin_rss_module" id="vall_wpfw_option_general_toggle_admin_rss_module" type="checkbox" value="true" <?php checked( 'true', get_option( 'vall_wpfw_option_general_toggle_admin_rss_module' ) ); ?> />
                	<label for="vall_wpfw_option_general_toggle_admin_rss_module">
                  	<?php _e('Inschakelen', 'vall-wpfw'); ?>
                	</label>
              	</td>
            	</tr>
            <tr>
              <th scope="row" class="first">
              <span class="type"><?php _e('Module','vall-wpfw'); ?>:</span> <?php _e('pagina doorsturen indien niet ingelogd','vall-wpfw'); ?>
              </th>
              <td>
                <input name="vall_wpfw_option_general_toggle_pageprotection_module" id="vall_wpfw_option_general_toggle_pageprotection_module" type="checkbox" value="true" <?php checked( 'true', get_option( 'vall_wpfw_option_general_toggle_pageprotection_module' ) ); ?> />
                <label for="vall_wpfw_option_general_toggle_pageprotection_module">
                  <?php _e('Inschakelen', 'vall-wpfw'); ?>
                </label>
              </td>
            </tr>
            <tr>
              <th scope="row" class="first">
                <span class="type">Module:</span> shortcodes
              </th>
              <td>
                <input name="vall_wpfw_option_general_toggle_shortcodes" id="vall_wpfw_option_general_toggle_shortcodes" type="checkbox" value="true" <?php checked( 'true', get_option( 'vall_wpfw_option_general_toggle_shortcodes' ) ); ?> />
                <label for="vall_wpfw_option_general_toggle_shortcodes">
                  <?php _e('Inschakelen', 'vall-wpfw'); ?>
                </label>
                <?php if (!get_option('vall_wpfw_option_general_toggle_shortcodes') == "true") { ?>
                  <ul>
                    <?php _e('Staat nu uit. Voegt de volgende shortcodes toe:', 'vall-wpfw'); ?>
                  <li><code>[vall-groet]</code> — <?php _e('Begroeting op basis van tijdstip', 'vall-wpfw'); ?></li>
                </ul>
              <?php } ?>
              </td>
            </tr>
						<tr>
              <th scope="row" class="first">
              <span class="type"><?php _e('Module','vall-wpfw'); ?>:</span> <?php _e('Standaard WordPress dashboard widgets deactiveren','vall-wpfw'); ?>
              </th>
              <td>
                <input name="vall_wpfw_option_general_toggle_wp_wpdashboardwidgets" id="vall_wpfw_option_general_toggle_wp_wpdashboardwidgets" type="checkbox" value="true" <?php checked( 'true', get_option( 'vall_wpfw_option_general_toggle_pageprotection_module' ) ); ?> />
                <label for="vall_wpfw_option_general_toggle_wp_wpdashboardwidgets">
                  <?php _e('Inschakelen', 'vall-wpfw'); ?>
                </label>
              </td>
            </tr>
          </tbody>
        </table>
        <?php submit_button(); ?>
      	</form>
    	</div>
  	</div>
	</div>



<?php } ?>
