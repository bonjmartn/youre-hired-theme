<?php 

// register quotes widget
function register_quotes_widget() {
    register_widget( 'quotes_widget' );
}
add_action( 'widgets_init', 'register_quotes_widget' );


/**
 * Adds quotes_widget widget.
 */
class quotes_widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'quotes_widget', // Base ID
      __( 'Quotes', 'youre-hired' ), // Name
      array( 'description' => __( 'Drag me to the About Me widget area to add quotes or recommendations from people', 'youre-hired' ), ) // Args
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

    $title = sanitize_text_field( $instance['title'] );
    $name = sanitize_text_field( $instance['name'] );
    $job = sanitize_text_field( $instance['job'] );
    $company = sanitize_text_field( $instance['company'] );
    $quote = sanitize_text_field( $instance['quote'] );

    // if the quote name field is set
    if ( ! empty( $instance['quote'] ) ) {

      echo ( '<p class="quotes-text"><i class="fa fa-comment-o" aria-hidden="true"></i><br><span class="quote-text">' . $quote . '</span><br>&mdash;<span class="quotes-name"> ' . $name . ',</span><span class="quotes-job"> '  . $job . ',</span><span class="quotes-company"> ' . $company .'</span></p>' );
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
    $name = ! empty( $instance['name'] ) ? $instance['name'] : __( 'Bill Gates', 'youre-hired' );
    $job = ! empty( $instance['job'] ) ? $instance['job'] : __( 'CEO', 'youre-hired' );
    $company = ! empty( $instance['company'] ) ? $instance['company'] : __( 'Microsoft', 'youre-hired' );
    $quote = ! empty( $instance['quote'] ) ? $instance['quote'] : __( '"Enter the quote or recommendation in quotes"', 'youre-hired' );

    ?>


    <p>
      <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:', 'youre-hired' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" 
      value="<?php echo esc_attr( $name ); ?>">
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'job' ); ?>"><?php _e( 'Title:', 'youre-hired' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'job' ); ?>" name="<?php echo $this->get_field_name( 'job' ); ?>" type="text" 
      value="<?php echo esc_attr( $job ); ?>">
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'company' ); ?>"><?php _e( 'Company:', 'youre-hired' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'company' ); ?>" name="<?php echo $this->get_field_name( 'company' ); ?>" type="text" 
      value="<?php echo esc_attr( $company ); ?>">
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'quote' ); ?>"><?php _e( 'Quote:', 'youre-hired' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'quote' ); ?>" name="<?php echo $this->get_field_name( 'quote' ); ?>" type="text" 
      value="<?php echo esc_attr( $quote ); ?>">
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
    $instance['name'] = strip_tags( $new_instance['name'] );
    $instance['job'] = strip_tags( $new_instance['job'] );
    $instance['company'] = strip_tags( $new_instance['company'] );
    $instance['quote'] = strip_tags( $new_instance['quote'] );

  return $instance;

  }

} // class quotes_widget
