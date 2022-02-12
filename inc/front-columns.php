<?php 

$post_type = "absolute_swiper";

add_filter( 'manage_'. $post_type .'_posts_columns', 'as_set_carousel_columns' );
add_action( 'manage_'. $post_type .'_posts_custom_column', 'as_carousel_custom_column', 10, 2 );

// Set Custom Columns
function as_set_carousel_columns( $columns){
	$addColumns = array();
	$addColumns['cb'] = '<input type="checkbox" />';
	$addColumns['title'] = 'Sliders';
	$addColumns['shortcode'] = 'Shortcode';
	$addColumns['author'] =  'Author';
	$addColumns['date'] = 'Date';
	return $addColumns;
}

//  Create Custom Columns
function as_carousel_custom_column( $column, $post_id ){
	
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