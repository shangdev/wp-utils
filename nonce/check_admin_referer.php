<?php
/**
 * Function Reference: check_admin_referer
 * 检查当前请求是否包含有效的 Nonce，或者当前请求是否来自后台
 * 用于避免 CSRF 安全漏洞
 * 
 * @link https://codex.wordpress.org/Function_Reference/check_ajax_referer
 * 
 * @since 1.0
 */

?>

<form method="post">
   <!-- some inputs here -->
   <?php wp_nonce_field( 'action_name', 'nonce' ); ?>
</form>

<?php
if ( check_admin_referer( 'action_name', 'nonce' ) ) {
    // do something
}
