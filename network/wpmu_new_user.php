<?php
/**
 * Function Reference: wpmu_new_user
 * 用户自行注册或通过管理员注册新用户后立即触发。
 * 非多站点时用（user_register）
 * 
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/wpmu_new_user
 * 
 * @since 1.0
 */

?>

<?php
/**
 * Example of wpmu_new_user usage
 *
 * @param int $user_id User id
 */
function action_add_user_to_blog( $user_id ) {
	add_user_to_blog( 1, $user_id, 'author' );
}

add_action( 'wpmu_new_user', 'action_add_user_to_blog', 10, 1 );
