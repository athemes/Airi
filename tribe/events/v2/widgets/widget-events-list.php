<?php
/**
 * Widget: Events List
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/widgets/widget-events-list.php
 *
 * See more documentation about our views templating system.
 *
 * @link    http://evnt.is/1aiy
 *
 * @since 5.3.0
 * @since 5.4.0   Remove passed vars - rely on widget object in view more template.
 *
 * @version 5.4.0
 *
 * @var array<\WP_Post>      $events                     The array containing the events.
 * @var string               $rest_url                   The REST URL.
 * @var string               $rest_nonce                 The REST nonce.
 * @var int                  $should_manage_url          int containing if it should manage the URL.
 * @var array<string>        $compatibility_classes      Classes used for the compatibility container.
 * @var array<string>        $container_classes          Classes used for the container of the view.
 * @var array<string,mixed>  $container_data             An additional set of container `data` attributes.
 * @var string               $breakpoint_pointer         String we use as pointer to the current view we are setting up with breakpoints.
 * @var array<string,string> $messages                   An array of user-facing messages, managed by the View.
 * @var boolean              $hide_if_no_upcoming_events Hide widget if no events.
 * @var string               $json_ld_data               The JSON-LD for widget events, if enabled.
 * @var string               $widget_title               The title of the widget.
 */

// Hide widget if no events and widget only displays with events is checked.
if ( empty( $events ) && $hide_if_no_upcoming_events ) {
	return;
}
$airi_events_label_plural = tribe_get_event_label_plural();
$airi_events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();

// Check if any event posts are found.
if ( $events ) : ?>

	<ol class="tribe-list-widget">
		<?php
		// Setup the post data for each event.
		foreach ( $events as $event ) : ?>
			<li class="tribe-events-list-widget-events clearfix <?php tribe_events_event_classes( $event -> ID ) ?>">

				<div class="events-inner clearfix">
					<?php
					if (
						tribe( 'tec.featured_events' )->is_featured( $event -> ID )
						&& get_post_thumbnail_id( $event )
					) {
						/**
						 * Fire an action before the list widget featured image
						 */
						// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
						do_action( 'tribe_events_list_widget_before_the_event_image' );

						/**
						 * Allow the default post thumbnail size to be filtered
						 *
						 * @param $size
						 */
						$airi_thumbnail_size = apply_filters( 'tribe_events_list_widget_thumbnail_size', 'post-thumbnail' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound

						/**
						 * Filters whether the featured image link should be added to the Events List Widget
						 *
						 * @since 4.5.13
						 *
						 * @param bool $airi_featured_image_link Whether the featured image link should be added or not
						 */
						$airi_featured_image_link = apply_filters( 'tribe_events_list_widget_featured_image_link', true ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
						$airi_post_thumbnail      = get_the_post_thumbnail( $event -> ID, $airi_thumbnail_size );

						if ( $airi_featured_image_link ) {
							$airi_post_thumbnail = '<a href="' . esc_url( tribe_get_event_link( $event -> ID ) ) . '">' . $airi_post_thumbnail . '</a>';
						}
						?>
						<div class="tribe-event-image mb-4">
							<?php
							// not escaped because it contains markup
							echo $airi_post_thumbnail;
							?>
						</div>
						<?php

						/**
						 * Fire an action after the list widget featured image
						 */
						do_action( 'tribe_events_list_widget_after_the_event_image' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
					}
					?>

					<?php do_action( 'airi_tribe_events_list_widget_before_the_event_title' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound ?>
					<!-- Event Title -->
					<h4 class="tribe-event-title">
						<a href="<?php echo esc_url( tribe_get_event_link( $event -> ID ) ); ?>" rel="bookmark"><?php echo esc_html( get_the_title( $event -> ID ) ); ?></a>
					</h4>

					<?php do_action( 'airi_tribe_events_list_widget_after_the_event_title' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound ?>
					<!-- Event Time -->

					<?php do_action( 'airi_tribe_events_list_widget_before_the_meta' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound ?>

					<?php 
					$venue = tribe_get_venue( $event -> ID );
					if( !empty($venue) ) : ?>
					<div class="atu-event-venue">
						<?php echo esc_html( $venue ); ?>
					</div>
					<?php endif; ?>

					<div class="tribe-event-duration">
						<?php echo tribe_events_event_schedule_details( $event -> ID ); ?>
					</div>

					<?php do_action( 'airi_tribe_events_list_widget_after_the_meta' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound ?>
				
				</div>

				<div class="airi-events-button">
					<a class="button" href="<?php echo esc_url( tribe_get_event_link( $event -> ID ) ); ?>"><?php echo esc_html__( 'See this event', 'airi' ); ?></a>
				</div>
			</li>
		<?php
		endforeach;
		?>
	</ol><!-- .tribe-list-widget -->

<?php
// No events were found.
else : ?>
	<p><?php printf( esc_html__( 'There are no upcoming %s at this time.', 'airi' ), $airi_events_label_plural_lowercase ); ?></p>
<?php
endif;