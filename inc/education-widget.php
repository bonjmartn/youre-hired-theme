<?php 

// register education widget
function register_education_widget() {
    register_widget( 'education_widget' );
}
add_action( 'widgets_init', 'register_education_widget' );


/**
 * Adds education_widget widget.
 */
class education_widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'education_widget', // Base ID
      __( 'Education', 'youre-hired' ), // Name
      array( 'description' => __( 'Drag me to the Education widget area', 'youre-hired' ), ) // Args
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

    $school = sanitize_text_field( $instance['school'] );
    $dates = sanitize_text_field( $instance['dates'] );

    // if the school name field is set
    if ( ! empty( $instance['school'] ) ) {
      echo ( '<span>' . $school . ', ' . $dates . '</span>' );
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
    $school = ! empty( $instance['school'] ) ? $instance['school'] : __( 'School Name', 'youre-hired' );
    $dates = ! empty( $instance['dates'] ) ? $instance['dates'] : __( '2000-2004', 'youre-hired' );

    ?>


    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Degree, Major:', 'youre-hired' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
    value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'school' ); ?>"><?php _e( 'School Name:', 'youre-hired' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'school' ); ?>" name="<?php echo $this->get_field_name( 'school' ); ?>" type="text" 
    value="<?php echo esc_attr( $school ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'dates' ); ?>"><?php _e( 'Dates:', 'youre-hired' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'dates' ); ?>" name="<?php echo $this->get_field_name( 'dates' ); ?>" type="text" 
    value="<?php echo esc_attr( $dates ); ?>">
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
    $instance['school'] = strip_tags( $new_instance['school'] );
    $instance['dates'] = strip_tags( $new_instance['dates'] );

  return $instance;

  }

} // class education_widget
