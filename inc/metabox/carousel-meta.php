<div id="absolute-swiper-tab-carousel" class="tabSec carousel">
    <table class="carouselSettings">
        <tr data-filter-item data-filter-name="slidesPerView SlidesPerView slidesperview Slides slides per Per view View">
            <td>
                <label>slidesPerView</label>
            </td>
            <td>
                <span>Number of slides per view.</span>
                <input 
                    id="slidesPerView"
                    name="<?php echo esc_attr( $this->meta_prefix.'setting_general[slidesPerView]', 'absolute-swiper' ); ?>"
                    type="number" 
                    min="1"
                    max="99"
                    value="<?php echo esc_attr( $general['slidesPerView'], 'absolute-swiper' ); ?>">
            </td>
        </tr>
        <tr data-filter-item data-filter-name="slidesPerColumn SlidesPerColumn slidespercolumn slides Slides per Per column Column">
            <td>
                <label>slidesPerColumn</label>
            </td>
            <td>
                <span>Number of slides per column, for multirow layout.</span>
                <input 
                    id="slidesPerColumn"
                    name="<?php echo esc_attr( $this->meta_prefix.'setting_general[slidesPerColumn]', 'absolute-swiper' ); ?>"
                    type="number" 
                    min="1"
                    value="<?php echo esc_attr( $general['slidesPerColumn'], 'absolute-swiper' ); ?>">
            </td>
        </tr>
    </table>
</div>