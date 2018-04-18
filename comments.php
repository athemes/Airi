<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atu
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$atu_comment_count = get_comments_number();
			if ( '1' === $atu_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One Comments', 'atu' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s', '%1$s Comments', $atu_comment_count, 'comments title', 'atu' ) ),
					number_format_i18n( $atu_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php wp_list_comments( 'type=comment&callback=atu_theme_comment' ); ?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'atu' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$comments_args = array(
        // change the title of send button 
        'label_submit'=>'Send Message',
        // change the title of the reply section
        'title_reply'=>'Reave A Comment',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        'comment_notes_before' => '',
	);
	if (!is_user_logged_in()) {  
		comment_form($comments_args);
	}  
	else{  
		$comments_args = array(
        // change the title of send button 
        'label_submit'=>'Send Message',
        // change the title of the reply section
        'title_reply'=>'Reave A Comment',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        'comment_notes_before' => '',
        'comment_field' => '<p class="comment-form-comment"><label for="comment"></label> <textarea id="comment" name="comment" cols="45" rows="5" maxlength="65525" aria-required="true" placeholder="Message" required="required"></textarea></p>',
		);
		comment_form($comments_args);
	}  
	?>

</div><!-- #comments -->
