<?php 

$navigation = get_post_meta($post->ID, $this->meta_prefix.'setting_navigation', true);
        
$navigation = array(
    "navigation"            => $this->as_checkit('navigation', $navigation, 'true'),
    "nextEl"                => $this->as_checkit('nextEl', $navigation, 'swiper-button-next'),
    "prevEl"                => $this->as_checkit('prevEl', $navigation, 'swiper-button-prev'),
    "disabledClass"         => $this->as_checkit('disabledClass', $navigation, 'swiper-button-disabled'),
    "hiddenClass"           => $this->as_checkit('hiddenClass', $navigation, 'swiper-button-hidden'),
);

?>
<div id="absolute-swiper-tab-navigation" class="tabSec navigation">
    <table>
        <tbody>
            <tr data-filter-item data-filter-name="Navigation navigation">
                <td>
                    <label><?php echo esc_html('Navigation', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <ul>
                        <li>
                            <label>
                                <input 
                                    type="radio" 
                                    name="<?php echo esc_attr( $this->meta_prefix.'setting_navigation[navigation]', 'absolute-swiper' ); ?>" 
                                    value="true" 
                                    <?php checked( $navigation['navigation'], 'true' ); ?>>
                                <?php echo esc_html('True', 'absolute-swiper' ); ?>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input 
                                    type="radio" 
                                    name="<?php echo esc_attr( $this->meta_prefix.'setting_navigation[navigation]', 'absolute-swiper' ); ?>" 
                                    value="false" 
                                    <?php checked( $navigation['navigation'], 'false' ); ?>>
                                <?php echo esc_html('False', 'absolute-swiper' ); ?>
                            </label>
                        </li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="<?php echo ($navigation['navigation'] == 'false' ? 'hiddenData' : '' ) ?>">
        <table class="autoPlaySettings">
            <tr data-filter-item data-filter-name="nextEl NextEl nextel next Next el El Arrow arrow">
                <td>
                    <label for="nextEl"><?php echo esc_html('nextEl', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <span><?php echo esc_html('String with CSS selector or HTML element of the element that will work like "next" button after click on it', 'absolute-swiper' ); ?></span>
                    <input 
                            id="nextEl"
                            name="<?php echo esc_attr( $this->meta_prefix.'setting_navigation[nextEl]', 'absolute-swiper' ); ?>"
                            type="text" 
                            value="<?php echo esc_attr( $navigation['nextEl'], 'absolute-swiper' ); ?>">
                </td>
            </tr>
            <tr data-filter-item data-filter-name="prevEl PrevEl prevel prev Prev el El Arrow arrow">
                <td>
                    <label for="prevEl"><?php echo esc_html('prevEl', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <span><?php echo  esc_html('String with CSS selector or HTML element of the element that will work like "prev" button after click on it', 'absolute-swiper' ); ?></span>
                    <input 
                            id="prevEl"
                            name="<?php echo esc_attr( $this->meta_prefix.'setting_navigation[prevEl]', 'absolute-swiper' ); ?>"
                            type="text" 
                            value="<?php echo esc_attr( $navigation['prevEl'], 'absolute-swiper' ); ?>">
                </td>
            </tr>
            <tr data-filter-item data-filter-name="disabledClass DisabledClass disabledclass disabled Disabled Class class">
                <td>
                    <label for="disabledClass"><?php echo  esc_html('disabledClass', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <span><?php echo esc_html('CSS class name added to navigation button when it becomes disabled', 'absolute-swiper' ); ?></span>
                    <input 
                            id="disabledClass"
                            name="<?php echo esc_attr( $this->meta_prefix.'setting_navigation[disabledClass]', 'absolute-swiper' ); ?>"
                            type="text" 
                            value="<?php echo esc_attr( $navigation['disabledClass'], 'absolute-swiper' ); ?>">
                </td>
            </tr>
            <tr data-filter-item data-filter-name="hiddenClass HiddenClass hiddenclass hidden Hidden class Class">
                <td>
                    <label for="hiddenClass"><?php echo esc_html('hiddenClass', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <span><?php echo esc_html('CSS class name added to navigation button when it becomes hidden', 'absolute-swiper' ); ?></span>
                    <input 
                            id="hiddenClass"
                            name="<?php echo esc_attr( $this->meta_prefix.'setting_navigation[hiddenClass]', 'absolute-swiper' ); ?>"
                            type="text" 
                            value="<?php echo esc_attr( $navigation['hiddenClass'], 'absolute-swiper' ); ?>">
                </td>
            </tr>
        </table>
    </div>
</div>