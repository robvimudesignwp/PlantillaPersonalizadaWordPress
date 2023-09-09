<?php 
/**
 * 
 * @link https://developer.wordpress.org/reference/functions/comment_form/
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 * @link https://developer.wordpress.org/reference/functions/wp_list_comments/
 * @link https://developer.wordpress.org/reference/functions/get_comments/
 * 
 */

?>
<?php get_header(); ?>
	<main class="container section-page">
	 	<?php 
	        get_template_part('template-parts/post');
	 	 ?>
	 	 <div class="comments">
	 	 	<?php comment_form(); ?>
	 	 	<h3 class="text-center text-primary"><?php echo  esc_html_e( "Comments", 'gymfitness' ); ?></h3>
	 	 	<ul class="list-comments">
	 	 		<?php 
	 	 		//Obtemnemos los comentarios del blog
                   $comments = get_comments(array(
                      'post_id' => $post->ID,
                      'status'  => 'approve'
                   ));

                   wp_list_comments(array(
                       'per_page' => 10,
                       'reverse_top_level' => false
                   ), $comments);

	 	 		?>
	 	 	</ul>
	 	 </div>
	</main>

<?php get_footer(); ?>