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
 * @link https://developer.wordpress.org/reference/functions/add_shortcode/
 * @link https://developer.wordpress.org/reference/functions/do_shortcode/
 * @link https://www.mailerlite.com/es/ 
 * @link https://www.jsdelivr.com/package/npm/swiper
 * @link https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/
 * @link https://developer.wordpress.org/reference/functions/wp_register_style/
 * @link https://developer.wordpress.org/reference/functions/wp_add_inline_style/
 * @link https://developer.wordpress.org/reference/functions/is_page/
 * @link https://developer.wordpress.org/reference/functions/is_front_page/
 * @link https://pantheon.io/
 * 
 */ 

/* Consultas reutilizables */
require get_template_directory() . '/includes/wp-gymfitness-queries.php';
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

   if(is_page('gallery')){
   wp_enqueue_style('lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.4');
   }

   if(is_front_page()){
   wp_enqueue_style('swipercss', 'https://cdn.jsdelivr.net/npm/swiper@10.2.0/swiper-bundle.min.css', array(), '10.2.0');
   }

   wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '1.0');

   //Listado de archivos JS
   if(is_page('gallery')){
   wp_enqueue_script('lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.4', true);
   }

   if(is_front_page()){
   wp_enqueue_script('swiperjs', 'https://cdn.jsdelivr.net/npm/swiper@10.2.0/swiper-bundle.min.js', array(), '10.2.0', true);
   wp_enqueue_script('animejs', get_template_directory_uri() . '/js/anime.min.js', array(), '2.0.2', true);
   }
   
   wp_enqueue_script('custom_js_scripts', get_template_directory_uri() . '/js/custom_scripts.js', array(/*'swiperjs', 'animejs'*/), '1.0', true);
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

// Agregamos un shortcode

if(!function_exists('gymfitness_location_shorcode')){
   function gymfitness_location_shorcode(){
      ?>
      <div class="location">
         <?php 
         //verificamos que se agregue el mapa solamente a la página de contacto
           if(is_page('contact')){
            the_field('location');
            } 
           ?>
      </div>
      <?php
      echo  '<h2 class="text-center text-primary">' . __( "Contact Form", 'gymfitness' ) . '</h2>';
      // Renderizamos el formulario de contacto
      echo do_shortcode('[contact-form-7 id="df21bf5" title="Contact form 1"]');
   }
}

add_shortcode('gymfitness_location', 'gymfitness_location_shorcode' );

// Agregamos imágenes destacadas de forma dinámica al header con estilos CSS
if(!function_exists('gymfitness_featured_image')){
   function gymfitness_featured_image(){

      //Obtener el ID de la página principal
      $front_page_ID = get_option('page_on_front');

      //Obtener la imágen de la página principal
       $image_ID = get_field('hero_image', $front_page_ID);

      //Obtener la url de la imágen
       $image_src = wp_get_attachment_image_src($image_ID, 'full')[0];

      //Crear estilos CSS
        wp_register_style('custom_styles', false);
        wp_enqueue_style('custom_styles');

        $featured_image_style = "
           body.home .site-header{
                background-image: linear-gradient(rgb(0 0 0 / .65), rgb(0 0 0 / .65)), url($image_src);
            }
        ";

      //Insertar estilos CSS
        wp_add_inline_style('custom_styles', $featured_image_style);

   }
}

add_action('init', 'gymfitness_featured_image');