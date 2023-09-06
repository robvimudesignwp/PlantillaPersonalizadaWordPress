<?php 

while( have_posts() ): the_post();
	 the_title('<h1 class="text-center text-primary">', '</h1>'); 
     if (has_post_thumbnail()){
     	the_post_thumbnail('full', array('class' => 'featured_image'));
     }

	           $timeStart = get_field('start_time'); 
	           $endTime = get_field('end_time_class');
	         ?>

	         <p class="information-class">
	         	<?php the_field('days_of_classes'); ?> - 
	         	<?php echo $timeStart . " to " . $endTime; ?>		
	         </p>

  <?php 

  the_content();

 endwhile; 