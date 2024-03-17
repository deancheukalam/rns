<?php get_header(); ?>
<!-- Header Strip -->
<div class="hero-unit-small">
    <div class="container">
        <div class="row-fluid about_space">
            <div class="span8">
                <h2 class="page_head"><?php
                    if (is_home() || is_front_page()) {
                       
                            if (get_option('show_on_front') == 'posts') {
                                echo wp_kses_post(get_theme_mod('blog_page_title_option', __('Home', 'rambo')));
                            } else {
                                if (is_front_page()) {
                                    echo get_the_title(get_option('page_on_front', true));
                                } else if (is_home()) {
                                    echo get_the_title(get_option('page_for_posts', true));
                                }
                            }
                        
                    } else {
                        if (is_search()) {
                            echo get_search_query();
                        } else if (is_404()) {
                            echo esc_html__('Error 404', 'rambo');
                        } else if (is_category()) {
                            echo esc_html__('Category: ', 'rambo') . single_cat_title('', false);
                        } else if (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                            if (class_exists('WooCommerce')) {
                                if (is_shop()) {
                                    woocommerce_page_title();
                                }
                            }
                        } elseif (is_tag()) {
                            echo esc_html__('Tag : ', 'rambo') . single_tag_title('', false);
                        } else if (is_archive()) {
                            the_archive_title();
                        } else {
                            the_title('');
                        }
                        ?>
                        <?php
                    }
                    ?> </h2>
            </div>

            <div class="span4">
                <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="input-append search_head pull-right">
                        <input type="text"   name="s" id="s" placeholder="<?php esc_attr_e("Search", 'rambo'); ?>" />
                        <button type="submit" class="Search_btn" name="submit" ><?php esc_html_e("Go", 'rambo'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Header Strip -->