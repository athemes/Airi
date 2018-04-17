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
		<?php if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				atu_posted_on();
				// atu_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<div class="entry-meta">
			<?php 
				atu_entry_footer(); 
				atu_posted_by();
			?>
		</div>
		    
	</header><!-- .entry-header -->



	<?php atu_post_thumbnail(); ?>
   
	<div class="entry-content">

		<?php
		if (!atu_post_thumbnail() ){ ?>
		<p><img src="<?php echo get_template_directory_uri() ?>/images/post_image.png" /></p>

		<?php }
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'atu' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'atu' ),
			'after'  => '</div>',
		) );
		?>
		<div class="share-buttons">
			<span><button>Multippopuse</button> </span>
			<span><button>Design</button> </span>
			<span><button>Ideas</button> </span>
			<span class="social-icon"><i class="fab fa-pinterest"></i></span>
			<span class="social-icon"><i class="fab fa-google-plus-g"></i></i></span>
			<span class="social-icon"><i class="fab fa-twitter"></i></i></span>
			<span class="social-icon"><i class="fab fa-facebook-f"></i></span>
 			<span><label>Share:</label></span>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
