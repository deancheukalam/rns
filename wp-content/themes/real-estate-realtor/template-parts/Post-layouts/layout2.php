<?php
/**
 * The template part for displaying content
 * @package Real Estate Realtor
 * @subpackage real_estate_realtor
 * @since 1.0
 */

$archive_year  = get_the_time('Y'); 
$archive_month = get_the_time('m'); 
$archive_day   = get_the_time('d'); 

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="layout2">
    <?php $real_estate_realtor_postimg_lay = get_theme_mod( 'real_estate_realtor_post_featured_image','Image');
    if($real_estate_realtor_postimg_lay == 'Image'){ ?>
      <div class="box-image">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php }
    if($real_estate_realtor_postimg_lay == 'Color'){ ?>
      <div class="post-color text-center">
      </div>
    <?php }?>
    <div class="mainbox p-4">
      <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod('real_estate_realtor_metafields_date', true) != '' || get_theme_mod('real_estate_realtor_metafields_author', true) != '' || get_theme_mod('real_estate_realtor_metafields_comment', true) != '' || get_theme_mod('real_estate_realtor_metafields_time', true) != '' &&  get_theme_mod('real_estate_realtor_display_post_date', true) != '' || get_theme_mod('real_estate_realtor_display_post_author', true) != '' || get_theme_mod('real_estate_realtor_display_post_comment', true) != '' || get_theme_mod('real_estate_realtor_display_post_time', true) != ''){ ?>
        <div class="metabox mb-3">
          <?php if( get_theme_mod( 'real_estate_realtor_metafields_date',true) != '' || get_theme_mod( 'real_estate_realtor_display_post_date',true) != '') { ?>
            <span class="entry-date me-1"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_post_date_icon','far fa-calendar-alt')); ?> me-1"></i> <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a><span class="ms-2"><?php echo esc_html( get_theme_mod('real_estate_realtor_blog_post_meta_seperator','|') ); ?></span></span>
          <?php }?>
          <?php if( get_theme_mod( 'real_estate_realtor_metafields_author',true) != '' || get_theme_mod( 'real_estate_realtor_display_post_author',true) != '') { ?>
            <span class="entry-author me-1"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_post_author_icon','fas fa-user')); ?> me-1"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a><span class="ms-2"><?php echo esc_html( get_theme_mod('real_estate_realtor_blog_post_meta_seperator','|') ); ?></span></span>
          <?php }?>
          <?php if( get_theme_mod( 'real_estate_realtor_metafields_comment',true) != '' || get_theme_mod( 'real_estate_realtor_display_post_comment',true) != '') { ?>
            <span class="entry-comments me-1"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_post_comment_icon','fas fa-comments')); ?> me-1"></i> <?php comments_number( __('0 Comment', 'real-estate-realtor'), __('0 Comments', 'real-estate-realtor'), __('% Comments', 'real-estate-realtor') ); ?><span class="ms-2"><?php echo esc_html( get_theme_mod('real_estate_realtor_blog_post_meta_seperator','|') ); ?></span></span>
          <?php }?>
          <?php if( get_theme_mod( 'real_estate_realtor_metafields_time',true) != '' || get_theme_mod( 'real_estate_realtor_display_post_time',true) != '') { ?>
            <span class="entry-time me-1"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_post_time_icon','fas fa-clock')); ?> me-1"></i> <?php echo esc_html( get_the_time() ); ?></span>
          <?php }?>
        </div>
      <?php }?>
      <div class="new-text">
        <?php $real_estate_realtor_theme_lay = get_theme_mod( 'real_estate_realtor_content_settings','Excerpt');
        if($real_estate_realtor_theme_lay == 'Content'){ ?>
          <?php the_content(); ?>
        <?php }
        if($real_estate_realtor_theme_lay == 'Excerpt'){ ?>
          <?php if(get_the_excerpt()) { ?>
            <?php $real_estate_realtor_excerpt = get_the_excerpt(); echo esc_html( real_estate_realtor_string_limit_words( $real_estate_realtor_excerpt, esc_attr(get_theme_mod('real_estate_realtor_post_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('real_estate_realtor_post_discription_suffix','[...]') ); ?>
          <?php }?>
        <?php }?>
      </div>
      <?php if( get_theme_mod('real_estate_realtor_button_text','View More') != ''){ ?>
        <div class="postbtn mt-4 text-start">
          <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('real_estate_realtor_button_text','View More'));?><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_button_icon','fas fa-long-arrow-alt-right')); ?> me-0 py-0 px-2"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('real_estate_realtor_button_text','View More'));?></span></a>
        </div>
      <?php }?>
    </div>
  </div>
</article>