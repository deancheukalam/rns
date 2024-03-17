<?php get_template_part('banner','strip');?>
<div id="content">
<div class="container">
	<!-- Blog Section Content -->
	<div class="row-fluid">
		<div class="blog-sidebar">
		<!-- Blog Main -->
		<div class="<?php if( is_active_sidebar('sidebar-1')) echo "span8"; else echo "span12";?> Blog_main">
			<?php 
				$rambo_blog_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$rambo_args = array( 'post_type' => 'post','paged'=>$rambo_blog_page);		
				$rambo_post_type_data = new WP_Query( $rambo_args );
					while($rambo_post_type_data->have_posts()):
					$rambo_post_type_data->the_post();?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<?php $rambo_defalt_arg =array('class' => "img-responsive blog_section2_img" )?>
					<?php if(has_post_thumbnail()): ?>
					<a class="blog_pull_img2" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('', $rambo_defalt_arg); ?>
					</a>
					<?php endif; ?>
					
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="blog_section2_comment">
						<i class="fa fa-calendar icon-spacing"></i><a href="<?php echo esc_url( home_url('/') ); ?><?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>"><?php echo esc_html(get_the_date());?></a>
						<i class="fa fa-comments icon-spacing"></i><?php comments_popup_link( esc_html__('Leave a comment', 'rambo' ) ); ?>
						<i class="fa fa-user icon-spacing"></i> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html_e("By",'rambo');?>&nbsp;<?php the_author();?></a>
					</div>
					<?php  the_content( __('Read More','rambo') ); ?>
					
					<?php if(has_tag()) { ?>
					<p class="tags_alignment">
					<span class="blog_tags"><i class="fa fa-tags"></i><?php the_tags('',', ');?></span>
					</p>
					<?php }  wp_link_pages( $rambo_args ); ?>
			</div>
			<?php endwhile; wp_reset_postdata(); ?>
			<?php rambo_post_pagination(); // call post pagination ?>
		</div>
		 <?php get_sidebar();?>
		</div>
	</div>
</div>
</div>
<?php get_footer();?>