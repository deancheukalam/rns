<?php  
	$rambo_actions = $this->recommended_actions;
	$rambo_actions_todo = get_option( 'recommending_actions', false );
?>
<div id="recommended_actions" class="rambo-tab-pane panel-close">
	<div class="action-list">
		<?php if($rambo_actions): foreach ($rambo_actions as $rambo_key => $rambo_actionValue): ?>
		<div class="action" id="<?php echo esc_attr($rambo_actionValue['id']); ?>">
			<div class="recommended_box span6">
				<img width="772" height="180" src="<?php echo esc_url(RAMBO_TEMPLATE_DIR_URI.'/images/'.str_replace(' ', '-', strtolower($rambo_actionValue['title'])).'.png');?>">
				<div class="action-inner">
					<h3 class="action-title"><?php echo esc_html($rambo_actionValue['title']); ?></h3>
					<div class="action-desc"><?php echo esc_html($rambo_actionValue['desc']); ?></div>
					<?php echo wp_kses_post($rambo_actionValue['link']); ?>
					<div class="action-watch">
						<?php if(!$rambo_actionValue['is_done']): ?>
							<?php if(!isset($rambo_actions_todo[$rambo_actionValue['id']]) || !$rambo_actions_todo[$rambo_actionValue['id']]): ?>
								<span class="dashicons dashicons-visibility"></span>
							<?php else: ?>
								<span class="dashicons dashicons-hidden"></span>
							<?php endif; ?>
						<?php else: ?>
							<span class="dashicons dashicons-yes"></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; endif; ?>
	</div>
</div>