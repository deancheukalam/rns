<?php
/*
 * The template for displaying archive pages.
 */
?>

<?php get_header(); ?>
<?php if (get_theme_mod('gridbulletin_archive_sidebar') != 'no') { ?>
	<div id="content" role="main">
<?php } else { ?>
	<div id="content-full" role="main">
<?php } ?>
	<?php if ( have_posts() ) : ?>

		<?php if (get_theme_mod('gridbulletin_archive_title') != 'no') { ?>
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		?>
		<?php } ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content-list' ); ?>
		<?php endwhile; ?>

		<div class="post-nav">
			<?php next_posts_link(); ?>
			<?php previous_posts_link(); ?>
		</div>

	<?php else: ?>
		<?php get_template_part( 'content-none' ); ?>

	<?php endif; ?>
</div>
<?php if (get_theme_mod('gridbulletin_archive_sidebar') != 'no') { ?>
	<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>
