<?php
/*function vallPageProtectionMetaBox() {
  add_meta_box(
    'wporg_box_id',           // Unique ID
    'Custom Meta Box Title',  // Box titl
    'wporg_custom_box_html',  // Content callback, must be of type callable
    'page'                   // Post type
        );
    }
}

add_action('add_meta_boxes', 'vallPageProtectionMetaBox');
function getRoles() {
    global $wp_roles;
    $all_roles = $wp_roles->roles;
    return $all_roles;
}

function wporg_custom_box_html($post) { ?>
  <label for="zichtbaarheid">Wie heeft toegang tot deze pagina?</label>
  <select name="zichtbaarheid" id="wporg_field" class="postbox">
    <option value="visibleToEveryone">Iedereen</option>
    <option value="visibleToEveryone">Ingelogde gebruikers</option>
  </select>
<?php }
*/


function vallPageProtectionMeta() {
    add_meta_box( 'vallPageProtectionMetaBox', 'Custom Meta Box Title', 'vallPageProtectionMeta_callback', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'vallPageProtectionMeta' );

/**
 * Outputs the content of the meta box
 */

function vallPageProtectionMetacallback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'vallPageProtection_nonce' );
    $vallPageProtection_stored_meta = get_post_meta( $post->ID );
    ?>

 <p>
    <span class="vallPageProtection-row-title">Test</span>
    <div class="vallPageProtection-row-content">
        <label for="featured-checkbox">
            <input type="checkbox" name="featured-checkbox" id="featured-checkbox" value="yes" <?php if ( isset ( $vallPageProtection_stored_meta['mustBeLoggedIn'] ) ) checked( $vallPageProtection_stored_meta['mustBeLoggedIn'][0], 'yes' ); ?> />
            Featured Item
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
if( isset( $_POST[ 'featured-checkbox' ] ) ) {
    update_post_meta( $post_id, 'featured-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'featured-checkbox', 'no' );
}

}
add_action( 'save_post', 'vallPageProtection_meta_save' );
?>
