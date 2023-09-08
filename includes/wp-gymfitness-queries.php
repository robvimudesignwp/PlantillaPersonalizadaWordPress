<?php 

/**
 * 
 * @link https://gist.github.com/codigoconjuan/42df6aeb964ffec8150125e0d1d5b175
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @link https://developer.wordpress.org/reference/classes/wp_query/
 */

function gymfitness_list_classes($amount = -1){ ?>
	<ul class="list-classes">

		<?php 
            $args = array(
               'post_type'  =>  'gymfitness_classes',
               'posts_per_page' => $amount
            );
            $classes = new WP_Query($args);
            while( $classes->have_posts()): $classes->the_post(); 
         ?>

            	<li class="list-class card">
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
<?php 
}

if(!function_exists('gymfitness_instructors')){
  function gymfitness_instructors($amount = -1){ ?>
      <ul class="list-classes instructors">

          <?php 
                  $args = array(
                     'post_type'  =>  'instructors',
                     'posts_per_page' => $amount
                  );
                  $instructors = new WP_Query($args);
                  while( $instructors->have_posts()): $instructors->the_post(); 
               ?>

                    <li class="trainer">
                        <?php the_post_thumbnail('large'); ?>
                        <div class="content text-center">
                          <h3><?php the_title(); ?></h3>
                          <?php the_content(); ?>
                          <div class="specialty">
                            <?php 
                                 $specialty = get_field('specialty');
                                 
                                 foreach ($specialty as $e) {?>
                                  <span class="tag">
                                    <?php echo esc_html($e); ?>
                                  </span>
                                   
                                   <?php
                                 }
                             ?>
                          </div>
                        </div>
                    </li>

          <?php 
              endwhile; 
                wp_reset_postdata();
              ?>
        </ul>
    <?php
  }
}