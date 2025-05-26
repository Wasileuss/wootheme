<?php

function wootheme_setup() {
    load_textdomain( 'wootheme', get_template_directory(). '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'wootheme_setup' );

function wootheme_widgets_init() {
	register_sidebar(
		array(
			'name' => esc_html__( 'Sidebar', 'wootheme' ),
			'id' => 'sidebar-filters',
			'description' => esc_html__( 'Add widgets here.', 'wootheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
		)
	);
}
add_action( 'widgets_init', 'wootheme_widgets_init' );

add_action( 'wp_head', function() {
    echo '<link rel="preconnect" href="https://fonts.gstatic.com">';
    }, 5);

// Scripts
function wootheme_scripts() {

	wp_enqueue_style( 'wootheme-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap', [], null );
	wp_enqueue_style( 'wootheme-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css' );
    wp_enqueue_style( 'wootheme-animations', get_template_directory_uri() . '/assets/lib/animate/animate.min.css' );
    wp_enqueue_style( 'wootheme-owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css' );
    wp_enqueue_style( 'wootheme-main', get_template_directory_uri() . '/assets/css/style.css' );
    wp_enqueue_style( 'wootheme-custom', get_template_directory_uri() . '/assets/css/custom.css' );

    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'wootheme-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script( 'wootheme-easing', get_template_directory_uri() . '/assets/lib/easing/easing.min.js', array(), false, true);
    wp_enqueue_script( 'wootheme-owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.min.js', array(), false, true);
    wp_enqueue_script( 'wootheme-main', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);

}
add_action( 'wp_enqueue_scripts', 'wootheme_scripts' );

// Menus
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'wootheme' ),
    'category' => __( 'Category Menu', 'wootheme' ),
    'navbar' => __( 'Navbar Menu', 'wootheme' ),
    'footer' => __( 'Footer Menu', 'wootheme' ),
    'footer-shop' => __( 'Footer Shop Menu', 'wootheme' )
) );

// WooCommerce
require_once get_template_directory() . '/inc/woocommerce-hooks.php';
require_once get_template_directory(). '/inc/class-wootheme-menu-categories.php';
require_once get_template_directory(). '/inc/class-wootheme-menu-navbar.php';
require_once get_template_directory(). '/inc/class-wootheme-menu-footer.php';
require_once get_template_directory(). '/inc/cpt.php';
require_once get_template_directory(). '/inc/zoho.php';
require_once get_template_directory(). '/inc/hubspot.php';

// Debug
function wootheme_debug( $data ) {
    echo '<pre>' . print_r( $data, 1 ) . '</pre>';
}

// Update cart count
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
    $fragments['.cart-count'] = '<span class="cart-count count badge text-dark border border-dark rounded-circle">' . WC()->cart->get_cart_contents_count() . '</span>';
    return $fragments;
});


// add_action('init', function() {
//     if (!get_option('zoho_refresh_token')) {
//         update_option('zoho_refresh_token', '1000.ff1c7f44774707cd2b3cc89e897f04b6.ad0ca0bee8911d877e00b25825e1b7df');
//         update_option('zoho_access_token', '1000.c8694c2cd84780787c6329da3e3c357e.986bdd313536a1348a708170eabb9d8e');
//         update_option('zoho_token_created_at', time());
//         error_log('Zoho tokens saved to wp_options');
//     }
// });