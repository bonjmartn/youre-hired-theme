<?php 

// register widget

function register_contact_widget() {
	register_widget( 'contact_widget' );
}
add_action( 'widgets_init', 'register_contact_widget' );

class contact_widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */

  public function __construct() {
    parent::__construct(
      'contact_widget', // Base ID
      __( 'Photo and Contact', 'youre-hired' ), // Name
      array( 'description' => __( 'Photo and contact information', 'youre-hired' ), ) // Args
    );
  }


  public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

	?>

	<p>
		<img src='<?php echo $instance['image'] ?>'>
	</p>
	
	<p>
		<?php echo wpautop( esc_html( $instance['description'] ) ) ?>
	</p>

  <br>


	<?php
		echo $args['after_widget'];
  }

	public function update( $new_instance, $old_instance ) {  
	    $updated_instance = $new_instance;
	    return $updated_instance;
	}

  public function form( $instance ) {

    $description = '';
    if( !empty( $instance['description'] ) ) {
          $description = $instance['description'];
     }

    $image = '';
    if( !empty( $instance['image'] ) ) {
        $image = $instance['image'];
    }

  ?>

    <p>
      <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Paste the URL of an image from your Media Library:', 'youre-hired' ); ?></label>
      <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_name( 'description' ); ?>"><?php _e( 'Contact Information:', 'youre-hired' ); ?></label>
      <textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" ><?php echo esc_attr( $description ); ?></textarea>
    </p>

    <?php
    }
}