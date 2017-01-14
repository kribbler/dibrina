<?php
/**
 * Widgets
 *
 * Creats widgets to display loved content.
 *
 * @package     LIP
 * @subpackage  Functions
 * @copyright   Copyright (c) 2013, Pippin Williamson
 * @license     GPL-2.0+
 * @since       1.3.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Most Loved Widget Class
 */
class lip_most_loved_widget extends WP_Widget {

	/** constructor */
	function lip_most_loved_widget() {
		parent::WP_Widget( false, $name = __( 'Most Loved Items', 'love-it-pro' ), array( 'description' => __( 'Show the most loved items', 'love-it-pro' ) ) );
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
		$title 	= apply_filters( 'widget_title', $instance['title'] );
		$number = strip_tags( $instance['number'] );

		echo $before_widget;

			// Display the title if it exists.
			if ( ! empty( $title ) ) {
				echo $before_title . $title . $after_title;
			}
			echo'<ul class="most-loved">';
				$args = array(
					'post_type'   => 'any',
					'numberposts' => $number,
					'meta_key'    => '_li_love_count',
					'orderby'     => 'meta_value_num',
					'order'       => 'DESC'
				);

				$most_loved = get_posts( $args );
				foreach( $most_loved as $loved ) :
					echo'<li class="loved-item">';
						echo'<a href="' . get_permalink( $loved->ID ) . '">' . get_the_title( $loved->ID ) . '</a><br/>';
						echo'<div class="loved-count"><i class="fa fa-heart-o"></i> <span>' . get_post_meta($loved->ID, '_li_love_count', true) .'</span></div>';
					echo'</li>';
				endforeach;
			echo'</ul>';

		echo $after_widget;
	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		$title = esc_attr( $instance['title'] );
		$number = esc_attr( $instance['number'] );
		?>
		 <p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'love-it-pro' ); ?></label>
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		  <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number to Show:', 'love-it-pro' ); ?></label>
		  <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" />
		</p>
		<?php
	}
}
add_action( 'widgets_init', create_function( '', 'return register_widget( "lip_most_loved_widget" );' ) );
