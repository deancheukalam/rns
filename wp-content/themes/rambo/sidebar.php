<?php if( is_active_sidebar('sidebar-1') ) : ?>
<div class="span4 sidebar">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1') ) : ?> 
	<?php endif;?>
</div>
<?php endif; ?>