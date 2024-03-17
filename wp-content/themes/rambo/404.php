<?php get_template_part('banner','strip'); ?>
<div id="content">
	<div class="container">
		<div class="row-fluid">
		<div class="blog-sidebar">
			<div class="span8 Blog_main">
				<div class="blog_single_post">
				<h2><?php esc_html_e('Oops! Page not found', 'rambo' ); ?>
				</h2>
				<p><?php esc_html_e('We are sorry, but the page you are looking for does not exist.', 'rambo' ); ?>
				</p>
				<?php get_search_form(); ?>
				</div>
			</div>
			<?php get_sidebar (); ?>
		</div>
		</div>
	</div>
</div>	
<?php get_footer(); ?>