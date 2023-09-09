<?php 
/**
 * @link https://developer.wordpress.org/reference/functions/language_attributes/
 * @link https://developer.wordpress.org/reference/functions/wp_head/
 * @link https://developer.wordpress.org/reference/functions/site_url/
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 * @link https://developer.wordpress.org/reference/functions/get_template_directory_uri/
 * @link https://developer.wordpress.org/reference/functions/is_front_page/
 * @link https://developer.wordpress.org/reference/functions/body_class/
 * @link https://tobiasahlin.com/moving-letters/
 * @link https://tablericons.com/
 */ 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<header class="site-header">
		<div class="container nabvar-navigation">
			<div class="logo">
				<a href="<?php echo site_url('/'); ?>"></a>
				   <img class="brand" src="<?php  echo get_template_directory_uri(); ?>/images/logo.svg" alt="logotipo">
				</a>
			</div>
			<div class="menu-burger">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="64" height="64" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
				  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
				  <path d="M4 6l16 0" />
				  <path d="M4 12l16 0" />
				  <path d="M4 18l16 0" />
				</svg>
			</div>
			<nav class="container-menu">
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

		<?php if(is_front_page()){ ?>
			<div class="tagline text-center container">
				<h1 class="ml2"><?php the_field('hero_title'); ?></h1>
				<p><?php the_field('hero_message'); ?></p>
			</div>
           <?php
		  } 
		?>
	</header>