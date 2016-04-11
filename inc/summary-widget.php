<?php 

// register summary widget
function register_summary_widget() {
    register_widget( 'summary_widget' );
}
add_action( 'widgets_init', 'register_summary_widget' );


/**
 * Adds summary_widget widget.
 */
class summary_widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'summary_widget', // Base ID
      __( 'Summary', 'youre-hired-free' ), // Name
      array( 'description' => __( 'Drag me to the "Summary - Name, Title, Social Icons" widget area', 'youre-hired-free' ), ) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }

    $myname = $instance['myname'];
    $mytitle = $instance['mytitle'];
    $specialty = $instance['specialty'];
    $facebook = $instance['facebook'];
    $twitter = $instance['twitter'];
    $pinterest = $instance['pinterest'];
    $instagram = $instance['instagram'];
    $youtube = $instance['youtube'];
    $linkedin = $instance['linkedin'];

    // if the name field is set
    if ( ! empty( $instance['myname'] ) ) {
      echo ( '<div class="name">' . $myname . '</div>' );
    }

    // if the mytitle field is set
    if ( ! empty( $instance['mytitle'] ) ) {
      echo ( '<div class="title">' . $mytitle . '</div>' );
    }

    // if the speciality field is set
    if ( ! empty( $instance['specialty'] ) ) {
      echo ( '<div class="specialty">' . $specialty . '</div>' );
    }

    // if social icons are set
    if ( ! empty( $instance['facebook'] ) ) {
      echo sprintf( '<a href="' . $facebook . '"><i class="fa fa-facebook-square"></i></a>');
    }

    if ( ! empty( $instance['twitter'] ) ) {
      echo sprintf( '<a href="' . $twitter . '"><i class="fa fa-twitter-square"></i></a>');
    }

    if ( ! empty( $instance['pinterest'] ) ) {
      echo sprintf( '<a href="' . $pinterest . '"><i class="fa fa-pinterest-square"></i></a>');
    }

    if ( ! empty( $instance['instagram'] ) ) {
      echo sprintf( '<a href="' . $instagram . '"><i class="fa fa-instagram"></i></a>');
    }

    if ( ! empty( $instance['youtube'] ) ) {
      echo sprintf( '<a href="' . $youtube . '"><i class="fa fa-youtube-square"></i></a>');
    }

    if ( ! empty( $instance['linkedin'] ) ) {
      echo sprintf( '<a href="' . $linkedin . '"><i class="fa fa-linkedin-square"></i></a>');
    }

    // if the textarea field is set
    $textarea = apply_filters( 'widget_textarea', empty( $instance['textarea'] ) ? '' : $instance['textarea'], $instance );
  
    if ( ! empty( $instance['textarea'] ) ) {
       echo ( '<div class="summary">' . wpautop($textarea) . '</div>' );
    }

    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'youre-hired-free' );
    $myname = ! empty( $instance['myname'] ) ? $instance['myname'] : __( 'Your Name', 'youre-hired-free' );
    $mytitle = ! empty( $instance['mytitle'] ) ? $instance['mytitle'] : __( 'Professional Title', 'youre-hired-free' );
    $specialty = ! empty( $instance['specialty'] ) ? $instance['specialty'] : __( 'Specialty', 'youre-hired-free' );
    $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : __( 'https://www.facebook.com', 'youre-hired-free' );
    $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : __( 'https://www.twitter.com', 'youre-hired-free' );
    $pinterest = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : __( 'https://www.pinterest.com', 'youre-hired-free' );
    $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : __( 'https://www.instagram.com', 'youre-hired-free' );
    $youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : __( 'https://www.youtube.com', 'youre-hired-free' );
    $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : __( 'https://www.linkedin.com', 'youre-hired-free' );
    $textarea = ! empty( $instance['textarea'] ) ? $instance['textarea'] : __( '', 'youre-hired-free' );

    ?>

    <p>
    <label for="<?php echo $this->get_field_id( 'myname' ); ?>"><?php _e( 'Name:', 'youre-hired-free' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'myname' ); ?>" name="<?php echo $this->get_field_name( 'myname' ); ?>" type="text" 
    value="<?php echo esc_attr( $myname ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'mytitle' ); ?>"><?php _e( 'Professional Title:', 'youre-hired-free' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'mytitle' ); ?>" name="<?php echo $this->get_field_name( 'mytitle' ); ?>" type="text" 
    value="<?php echo esc_attr( $mytitle ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'specialty' ); ?>"><?php _e( 'Specialty:', 'youre-hired-free' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'specialty' ); ?>" name="<?php echo $this->get_field_name( 'specialty' ); ?>" type="text" 
    value="<?php echo esc_attr( $specialty ); ?>">
    </p>

     <p>
    <label for="<?php echo $this->get_field_id('facebook_field'); ?>"><?php _e('Enter the URL for your Facebook page', 'youre-hired-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('facebook_field'); ?>" name="<?php echo $this->get_field_name('facebook_field'); ?>" type="text" 
    value="<?php echo esc_attr( $facebook ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('twitter_field'); ?>"><?php _e('Enter the URL for your Twitter profile', 'youre-hired-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('twitter_field'); ?>" name="<?php echo $this->get_field_name('twitter_field'); ?>" type="text" 
    value="<?php echo esc_attr( $twitter ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('pinterest_field'); ?>"><?php _e('Enter the URL for your Pinterest page', 'youre-hired-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('pinterest_field'); ?>" name="<?php echo $this->get_field_name('pinterest_field'); ?>" type="text" 
    value="<?php echo esc_attr( $pinterest ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('instagram_field'); ?>"><?php _e('Enter the URL for your Instagram profile', 'youre-hired-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('instagram_field'); ?>" name="<?php echo $this->get_field_name('instagram_field'); ?>" type="text" 
    value="<?php echo esc_attr( $instagram ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('youtube_field'); ?>"><?php _e('Enter the URL for your YouTube page', 'youre-hired-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('youtube_field'); ?>" name="<?php echo $this->get_field_name('youtube_field'); ?>" type="text" 
    value="<?php echo esc_attr( $youtube ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('linkedin_field'); ?>"><?php _e('Enter the URL for your LinkedIn profile', 'youre-hired-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('linkedin_field'); ?>" name="<?php echo $this->get_field_name('linkedin_field'); ?>" type="text" 
    value="<?php echo esc_attr( $linkedin ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Write a brief summary of what you are looking for:', 'youre-hired-free'); ?></label>
    <textarea rows="5" cols="30" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
    </p>

    <?php 
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['myname'] = strip_tags( $new_instance['myname'] );
    $instance['mytitle'] = strip_tags( $new_instance['mytitle'] );
    $instance['specialty'] = strip_tags( $new_instance['specialty'] );
    $instance['facebook'] = strip_tags( $new_instance['facebook_field'] );
    $instance['twitter'] = strip_tags( $new_instance['twitter_field'] );
    $instance['pinterest'] = strip_tags( $new_instance['pinterest_field'] );
    $instance['instagram'] = strip_tags( $new_instance['instagram_field'] );
    $instance['youtube'] = strip_tags( $new_instance['youtube_field'] );
    $instance['linkedin'] = strip_tags( $new_instance['linkedin_field'] );

    if ( current_user_can('unfiltered_html') )
    $instance['textarea'] =  $new_instance['textarea'];
    else
    $instance['textarea'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['textarea']) ) );

  return $instance;

  }

} // class about_widget
