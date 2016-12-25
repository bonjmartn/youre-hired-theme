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
      __( 'Summary', 'youre-hired' ), // Name
      array( 'description' => __( 'Drag me to the "Summary - Name, Title, Social Icons" widget area', 'youre-hired' ), ) // Args
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

    $myname = sanitize_text_field( $instance['myname'] );
    $mytitle = sanitize_text_field( $instance['mytitle'] );
    $specialty = sanitize_text_field( $instance['specialty'] );
    $facebook = esc_url( $instance['facebook'] );
    $twitter = esc_url( $instance['twitter'] );
    $pinterest = esc_url( $instance['pinterest'] );
    $instagram = esc_url( $instance['instagram'] );
    $youtube = esc_url( $instance['youtube'] );
    $linkedin = esc_url( $instance['linkedin'] );
    $behance = esc_url( $instance['behance'] );
    $dribbble = esc_url( $instance['dribbble'] );
    $deviantart = esc_url( $instance['deviantart'] );
    $github = esc_url( $instance['github'] );
    $google = esc_url( $instance['google'] );
    $skype = esc_url( $instance['skype'] );
    $snapchat = esc_url( $instance['snapchat'] );
    $tumblr = esc_url( $instance['tumblr'] );
    $vimeo = esc_url( $instance['vimeo'] );
    $wordpress = esc_url( $instance['wordpress'] );

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
      echo sprintf( '<a href="' . $facebook . '"><i class="fa fa-facebook-official"></i></a>');
    }

    if ( ! empty( $instance['twitter'] ) ) {
      echo sprintf( '<a href="' . $twitter . '"><i class="fa fa-twitter"></i></a>');
    }

    if ( ! empty( $instance['pinterest'] ) ) {
      echo sprintf( '<a href="' . $pinterest . '"><i class="fa fa-pinterest"></i></a>');
    }

    if ( ! empty( $instance['instagram'] ) ) {
      echo sprintf( '<a href="' . $instagram . '"><i class="fa fa-instagram"></i></a>');
    }

    if ( ! empty( $instance['youtube'] ) ) {
      echo sprintf( '<a href="' . $youtube . '"><i class="fa fa-youtube-play"></i></a>');
    }

    if ( ! empty( $instance['linkedin'] ) ) {
      echo sprintf( '<a href="' . $linkedin . '"><i class="fa fa-linkedin"></i></a>');
    }

    if ( ! empty( $instance['behance'] ) ) {
      echo sprintf( '<a href="' . $behance . '"><i class="fa fa-behance"></i></a>');
    }

    if ( ! empty( $instance['dribbble'] ) ) {
      echo sprintf( '<a href="' . $dribbble . '"><i class="fa fa-dribbble"></i></a>');
    }

    if ( ! empty( $instance['deviantart'] ) ) {
      echo sprintf( '<a href="' . $deviantart . '"><i class="fa fa-deviantart"></i></a>');
    }

    if ( ! empty( $instance['github'] ) ) {
      echo sprintf( '<a href="' . $github . '"><i class="fa fa-github"></i></a>');
    }

    if ( ! empty( $instance['google'] ) ) {
      echo sprintf( '<a href="' . $google . '"><i class="fa fa-google-plus"></i></a>');
    }

    if ( ! empty( $instance['skype'] ) ) {
      echo sprintf( '<a href="' . $skype . '"><i class="fa fa-skype"></i></a>');
    }

    if ( ! empty( $instance['snapchat'] ) ) {
      echo sprintf( '<a href="' . $snapchat . '"><i class="fa fa-snapchat-ghost"></i></a>');
    }

    if ( ! empty( $instance['tumblr'] ) ) {
      echo sprintf( '<a href="' . $tumblr . '"><i class="fa fa-tumblr"></i></a>');
    }

    if ( ! empty( $instance['vimeo'] ) ) {
      echo sprintf( '<a href="' . $vimeo . '"><i class="fa fa-vimeo"></i></a>');
    }

    if ( ! empty( $instance['wordpress'] ) ) {
      echo sprintf( '<a href="' . $wordpress . '"><i class="fa fa-wordpress"></i></a>');
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
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'youre-hired' );
    $myname = ! empty( $instance['myname'] ) ? $instance['myname'] : __( 'Your Name', 'youre-hired' );
    $mytitle = ! empty( $instance['mytitle'] ) ? $instance['mytitle'] : __( 'Professional Title', 'youre-hired' );
    $specialty = ! empty( $instance['specialty'] ) ? $instance['specialty'] : __( 'Specialty', 'youre-hired' );
    $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : __( '', 'youre-hired' );
    $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : __( '', 'youre-hired' );
    $pinterest = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : __( '', 'youre-hired' );
    $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : __( '', 'youre-hired' );
    $youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : __( '', 'youre-hired' );
    $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : __( '', 'youre-hired' );
    $behance = ! empty( $instance['behance'] ) ? $instance['behance'] : __( '', 'youre-hired' );
    $dribbble = ! empty( $instance['dribbble'] ) ? $instance['dribbble'] : __( '', 'youre-hired' );
    $deviantart = ! empty( $instance['deviantart'] ) ? $instance['deviantart'] : __( '', 'youre-hired' );
    $github = ! empty( $instance['github'] ) ? $instance['github'] : __( '', 'youre-hired' );
    $google = ! empty( $instance['google'] ) ? $instance['google'] : __( '', 'youre-hired' );
    $skype = ! empty( $instance['skype'] ) ? $instance['skype'] : __( '', 'youre-hired' );
    $snapchat = ! empty( $instance['snapchat'] ) ? $instance['snapchat'] : __( '', 'youre-hired' );
    $tumblr = ! empty( $instance['tumblr'] ) ? $instance['tumblr'] : __( '', 'youre-hired' );
    $vimeo = ! empty( $instance['vimeo'] ) ? $instance['vimeo'] : __( '', 'youre-hired' );
    $wordpress = ! empty( $instance['wordpress'] ) ? $instance['wordpress'] : __( '', 'youre-hired' );
    $textarea = ! empty( $instance['textarea'] ) ? $instance['textarea'] : __( '', 'youre-hired' );

    ?>

    <p>
    <label for="<?php echo $this->get_field_id( 'myname' ); ?>"><?php _e( 'Name:', 'youre-hired' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'myname' ); ?>" name="<?php echo $this->get_field_name( 'myname' ); ?>" type="text" 
    value="<?php echo esc_attr( $myname ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'mytitle' ); ?>"><?php _e( 'Professional Title:', 'youre-hired' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'mytitle' ); ?>" name="<?php echo $this->get_field_name( 'mytitle' ); ?>" type="text" 
    value="<?php echo esc_attr( $mytitle ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'specialty' ); ?>"><?php _e( 'Specialty:', 'youre-hired' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'specialty' ); ?>" name="<?php echo $this->get_field_name( 'specialty' ); ?>" type="text" 
    value="<?php echo esc_attr( $specialty ); ?>">
    </p>

     <p>
    <label for="<?php echo $this->get_field_id('facebook_field'); ?>"><?php _e('Enter the URL for your Facebook page', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('facebook_field'); ?>" name="<?php echo $this->get_field_name('facebook_field'); ?>" type="text" 
    value="<?php echo esc_attr( $facebook ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('twitter_field'); ?>"><?php _e('Enter the URL for your Twitter profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('twitter_field'); ?>" name="<?php echo $this->get_field_name('twitter_field'); ?>" type="text" 
    value="<?php echo esc_attr( $twitter ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('pinterest_field'); ?>"><?php _e('Enter the URL for your Pinterest page', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('pinterest_field'); ?>" name="<?php echo $this->get_field_name('pinterest_field'); ?>" type="text" 
    value="<?php echo esc_attr( $pinterest ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('instagram_field'); ?>"><?php _e('Enter the URL for your Instagram profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('instagram_field'); ?>" name="<?php echo $this->get_field_name('instagram_field'); ?>" type="text" 
    value="<?php echo esc_attr( $instagram ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('youtube_field'); ?>"><?php _e('Enter the URL for your YouTube page', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('youtube_field'); ?>" name="<?php echo $this->get_field_name('youtube_field'); ?>" type="text" 
    value="<?php echo esc_attr( $youtube ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('linkedin_field'); ?>"><?php _e('Enter the URL for your LinkedIn profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('linkedin_field'); ?>" name="<?php echo $this->get_field_name('linkedin_field'); ?>" type="text" 
    value="<?php echo esc_attr( $linkedin ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('behance_field'); ?>"><?php _e('Enter the URL for your Behance profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('behance_field'); ?>" name="<?php echo $this->get_field_name('behance_field'); ?>" type="text" 
    value="<?php echo esc_attr( $behance ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('dribbble_field'); ?>"><?php _e('Enter the URL for your dribbble profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('dribbble_field'); ?>" name="<?php echo $this->get_field_name('dribbble_field'); ?>" type="text" 
    value="<?php echo esc_attr( $dribbble ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('deviantart_field'); ?>"><?php _e('Enter the URL for your Deviant Art profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('deviantart_field'); ?>" name="<?php echo $this->get_field_name('deviantart_field'); ?>" type="text" 
    value="<?php echo esc_attr( $deviantart ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('github_field'); ?>"><?php _e('Enter the URL for your GitHub profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('github_field'); ?>" name="<?php echo $this->get_field_name('github_field'); ?>" type="text" 
    value="<?php echo esc_attr( $github ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('google_field'); ?>"><?php _e('Enter the URL for your Google Plus profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('google_field'); ?>" name="<?php echo $this->get_field_name('google_field'); ?>" type="text" 
    value="<?php echo esc_attr( $google ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('skype_field'); ?>"><?php _e('Enter the URL for your Skype profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('skype_field'); ?>" name="<?php echo $this->get_field_name('skype_field'); ?>" type="text" 
    value="<?php echo esc_attr( $skype ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('snapchat_field'); ?>"><?php _e('Enter the URL for your Snapchat profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('snapchat_field'); ?>" name="<?php echo $this->get_field_name('snapchat_field'); ?>" type="text" 
    value="<?php echo esc_attr( $snapchat ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('tumblr_field'); ?>"><?php _e('Enter the URL for your tumblr profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('tumblr_field'); ?>" name="<?php echo $this->get_field_name('tumblr_field'); ?>" type="text" 
    value="<?php echo esc_attr( $tumblr ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('vimeo_field'); ?>"><?php _e('Enter the URL for your Vimeo profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('vimeo_field'); ?>" name="<?php echo $this->get_field_name('vimeo_field'); ?>" type="text" 
    value="<?php echo esc_attr( $vimeo ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('wordpress_field'); ?>"><?php _e('Enter the URL for your WordPress profile', 'youre-hired'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('wordpress_field'); ?>" name="<?php echo $this->get_field_name('wordpress_field'); ?>" type="text" 
    value="<?php echo esc_attr( $wordpress ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Write a brief summary of what you are looking for:', 'youre-hired'); ?></label>
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
    $instance['behance'] = strip_tags( $new_instance['behance_field'] );
    $instance['dribbble'] = strip_tags( $new_instance['dribbble_field'] );
    $instance['deviantart'] = strip_tags( $new_instance['deviantart_field'] );
    $instance['github'] = strip_tags( $new_instance['github_field'] );
    $instance['google'] = strip_tags( $new_instance['google_field'] );
    $instance['skype'] = strip_tags( $new_instance['skype_field'] );
    $instance['snapchat'] = strip_tags( $new_instance['snapchat_field'] );
    $instance['tumblr'] = strip_tags( $new_instance['tumblr_field'] );
    $instance['vimeo'] = strip_tags( $new_instance['vimeo_field'] );
    $instance['wordpress'] = strip_tags( $new_instance['wordpress_field'] );

    if ( current_user_can('unfiltered_html') )
    $instance['textarea'] =  $new_instance['textarea'];
    else
    $instance['textarea'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['textarea']) ) );

  return $instance;

  }

} // class about_widget
