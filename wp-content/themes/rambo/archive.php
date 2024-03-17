<?php get_header(); ?>
<!-- Header Strip -->
<div class="hero-unit-small">
	<div class="container">
		<div class="row-fluid about_space">
			
			<div class="span8">
				<h2 class="page_head">
				<?php if ( is_day() ) : ?>
					<?php  esc_html_e( "Daily Archive", 'rambo' ); echo ' '; echo esc_html(get_the_date()); ?>
				<?php elseif ( is_month() ) : ?>
					<?php  esc_html_e( "Monthly Archive", 'rambo' ); echo ' '; echo esc_html(get_the_date()); ?>
				<?php elseif ( is_year() ) : ?>
					<?php  esc_html_e( "Yearly Archive", 'rambo' );  echo ' '; echo esc_html(get_the_date()); ?>
				<?php else : ?>
					<?php esc_html_e( "Blog Archive", 'rambo' ); ?>
				<?php endif; ?>
				</h2>
			</div>
			
			<div class="span4">
				<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="input-append search_head pull-right">
					<input type="text"   name="s" id="s" placeholder="<?php esc_attr_e( "Search", 'rambo' ); ?>" />
					<button type="submit" class="Search_btn" name="submit" ><?php esc_html_e( "Go", 'rambo' ); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Header Strip -->
<div id="content">
<div class="container">
	<!-- Blog Section Content -->
	<div class="row-fluid">
	<div class="blog-sidebar">
		<!-- Blog Main -->
		<div class="<?php if( is_active_sidebar('sidebar-1')) echo "span8"; else echo "span12";?> Blog_main">
			<?php 				
				$rambo_archive_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$rambo_archive_id=get_query_var('m');
				$rambo_args = array( 'post_type' => 'post','paged'=>$rambo_archive_paged,'m' => $rambo_archive_id);
				$rambo_post_type_data = new WP_Query( $rambo_args );
				if(have_posts()) :
					while(have_posts()):
						the_post(); ?>
					<div class="blog_section2" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php $rambo_defalt_arg =array('class' => "blog_section2_img" )?>
					<?php if(has_post_thumbnail()) { ?>
					<a  href="<?php the_permalink(); ?>" class="blog_pull_img2">
					<?php the_post_thumbnail('', $rambo_defalt_arg); ?>
					</a>
					<?php } ?>
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="blog_section2_comment">
						<i class="fa fa-calendar icon-spacing"></i><a href="<?php echo esc_url( home_url('/') ); ?><?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>"><?php echo esc_html(get_the_date());?></a>
						<i class="fa fa-comments icon-spacing"></i><?php comments_popup_link( esc_html__('Leave a comment', 'rambo' ) ); ?>
						<i class="fa fa-user icon-spacing"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html_e("By",'rambo');?>&nbsp;<?php the_author();?></a>
					</div>					
					<?php  the_content(''); ?>
												
					<p class="tags_alignment">
					<?php if(has_tag()) { ?>
						<span class="blog_tags"><i class="fa fa-tags"></i><?php the_tags('',', ');?></span>
					<?php }  ?>
					<?php $rambo_ismore = strpos( $post->post_content, '<!--more-->');
						if ($rambo_ismore) {	?>
						<a class="blog_section2_readmore pull-right" href="<?php the_permalink(); ?>">
						<?php esc_html_e('Read More','rambo'); ?></a>
					<?php } ?>
					</p>
			</div>
			<?php endwhile;  endif; wp_reset_postdata(); ?>
			<?php rambo_post_pagination(); // call post pagination ?>
		</div>
		
		 <?php get_sidebar();?>
	</div>
	</div>
</div>
</div>
<?php get_footer();?>