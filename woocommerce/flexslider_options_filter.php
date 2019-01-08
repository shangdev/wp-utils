<?php
/**
 * Filter Reference: woocommerce_single_product_carousel_options 
 * 过滤产品缩略图滑块参数
 * 
 * @link http://hookr.io/filters/woocommerce_single_product_carousel_options/
 * 
 * @since 1.0
 */

?>

<?php
/**
 * Filter default flexslide options.
 * 
 * @param array $options The flexslide options.
 * 
 * @return array
 */
function my_product_carousel_options( $options ) {
    $options['animation'] = 'fade';

    return $options;
}

add_filter( "woocommerce_single_product_carousel_options", "my_product_carousel_options", 10 );