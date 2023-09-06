<?php 
   /**
    * Template Name: Gallery
    * 
    * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
    * @link https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/
    * @link https://developer.wordpress.org/reference/functions/get_post_gallery/
    * 
    */
   get_header(); 
?>
	<main class="container section-page">
	 	<?php 
	       while( have_posts() ): the_post();
          the_title('<h1 class="text-center text-primary">', '</h1>'); 

          //obtener la galeria 
          $gallery = get_post_gallery(get_the_ID(), false);

          //obtener los id's en un array para recorrerlos con un foreach
          $gallery_image_id = explode(",", $gallery['ids']);
       ?>
       <ul class="gallery-images">
          <?php foreach($gallery_image_id as $id){
             $image_big = wp_get_attachment_image_src($id, 'large')[0];
             $image_full = wp_get_attachment_image_src($id, 'full')[0];
             ?>
             <li>
               <a data-lightbox="gallery" href="<?php echo $image_full; ?>">
                  <img src="<?php echo $image_big; ?>" alt="image gallery">
               </a>
            </li>
             <?php
          } ?>
       </ul>
          <?php
          endwhile; 
	 	 ?>
	</main>

	<?php get_footer(); ?>