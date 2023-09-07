<?php get_header(); ?>

  <main class="container section-page"> 
  	<?php 
       $author = get_queried_object();
  	?>
  	<h2 class="text-primary text-center"><?php echo  __( "Author: ", 'gymfitness' ) . $author->data->display_name; ?></h2>
    <p class="text-center">
      <?php echo get_the_author_meta('description', $author->data->ID); ?>
    </p>
    <ul class="list-classes">
      <?php 

      /**
       * @link https://developer.wordpress.org/reference/functions/get_header/
       * @link https://developer.wordpress.org/reference/functions/get_queried_object/
       * @link https://developer.wordpress.org/reference/functions/get_the_author_meta/
       * 
       */ 

          while (have_posts() ): the_post(); 
            get_template_part('template-parts/blog');

          endwhile;

       ?>
     </ul>
  </main>

<?php get_footer(); ?>