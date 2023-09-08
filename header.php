<?php 
/**
 * @link https://developer.wordpress.org/reference/functions/language_attributes/
 * @link https://developer.wordpress.org/reference/functions/wp_head/
 * @link https://developer.wordpress.org/reference/functions/site_url/
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 * @link https://developer.wordpress.org/reference/functions/get_template_directory_uri/
 */ 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body>
	<header class="site-header">
		<div class="container nabvar-navigation">
			<div class="logo">
				<a href="<?php echo site_url('/'); ?>"></a>
				   <img src="<?php  echo get_template_directory_uri(); ?>/images/logo.svg" alt="logotipo">
				</a>
			</div>
			<nav>
				<!-- Menú Navegación Aqui --> 
				<?php 
				    $args = array(
                       'theme_location' => 'menu-main',
                       'container'      => 'nav', 
                       'container_class' => 'menu_main'
				    );
                    wp_nav_menu($args)
				 ?>

			</nav>
		</div>
	</header>