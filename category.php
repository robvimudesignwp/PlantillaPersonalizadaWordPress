<?php get_header(); ?>

  <main class="container section-page"> 
  	<?php 
       $category = get_queried_object();
  	?>
  	<h2 class="text-primary text-center"><?php echo  __( "Category: ", 'gymfitness' ) . $category->name; ?></h2>
    <ul class="list-classes">
      <?php 

      /**
       * @link https://developer.wordpress.org/reference/functions/get_header/
       * @link https://developer.wordpress.org/reference/functions/get_queried_object/
       * 
       */ 

          while (have_posts() ): the_post(); 
            get_template_part('template-parts/blog');

          endwhile;

       ?>
     </ul>
  </main>

<?php get_footer(); ?>
