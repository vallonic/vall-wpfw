<?php
// Nieuwe metabox maken
function vallPageProtectionMeta() {
    add_meta_box( 'vallPageProtectionMetaBox', 'VallFW — Beveiliging', 'vallPageProtectionMeta_callback', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'vallPageProtectionMeta' );

// De metabox vullen met content
function vallPageProtectionMeta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'vallPageProtection_nonce' );
    $vallPageProtection_stored_meta = get_post_meta( $post->ID );
    ?>
 <p>
    <span class="vallPageProtection-row-title">Moeten gebruikers ingelogd zijn om deze pagina te mogen bekijken?</span>
    <div class="vallPageProtection-row-content">
        <label for="mustBeLoggedIn">
            <input type="checkbox" name="mustBeLoggedIn" id="mustBeLoggedInCheckbox" value="yes" <?php if ( isset ( $vallPageProtection_stored_meta['mustBeLoggedIn'] ) ) checked( $vallPageProtection_stored_meta['mustBeLoggedIn'][0], 'yes' ); ?> />
            Ja, alleen zichtbaar voor ingelogde gebruikers
        </label>

    </div>
</p>

    <?php
}

/**
 * Saves the custom meta input
 */
function vallPageProtection_meta_save( $post_id ) {

    // Checks save status - overcome autosave, etc.
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'vallPageProtection_nonce' ] ) && wp_verify_nonce( $_POST[ 'vallPageProtection_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

// Checks for input and saves - save checked as yes and unchecked at no
if( isset( $_POST[ 'mustBeLoggedIn' ] ) ) {
    update_post_meta( $post_id, 'mustBeLoggedIn', 'yes' );
} else {
    update_post_meta( $post_id, 'mustBeLoggedIn', 'no' );
}

}
add_action( 'save_post', 'vallPageProtection_meta_save' );

// Doorsturen als gebruiker op pagina is zonder ingelogd te zijn
function redirectIfPageIsProtected() {
  $value = get_post_meta($post_id, 'mustBeLoggedIn', TRUE);
  if(is_single() && is_page() && $value == 'yes') {
      $redirect = "/cd";
      wp_redirect($redirect);
  }
}

add_action('template_redirect', 'redirectIfPageIsProtected');

?>
