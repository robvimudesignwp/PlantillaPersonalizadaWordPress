       <footer class="site-footer container">
       	 <hr>
         <div class="content-footer">
             <!-- Menú Navegación Footer --> 
                <?php 
                /**
                 * @link https://developer.wordpress.org/reference/functions/bloginfo/
                 * @link https://developer.wordpress.org/reference/functions/wp_footer/
                 * 
                 */ 
                    $args = array(
                       'theme_location' => 'menu-main',
                       'container'      => 'nav', 
                       'container_class' => 'menu_main'
                    );
                    wp_nav_menu($args)
                 ?>
                 <p class="copyright">All rights reserved. <?php echo get_bloginfo('name') . " &copy; " . date('Y'); ?></p>
         </div>
       </footer>
        <?php wp_footer(); ?>
    </body>
 </html>
