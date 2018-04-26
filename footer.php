<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Atu
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <?php
    if ( function_exists('dynamic_sidebar') ) : ?>
        <div class="container footer-widgets-area">
            <div class="row">
                <?php
                dynamic_sidebar('footer_sidebar');
                ?>
            </div>
        </div>
    <?php endif; ?>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>