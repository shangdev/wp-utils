<?php
/**
 * Filter Reference: login_redirect
 * 登陆重定向
 * 
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/login_redirect
 * 
 * @since 1.0
 */

?>

<?php
/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to  URL to redirect to.
 * @param string $request      URL the user is coming from.
 * @param object $user         Logged user's data.
 *
 * @return string
 */
function action_login_redirect( $redirect_to, $request, $user ) {
    // Is there a user to check?
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        // Check for author
        if ( in_array( 'author', $user->roles ) ) {
            // redirect them to another URL, in this case, the author pahe 
            $redirect_to =  get_author_posts_url( $user->ID );
        }
    }

	return $redirect_to;
}

add_filter( 'login_redirect', 'action_login_redirect', 11, 3 );
