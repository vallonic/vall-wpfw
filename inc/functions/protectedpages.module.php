<?php
/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function vallPageProtection_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function vallPageProtection_add_meta_box() {
	$post_types = array ( 'page', 'epkb_post_type_1' );
	add_meta_box(
		'vallPageProtection-titel-van-de-doos',
		__( 'Vallonic WPFW: Pagina doorsturen', 'vall-wpfw' ),
		'vallPageProtection_html',
		$post_types,
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'vallPageProtection_add_meta_box' );

$homepageInt = __( "Homepagina", 'vall-wpfw' );
$clntDshInt = __( "Client Dashboard", 'vall-wpfw');

function vallPageProtection_html($post) {
  global $clntDshInt;
  global $homepageInt;
	wp_nonce_field( '_vallPageProtection_nonce', 'vallPageProtection_nonce' ); ?>
	<p><?php _e('Op deze manier kun je de pagina door laten sturen naar indien hij beveiligd moet worden.', 'vall-wpfw'); ?></p>

	<p>

		<input type="checkbox" name="vallPageProtection_pageIsToBeProtected" id="vallPageProtection_pageIsToBeProtected" value="true" <?php echo ( vallPageProtection_get_meta( 'vallPageProtection_pageIsToBeProtected' ) === 'true' ) ? 'checked' : ''; ?>>
		<label for="vallPageProtection_pageIsToBeProtected"><?php _e( 'Beveilig deze pagina', 'vallPageProtection' ); ?></label>	</p>	<p>

    <label for="vallPageProtection_redirectTo"><?php _e( 'Doorsturen naar', 'vallPageProtection' ); ?></label><br>
		<select name="vallPageProtection_redirectTo" id="vallPageProtection_redirectTo">
			<option <?php echo (vallPageProtection_get_meta( 'vallPageProtection_redirectTo' ) === $homepageInt ) ? 'selected' : '' ?> value="<?php echo $homepageInt; ?>"><?php echo $homepageInt; ?></option>
			<?php if (vall_wpfw_siteChecker() == 'true'){
				// Alleen mogelijkheid tot doorsturen geven naar CD als site door de check komt ?>
				<option <?php echo (vallPageProtection_get_meta( 'vallPageProtection_redirectTo' ) === $clntDshInt ) ? 'selected' : '' ?> value="<?php echo $clntDshInt; ?>"><?php echo $clntDshInt; ?></option>
			<?php } ?>
		</select>
	</p><?php
}

function vallPageProtection_save( $post_id ) {
  global $clntDshInt;
  global $homepageInt;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['vallPageProtection_nonce'] ) || ! wp_verify_nonce( $_POST['vallPageProtection_nonce'], '_vallPageProtection_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['vallPageProtection_pageIsToBeProtected'] ) )
		update_post_meta( $post_id, 'vallPageProtection_pageIsToBeProtected', esc_attr( $_POST['vallPageProtection_pageIsToBeProtected'] ) );
	else
		update_post_meta( $post_id, 'vallPageProtection_pageIsToBeProtected', null );
	if ( isset( $_POST['vallPageProtection_redirectTo'] ) )
		update_post_meta( $post_id, 'vallPageProtection_redirectTo', esc_attr( $_POST['vallPageProtection_redirectTo'] ) );
}
add_action( 'save_post', 'vallPageProtection_save' );

/*
	Usage: vallPageProtection_get_meta( 'vallPageProtection_pageIsToBeProtected' )
	Usage: vallPageProtection_get_meta( 'vallPageProtection_redirectTo' )
*/

function redirectIfPageIsProtected() {
  $var1 = vallPageProtection_get_meta( 'vallPageProtection_pageIsToBeProtected' );
  $var2 = vallPageProtection_get_meta( 'vallPageProtection_redirectTo' );
  global $clntDshInt;
  global $homepageInt;

  if (is_Page() && $var1 == "true" && !is_user_logged_in()) {
  if ($var2 == $homepageInt /*|| $var2 == "Homepagina"*/) {
      $targetURL = site_url();
      wp_redirect($targetURL);
    } elseif ($var2 == $clntDshInt /*|| $var2 == "Client Dashboard"*/ ) {
      $targetURL = "/cd/inloggen";
      wp_redirect($targetURL);
    } else {
      $targetURL = site_url();
      wp_redirect($targetURL);
    }
  }
}

// Functie toevoegen indien widget geactiveerd is
if (get_option('vall_wpfw_option_general_toggle_pageprotection_module') == "true") {
 add_action('template_redirect', 'redirectIfPageIsProtected');
}


?>
