<?php

add_action( 'init', 'wootheme_slider' );
function wootheme_slider() {
	register_post_type( 'slider', array(
		'labels'       => array(
			'name'          => __( 'Slider', 'wootheme' ),
			'singular_name' => __( 'Slider', 'wootheme' ),
			'add_new'       => __( 'Add new slide', 'wootheme' ),
			'add_new_item'  => __( 'New slide', 'wootheme' ),
			'edit_item'     => __( 'Edit', 'wootheme' ),
			'new_item'      => __( 'New slide', 'wootheme' ),
			'view_item'     => __( 'View', 'wootheme' ),
			'menu_name'     => __( 'Slider', 'wootheme' ),
			'all_items'     => __( 'All slides', 'wootheme' ),
		),
		'public'       => true,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'menu_icon'    => 'dashicons-format-gallery',
		'show_in_rest' => true,
	) );
}