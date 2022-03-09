<?php 

$breakpoints   = get_post_meta($post->ID, $this->meta_prefix.'setting_breakpoints', true);

$breakpoints = array(
    "320"       => $this->as_checkit('320', $breakpoints, '1'),
    "480"       => $this->as_checkit('480', $breakpoints, '2'),
    "640"       => $this->as_checkit('640', $breakpoints, '3'),
    "768"       => $this->as_checkit('768', $breakpoints, '3'),
    "980"       => $this->as_checkit('980', $breakpoints, '3'),
    "1024"      => $this->as_checkit('1024', $breakpoints, '3')
);

?>

<div id="absolute-swiper-tab-breakpoints" class="tabSec breakpoints">
    <h3>Responsive Breakpoints</h3>
    <table class="breakpointsSettings">
        <tr data-filter-item data-filter-name="breakpoints Breakpoints responsive 320">
            <td>
                <label>320px</label>
            </td>
            <td>
                <span>When window width is >= 320px</span>
                <input 
                    id="breakpoints20"
                    name="<?php echo esc_attr( $this->meta_prefix.'setting_breakpoints[320]', 'absolute-swiper' ); ?>"
                    type="number" 
                    min="1"
                    max="99"
                    value="<?php echo esc_attr( $breakpoints['320'], 'absolute-swiper' ); ?>">
            </td>
        </tr>
        <tr data-filter-item data-filter-name="breakpoints Breakpoints responsive 480">
            <td>
                <label>480px</label>
            </td>
            <td>
                <span>When window width is >= 480px</span>
                <input 
                    id="breakpoints480"
                    name="<?php echo esc_attr( $this->meta_prefix.'setting_breakpoints[480]', 'absolute-swiper' ); ?>"
                    type="number" 
                    min="1"
                    max="99"
                    value="<?php echo esc_attr( $breakpoints['480'], 'absolute-swiper' ); ?>">
            </td>
        </tr>
        <tr data-filter-item data-filter-name="breakpoints Breakpoints responsive 640">
            <td>
                <label>640px</label>
            </td>
            <td>
                <span>When window width is >= 640px</span>
                <input 
                    id="breakpoints640"
                    name="<?php echo esc_attr( $this->meta_prefix.'setting_breakpoints[640]', 'absolute-swiper' ); ?>"
                    type="number" 
                    min="1"
                    max="99"
                    value="<?php echo esc_attr( $breakpoints['640'], 'absolute-swiper' ); ?>">
            </td>
        </tr>
        <tr data-filter-item data-filter-name="breakpoints Breakpoints responsive 768">
            <td>
                <label>768px</label>
            </td>
            <td>
                <span>When window width is >= 768px</span>
                <input 
                    id="breakpoints768"
                    name="<?php echo esc_attr( $this->meta_prefix.'setting_breakpoints[768]', 'absolute-swiper' ); ?>"
                    type="number" 
                    min="1"
                    max="99"
                    value="<?php echo esc_attr( $breakpoints['768'], 'absolute-swiper' ); ?>">
            </td>
        </tr>
        <tr data-filter-item data-filter-name="breakpoints Breakpoints responsive 980">
            <td>
                <label>980px</label>
            </td>
            <td>
                <span>When window width is >= 980px</span>
                <input 
                    id="breakpoints980"
                    name="<?php echo esc_attr( $this->meta_prefix.'setting_breakpoints[980]', 'absolute-swiper' ); ?>"
                    type="number" 
                    min="1"
                    max="99"
                    value="<?php echo esc_attr( $breakpoints['980'], 'absolute-swiper' ); ?>">
            </td>
        </tr>
        <tr data-filter-item data-filter-name="breakpoints Breakpoints responsive 1024">
            <td>
                <label>1024px</label>
            </td>
            <td>
                <span>When window width is >= 1024px</span>
                <input 
                    id="breakpoints1024"
                    name="<?php echo esc_attr( $this->meta_prefix.'setting_breakpoints[1024]', 'absolute-swiper' ); ?>"
                    type="number" 
                    min="1"
                    max="99"
                    value="<?php echo esc_attr( $breakpoints['1024'], 'absolute-swiper' ); ?>">
            </td>
        </tr>
    </table>
</div>