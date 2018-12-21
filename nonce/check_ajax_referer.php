<?php
/**
 * Function Reference: check_ajax_referer
 * 标准函数验证 AJAX 请求，以防止第三方站点或系统对传入的请求进行任何处理
 * 
 * @link https://codex.wordpress.org/Function_Reference/check_ajax_referer
 * 
 * @since 1.0
 */

?>

<!-- Frontend -->
<script type="text/javascript">
jQuery(document).ready(function($){
	var data = {
		action: 'action_name',
		nonce: '<?php echo wp_create_nonce( 'action_name' ); ?>',
		my_string: 'Hello World!'
	};

	jQuery.post(ajaxurl, data, function(response) {
        if(response.success) {
            // ...
        }

        alert("Response: " + response);
	});
});
</script>

<?php
// Backend
function action_name_function() {
    if ( check_ajax_referer( 'action_name', 'nonce' ) ) {
        wp_send_json_error( array(
            'code' => 'error_code',
            'message' => 'error message',
        ) );
    }

    $request = wp_unslash( $_POST );
    $my_string = sanitize_text_field( $request['my_string'] );

    wp_send_json_success( array(
        'message' => 'success message',
    ) );
}

add_action( 'wp_ajax_action_name', 'action_name_function' );