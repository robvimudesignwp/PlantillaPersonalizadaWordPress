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
				<img src="<?php  echo get_template_directory_uri(); ?>/images/logo.svg" alt="logotipo">
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