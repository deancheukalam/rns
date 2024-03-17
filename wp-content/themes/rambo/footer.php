<!-- Widgets Section -->
<?php
$rambo_theme_options = rambo_theme_data_setup();
$rambo_current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_theme_options ); ?>
<?php if ( is_active_sidebar( 'footer-widget-area' ) ){ ?>
<div class="hero-widgets-section">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'footer-widget-area' ); ?>			
		</div>
	</div>
</div>
<?php } ?>
<!-- /Widgets Section -->

<!-- Footer Section -->
<?php if(($rambo_current_options['footer_copyright'] != '' ) || (is_active_sidebar('footer-social-icon-sidebar-area'))) : ?>
<div class="footer-section">
	<div class="container">
		<div class="row">
			<div class="span8">
				<?php if( isset( $rambo_current_options['footer_copyright'] ) && $rambo_current_options['footer_copyright'] != '' ) { ?>
					<p><?php echo wp_kses_post($rambo_current_options['footer_copyright']); ?></p>	
				<?php } ?>
			</div>
			<div class="span4">
				<?php  
                if( is_active_sidebar('footer-social-icon-sidebar-area'))
                {
                    dynamic_sidebar('footer-social-icon-sidebar-area');
                }
                ?>
			</div>		
		</div>
	</div>		
</div>	
<?php endif; ?>	
<!-- Footer Section-->

<?php
// custom css
if ( version_compare( $GLOBALS['wp_version'], '4.6', '>=' ) ): ?>
<?php
else :
	$rambo_theme_options = rambo_theme_data_setup();
	$rambo_current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_theme_options );
	if($rambo_current_options['webrit_custom_css']!='') :
		echo '<style>'.wp_filter_nohtml_kses($rambo_current_options['webrit_custom_css']).'</style>';
	endif;
endif;
wp_footer(); ?>
</body>
</html>