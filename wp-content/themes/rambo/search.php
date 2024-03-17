<?php get_template_part('banner','strip'); ?>
<div id="content">
<div class="container">
	<div class="row-fluid">
	<div class="blog-sidebar">
		<div class="<?php if( is_active_sidebar('sidebar-1')) echo "span8"; else echo "span12";?> Blog_main">
			<div class="blog_single_post">
			<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php $rambo_defalt_arg =array('class' => "img-responsive blog_section2_img" )?>
			<?php if(has_post_thumbnail()):?>
			<a  href="<?php the_permalink(); ?>" class="blog_pull_img2">
				<?php the_post_thumbnail('', $rambo_defalt_arg); ?>
			</a>
			<?php endif;?>
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<div class="blog_section2_comment">
			<i class="fa fa-calendar icon-spacing"></i><a href="<?php echo esc_url( home_url('/') ); ?><?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>"><?php echo esc_html(get_the_date());?></a>
			<i class="fa fa-comments icon-spacing"></i><?php comments_popup_link( esc_html__('Leave a comment','rambo' ) ); ?>
			<i class="fa fa-user icon-spacing"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html_e("By",'rambo');?>&nbsp;<?php the_author();?></a>
			</div>
            <?php the_content(); ?>
					<br>
           <?php endwhile; wp_reset_postdata();?>
			<?php else : ?>

			<h2><?php esc_html_e( "Nothing Found",'rambo'); ?></h2>
			<div class="">
			<p><?php esc_html_e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'rambo' ); ?>
			</p>
			<?php get_search_form(); ?>
			</div><!-- .blog_con_mn -->
			<?php endif; ?>
            </div>
		</div>
		<?php get_sidebar(); ?>
	</div></div>
</div>
</div>
<?php  get_footer() ?>