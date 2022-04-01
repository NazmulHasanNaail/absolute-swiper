<?php 

$autoplay   = get_post_meta($post->ID, $this->meta_prefix.'setting_autoplay', true);

$autoplay = array(
    "autoplay"             => $this->as_checkit('autoplay', $autoplay, 'true'),
    "delay"                => $this->as_checkit('delay', $autoplay, '3000'),
    "stopOnLastSlide"      => $this->as_checkit('stopOnLastSlide', $autoplay, 'false'),
    "disableOnInteraction" => $this->as_checkit('disableOnInteraction', $autoplay, 'true'),
    "reverseDirection"     => $this->as_checkit('reverseDirection', $autoplay, 'false'),
    "waitForTransition"    => $this->as_checkit('waitForTransition', $autoplay, 'true')
);

?>

<div id="absolute-swiper-tab-autoplay" class="tabSec autoPlay">
    <table>
        <tbody>
            <tr data-filter-item data-filter-name="Autoplay autoplay autoplay Auto Play auto play">
                <td>
                    <label><?php echo esc_html('Autoplay', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <ul>
                        <li>
                            <label>
                                <input 
                                    type="radio" 
                                    name="<?php echo esc_attr( $this->meta_prefix.'setting_autoplay[autoplay]', 'absolute-swiper' ); ?>" 
                                    value="true" 
                                    <?php checked( $autoplay['autoplay'], 'true' ); ?>>
                                <?php echo esc_html('True', 'absolute-swiper' ); ?>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input 
                                    type="radio" 
                                    name="<?php echo esc_attr( $this->meta_prefix.'setting_autoplay[autoplay]', 'absolute-swiper' ); ?>" 
                                    value="false" 
                                    <?php checked( $autoplay['autoplay'], 'false' ); ?>>
                                <?php echo esc_html('False', 'absolute-swiper' ); ?>
                            </label>
                        </li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
    
    <div class="<?php echo ($autoplay['autoplay'] == 'false' ? 'hiddenData' : '' ) ?>">
        <table class="autoPlaySettings">
            <tbody>
                <tr data-filter-item data-filter-name="Delay delay">
                    <td>
                        <label for="apDelay"><?php echo esc_html('Delay', 'absolute-swiper' ); ?></label>
                    </td>
                    <td>
                        <span><?php echo esc_html('Delay between transitions (in ms).', 'absolute-swiper' ); ?></span>
                        <input 
                            id="apDelay" 
                            name="<?php echo esc_attr( $this->meta_prefix.'setting_autoplay[delay]', 'absolute-swiper' ); ?>"
                            type="number"
                            min="0"
                            step="100" 
                            value="<?php echo esc_attr( $autoplay['delay'], 'absolute-swiper' ); ?>">
                    </td>
                </tr>
                <tr data-filter-item data-filter-name="stopOnLastSlide StopOnLastSlide stoponlastslide stop Stop on On Last last slide Slide">
                    <td>
                        <label><?php echo esc_html('stopOnLastSlide', 'absolute-swiper' ); ?></label>
                    </td>
                    <td>
                        <span><?php echo esc_html('Enable this parameter and autoplay will be stopped when it reaches last slide (has no effect in loop mode)', 'absolute-swiper' ); ?></span>
                        <ul>
                            <li>
                                <label>
                                    <input 
                                        name="<?php echo esc_attr( $this->meta_prefix.'setting_autoplay[stopOnLastSlide]', 'absolute-swiper' ); ?>"
                                        type="radio" 
                                        <?php checked( $autoplay['stopOnLastSlide'], 'true' ); ?>
                                        value="true">
                                    <?php echo  esc_html('True', 'absolute-swiper' ); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input 
                                        name="<?php echo esc_attr( $this->meta_prefix.'setting_autoplay[stopOnLastSlide]', 'absolute-swiper' ); ?>"
                                        type="radio" 
                                        <?php checked( $autoplay['stopOnLastSlide'], 'false' ); ?>
                                        value="false">
                                    <?php echo esc_html('False', 'absolute-swiper' ); ?>
                                </label>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr data-filter-item data-filter-name="disableOnInteraction DisableOnInteraction disableoninteraction disable Disable on On interaction Interaction">
                    <td>
                        <label><?php echo esc_html( 'disableOnInteraction', 'absolute-swiper' ); ?></label>
                    </td>
                    <td>
                        <span><?php echo esc_html('Set to false and autoplay will not be disabled after user interactions (swipes), it will be restarted every time after interaction', 'absolute-swiper' ); ?></span>
                        <ul>
                            <li>
                                <label>
                                    <input 
                                        name="<?php echo esc_attr( $this->meta_prefix.'setting_autoplay[disableOnInteraction]', 'absolute-swiper' ); ?>"
                                        type="radio" 
                                        <?php checked( $autoplay['disableOnInteraction'], 'true' ); ?>
                                        value="true">
                                    <?php echo esc_html('True', 'absolute-swiper' ); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input 
                                        name="<?php echo esc_attr( $this->meta_prefix.'setting_autoplay[disableOnInteraction]', 'absolute-swiper' ); ?>"
                                        type="radio" 
                                        <?php checked( $autoplay['disableOnInteraction'], 'false' ); ?>
                                        value="false">
                                    <?php echo esc_html('False', 'absolute-swiper' ); ?>
                                </label>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr data-filter-item data-filter-name="reverseDirection ReverseDirection reversedirection reverse Reverse direction Direction">
                    <td>
                        <label><?php echo esc_html('reverseDirection', 'absolute-swiper' ); ?></label>
                    </td>
                    <td>
                        <span><?php echo esc_html('Enables autoplay in reverse direction', 'absolute-swiper' ); ?></span>
                        <ul>
                            <li>
                                <label>
                                    <input 
                                        name="<?php echo esc_attr( $this->meta_prefix.'setting_autoplay[reverseDirection]', 'absolute-swiper' ); ?>"
                                        type="radio" 
                                        <?php checked( $autoplay['reverseDirection'], 'true' ); ?>
                                        value="true">
                                    <?php echo esc_html('True', 'absolute-swiper' ); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input 
                                        name="<?php echo esc_attr( $this->meta_prefix.'setting_autoplay[reverseDirection]', 'absolute-swiper' ); ?>"
                                        type="radio" 
                                        <?php checked( $autoplay['reverseDirection'], 'false' ); ?>
                                        value="false">
                                    <?php echo esc_html('False', 'absolute-swiper' );  ?>
                                </label>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr data-filter-item data-filter-name="waitForTransition WaitForTransition waitfortransition wait Wait for For transition Transition">
                    <td>
                        <label><?php echo esc_html('waitForTransition', 'absolute-swiper' ); ?></label>
                    </td>
                    <td>
                        <span><?php echo esc_html('When enabled autoplay will wait for wrapper transition to continue. Can be disabled in case of using Virtual Translate when your slider may not have transition', 'absolute-swiper' ); ?></span>
                        <ul>
                            <li>
                                <label>
                                    <input 
                                        name="<?php echo esc_attr( $this->meta_prefix.'setting_autoplay[waitForTransition]', 'absolute-swiper' ); ?>"
                                        type="radio" 
                                        <?php checked( $autoplay['waitForTransition'], 'true' ); ?>
                                        value="true">
                                    <?php echo esc_html('True', 'absolute-swiper' ); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input 
                                        name="<?php echo esc_attr( $this->meta_prefix.'setting_autoplay[waitForTransition]', 'absolute-swiper' ); ?>"
                                        type="radio" 
                                        <?php checked( $autoplay['waitForTransition'], 'false' ); ?>
                                        value="false">
                                    <?php echo esc_html('False', 'absolute-swiper' ); ?>
                                </label>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>