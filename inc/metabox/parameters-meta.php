<?php

$general    = get_post_meta($post->ID, $this->meta_prefix.'setting_general', true);

$general = array(
    "initialSlide"          => $this->as_checkit('initialSlide', $general, '0'),
    "direction"             => $this->as_checkit('direction', $general, 'horizontal'),
    "speed"                 => $this->as_checkit('speed', $general, '300'),
    "autoHeight"            => $this->as_checkit('autoHeight', $general, 'false'),
    "effect"                => $this->as_checkit('effect', $general, 'slide'),
    "slidesPerView"         => $this->as_checkit('slidesPerView', $general, '1'),
    "slidesPerColumn"       => $this->as_checkit('slidesPerColumn', $general, '1'),
    "spaceBetween"          => $this->as_checkit('spaceBetween', $general, '0'),
);

?>

<div id="absolute-swiper-tab-parameters" class="tabSec generalOptions">
    <table class="autoPlaySettings">
        <tr data-filter-item data-filter-name="initialSlide InitialSlide initialslide initial Initial slide Slide">
            <td>
                <label><?php echo esc_html('initialSlide', 'absolute-swiper' ); ?></label>
            </td>
            <td>
                <span><?php echo esc_html('Index number of initial slide.', 'absolute-swiper' ); ?></span>
                <input 
                    id="initialSlide"
                    name="<?php echo esc_attr( $this->meta_prefix.'setting_general[initialSlide]', 'absolute-swiper' ); ?>"
                    type="number" 
                    min="0"
                    value="<?php echo esc_attr( $general['initialSlide'], 'absolute-swiper' ); ?>">
            </td>
        </tr>
        <tr data-filter-item data-filter-name="direction Direction">
            <td>
                <label for=""><?php echo esc_html('direction', 'absolute-swiper') ?></label>
            </td>
            <td>
                <span><?php echo esc_html("Could be 'horizontal' or 'vertical' (for vertical slider).", 'absolute-swiper'); ?></span>
                <select name="<?php echo esc_attr( $this->meta_prefix.'setting_general[direction]', 'absolute-swiper' ); ?>">
                    <option value="horizontal" <?php selected($general['direction'], 'horizontal') ?>><?php echo esc_html('horizontal', 'absolute-swiper'); ?></option>
                    <option value="vertical" <?php selected($general['direction'], 'vertical') ?>><?php echo esc_html('vertical', 'absolute-swiper'); ?></option>
                </select>
            </td>
        </tr>
        <tr data-filter-item data-filter-name="speed Speed">
            <td>
                <label for=""><?php echo esc_html('speed', 'absolute-swiper'); ?></label>
            </td>
            <td>
                <span><?php echo esc_html('Duration of transition between slides (in ms)', 'absolute-swiper'); ?></span>
                <input 
                    id="speed"
                    name="<?php echo esc_attr( $this->meta_prefix.'setting_general[speed]', 'absolute-swiper' ); ?>"
                    type="number"
                    min="0" 
                    step="100"
                    value="<?php echo esc_attr( $general['speed'], 'absolute-swiper' ); ?>">
            </td>
        </tr>
        <tr data-filter-item data-filter-name="autoHeight AutoHeight autoheight auto Auto height Height">
            <td>
                <label for=""><?php echo esc_html('autoHeight', 'absolute-swiper'); ?></label>
            </td>
            <td>
                <span><?php echo  esc_html('Set to true and slider wrapper will adopt its height to the height of the currently active slide','absolute-swiper'); ?></span>
                <ul>
                    <li>
                        <label>
                            <input 
                                name="<?php echo esc_attr( $this->meta_prefix.'setting_general[autoHeight]', 'absolute-swiper' ); ?>"
                                type="radio" 
                                <?php checked( $general['autoHeight'], 'true' ); ?>
                                value="true">True
                        </label>
                    </li>
                    <li>
                        <label>
                            <input 
                                name="<?php echo esc_attr( $this->meta_prefix.'setting_general[autoHeight]', 'absolute-swiper' ); ?>"
                                type="radio" 
                                <?php checked( $general['autoHeight'], 'false' ); ?>
                                value="false">False
                        </label>
                    </li>
                </ul>
            </td>
        </tr>
        <tr data-filter-item data-filter-name="spaceBetween SpaceBetween spacebetween space Space between Between">
            <td>
                <label for=""><?php echo esc_html('spaceBetween', 'absolute-swiper'); ?></label>
            </td>
            <td>
                <span><?php echo esc_html('Distance between slides in px.', 'absolute-swiper'); ?></span>
                <input 
                    id="spaceBetween"
                    name="<?php echo esc_attr( $this->meta_prefix.'setting_general[spaceBetween]', 'absolute-swiper' ); ?>"
                    type="number"
                    min="0" 
                    value="<?php echo esc_attr( $general['spaceBetween'], 'absolute-swiper' ); ?>">
            </td>
        </tr>
        <tr data-filter-item data-filter-name="effect Effect">
            <td>
                <label for=""><?php echo esc_html('effect', 'absolute-swiper') ?></label>
            </td>
            <td>
                <span><?php echo esc_html('Tranisition effect.', 'absolute-swiper') ?></span>
                <select name="<?php echo esc_attr( $this->meta_prefix.'setting_general[effect]', 'absolute-swiper' ); ?>">
                    <option value="slide" <?php selected($general['effect'], 'slide') ?>><?php echo esc_html('slide', 'absolute-swiper'); ?></option>
                    <option value="fade" <?php selected($general['effect'], 'fade') ?>><?php echo esc_html('fade', 'absolute-swiper'); ?></option>
                    <option value="cube" <?php selected($general['effect'], 'cube') ?>><?php echo esc_html('cube', 'absolute-swiper'); ?></option>
                    <option value="coverflow" <?php selected($general['effect'], 'coverflow') ?>><?php echo esc_html('coverflow', 'absolute-swiper'); ?></option>
                    <option value="flip" <?php selected($general['effect'], 'flip') ?>><?php echo esc_html('flip', 'absolute-swiper'); ?></option>
                    <option value="cards" <?php selected($general['effect'], 'cards') ?>><?php echo esc_html('cards', 'absolute-swiper'); ?></option>
                </select>
            </td>
        </tr>
    </table>
</div>