<?php
/*
 * The default template for displaying pages.
 */
?>

<?php get_header(); ?>
<div id="content" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="page-content">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('post-thumbnail', array('class' => 'single-image'));
			} ?>

			<?php the_content(); ?>

			<?php wp_link_pages( array(
				'before' => '<div class="pagelink">' . __( 'Pages:', 'gridbulletin' ),
				'after'  => '</div>',
			) ); ?>
		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php edit_post_link( __( 'Edit', 'gridbulletin' ), '<div class="edit-link">', '</div>' ); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
