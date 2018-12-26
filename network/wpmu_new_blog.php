<?php
/**
 * Function Reference: wpmu_new_blog
 * 用户自行注册或通过管理员注册新博客（站点）后立即触发。
 * 
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/wpmu_new_blog
 * 
 * @since 1.0
 */

?>

<?php
/**
 * Example of wpmu_new_blog usage
 * 
 * @param int    $blog_id Blog id.
 * @param int    $user_id User ID.
 * @param string $domain  Site domain.
 * @param string $path    Site path.
 * @param int    $site_id Site ID. Only relevant on multi-network installs.
 * @param array  $meta    Meta data. Used to set initial site options.
 */
function action_maybe_add_user_to_blog( $blog_id, $user_id, $domain, $path, $site_id, $meta ) {
	$userMeta = get_user_meta( $user_id );

	if ( isset( $userMeta->roles ) && is_array( $userMeta->roles ) ) {
		if ( ! in_array( 'author', $userMeta->roles ) ) {
			add_user_to_blog( 1, $user_id, 'author' );
		}
	}
}

add_action( 'wpmu_new_blog', 'action_maybe_add_user_to_blog', 10, 6 );
