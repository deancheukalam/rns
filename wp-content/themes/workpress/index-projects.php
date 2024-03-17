<?php
$rambo_pro_theme_options = theme_data_setup();
$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_pro_theme_options );
if($current_options['project_protfolio_enabled']==false)
{
?>
<!-- Recent Work Section -->
<div class="portfolio_main_content">	
	<div class="container">	
	<?php
	$rambo_pro_theme_options = theme_data_setup();
	$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_pro_theme_options );
	?>
		<div class="row-fluid featured_port_title">
			<?php if($current_options['project_heading_one']) { ?>
			<h1><?php echo $current_options['project_heading_one']; ?></h1>
			<?php } ?>
			<?php if($current_options['project_tagline']) { ?>
			<p><?php echo $current_options['project_tagline']; ?></p>
			<?php } ?>
		</div>
		<?php 
		if(is_active_sidebar('workpress-sidebar-project'))
		{
			echo '<div id="sidebar-project " class="row sidebar-project">';
			dynamic_sidebar('workpress-sidebar-project');
			echo '</div>';
		}
		else
		{ ?>
				<div id="sidebar-project" class="row">
					<div class="span4 featured_port_projects">
						<div class="thumbnail">
						<?php if($current_options['project_one_thumb']) { ?>
							  <img src="<?php echo $current_options['project_one_thumb']; ?>">
						<?php } ?>
							
							  <div class="featured_service_content">
								<?php if($current_options['project_one_title']) { ?>
								<h3><a href="#"><?php echo $current_options['project_one_title']; ?></a></h3>
								<?php } ?>
								<?php if($current_options['project_one_text']) { ?>
								<p><?php echo $current_options['project_one_text']; ?></p>
								<?php } ?>
							  </div>
						</div>
					</div>
					<div class="span4 featured_port_projects">
						<div class="thumbnail">
						<?php if($current_options['project_two_thumb']) { ?>
							  <img src="<?php echo $current_options['project_two_thumb']; ?>">
						<?php } ?>
							
							  <div class="featured_service_content">
								<?php if($current_options['project_two_title']) { ?>
								<h3><a href="#"><?php echo $current_options['project_two_title']; ?></a></h3>
								<?php } ?>
								<?php if($current_options['project_two_text']) { ?>
								<p><?php echo $current_options['project_two_text']; ?></p>
								<?php } ?>
							  </div>
						</div>
					</div>
					<div class="span4 featured_port_projects">
						<div class="thumbnail">
						<?php if($current_options['project_three_thumb']) { ?>
							  <img src="<?php echo $current_options['project_three_thumb']; ?>">
						<?php } ?>
							
							  <div class="featured_service_content">
								<?php if($current_options['project_three_title']) { ?>
								<h3><a href="#"><?php echo $current_options['project_three_title']; ?></a></h3>
								<?php } ?>
								<?php if($current_options['project_three_text']) { ?>
								<p><?php echo $current_options['project_three_text']; ?></p>
								<?php } ?>
							  </div>
						</div>
					</div>
					<div class="span4 featured_port_projects">
						<div class="thumbnail">
						<?php if($current_options['project_four_thumb']) { ?>
							  <img src="<?php echo $current_options['project_four_thumb']; ?>">
						<?php } ?>
							
							  <div class="featured_service_content">
								<?php if($current_options['project_four_title']) { ?>
								<h3><a href="#"><?php echo $current_options['project_four_title']; ?></a></h3>
								<?php } ?>
								<?php if($current_options['project_four_text']) { ?>
								<p><?php echo $current_options['project_four_text']; ?></p>
								<?php } ?>
							  </div>
						</div>
					</div>
				</div>
		<?php }
		?>	
	</div>	
</div>
<?php } ?>	
<!-- /Recent Work Section -->	