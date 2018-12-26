<?php
/**
 * Action Reference: admin_init 
 * 登陆重定向
 * 
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/admin_init
 * 
 * @since 1.0
 */

?>

<?php
/**
 * Example: Restrict access to the administration screens.
 * 
 * Only administrators will be allowed to access the admin screens,
 * all other users will be automatically redirected to the front of
 * the site instead.
 * 
 * We do allow access for Ajax requests though, since these may be
 * initiated from the front end of the site by non-admin users.
 */
function action_admin_init() {
    if ( ! current_user_can( 'manage_options' ) && ( ! wp_doing_ajax() ) ) {
		wp_safe_redirect( site_url() ); 
		exit();
	}
}

add_action( 'admin_init', 'action_admin_init', 1 );
