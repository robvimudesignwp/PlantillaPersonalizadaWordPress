<?php 

/**
 * 
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
 * @link https://developer.wordpress.org/reference/functions/get_template_directory_uri/
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @link https://codex.wordpress.org/Title_Tag
 * @link https://codex.wordpress.org/Widgetizing_Themes
 * @link https://necolas.github.io/normalize.css/8.0.1/normalize.css
 * 
 */ 

/* Consultas reutilizables */
//require get_template_directory() . '/includes/wp-gymfitness-queries.php';
require get_template_directory(). '/includes/widgets.php';

/* Agregamos funcionalidad para el admin de WordPress */
function gymfitness_setup(){
  //imágenes destacadas
	add_theme_support('post-thumbnails');

  //titulos para SEO
	add_theme_support('title-tag');
}
add_action('after_setup_theme', 'gymfitness_setup');

/* Agregamos los menús */
function gymfitness_menus(){
   register_nav_menus(array(
    'menu-main' => __('Menu Main', 'gymfitness'),
    'menu-social' => __('Menu Social', 'gymfitness')
   ));
}

add_action('init', 'gymfitness_menus');

/* Agregamos los estilos para el theme */ 

function gymfitness_scripts_styles(){
   //Listado de archivos CSS
   wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), '8.0.1');
   wp_enqueue_style('lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.4');
   wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '1.0');

   //Listado de archivos JS
   wp_enqueue_script('lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.4', true);
}

add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');

// Definir Zona Widgets
function gymfitness_widgets(){
   register_sidebar(array(
      'name' => 'Sidebar 1',
      'id'   => 'sidebar_1', 
      'before_widget' => '<div class="widget">',
      'after_widget'  => '</div>',
      'before_title' => '<h3 class="text-center text-primary">',
      'after_title'  => '</h3>'
   ));
}
add_action('widgets_init', 'gymfitness_widgets');