<?php
/**
 * The template for displaying comments.
 */

if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">
	
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
  			<?php comments_number(__( 'No comments', 'pixelobject'), __('One comment', 'pixelobject'), __('% comments', 'pixelobject'));?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'pixelobject' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'pixelobject' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'pixelobject' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ul class="comment-list">
			<?php
				/* Loop through and list the comments.
				 */
				wp_list_comments( array( 'callback' => 'pixelobject_comment' ) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'pixelobject' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'pixelobject' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'pixelobject' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'pixelobject' ); ?></p>
	<?php endif; ?>

	<?php if ('open' == $post->comment_status) : ?>
 
    <div id="respond">
    	<?php $commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
			
			$comments_args = array(
		'id_submit'         => 'blog-form',
        // change the title of send button 
        'label_submit'=>__('Post comment','pixelobject'),
        // change the title of the reply section
        'title_reply'=>__('Leave your comment','pixelobject'),
		'comment_notes_before' => '',
		
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<div class="comment-form-comment blog-form"><textarea id="comment" name="comment" cols="100" rows="10" tabindex="4" aria-required="true"></textarea></div>',
	'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<div class="comment-form-author blog-form">' .
      '<input id="author" name="author" type="text" placeholder="' . __( 'Your name', 'pixelobject' ) .  ' " value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' /></div>',
	  'email' =>
      '<div class="comment-form-email blog-form">' .
      '<input id="email" name="email" type="text" placeholder="' . __( 'Your email (will not be published)', 'domainreference' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /></div>',

    'url' =>
      '<div class="comment-form-url blog-form">' .
      '<input id="url" name="url" type="text" placeholder="' .
      __( 'Website', 'domainreference' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" /></div>'
    )
	 ),
);

comment_form($comments_args); ?>
    </div>
    <?php endif; // if you delete this the sky will fall on your head ?>

</div><!-- #comments -->
