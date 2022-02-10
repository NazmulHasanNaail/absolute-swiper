<?php 

function as_checkit($name, $array){
    $result = '';
    if (is_array($array) && isset($array[$name])){ $result = $array[$name]; }
    return $result;
}

function absolute_swiper_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'show' => '',  
            'id' => 0
        ),
        $atts
    );

    $meta_prefix   = '_absolute_swiper_';
    $post_type     = 'absolute_swiper';

    $slider_post   = get_post_meta($atts['id'], $meta_prefix.'slider_post', true);

    if( !empty($slider_post) ){
        $postType = $slider_post['type'];

        if($postType == 'absolute_swiper'){
    
            $args = array( 
                'post_type'         => $postType,
                'posts_per_page'    => 1,
            );
    
        }else{
    
            $postcat = $slider_post['category'];
    
            if($postType == 'product'){
                
                $args = array( 
                    'post_type'         => $postType,
                    'posts_per_page'    => -1,
                    'product_cat' => $postcat,
                    'orderby' => 'title'
                );
    
            }else{
    
                $args = array( 
                    'post_type'         => $postType,
                    'posts_per_page'    => -1,
                    'category_name' => $postcat,
                    'orderby' => 'title'
                );
            }
        }
    
        $my_query = null;
        $my_query = new WP_Query($args);



        ob_start();
        if ( $my_query->have_posts() ) {
        ?>


<?php
            $general        = get_post_meta($atts['id'], $meta_prefix.'setting_general', true);
            $autoplay       = get_post_meta($atts['id'], $meta_prefix.'setting_autoplay', true);
            $pagination     = get_post_meta($atts['id'], $meta_prefix.'setting_pagination', true);
            $navigation     = get_post_meta($atts['id'], $meta_prefix.'setting_navigation', true);
            $breakpoints    = get_post_meta($atts['id'], $meta_prefix.'setting_breakpoints', true);

            $auto;
            $autoCheck = as_checkit('autoplay', $autoplay);

            $pagi;
            $pagiCheck = as_checkit('pagination', $pagination);

            $navi;
            $naviCheck = as_checkit('navigation', $navigation);

            if($general){
                $gene = array(
                    "initialSlide"          => as_checkit('initialSlide', $general),
                    "direction"             => as_checkit('direction', $general),
                    "speed"                 => as_checkit('speed', $general),
                    "autoHeight"            => filter_var(as_checkit('autoHeight', $general), FILTER_VALIDATE_BOOLEAN),
                    "effect"                => as_checkit('effect', $general),
                    "slidesPerView"         => as_checkit('slidesPerView', $general),
                    "slidesPerColumn"       => as_checkit('slidesPerColumn', $general),
                    "spaceBetween"          => as_checkit('spaceBetween', $general),
                );
            }

            if($breakpoints){           
                $breakp = array(
                    "320"   => array(
                        'slidesPerView' => as_checkit('320', $breakpoints)
                    ),
                    "480"   => array(
                        'slidesPerView' => as_checkit('480', $breakpoints)
                    ),
                    "640"   => array(
                        'slidesPerView' => as_checkit('640', $breakpoints)
                    ),
                    "768"   => array(
                        'slidesPerView' => as_checkit('768', $breakpoints)
                    ),
                    "980"   => array(
                        'slidesPerView' => as_checkit('980', $breakpoints)
                    ),
                    "1024"  => array(
                        'slidesPerView' => as_checkit('1024', $breakpoints)
                    )
                );
            }

            if($autoCheck == 'false'){
                $auto = filter_var($autoCheck, FILTER_VALIDATE_BOOLEAN);
            }else{
                $auto = array(
                    'delay'                 => as_checkit('delay', $autoplay),
                    'stopOnLastSlide'       => filter_var(as_checkit('stopOnLastSlide', $autoplay), FILTER_VALIDATE_BOOLEAN),
                    'disableOnInteraction'  => filter_var(as_checkit('disableOnInteraction', $autoplay), FILTER_VALIDATE_BOOLEAN),
                    'reverseDirection'      => filter_var(as_checkit('reverseDirection', $autoplay), FILTER_VALIDATE_BOOLEAN),
                    'waitForTransition'     => filter_var(as_checkit('waitForTransition', $autoplay), FILTER_VALIDATE_BOOLEAN)
                );
            }

            if($pagiCheck == 'false'){
                $pagi = filter_var($pagiCheck, FILTER_VALIDATE_BOOLEAN);
            }else{
                $pagi = array(
                    "type"                  => as_checkit('type', $pagination),
                    "el"                    => '.'.as_checkit('el', $pagination),
                    "bulletElement"         => as_checkit('bulletElement', $pagination),
                    "clickable"             => filter_var(as_checkit('clickable', $pagination), FILTER_VALIDATE_BOOLEAN),
                    "bulletClass"           => as_checkit('bulletClass', $pagination),
                    "currentClass"          => as_checkit('currentClass', $pagination),
                    "bulletActiveClass"     => as_checkit('bulletActiveClass', $pagination),
                    "clickableClass"        => as_checkit('clickableClass', $pagination),
                    "lockClass"             => as_checkit('lockClass', $pagination),
                );
            }

            if($naviCheck == 'false'){
                $navi = filter_var($naviCheck, FILTER_VALIDATE_BOOLEAN);
            }else{
                $navi = array(
                    "nextEl"                => '.'.as_checkit('nextEl', $navigation),
                    "prevEl"                => '.'.as_checkit('prevEl', $navigation),
                    "disabledClass"         => as_checkit('disabledClass', $navigation),
                    "hiddenClass"           => as_checkit('hiddenClass', $navigation),
                );
            }

        ?>

<div class="swiper" data-slider='swiperSlider<?php echo $atts['id']; ?>'
    data-general='<?php echo json_encode($gene, JSON_NUMERIC_CHECK); ?>'
    data-autoplay='<?php echo json_encode($auto, JSON_NUMERIC_CHECK); ?>'
    data-pagination='<?php echo json_encode($pagi, JSON_NUMERIC_CHECK); ?>'
    data-navigation='<?php echo json_encode($navi, JSON_NUMERIC_CHECK); ?>'
    data-breakpoints='<?php echo json_encode($breakp, JSON_NUMERIC_CHECK); ?>'>
    <div class="swiper-wrapper">
        <?php

                while ($my_query->have_posts()) : $my_query->the_post();
                    if($postType == 'absolute_swiper'){

                        if(array_key_exists("gallery", $slider_post)){
                            $ids = $slider_post['gallery'];
                        }else{
                            $ids = '';
                        }
                        
                    
                        ?>
        <?php if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value, 'full'); ?>
        <div class="swiper-slide">
            <img class="image-preview" src="<?php echo $image[0]; ?>">
        </div>
        <?php endforeach; endif; 
                    }
                    else{
                        ?>
        <div class="swiper-slide">
            <?php the_post_thumbnail('full'); ?>
            <div class="absolute-slider-content">
                <h4><a href="<?php the_permalink(); ?>"
                        title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                <?php 
                                the_excerpt(  ); 
                                ?>
                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"
                    itemprop="datePublished"><?php echo esc_html(get_the_date('d M Y')); ?></time>

                <?php
                                if ( class_exists( 'WooCommerce' ) ){
                                    $product = wc_get_product( get_the_ID() );
                                    if($product): /* get the WC_Product Object */ 
                                    ?>
                <span class="price"><?php echo $product->get_price_html(); ?></span>
                <?php
                                endif;
                                } 
                                ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="btn">link</a>
            </div>
        </div>
        <?php 
                    }
                endwhile; 
                wp_reset_query(); ?>
    </div>



    <?php if($pagiCheck != 'false'){ ?>
    <div class="<?php echo as_checkit('el', $pagination); ?>"></div>
    <?php } ?>

    <?php if($naviCheck != 'false'){ ?>
    <div class="<?php echo as_checkit('prevEl', $navigation); ?>"></div>
    <div class="<?php echo as_checkit('nextEl', $navigation); ?>"></div>
    <?php } ?>
</div>

<?php 
        }else{ 
            _e( 'Sorry, no slider were found.', 'textdomain' );
        }

        $html = ob_get_clean();
        return $html;
    }
}

add_shortcode( 'absolute_swiper', 'absolute_swiper_shortcode' );