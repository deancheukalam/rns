<?php $related_posts = real_estate_realtor_related_posts();
if(get_theme_mod('real_estate_realtor_related_enable_disable',true)==1){ ?>
<?php if ( $related_posts->have_posts() ): ?>
    <div class="related-posts">
        <h3 class="mb-3"><?php echo esc_html(get_theme_mod('real_estate_realtor_related_title',__('Related Post','real-estate-realtor')));?></h3>
        <div class="row">
            <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="related-inner-box mb-3 p-4">
                        <?php if(has_post_thumbnail()) { ?>
                            <div class="box-image mb-3">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php }?>
                        <h4 class="my-2 p-0"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
                        <?php $real_estate_realtor_excerpt = get_the_excerpt(); echo esc_html( real_estate_realtor_string_limit_words( $real_estate_realtor_excerpt, esc_attr(get_theme_mod('real_estate_realtor_related_post_excerpt_number','15')))); ?> <?php echo esc_html( get_theme_mod('real_estate_realtor_post_discription_suffix','[...]') ); ?>
                        <?php if( get_theme_mod('real_estate_realtor_button_text','View More') != ''){ ?>
                            <div class="postbtn mt-4 text-start">
                                <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('real_estate_realtor_button_text','View More'));?><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_button_icon','fas fa-long-arrow-alt-right')); ?> me-0 py-0 px-2"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('real_estate_realtor_button_text','View More'));?></span></a>
                            </div>
                        <?php }?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); }?>