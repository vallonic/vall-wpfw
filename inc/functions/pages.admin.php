<?php
// Pagina's registreren, in dashboard menu
add_action('admin_menu', 'vall_wpfw_createAdminMenu');

function vall_wpfw_createAdminMenu() {

	//create new top-level menu
	add_menu_page('My Cool Plugin Settings', 'Vallonic', 'administrator', 'vall-wpfw-general', 'vall_wpfw_createAdminPage_generalInfo' , 'dashicons-smiley');
  add_submenu_page('vall-wpfw-general', 'Vallonic Wordpress Framework — Informatie', 'Informatie', 'administrator', 'vall-wpfw-general', 'vall_wpfw_createAdminPage_generalInfo');
  //add_submenu_page('vall-wpfw-general', 'Subpagina tekst 1', 'Subpagina tekst 2', 'administrator', 'vall-wpfw-settingsgeneral', 'vall_wpfw_createAdminPage_settingsGeneral');

	//call register settings function
	add_action( 'admin_init', 'vall_wpfw_registerAdminSettings' );
}

function vall_wpfw_registerAdminSettings() {
	//register our settings
	register_setting( 'my-cool-plugin-settings-group', 'new_option_name' );
	register_setting( 'my-cool-plugin-settings-group', 'some_other_option' );
	register_setting( 'my-cool-plugin-settings-group', 'option_etc' );
}

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
  </div>
</div>
<?php }

function vall_wpfw_createAdminPage_settingsGeneral() {
?>
<div class="wrap">
<h1>Vallonic WordPress Framework</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">New Option Name</th>
        <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Some Other Option</th>
        <td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Options, Etc.</th>
        <td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
        </tr>
    </table>

    <?php submit_button(); ?>

</form>
</div>

<?php } ?>
