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
        <label for="mustBeLoggedInCheckbox">
            <input type="checkbox" name="mustBeLoggedInCheckbox" id="mustBeLoggedInCheckbox" value="yes" <?php if ( isset ( $vallPageProtection_stored_meta['mustBeLoggedInCheckbox'] ) ) checked( $vallPageProtection_stored_meta['mustBeLoggedInCheckbox'][0], 'yes' ); ?> />
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
if( isset( $_POST[ 'mustBeLoggedInCheckbox' ] ) ) {
    update_post_meta( $post_id, 'mustBeLoggedInCheckbox', 'yes' );
} else {
    update_post_meta( $post_id, 'mustBeLoggedInCheckbox', 'no' );
}

}
add_action( 'save_post', 'vallPageProtection_meta_save' );
?>
