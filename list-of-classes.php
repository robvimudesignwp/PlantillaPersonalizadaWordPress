<?php 
/**
 * Template Name: List of Classes
 */
get_header(); 

?>
	<main class="container section-page">
		
		<?php get_template_part('template-parts/pages'); ?>

		<?php 
		   // usamos la función para mostrar algunas clases del fichero wp-gymfitness-queries.php
		   gymfitness_list_classes(); 
		?>
	</main>

<?php get_footer(); ?>