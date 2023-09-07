<?php 
/**
 * 
 * @link https://codex.wordpress.org/Conditional_Tags
 * 
 */ 

while( have_posts() ): the_post();
	 the_title('<h1 class="text-center text-primary">', '</h1>'); 
     if (has_post_thumbnail()){
     	the_post_thumbnail('full', array('class' => 'featured_image'));
     }

  the_content();

endwhile; 