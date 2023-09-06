<?php 
/**
 * 
 * @link https://codex.wordpress.org/Conditional_Tags
 * @link https://developer.wordpress.org/reference/functions/get_the_author_meta/
 * @link https://developer.wordpress.org/reference/functions/the_time/
 * @link https://developer.wordpress.org/reference/functions/the_category/
 * 
 */ 

while( have_posts() ): the_post();
	 the_title('<h1 class="text-center text-primary">', '</h1>'); 
     if (has_post_thumbnail()){
     	the_post_thumbnail('full', array('class' => 'featured_image'));
     }
     ?>
          <div class="content-information">
              <p class="meta-information">
                <span><?php echo __( "By: ", 'gymfitness' ); ?></span>
                 <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                  <?php echo get_the_author_meta('display_name'); ?>
                 </a>
               </p>
               <div class="category-info">
                   <p class="meta-information">
                     <span><?php echo __( "Category: ", 'gymfitness' ); ?></span>
                   </p>
                    <?php the_category();?>
                </div>
           
               <p class="meta-information">
                  <span><?php echo __( "Date: ", 'gymfitness' ); ?></span>
                  <?php the_time(get_option('date_format'));?>
               </p>
           </div>

     <?php
 
  the_content();

endwhile; 