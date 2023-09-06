<?php get_header(); ?>

  <main class="container section-page"> 
    <ul class="list-classes">
      <?php 

      /**
       * @link https://developer.wordpress.org/reference/functions/get_header/
       * 
       */ 

          while (have_posts() ): the_post(); 
            get_template_part('template-parts/blog');

          endwhile;

       ?>
     </ul>
  </main>

<?php get_footer(); ?>
