<?php 

$post_type = "absolute_swiper";

add_filter( 'manage_'. $post_type .'_posts_columns', 'absolute_swiper_admin_columns' );
add_action( 'manage_'. $post_type .'_posts_custom_column', 'absolute_swiper_admin_custom_column', 10, 2 );

// Set Custom Columns
function absolute_swiper_admin_columns( $columns){
	$addColumns = array();
	$addColumns['cb'] = '<input type="checkbox" />';
	$addColumns['title'] = 'Sliders';
	$addColumns['shortcode'] = 'Shortcode';
	$addColumns['author'] =  'Author';
	$addColumns['date'] = 'Date';
	return $addColumns;
}

//  Create Custom Columns
function absolute_swiper_admin_custom_column( $column, $post_id ){
	
	global $post;
	$post_id = absint( $post_id );
	$meta_prefix = '_absolute_swiper_';

    if( $column == 'shortcode' ){
	?>
		<input type="text" readonly="readonly" value='[absolute-swiper id="<?php echo $post->ID ?>"]' class="large-text code">
		<a href="#" class="copyData">Copy to clipboard</a>
	<?php
    }
}