<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atu
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				atu_posted_on();
				atu_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php atu_post_thumbnail(); ?>

	<div class="entry-content">
		<div class="post-date"> 26 Nov 2018 </div>
		<div class="post-title"> 15 Best Interior Design WordPress Themes 2018</div>
		<div class="post-info">
			<button class="post-category">Development</button>
			<span class="post-by">by <strong>Joe Fylan</strong></span>
			<span class="post-comments-number"><icon></icon>06 Comments</span>
		</div>
		<div class="post-image">
			<img src="<?php echo get_template_directory_uri() ?>/images/post_image.png" />
		</div>
		<div class="post-content">
			<p> One of the most important parts of any healthy lifestyle, though, is a willingness to learn from those who’ve already been around for a bit. It seems like a good place to start. You might notice there’s a bit of a variety, almost as if one lifestyle doesn’t fit all. </p>
			<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
			<div class="strong-sentence">
				<div class="bracket">“</div>
				<div class="content">
					“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods, and the nights will flame with fire. You will ride life straight to perfect laughter. It’s the only good fight there is.”
					<p>
						<span class="sentence-owner">Ollie Schneider -</span>
						<span class="owner-position">CEO DeerCreative</span>
					</p> 
				</div>
			</div>
			<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
		</div>
		<div class="share-buttons">
			<span><button>Multippopuse</button> </span>
			<span><button>Design</button> </span>
			<span><button>Ideas</button> </span>
			<span><icon>a</icon></span>
			<span><icon>a</icon></span>
			<span><icon>a</icon></span>
			<span><icon>a</icon></span>
			<span><label>Share:</label></span>
		</div>
		<div class="comment-list">
			<div class="header">2 Comments</div>
			<div class="comment">
				<div class="user-avatar">
					<img src="<?php echo get_template_directory_uri() ?>/images/avatar3.png">
				</div>
				<div class="comment-info">
					<div class="comment-date">27 Aug 2016</div>
					<div class="user-name">Brandon Kelley</div>
					<div class="comment-detail">Here is comment</div>
					<div>
						<span><button>like</button> </span>
						<span><button>reply</button> </span>
					</div>
					<div class="sub-comment">
						<div class="sub-user-avatar">
							<img src="<?php echo get_template_directory_uri() ?>/images/avatar2.png">
						</div>
						<div class="sub-comment-info">
							<div class="sub-comment-date">27 Aug 2016</div>
							<div class="sub-user-name">Brandon Kelley</div>
							<div class="sub-comment-detail">Here is comment</div>
							<div>
								<span><button>like</button> </span>
								<span><button>reply</button> </span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="comment">
				<div class="user-avatar">
					<img src="<?php echo get_template_directory_uri() ?>/images/avatar1.png">
				</div>
				<div class="comment-info">
					<div class="comment-date">27 Aug 2016</div>
					<div class="user-name">Leander Tee</div>
					<div class="comment-detail">Here is comment</div>
					<div>
						<span><button>like</button> </span>
						<span><button>reply</button> </span>
					</div>
				</div>
			</div>
		</div>
		<div class="comment-form">
			<div class="header"><sharp>Leave A Comment</sharp></div>
			<input type="text" name="name" placeholder="Name" />
			<input type="text" name="email" placeholder="Email" />
			<input type="text" name="website" placeholder="Website" />
			<textarea rows="4" name="message" placeholder="Message"></textarea>
			<button>send message</button>
		</div>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php atu_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
