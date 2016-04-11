<?php 

// register languages widget
function register_languages_widget() {
    register_widget( 'languages_widget' );
}
add_action( 'widgets_init', 'register_languages_widget' );


/**
 * Adds languages_widget widget.
 */
class languages_widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'languages_widget', // Base ID
      __( 'Languages', 'youre-hired-free' ), // Name
      array( 'description' => __( 'Drag me to the languages widget area', 'youre-hired-free' ), ) // Args
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

    $proficiency = $instance['proficiency'];

    // if the proficiency name field is set
    if ( ! empty( $instance['proficiency'] ) ) {
      echo ( '<span>' . $proficiency . '</span>' );
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
    $proficiency = ! empty( $instance['proficiency'] ) ? $instance['proficiency'] : __( 'Proficiency Level', 'youre-hired-free' );

    ?>


    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Language:', 'youre-hired-free' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
    value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'proficiency' ); ?>"><?php _e( 'Proficiency Level:', 'youre-hired-free' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'proficiency' ); ?>" name="<?php echo $this->get_field_name( 'proficiency' ); ?>" type="text" 
    value="<?php echo esc_attr( $proficiency ); ?>">
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
    $instance['proficiency'] = strip_tags( $new_instance['proficiency'] );

  return $instance;

  }

} // class languages_widget