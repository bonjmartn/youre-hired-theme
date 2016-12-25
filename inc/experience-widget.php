<?php 

// register experience widget
function register_experience_widget() {
    register_widget( 'experience_widget' );
}
add_action( 'widgets_init', 'register_experience_widget' );


/**
 * Adds experience_widget widget.
 */
class experience_widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'experience_widget', // Base ID
      __( 'Experience', 'youre-hired' ), // Name
      array( 'description' => __( 'Drag me to the Experience widget area', 'youre-hired' ), ) // Args
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
    // echo $args['before_widget'];
    // if ( ! empty( $instance['title'] ) ) {
    //   echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    // }

    $title = sanitize_text_field( $instance['title'] );
    $company = sanitize_text_field( $instance['company'] );
    $logo = sanitize_text_field( $instance['logo'] );
    $location = sanitize_text_field( $instance['location'] );
    $dates = sanitize_text_field( $instance['dates'] );
    $textarea = ( $instance['textarea'] );


    // if the title field is set
    if ( ! empty( $instance['title'] ) ) {


    echo (  '<div class="section group">
                <div class="col span_4_of_12">
                  <div class="exp-dates">'. $dates .' </div>
                  <img class="company-logo" src="'. $logo . '">
                </div>

                <div class="col span_8_of_12">
                  <div class="exp-title">'. $title .' </div>
                  <div class="exp-company">'. $company .' </div>
                  <div class="exp-location">'. $location .' </div>
                  <div class="exp-text">' . wpautop($textarea) .' </div>
                </div>
              </div>

    ' );
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
    $company = ! empty( $instance['company'] ) ? $instance['company'] : __( 'Company', 'youre-hired' );
    $logo = ! empty( $instance['logo'] ) ? $instance['logo'] : __( '', 'youre-hired' );
    $location = ! empty( $instance['location'] ) ? $instance['location'] : __( 'Location', 'youre-hired' );
    $dates = ! empty( $instance['dates'] ) ? $instance['dates'] : __( 'Dates', 'youre-hired' );
    $textarea = ! empty( $instance['textarea'] ) ? $instance['textarea'] : __( '', 'youre-hired' );

    ?>

    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Position Title:', 'youre-hired' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
    value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'company' ); ?>"><?php _e( 'Company Name:', 'youre-hired' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'company' ); ?>" name="<?php echo $this->get_field_name( 'company' ); ?>" type="text" 
    value="<?php echo esc_attr( $company ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'logo' ); ?>"><?php _e( 'Company Logo (Image URL):', 'youre-hired' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'logo' ); ?>" name="<?php echo $this->get_field_name( 'logo' ); ?>" type="text" 
    value="<?php echo esc_attr( $logo ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'location' ); ?>"><?php _e( 'Location:', 'youre-hired' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'location' ); ?>" name="<?php echo $this->get_field_name( 'location' ); ?>" type="text" 
    value="<?php echo esc_attr( $location ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'dates' ); ?>"><?php _e( 'Dates:', 'youre-hired' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'dates' ); ?>" name="<?php echo $this->get_field_name( 'dates' ); ?>" type="text" 
    value="<?php echo esc_attr( $dates ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Explain your experience in this position:', 'youre-hired'); ?></label>
    <textarea rows="5" cols="40" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
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
    $instance['company'] = strip_tags( $new_instance['company'] );
    $instance['logo'] = strip_tags( $new_instance['logo'] );
    $instance['location'] = strip_tags( $new_instance['location'] );
    $instance['dates'] = strip_tags( $new_instance['dates'] );

    if ( current_user_can('unfiltered_html') )
    $instance['textarea'] =  $new_instance['textarea'];
    else
    $instance['textarea'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['textarea']) ) );

  return $instance;

  }

} // class experience_widget
