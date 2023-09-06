<?php 
/**
 * Template Name: List of Classes
 */
get_header(); 

?>
	<main class="container section-page">
		
		<?php get_template_part('template-parts/pages'); ?>

		<ul class="list-classes">

			<?php 
	            $args = array(
	               'post_type'  =>  'gymfitness_classes'
	            );
	            $classes = new WP_Query($args);
	            while( $classes->have_posts()): $classes->the_post(); 
	         ?>

            	<li class="card">
            		<?php the_post_thumbnail('large'); ?>
                  <div class="content">
                     <a href="<?php the_permalink(); ?>">
                       <h3><?php the_title(); ?> </h3>
                     </a>
                     <?php 
                       $timeStart = get_field('start_time'); 
                       $endTime = get_field('end_time_class');
                     ?>
                     <p><?php the_field('days_of_classes'); ?> - <?php echo $timeStart . " to " . $endTime; ?></p>
                  </div>
            	</li>

			<?php 
		      endwhile; 
	          wp_reset_postdata();
		      ?>
		</ul>
	</main>

<?php get_footer(); ?>