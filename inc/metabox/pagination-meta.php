<?php 

$pagination = get_post_meta($post->ID, $this->meta_prefix.'setting_pagination', true);

$pagination = array(
    "pagination"            => $this->as_checkit('pagination', $pagination, 'true'),
    "el"                    => $this->as_checkit('el', $pagination, 'swiper-pagination'),
    "type"                  => $this->as_checkit('type', $pagination, 'bullets'),
    "bulletElement"         => $this->as_checkit('bulletElement', $pagination, 'span'),
    "clickable"             => $this->as_checkit('clickable', $pagination, 'false'),
    "bulletClass"           => $this->as_checkit('bulletClass', $pagination, 'swiper-pagination-bullet'),
    "currentClass"          => $this->as_checkit('currentClass', $pagination, 'swiper-pagination-current'),
    "bulletActiveClass"     => $this->as_checkit('bulletActiveClass', $pagination, 'swiper-pagination-bullet-active'),
    "clickableClass"        => $this->as_checkit('clickableClass', $pagination, 'swiper-pagination-clickable'),
    "lockClass"             => $this->as_checkit('lockClass', $pagination, 'swiper-pagination-lock'),
);

?>

<div id="absolute-swiper-tab-pagination" class="tabSec pagiNation">
    <table>
        <tbody>
            <tr data-filter-item data-filter-name="pagination Pagination">
                <td>
                    <label><?php echo  esc_html('Pagination', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <ul>
                        <li>
                            <label>
                                <input 
                                    type="radio" 
                                    name="<?php echo esc_attr( $this->meta_prefix.'setting_pagination[pagination]', 'absolute-swiper' ); ?>" 
                                    value="true" 
                                    <?php checked( $pagination['pagination'], 'true' ); ?>>
                                <?php echo esc_html('True', 'absolute-swiper' ); ?>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input 
                                    type="radio" 
                                    name="<?php echo esc_attr( $this->meta_prefix.'setting_pagination[pagination]', 'absolute-swiper' ); ?>" 
                                    value="false" 
                                    <?php checked( $pagination['pagination'], 'false' ); ?>>
                                <?php echo esc_html('False', 'absolute-swiper' ); ?>
                            </label>
                        </li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="<?php echo ($pagination['pagination'] == 'false' ? 'hiddenData' : '' ) ?>">
        <table class="autoPlaySettings">
            <tr data-filter-item data-filter-name="Element Class element class">
                <td>
                    <label for="el"><?php echo esc_html('Element Class', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <span><?php echo esc_html('Class Name for Pagination.', 'absolute-swiper' ); ?></span>
                    <input 
                            id="el"
                            name="<?php echo esc_attr( $this->meta_prefix.'setting_pagination[el]', 'absolute-swiper' ); ?>"
                            type="text" 
                            value="<?php echo esc_attr( $pagination['el'], 'absolute-swiper' ); ?>">
                </td>
            </tr>
            <tr data-filter-item data-filter-name="type Type">
                <td>
                    <label for=""><?php echo  esc_html('type', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <span><?php echo esc_html('String with type of pagination.', 'absolute-swiper' ); ?></span>
                    <select name="<?php echo esc_attr( $this->meta_prefix.'setting_pagination[type]', 'absolute-swiper' ); ?>">
                        <option value="bullets" <?php selected($pagination['type'], 'bullets') ?>><?php echo esc_html('bullets', 'absolute-swiper' ); ?></option>
                        <option value="fraction" <?php selected($pagination['type'], 'fraction') ?>><?php echo esc_html('fraction', 'absolute-swiper' ); ?></option>
                        <option value="progressbar" <?php selected($pagination['type'], 'progressbar') ?>><?php echo esc_html('progressbar', 'absolute-swiper' ); ?></option>
                    </select>
                </td>
            </tr>
            <tr data-filter-item data-filter-name="bulletElement bulletelement bulletelement bullet element Element Bullet">
                <td>
                    <label for="bulletEle"><?php echo esc_html('bulletElement', 'absolute-swiper'); ?></label>
                </td>
                <td>
                    <span><?php echo  esc_html('Defines which HTML tag will be use to represent single pagination bullet. Only for bullets pagination type.', 'absolute-swiper' ); ?></span>
                    <input 
                            id="bulletEle"
                            name="<?php echo esc_attr( $this->meta_prefix.'setting_pagination[bulletElement]', 'absolute-swiper' ); ?>"
                            type="text" 
                            value="<?php echo esc_attr( $pagination['bulletElement'], 'absolute-swiper' ); ?>">
                </td>
            </tr>
            <tr data-filter-item data-filter-name="clickable ClickAble click able Click Able">
                <td>
                    <label><?php echo esc_html('clickable', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <span><?php echo esc_html('If true then clicking on pagination button will cause transition to appropriate slide. Only for bullets pagination type', 'absolute-swiper' ); ?></span>
                    <ul>
                        <li>
                            <label>
                                <input 
                                    name="<?php echo esc_attr( $this->meta_prefix.'setting_pagination[clickable]', 'absolute-swiper' ); ?>"
                                    type="radio" 
                                    <?php checked( $pagination['clickable'], 'true' ); ?>
                                    value="true">
                                <?php echo esc_html('True', 'absolute-swiper' ); ?>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input 
                                    name="<?php echo esc_attr( $this->meta_prefix.'setting_pagination[clickable]', 'absolute-swiper' ); ?>"
                                    type="radio" 
                                    <?php checked( $pagination['clickable'], 'false' ); ?>
                                    value="false">
                                <?php echo esc_html('False', 'absolute-swiper' ); ?>
                            </label>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr data-filter-item data-filter-name="bulletClass bullet class bulletclass BulletClass Bullet Class">
                <td>
                    <label for="bulletClass"><?php echo  esc_html('bulletClass', 'absolute-swiper' );?></label>
                </td>
                <td>
                    <span><?php echo esc_html('CSS class name of single pagination bullet', 'absolute-swiper' ); ?></span>
                    <input 
                            id="bulletClass"
                            name="<?php echo esc_attr( $this->meta_prefix.'setting_pagination[bulletClass]', 'absolute-swiper' ); ?>"
                            type="text" 
                            value="<?php echo esc_attr( $pagination['bulletClass'], 'absolute-swiper' ); ?>">
                </td>
            </tr>
            <tr data-filter-item data-filter-name="currentClass current class currentclass CurrentClass Current Class">
                <td>
                    <label for="currentClass"><?php echo esc_html('currentClass', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <span><?php echo esc_html('CSS class name of the element with currently active index in "fraction" pagination', 'absolute-swiper' ); ?></span>
                    <input 
                            id="currentClass"
                            name="<?php echo esc_attr( $this->meta_prefix.'setting_pagination[currentClass]','absolute-swiper' ); ?>"
                            type="text" 
                            value="<?php echo esc_attr( $pagination['currentClass'], 'absolute-swiper' ); ?>">
                </td>
            </tr>
            <tr data-filter-item data-filter-name="bulletActiveClass bullet active class bulletactiveclass Class Active Bullet">
                <td>
                    <label for="bulletActiveClass"><?php echo esc_html('bulletActiveClass', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <span><?php echo esc_html('CSS class name of currently active pagination bullet', 'absolute-swiper' ); ?></span>
                    <input 
                            id="bulletActiveClass"
                            name="<?php echo esc_attr( $this->meta_prefix.'setting_pagination[bulletActiveClass]', 'absolute-swiper' ); ?>"
                            type="text" 
                            value="<?php echo esc_attr( $pagination['bulletActiveClass'], 'absolute-swiper' ); ?>">
                </td>
            </tr>
            <tr data-filter-item data-filter-name="clickableClass clickableclass click class Click Class able Able">
                <td>
                    <label for="clickableClass"><?php echo esc_html('clickableClass', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <span><?php echo esc_html('CSS class name set to pagination when it is clickable', 'absolute-swiper' ); ?></span>
                    <input 
                            id="clickableClass"
                            name="<?php echo esc_attr( $this->meta_prefix.'setting_pagination[clickableClass]', 'absolute-swiper' ); ?>"
                            type="text" 
                            value="<?php echo esc_attr( $pagination['clickableClass'], ' absolute-swiper' ); ?>">
                </td>
            </tr>
            <tr data-filter-item data-filter-name="lockClass lockclass LockClass lock class Lock Class">
                <td>
                    <label for="lockClass"><?php echo esc_html('lockClass', 'absolute-swiper' ); ?></label>
                </td>
                <td>
                    <span><?php echo esc_html('CSS class name set to pagination when it is disabled', 'absolute-swiper' ); ?></span>
                    <input 
                            id="lockClass"
                            name="<?php echo esc_attr( $this->meta_prefix.'setting_pagination[lockClass]', 'absolute-swiper' ); ?>"
                            type="text" 
                            value="<?php echo esc_attr( $pagination['lockClass'], 'absolute-swiper' ); ?>">
                </td>
            </tr>
        </table>
    </div>
</div>