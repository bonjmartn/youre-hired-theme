<?php 

// register skills Me widget
function register_skills_widget() {
    register_widget( 'skills_widget' );
}
add_action( 'widgets_init', 'register_skills_widget' );


/**
 * Adds skills_widget widget.
 */
class skills_widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'skills_widget', // Base ID
      __( 'Skills', 'youre-hired' ), // Name
      array( 'description' => __( 'Drag me to the Skills widget area. You can use multiple widgets for more than one group of skills.', 'youre-hired' ), ) // Args
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
    // if the text field is set
    $textarea = apply_filters( 'widget_textarea', empty( $instance['textarea'] ) ? '' : $instance['textarea'], $instance );
  
    if ( ! empty( $instance['textarea'] ) ) {
      echo wpautop($textarea);
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
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Skills', 'youre-hired' );
    $textarea = ! empty( $instance['textarea'] ) ? $instance['textarea'] : __( 'Skills List', 'youre-hired' );
      ?>


    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Skills Group Title:', 'youre-hired' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
    value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Enter one skill per line:', 'youre-hired'); ?></label>
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

    if ( current_user_can('unfiltered_html') )
    $instance['textarea'] =  $new_instance['textarea'];
    else
    $instance['textarea'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['textarea']) ) );

  return $instance;

  }

} // class skills_widget
