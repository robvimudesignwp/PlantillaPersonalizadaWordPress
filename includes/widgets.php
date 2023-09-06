<?php
/**
 * 
 * @link https://developer.wordpress.org/reference/classes/WP_Widget/__construct/
 * @link https://gist.github.com/codigoconjuan/2d85ef01cfb3b06ba0ce4d886ff6a925
 * @link https://developer.wordpress.org/reference/functions/the_post_thumbnail/
 * 
 */ 


if(!defined('ABSPATH')) die();

class gymfitness_classes_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'gymfitness_widget',
			esc_html__( 'GymFitness Classes', 'gymfitness' ), 
			array( 'description' => esc_html__( 'Add Classes as Widget', 'gymfitness' ), )
		);
	}

	public function widget( $args, $instance ) {
        ?>

         <ul class="classes-sidebar">
         	<?php 
               $args = array(
	               'post_type'  =>  'gymfitness_classes',
	               'posts_per_page' => $instance['amount'],
	               'order' => 'ASC',
	               'orderby' => 'title' 
	            );
	            $classes = new WP_Query($args);
	            while($classes->have_posts()){
	            	$classes->the_post();
	            	?>
                       <li>
                       	  <div class="image">
                       	  	<?php the_post_thumbnail('thumbnail'); ?>
                       	  </div>
                       	  <div class="content-class">
                       	  	 <a href="<?php the_permalink(); ?>">
		                       <h3><?php the_title(); ?> </h3>
		                     </a>
		                     <?php 
		                       $timeStart = get_field('start_time'); 
		                       $endTime = get_field('end_time_class');
		                     ?>
		                     <p>
		                     	<?php the_field('days_of_classes'); ?> - <?php echo $timeStart . " to " . $endTime; ?>
		                     		
		                     </p>
                       	  </div>
                       </li>
	            	<?php
	            }

	            wp_reset_postdata();
         	?>
         </ul>

        <?php
	}

    public function form( $instance ) {
       $amount = !empty($instance['amount']) ? $instance['amount'] : esc_html__('How many classes do you want to show?');
       ?>
       <p>
       	<label for="<?php echo esc_attr($this->get_field_id('amount')); ?>">
       		<?php esc_attr_e('How many classes do you want to show?'); ?>
       	</label>

       	<input 
       	  class="widefat" 
       	  id="<?php echo esc_attr($this->get_field_id('amount')); ?>" 
       	  name="<?php echo esc_attr($this->get_field_name('amount')); ?>" 
       	  value="<?php echo esc_attr($amount); ?>"
       	  type="number">
       </p>

       <?php 
   	}

	public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['amount'] = (!empty($new_instance['amount'])) ? sanitize_text_field($new_instance['amount']) : '';
        return $instance;
	}
} 

function gymfitness_registrar_widget() {
    register_widget( 'gymfitness_classes_widget' );
}
add_action( 'widgets_init', 'gymfitness_registrar_widget' );