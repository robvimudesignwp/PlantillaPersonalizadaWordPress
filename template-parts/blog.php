<?php 
/**
 * @link https://developer.wordpress.org/reference/functions/get_author_posts_url/
 * @link https://developer.wordpress.org/reference/functions/get_the_author_meta/
 * @link https://developer.wordpress.org/reference/functions/the_time/
 * @link https://developer.wordpress.org/reference/functions/the_category/
 * 
 */ 
?>
<li class="card">
  <?php the_category(); ?> 
	<?php the_post_thumbnail('large'); ?>
    <div class="content">
       <a href="<?php the_permalink(); ?>">
         <h3><?php the_title(); ?> </h3>
       </a>
       <p class="meta-information">
        <span><?php echo __( "By: ", 'gymfitness' ); ?></span>
         <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
          <?php echo get_the_author_meta('display_name'); ?>
         </a>
       </p>

       <p class="meta-information">
        <span><?php echo __( "Date: ", 'gymfitness' ); ?></span>
        <?php the_time(get_option('date_format'));?>
       </p>
    </div>
</li>