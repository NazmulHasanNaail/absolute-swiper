<?php
// Register Custom Post Type
$labels = array(
	'name'                  => _x( 'Absolute Swiper', 'Post Type General Name', 'absolute-swiper' ),
	'singular_name'         => _x( 'Absolute Swiper', 'Post Type Singular Name', 'absolute-swiper' ),
	'menu_name'             => __( 'Absolute Swiper', 'absolute-swiper' ),
	'name_admin_bar'        => __( 'Absolute Swiper', 'absolute-swiper' ),
	'archives'              => __( 'Item Archives', 'absolute-swiper' ),
	'attributes'            => __( 'Item Attributes', 'absolute-swiper' ),
	'parent_item_colon'     => __( 'Parent Item:', 'absolute-swiper' ),
	'all_items'             => __( 'All Items', 'absolute-swiper' ),
	'add_new_item'          => __( 'Add New Item', 'absolute-swiper' ),
	'add_new'               => __( 'Add New', 'absolute-swiper' ),
	'new_item'              => __( 'New Item', 'absolute-swiper' ),
	'edit_item'             => __( 'Create New Slider', 'absolute-swiper' ),
	'update_item'           => __( 'Update Item', 'absolute-swiper' ),
	'view_item'             => __( 'View Item', 'absolute-swiper' ),
	'view_items'            => __( 'View Items', 'absolute-swiper' ),
	'search_items'          => __( 'Search Item', 'absolute-swiper' ),
	'not_found'             => __( 'Not found', 'absolute-swiper' ),
	'not_found_in_trash'    => __( 'Not found in Trash', 'absolute-swiper' ),
	'featured_image'        => __( 'Featured Image', 'absolute-swiper' ),
	'set_featured_image'    => __( 'Set featured image', 'absolute-swiper' ),
	'remove_featured_image' => __( 'Remove featured image', 'absolute-swiper' ),
	'use_featured_image'    => __( 'Use as featured image', 'absolute-swiper' ),
	'insert_into_item'      => __( 'Insert into item', 'absolute-swiper' ),
	'uploaded_to_this_item' => __( 'Uploaded to this item', 'absolute-swiper' ),
	'items_list'            => __( 'Items list', 'absolute-swiper' ),
	'items_list_navigation' => __( 'Items list navigation', 'absolute-swiper' ),
	'filter_items_list'     => __( 'Filter items list', 'absolute-swiper' ),
);
$args = array(
	'label'                 => __( 'Absolute Swiper Slides', 'absolute-swiper' ),
	'labels'                => $labels,
	'supports'              => array( 'title'),
	'hierarchical'          => false,
	'public'                => true,
	'show_ui'               => true,
	'show_in_menu'          => true,
	'menu_position'         => 99,
	'menu_icon'             => esc_url( plugins_url( 'admin/images/logo.png', dirname(__FILE__) ) ),
	'show_in_admin_bar'     => true,
	'show_in_nav_menus'     => true,
	'can_export'            => true,
	'has_archive'           => true,
	'exclude_from_search'   => true,
	'publicly_queryable'    => false,
	'capability_type'       => 'post',
	'show_in_rest'          => true,
);
register_post_type( 'absolute_swiper', $args );