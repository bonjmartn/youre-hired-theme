<?php 


// register widget

function register_recommendations_widget() {
	register_widget( 'recommendations_widget' );
}
add_action( 'widgets_init', 'register_recommendations_widget' );

class recommendations_widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */

  function __construct() {
    parent::__construct(
      'recommendations_widget', // Base ID
      __( 'Recommendations', 'youre-hired' ), // Name
      array( 'description' => __( 'Recommendations', 'youre-hired' ), ) // Args
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
//			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		?>

		<div class='recommendations-name'>
			<?php echo wpautop( esc_html( $instance['title'] ) ) ?>
		</div>

		<div class='recommendations-company'>
			<?php echo wpautop( esc_html( $instance['company'] ) ) ?>
		</div>

		<p>
			<img src='<?php echo $instance['image'] ?>'>
		</p>
		
		<div class='recommendations-text'>
			<?php echo wpautop( esc_html( $instance['description'] ) ) ?>
		</div>

		<div class='recommendations-spacer'>
			&nbsp;
		</div>


		<?php

		echo $args['after_widget'];
    }

	public function update( $new_instance, $old_instance ) {  
	    return $new_instance;
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

		$company = '';
	    if( !empty( $instance['company'] ) ) {
	        $company = $instance['company'];
	    }

        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'First and Last Name:', 'youre-hired' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'company' ); ?>"><?php _e( 'Title, Company Name:', 'youre-hired' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'company' ); ?>" name="<?php echo $this->get_field_name( 'company' ); ?>" type="text" value="<?php echo esc_attr( $company ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'youre-hired' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button" type="button" value="Upload Image" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'description' ); ?>"><?php _e( 'Text of recommendation:', 'youre-hired' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" ><?php echo esc_attr( $description ); ?></textarea>
        </p>


    <?php
    }
}