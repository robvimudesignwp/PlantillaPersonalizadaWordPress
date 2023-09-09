<?php get_header(); ?>

  <main class="container section-page"> 
    <ul class="list-classes">
      <?php 

      /**
       * 
       * @link https://developer.wordpress.org/reference/functions/get_header/
       * @link https://developer.wordpress.org/reference/functions/posts_nav_link/
       * @link https://developer.wordpress.org/reference/functions/the_posts_pagination/
       * 
       */ 

          while (have_posts() ): the_post(); 
            get_template_part('template-parts/blog');

          endwhile;

       ?>
     </ul>
     <?php the_posts_pagination(); ?>
  </main>

<?php get_footer(); ?>
