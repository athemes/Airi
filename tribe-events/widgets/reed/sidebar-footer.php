<?php
/**
 *
 * @package TheFuture
 */
?>

<?php
	$widget_areas = get_theme_mod( 'footer_widget_areas', '3' );
	$cols = 'col-md-' . 12/$widget_areas;
?>

<div id="sidebar-footer" class="widget-area" role="complementary">
	<div class="container">
		<div class="row">
			<div class="sidebar-column <?php echo $cols; ?>">
				<?php dynamic_sidebar( 'footer-1'); ?>
			</div>
			<div class="sidebar-column <?php echo $cols; ?>">
				<?php dynamic_sidebar( 'footer-2'); ?>
			</div>
			<div class="sidebar-column <?php echo $cols; ?>">
				<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
			<div class="sidebar-column <?php echo $cols; ?>">
				<?php dynamic_sidebar( 'footer-4'); ?>
			</div>
		</div>
	</div>	
</div>