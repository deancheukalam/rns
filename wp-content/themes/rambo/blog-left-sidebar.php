<?php 
//Template Name:Blog-leftsidebar
get_template_part('banner','strip');
?>
<div id="content">
<div class="container">
	<!-- Blog Section Content -->
	<div class="row-fluid">
	<div class="blog-sidebar">
	 <?php get_sidebar();?>
		<!-- Blog Main -->
		<div class="span8 Blog_main">
			<?php 
				$rambo_page_left_side = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $rambo_args = array( 'post_type' => 'post','paged'=>$rambo_page_left_side);        
                $rambo_post_type_data = new WP_Query( $rambo_args );
                while($rambo_post_type_data->have_posts()){
                $rambo_post_type_data->the_post();?>
			<div class="blog_section2" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php $rambo_defalt_arg =array('class' => "img-responsive blog_section2_img" )?>
					<?php if(has_post_thumbnail()):?>
					<a  href="<?php the_permalink(); ?>" class="pull-left blog_pull_img2 img-responsive">
					<?php the_post_thumbnail('', $rambo_defalt_arg); ?>
					</a>
					<?php endif;?>
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="blog_section2_comment">
						<i class="fa fa-calendar icon-spacing"></i><a href="<?php echo esc_url( home_url('/') ); ?><?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>"><?php echo esc_html(get_the_date());?></a>
						<i class="fa fa-comments icon-spacing"></i><?php comments_popup_link( esc_html__('Leave a comment', 'rambo') ); ?>
						<i class="fa fa-user icon-spacing"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html_e("By",'rambo');?>&nbsp;<?php the_author();?></a>
					</div>
					<p><?php  the_content( __('Read More' ,'rambo') ); ?></p>
					
					<?php if(has_tag()) { ?>
					<p class="tags_alignment">
					<span class="blog_tags"><i class="fa fa-tags"></i><?php the_tags('',', ');?></span>
					</p>
					<?php }  ?>
			</div><?php wp_link_pages( $rambo_args ); ?>
				<?php } wp_reset_postdata(); ?>
			
		    <div class="pagination_section">	
		        <div class="pagination text-center">
				<ul>
				  <?php $GLOBALS['wp_query']->max_num_pages = $rambo_post_type_data->max_num_pages;
               the_posts_pagination( array(
                'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                'next_text' => '<i class="fa fa-angle-double-right"></i>',
                ) ); ?>
				</ul>
                </div>          
            </div>
		</div>
	</div></div>
</div>
</div>
<?php get_footer();?>