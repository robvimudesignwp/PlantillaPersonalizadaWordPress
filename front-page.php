<?php get_header(); ?>
<section class="welcome-section section-page container">
	<h2 class="text-primary">
		<?php the_field('welcome_header'); ?> 
	</h2>
	<p>
		<?php the_field('welcome_text'); ?>
	</p>
</section>
<section class="section-area">
	<div class="section-area-fields">
		<?php 
              $section1 = get_field('section_training_1');
              $image_section = $section1['image_section']['sizes']['medium_large'];
              $title_section = $section1['title_section'];
		?>
		<img src="<?php echo esc_attr($image_section); ?>" alt="">
		<p><?php echo esc_html($title_section); ?></p>
	</div>
	<div class="section-area-fields">
		<?php 
              $section2 = get_field('section_training_2');
              $image_section = $section2['image_section']['sizes']['medium_large'];
              $title_section = $section2['title_section'];
		?>
		<img src="<?php echo esc_attr($image_section); ?>" alt="">
		<p><?php echo esc_html($title_section); ?></p>
	</div>
	<div class="section-area-fields">
		<?php 
              $section3 = get_field('section_training_3');
              $image_section = $section3['image_section']['sizes']['medium_large'];
              $title_section = $section3['title_section'];
		?>
		<img src="<?php echo esc_attr($image_section); ?>" alt="">
		<p><?php echo esc_html($title_section); ?></p>
	</div>
	<div class="section-area-fields">
		<?php 
              $section4 = get_field('section_training_4');
              $image_section = $section4['image_section']['sizes']['medium_large'];
              $title_section = $section4['title_section'];
		?>
		<img src="<?php echo esc_attr($image_section); ?>" alt="">
		<p><?php echo esc_html($title_section); ?></p>
	</div>
</section>
<main class="container section-page">
	<h2 class="text-primary text-center"><?php echo  esc_html_e( "Our Classes", 'gymfitness' ); ?></h2>

 	<?php 
       // usamos la función para mostrar algunas clases del fichero wp-gymfitness-queries.php
 	   gymfitness_list_classes(4); 
 	?>
    <div class="container-button">
 	  <a href="<?php $page_id = 23; echo esc_url(get_permalink(get_page($page_id))); ?>" class="btn btn-primary"><?php echo  esc_html_e( "See All Classes", 'gymfitness' ); ?></a>
 	</div>

</main>

<?php get_footer(); ?>