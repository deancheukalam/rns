<?php
/**
 * The template part for displaying slider
 *
 * @package BB Ecommerce Store 
 * @subpackage bb_ecommerce_store
 * @since Ecommerce Store 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?> 
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <h2 class="ecomercepost-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
  <div class="metabox">
    <?php if( get_theme_mod( 'bb_ecommerce_store_date_hide',true) != '') { ?>
      <span class="entry-date me-1"><i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span class="ms-1"><?php echo esc_html( get_theme_mod('bb_ecommerce_store_metabox_separator_blog_post','|') ); ?></span>
    <?php } ?>
    <?php if( get_theme_mod( 'bb_ecommerce_store_author_hide',true) != '') { ?>
      <span class="entry-author mx-1"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span><span class="ms-1"><?php echo esc_html( get_theme_mod('bb_ecommerce_store_metabox_separator_blog_post','|') ); ?></span>
    <?php } ?>
    <?php if( get_theme_mod( 'bb_ecommerce_store_comment_hide',true) != '') { ?>
      <span class="entry-comments mx-1"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'bb-ecommerce-store'), __('0 Comments', 'bb-ecommerce-store'), __('% Comments', 'bb-ecommerce-store') ); ?> </span><span class="ms-1"><?php echo esc_html( get_theme_mod('bb_ecommerce_store_metabox_separator_blog_post','|') ); ?></span>
    <?php } ?>
    <?php if( get_theme_mod( 'bb_ecommerce_store_time_hide',true) != '') { ?>
      <span class="entry-time mx-1"><i class="fas fa-clock"></i> <?php echo esc_html( get_the_time() ); ?></span>
    <?php }?>
  </div>
  <?php if(get_theme_mod('bb_ecommerce_store_blog_post_description_option') != 'Full Content'){ ?>
    <div class="box-image">
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
          };
        };
      ?>
    </div>
  <?php }?>
  <div class="new-text">
    <?php if(get_theme_mod('bb_ecommerce_store_blog_post_description_option') == 'Full Content'){ ?>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    <?php }
    if(get_theme_mod('bb_ecommerce_store_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p><?php $bb_ecommerce_store_excerpt = get_the_excerpt(); echo esc_html( bb_ecommerce_store_string_limit_words( $bb_ecommerce_store_excerpt, esc_attr(get_theme_mod('bb_ecommerce_store_excerpt_number','20')))); ?><?php echo esc_html( get_theme_mod('bb_ecommerce_store_post_suffix_option','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if( get_theme_mod('bb_ecommerce_store_button_text','Read More') != ''){ ?>
      <div class="read-btn">
        <a href="<?php the_permalink(); ?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'bb-ecommerce-store' ); ?>"><?php echo esc_html(get_theme_mod('bb_ecommerce_store_button_text','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('bb_ecommerce_store_button_text','Read More'));?></span></a>
      </div>
    <?php }?>
  </div>
  <div class="clearfix"></div>
</article>