<?php

class Absolute_Custom_Meta_Box
{

    public $meta_prefix = '_absolute_swiper_';
    public $post_type = 'absolute_swiper';

    /* 
     * Constructor. 
     */
    public function __construct()
    {
        if (is_admin()) {
            add_action('load-post.php', array($this, 'init_metabox'));
            add_action('load-post-new.php', array($this, 'init_metabox'));
            add_action('wp_ajax_absp_slider_ajax', array($this, 'wp_ajax_absp_slider_ajax_handler_fn'));
        }
    }

    /*
     * Meta box initialization. 
     */
    public function init_metabox()
    {
        add_action('add_meta_boxes', array($this, 'add_metabox'));
        add_action('save_post', array($this, 'save_metabox'), 10, 2);
    }

    /*
     * Adds the meta box section.
     */
    public function add_metabox()
    {
        add_meta_box(
            'absolute-swiper-js-slider-postType',
            'Post Type',
            array($this, 'render_metabox_postType'),
            $this->post_type,
            'advanced',
            'high'
        );
        add_meta_box(
            'absolute-swiper-js-slider-settings',
            'Settings',
            array($this, 'render_metabox_settings'),
            $this->post_type,
            'advanced',
            'high'
        );
        add_meta_box(
            'absolute-swiper-js-slider-shortcode',
            'Shortcode',
            array($this, 'render_metabox_shortcode'),
            $this->post_type,
            'side',
            'low'
        );
    }

    /*
     * Renders the meta box..
     */
    public function render_metabox_postType($post)
    {
        global $post;
        wp_nonce_field($this->meta_prefix . 'nonce_action', $this->meta_prefix . 'nonce');
        $slider_post = get_post_meta($post->ID, $this->meta_prefix . "slider_post", true);

        if ($slider_post) {
            $post_type = $slider_post['type'];
        } else {
            $post_type = '';
        }
        $post_ID = $post->ID;
        ?>
        <br>
        <div class="post-type-form-table">
            <label for="slider_post_type">Select Post Type</label>
            <select name="<?php echo esc_attr($this->meta_prefix); ?>slider_post[type]" id="slider_post_type"
                    data_id="<?php echo esc_attr($post_ID); ?>">
                <?php
                $get_post_types = get_post_types(array('public' => true), 'names', 'and');
                unset($get_post_types['attachment']);
                unset($get_post_types['page']);
                foreach ($get_post_types as $get_post_type) {
                    ?>
                    <option value="<?php echo esc_attr( $get_post_type ); ?>" <?php selected($post_type, $get_post_type) ?>>
                        <?php echo esc_html( $get_post_type, 'absolute-swiper' ); ?></option>
                    <?php
                }
                ?>
            </select>
        </div><br>
        <div class="postCategory-wrapper" id="postCategory-wrapper">
        </div><br>
        <script>
            jQuery(function ($) {
                $('#slider_post_type').on('change', showCategory)

                function showCategory() {

                    let ajax_url = "<?php echo esc_url( admin_url('admin-ajax.php') ); ?>";
                    let postType = $('#slider_post_type').val();
                    let post_id = $('#slider_post_type').attr('data_id');

                    var data = {
                        'action': 'absp_slider_ajax',
                        'post_type': postType,
                        'post_id': post_id,
                    };

                    $.post(ajax_url, data, function (response) {
                        $('#postCategory-wrapper').html(response);
                    });

                }

                showCategory();
            });
        </script>

        <?php
    }

    public function render_metabox_settings($post)
    {
        global $post;

        wp_nonce_field($this->meta_prefix . 'nonce_action', $this->meta_prefix . 'nonce'); ?>

        <div class="absoluteSwiperSettingsSection">

            <ul class="absoute-swiper-nav-tab" data-update-hashbang="1">
                <li class="active"><a href="#absolute-swiper-tab-parameters"><?php echo esc_html('Parameters', 'absolute-swiper'); ?></a></li>
                <li><a href="#absolute-swiper-tab-autoplay"><?php echo esc_html('Autoplay', 'absolute-swiper'); ?></a></li>
                <li><a href="#absolute-swiper-tab-pagination"><?php echo esc_html('Pagination', 'absolute-swiper'); ?></a></li>
                <li><a href="#absolute-swiper-tab-navigation"><?php echo esc_html('Navigation', 'absolute-swiper'); ?></a></li>
                <li><a href="#absolute-swiper-tab-carousel"><?php echo esc_html('Carousel', 'absolute-swiper'); ?></a></li>
                <li><a href="#absolute-swiper-tab-breakpoints"><?php echo esc_html('Breakpoints', 'absolute-swiper'); ?></a></li>
            </ul>

            <div class="tab-content">
                <?php include_once(plugin_dir_path(__FILE__) . '/metabox/parameters-meta.php'); ?>
                <?php include_once(plugin_dir_path(__FILE__) . '/metabox/autoplay-meta.php'); ?>
                <?php include_once(plugin_dir_path(__FILE__) . '/metabox/pagination-meta.php'); ?>
                <?php include_once(plugin_dir_path(__FILE__) . '/metabox/navigation-meta.php'); ?>
                <?php include_once(plugin_dir_path(__FILE__) . '/metabox/carousel-meta.php'); ?>
                <?php include_once(plugin_dir_path(__FILE__) . '/metabox/breakpoints-meta.php'); ?>
            </div>

        </div>

        <?php
    }

    public function render_metabox_shortcode($post)
    {
        global $post;
        wp_nonce_field($this->meta_prefix . 'nonce_action', $this->meta_prefix . 'nonce'); ?>

        <div class="shortcodeWrap">
            <h4>Copy & Paste For Post & Pages.</h4>
            <input type="text" readonly="readonly" value='[absolute_swiper id="<?php echo $post->ID ?>"]'
                   class="large-text code">
            <a href="#" class="copyData">Copy to clipboard</a>
        </div>

        <div class="shortcodeWrap">
            <h4>For Custom Template Php Files.</h4>
            <input type="text" readonly="readonly"
                   value='&lt;?php echo do_shortcode("[absolute_swiper id=<?php echo $post->ID ?>]"); ?&gt;'
                   class="large-text code">
            <a href="#" class="copyData">Copy to clipboard</a>
        </div>
        <?php
    }

    /*
     * post Type ajax handled .
     */
    public function wp_ajax_absp_slider_ajax_handler_fn()
    {

        $post_type = sanitize_text_field( $_REQUEST['post_type'] );
        $post_ID = absint( $_REQUEST['post_id'] );

        $slider_post = get_post_meta($post_ID, $this->meta_prefix . "slider_post", true);

        if ($post_type !== 'absolute_swiper') {

            $post_category = $slider_post['category'];


            if ($post_type == 'product') {
                $cat = 'product_cat';
            } else {
                $cat = 'category';
            }

            $args = array(
                'taxonomy' => $cat,
                'hide_empty' => 1,
            );

            $all_categories = get_categories($args);

            ?>
            <label for="slider_post_cat"><?php echo esc_html('Select Post Category', 'absolute-swiper' ); ?></label>
            <select name="<?php echo esc_attr( $this->meta_prefix ); ?>slider_post[category]" id="slider_post_cat">
                <?php
                foreach ($all_categories as $category) {
                    ?>
                    <option value="<?php echo esc_attr( $category->name )?>" <?php selected($post_category, $category->name) ?>>
                        <?php echo esc_html( $category->name, 'absolute-swiper' ); ?></option>
                    <?php
                }
                ?>
            </select>
            <?php
        } else {

            // Use get_post_meta to retrieve an existing value from the database.
            $ids = $slider_post['gallery'];

            // Display the form, using the current value.
            ?>
            <div class="gallery-form-table">
                <ul id="gallery-metabox-list">
                    <?php if ($ids) { ?>
                        <?php foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value); ?>
                            <li>
                                <input type="hidden"
                                       name="<?php echo esc_attr( $this->meta_prefix ); ?>slider_post[gallery][<?php echo esc_attr( $key ); ?>]"
                                       value="<?php echo esc_attr( $value ); ?>">
                                <img class="image-preview" src="<?php echo esc_url( $image[0] ); ?>">
                                <div class="actionButtons">
                                    <a class="change-image button button-small" href="#"
                                       data-uploader-title="Change image"
                                       data-uploader-button-text="Change image">
                                        <span class="dashicons dashicons-edit"></span>
                                    </a>
                                    <a class="remove-image button button-small" href="#">
                                        <span class="dashicons dashicons-no-alt"></span>
                                    </a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php } ?>
                </ul>
                <h4 class="noDataFound"><?php echo esc_html('No Images Selected.', 'absolute-swiper' ); ?></h4>
            </div>

            <div class="addfooter">
                <a href="#" class="removeAll button button-secondary button-large">
                    <span class="dashicons dashicons-trash"></span>
                    <?php echo esc_html('Empty Slider', 'absolute-swiper' ); ?>
                </a>
                <a href="#" class="saveAll button button-primary button-large">
                    <span class="dashicons dashicons-admin-tools"></span>
                    <?php echo  esc_html('Save', 'absolute-swiper' ); ?>
                </a>
                <a class="gallery-add button button-primary button-large" href="#"
                   data-uploader-title="Add image(s) to gallery"
                   data-uploader-button-text="Add image(s)">
                    <span class="dashicons dashicons-plus-alt"></span>
                   <?php echo esc_html(' Add Images', 'absolute-swiper' ); ?>
                </a>
            </div>
            <?php
        }
        die();
    }

    /**
     * Handles chacking the meta box value.
     *
     * @param int $name name.
     * @param int $array array.
     * @param int $value value.
     */
    public function as_checkit($name, $array, $value)
    {
        $result = '';
        if (is_array($array) && isset($array[$name])) {
            $result = $array[$name];
        }
        if ($result == '') {
            $result = $value;
        }
        return $result;
    }

    /**
     * Handles saving the meta box.
     *
     * @param int $post_id Post ID.
     * @param WP_Post $post Post object.
     * @return null
     */
    public function save_metabox($post_id, $post)
    {
        // Add nonce for security and authentication.
        $nonce_name = isset($_POST[$this->meta_prefix . 'nonce']) ? $_POST[$this->meta_prefix . 'nonce'] : '';
        $nonce_action = $this->meta_prefix . 'nonce_action';

        // Check if nonce is valid.
        if (!wp_verify_nonce($nonce_name, $nonce_action)) {
            return;
        }

        // Check if user has permissions to save data.
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // Check if not an autosave.
        if (wp_is_post_autosave($post_id)) {
            return;
        }

        // Check if not a revision.
        if (wp_is_post_revision($post_id)) {
            return;
        }

        /* OK, it's safe for us to save the data now. */
        // Update the meta field.
        $this->as_updatePostMeta($post_id, $this->meta_prefix, 'setting_general');
        $this->as_updatePostMeta($post_id, $this->meta_prefix, 'setting_autoplay');
        $this->as_updatePostMeta($post_id, $this->meta_prefix, 'setting_pagination');
        $this->as_updatePostMeta($post_id, $this->meta_prefix, 'setting_navigation');
        $this->as_updatePostMeta($post_id, $this->meta_prefix, 'setting_breakpoints');
        $this->as_updatePostMeta($post_id, $this->meta_prefix, 'slider_post');
    }

    function as_sanitize_text_or_array_field($array_or_string)
    {
        if (is_string($array_or_string)) {
            $array_or_string = sanitize_text_field($array_or_string);
        } elseif (is_array($array_or_string)) {
            foreach ($array_or_string as $key => &$value) {
                if (is_array($value)) {
                     $value = as_sanitize_text_or_array_field($value);
                } else {
                    $value = sanitize_text_field($value);
                }
            }
        }

        return $array_or_string;
    }

    function as_updatePostMeta($id, $prefix, $name)
    {
        if (isset($_POST[$prefix . $name])) {
            $allData = $this->as_sanitize_text_or_array_field($_POST[$prefix . $name]);
            update_post_meta($id, $prefix . $name, $allData);
        } else {
            delete_post_meta($id, $prefix . $name);
        }
    }
}

new Absolute_Custom_Meta_Box();	