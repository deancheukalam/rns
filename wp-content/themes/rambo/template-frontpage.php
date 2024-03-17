<?php
/*
Template Name: Business Template
*/	
get_header();?>
<div id="content">
<?php
do_action( 'rambo_slider_sections', false );  
do_action( 'rambo_business_template_sections', false );	
  		
/****** get index blog  ********/
	get_template_part('index', 'recentblog') ;
/****** get footer section *********/
?>
</div>
<?php get_footer();  ?>