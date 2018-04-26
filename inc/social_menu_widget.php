<?php
class Social_Menu_Widget extends WP_Widget{
    public function __construct() {
        parent::__construct(
            'social_menu_widget',
            'Social Menu Widget',
            array( 'description' => '' )
        );
    }

    public function widget($args, $instance){

        echo $args['before_widget'];
        echo '<ul class="social-menu-links">';

        if (!empty($instance['title'])) {
            echo '<h3 class="widgettitle">' . $instance['title'] . '</h3>';
        }

        if (!empty($instance['facebook_link'])) {
            echo '<li class="social-link-item"><a href="' . $instance['facebook_link'] . '" class="facebook"><i class="fab fa-facebook-f"></i></a></li>';
        }

        if (!empty($instance['google_plus_link'])) {
            echo '<li class="social-link-item"><a href="' . $instance['google_plus_link'] . '" class="google-plus"><i class="fab fa-google-plus-g"></i></a></li>';
        }

        if (!empty($instance['instagram_link'])) {
            echo '<li class="social-link-item"><a href="' . $instance['instagram_link'] . '"  class="instagram"><i class="fab fa-instagram"></i></a></li>';
        }

        if (!empty($instance['twitter_link'])) {
            echo '<li class="social-link-item"><a href="' . $instance['twitter_link'] . '"  class="twitter"><i class="fab fa-twitter"></i></a></li>';
        }

        echo '</ul>';
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook_link' ); ?>">Facebook link:</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'facebook_link' ); ?>" id="<?php echo $this->get_field_id( 'facebook_link' ); ?>" value="<?php echo $instance[ 'facebook_link' ]?:''; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'google_plus_link' ); ?>">Google+ link:</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'google_plus_link' ); ?>" id="<?php echo $this->get_field_id( 'google_plus_link' ); ?>" value="<?php echo $instance[ 'google_plus_link' ]?:''; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram_link' ); ?>">Instagram link:</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'instagram_link' ); ?>" id="<?php echo $this->get_field_id( 'instagram_link' ); ?>" value="<?php echo $instance[ 'instagram_link' ]?:''; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter_link' ); ?>">Twitter link:</label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'twitter_link' ); ?>" id="<?php echo $this->get_field_id( 'twitter_link' ); ?>" value="<?php echo $instance[ 'twitter_link' ]?:''; ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = $new_instance['title'] ?: '';
        $instance['facebook_link'] = $new_instance['facebook_link'] ?: '';
        $instance['google_plus_link'] = $new_instance['google_plus_link'] ?: '';
        $instance['instagram_link'] = $new_instance['instagram_link'] ?: '';
        $instance['twitter_link'] = $new_instance['twitter_link'] ?: '';
        return $instance;
    }
}
add_action( 'widgets_init', 'register_social_menu_widgets' );
function register_social_menu_widgets() {
    register_widget( 'Social_Menu_Widget' );
}