<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'rambo' ); ?>
	</p>
	<?php return;endif;?>
         <?php if ( have_comments() ) : ?>
		<div class="comment_mn">
			<div class="blog_single_post_head_title">
			<h3><?php esc_html_e('Comments','rambo');?></h3>
			</div>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>

			<nav id="comment-nav-above">
				<h1 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'rambo' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'rambo' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'rambo' ) ); ?></div>
			</nav>
			<?php endif;  ?>

		<?php wp_list_comments( array( 'callback' => 'rambo_comment' ) ); ?>
		</div><!-- comment_mn -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'rambo' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'rambo' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'rambo' ) ); ?></div>
		</nav>
		<?php endif;  ?>
		<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
        esc_html_e("Comments are closed",'rambo');?>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
	<?php if ( get_option('comment_registration') && isset($user_ID) ) : ?>
<p><?php echo sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment','rambo' ), esc_url(site_url( 'wp-login.php' )) . '?redirect_to=' .  urlencode(esc_url(get_permalink())) ); ?></p>
<?php else : ?>

<div class="comment_section">

<?php
 $rambo_fields=array(
    'author' => '<label>Name<span>*</span></label>
				<input class="span9 leave_comment_field" name="author" id="author" type="text"/><br/><br/>',
    'email'  => '<label>Email<span>*</span></label>
	<input class="span9 leave_comment_field" name="email" id="email" type="text" ><br/><br/>',
	'website'=>	'<label>Website</label>
	<input class="span9 leave_comment_field" name="website" id="website" type="text" ><br/><br/>',
	);

function rambo_comment_fields($rambo_fields) {

	return $rambo_fields;
}
add_filter('comment_form_default_fields','rambo_comment_fields');

	$rambo_defaults = array(
     'fields'               => apply_filters( 'comment_form_default_fields', $rambo_fields ),
	'comment_field'        => '<label>Comment<span>*</span></label>
	<textarea id="comments" rows="7" class="span12 leave_comment_field" name="comment" type="text"></textarea>',
	 'logged_in_as' => '<p class="logged-in-as">' . esc_html__("Logged in as",'rambo').' '.'<a href="'. esc_url(admin_url( 'profile.php' )).'">'.$user_identity.'</a>'. '<a href="'. esc_url(wp_logout_url( get_permalink() )).'" title="Logout of this account">'.' '.esc_html__("Logout",'rambo').'</a>' . '</p>',
	 'id_submit'            => 'comment_btn',
	'label_submit'         =>esc_html__('Send Message','rambo'),
	'comment_notes_after'  => '',
	 'title_reply'       => '<div class="blog_single_post_head_title"><h3>'.esc_html__('Leave a Reply','rambo').'</h3></div>',
	 'id_form'      => 'action'
	);
comment_form($rambo_defaults);?>

</div><!-- leave_comment_mn -->

<?php endif; // If registration required and not logged in ?>

<?php endif;  ?>
