<?php 

// register download widget
function register_download_widget() {
    register_widget( 'download_widget' );
}
add_action( 'widgets_init', 'register_download_widget' );


/**
 * Adds download_widget widget.
 */
class download_widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'download_widget', // Base ID
      __( 'Resume Download', 'youre-hired-free' ), // Name
      array( 'description' => __( 'Drag me to the "Resume Download" widget area', 'youre-hired-free' ), ) // Args
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

    $linktext = $instance['linktext'];
    $linkURL = $instance['linkURL'];

    // if the linkURL field is set
    if ( ! empty( $instance['linkURL'] ) ) {
      echo ( '<div class="download-resume"><a href="' . $linkURL . '">' . $linktext . '</a></div>' );
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
    $linktext = ! empty( $instance['linktext'] ) ? $instance['linktext'] : __( 'Download Resume', 'youre-hired-free' );
    $linkURL = ! empty( $instance['linkURL'] ) ? $instance['linkURL'] : __( '', 'youre-hired-free' );
    ?>


    <p>
    <label for="<?php echo $this->get_field_id( 'linktext' ); ?>"><?php _e( 'Link Text:', 'youre-hired-free' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'linktext' ); ?>" name="<?php echo $this->get_field_name( 'linktext' ); ?>" type="text" 
    value="<?php echo esc_attr( $linktext ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'linkURL' ); ?>"><?php _e( 'Link URL', 'youre-hired-free' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'linkURL' ); ?>" name="<?php echo $this->get_field_name( 'linkURL' ); ?>" type="text" 
    value="<?php echo esc_attr( $linkURL ); ?>">
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
    $instance['linktext'] = strip_tags( $new_instance['linktext'] );
    $instance['linkURL'] = strip_tags( $new_instance['linkURL'] );

  return $instance;

  }

} // class download_widget
