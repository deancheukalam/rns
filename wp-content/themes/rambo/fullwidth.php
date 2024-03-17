<?php //Template Name:Fullwidth ?>
<?php get_template_part('banner','strip');?>
<!-- Container -->
<div id="content">
<div class="container">
	<!-- Blog Section Content -->
	<div class="row-fluid">
	<div class="blog-sidebar">
		<!-- Blog Single Page -->
		<div class="Blog_main">		
			<div class="blog_single_post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php  the_post(); ?>
			
			<?php $rambo_defalt_arg =array('class' => "img-responsive blog_section2_img" )?>
			<?php if(has_post_thumbnail()):?>
			<a href="<?php the_permalink(); ?>" class="blog_pull_img2"><?php the_post_thumbnail('', $rambo_defalt_arg); ?></a>
			<?php endif; ?>
			<?php  the_content( __('Read More','rambo') ); ?>			
			</div>
		</div>
	</div></div>
</div>
</div>
<?php get_footer();?>