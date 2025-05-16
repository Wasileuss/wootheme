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