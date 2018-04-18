<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Atu
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function atu_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'atu_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function atu_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'atu_pingback_header' );


function atu_theme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
    <?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation">
            	<?php _e( 'Your comment is awaiting moderation.' ); ?>
           	</em><br/><?php 
        } ?>
        <div class="comment-author vcard"><?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] ); 
            } ?>
        </div>
       	<div class="comment-detail">
	        <div class="comment-meta commentmetadata">
	            <a href="#"><?php
	                /* translators: 1: date, 2: time */
	                printf( 
	                    __('%1$s'), 
	                    get_comment_date()
	                ); ?>
	            </a><br/><?php 
	            printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
	        </div>
	        
	        <div class="comment-text">
		        <?php comment_text(); ?>
		    </div>
	        <div class="like">
	        	<button>like</button>
	        </div>
	        <div class="reply"><button><?php 
	                comment_reply_link( 
	                    array_merge( 
	                        $args, 
	                        array( 
	                            'add_below' => $add_below, 
	                            'depth'     => $depth, 
	                            'max_depth' => $args['max_depth'] 
	                        ) 
	                    ) 
	                ); ?></button>
	        </div>
	    </div><?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}

/**
 * Customize comment form default fields.
 * Move the comment_field below the author, email, and url fields.
 */
function atu_comment_form_default_fields( $fields ) {
    $commenter     = wp_get_current_commenter();
    $user          = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
    $req           = get_option( 'require_name_email' );
    $aria_req      = ( $req ? " aria-required='true'" : '' );

    $fields = [
    	'comment_notes_before' => '<p class="comment-notes"></p>',
        'author' => '<p class="comment-form-author">' . '<label for="author"></label> ' .
                    '<input id="author" name="author" placeholder="Name" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' required="required" /></p>',
        'email'  => '<p class="comment-form-email"><label for="email"></label> ' .
                    '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' placeholder="Email" required="required" /></p>',
        'url'    => '<p class="comment-form-url"><label for="url"></label> ' .
                    '<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" placeholder="Website" /></p>',
        'comment_field' => '<p class="comment-form-comment"><label for="comment"></label> <textarea id="comment" name="comment" cols="45" rows="5" maxlength="65525" aria-required="true" placeholder="Message" required="required"></textarea></p>',
    ];

    return $fields;
}
add_filter( 'comment_form_default_fields', 'atu_comment_form_default_fields' );

/**
 * Remove the original comment field because we've added it to the default fields
 * using atu_comment_form_default_fields(). If we don't do this, the comment
 * field will appear twice.
 */
function atu_comment_form_defaults( $defaults ) {
    if ( isset( $defaults[ 'comment_field' ] ) ) {
        $defaults[ 'comment_field' ] = '';
    }

    return $defaults;
}
add_filter( 'comment_form_defaults', 'atu_comment_form_defaults', 10, 1 );