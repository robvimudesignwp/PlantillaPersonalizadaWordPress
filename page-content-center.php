<?php 
   /**
    * Template Name: Content Center (No Sidebar)
    * 
    * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
    * @link https://developer.wordpress.org/reference/functions/get_template_part/
    * 
    */
   get_header(); 
?>
	<main class="container section-page content-center">
	 	<?php 
	        get_template_part('template-parts/pages');
	 	 ?>
	</main>

	<?php get_footer(); ?>