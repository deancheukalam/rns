<?php get_template_part('banner','strip');?>
<!-- Container -->
<div id="content">
<div class="container">
	<!-- Blog Section Content -->
	<div class="row-fluid">
	<div class="blog-sidebar">
		<!-- Blog Single Page -->
		<div class="<?php if( is_active_sidebar('sidebar-1')) echo "span8"; else echo "span12";?> Blog_main">
			<div class="blog_single_post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php  the_post(); ?>
			<?php $rambo_defalt_arg =array('class' => "img-responsive blog_section2_img" )?>
			<?php if(has_post_thumbnail()):?>
				<?php the_post_thumbnail('', $rambo_defalt_arg); ?>
			
			<?php endif;?>
			<h2><?php the_title(); ?></h2>
			<div class="blog_section2_comment">
			<i class="fa fa-calendar icon-spacing"></i><a href="<?php echo esc_url( home_url('/') ); ?><?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>"><?php echo esc_html(get_the_date());?></a>
			<i class="fa fa-comments icon-spacing"></i><?php comments_popup_link( esc_html__('Leave a comment', 'rambo' ) ); ?>
			<i class="fa fa-user icon-spacing"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html_e("By",'rambo');?>&nbsp;<?php the_author();?></a>
			</div>
			<?php  the_content( __('Read More','rambo' ) ); ?>
			</div>
			<?php comments_template( '', true );?>
		</div>
		<?php get_sidebar();?>
	</div></div>
</div>
</div>
<?php get_footer();?>