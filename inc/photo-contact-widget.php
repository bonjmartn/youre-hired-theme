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
      __( 'Photo and Contact', 'youre-hired-free' ), // Name
      array( 'description' => __( 'Photo and contact information', 'youre-hired-free' ), ) // Args
    );

    add_action('admin_enqueue_scripts', array($this, 'zen_assets'));

  }


public function zen_assets() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('zen-media-upload', get_template_directory_uri() . '/js/zen-media-upload.js', array('jquery'));
    wp_enqueue_style('thickbox');
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
			<i class="fa fa-comment-o"></i>
		</p>

		<div class='zen-description'>
			<?php echo wpautop( esc_html( $instance['description'] ) ) ?>
		</div>



	<?php

		echo $args['after_widget'];
    }

	public function update( $new_instance, $old_instance ) {  
	    $updated_instance = $new_instance;
	    return $updated_instance;
	}

    public function form( $instance ) {

		$title = '';
	    if( !empty( $instance['title'] ) ) {
	        $title = $instance['title'];
	    }

	    $description = '';
	    if( !empty( $instance['description'] ) ) {
	        $description = $instance['description'];
	    }

        $image = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
		}


        ?>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'youre-hired' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button" type="button" value="Upload Image" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'description' ); ?>"><?php _e( 'Contact Information:', 'youre-hired-free' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" ><?php echo esc_attr( $description ); ?></textarea>
        </p>


    <?php
    }
}