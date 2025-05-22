<?php

// Remove WooCommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array');

// Change category title
remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );

add_action( 'woocommerce_shop_loop_subcategory_title', function ( $category ) {
    echo '<h6>' . esc_html($category->name) . '</h6>';
    echo '<small class="text-body">' . $category->count . __(' Products', 'wootheme') . '</small>';
} );

// Remove product link
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

// Remove sale flash
// remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);


// Remove product title
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

// Add product title
add_action('woocommerce_shop_loop_item_title', function () {
    global $product;
    /** @var \WC_Product $product */
    echo '<a class="h6 text-decoration-none text-truncate" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>';
}, 10);

// Remove rating
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

// Change breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_filter( 'woocommerce_breadcrumb_defaults', function() {
	return array(
		'delimiter'   => '&nbsp;/&nbsp;',
		'wrap_before' => '<nav class="breadcrumb bg-light mb-30">',
		'wrap_after'  => '</nav>',
		'before'      => '',
		'after'       => '',
		'home'        => __( 'Home', 'wootheme' ),
	);
});

// Remove notices
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);

// Remove sidebar from product page
add_action( 'template_redirect', function () {
	if ( is_product() ) {
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	}
} );

// Remove sale flash from product page
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// Remove related products from product page
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Remove upsell products from product page
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

// Remove cross sell from product cart page
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );

// https://woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
add_filter( 'woocommerce_default_address_fields', function ( $fields ) {
	unset( $fields['address_2'] );

	return $fields;
} );

// https://wpbeaches.com/filter-woocommerce-place-order-text-button-in-checkout-page/
add_filter( 'woocommerce_order_button_html', function ( $button ) {
	return str_replace( 'button alt', 'button alt btn btn-block btn-primary font-weight-bold py-3', $button );
} );