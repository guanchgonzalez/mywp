<?php
function enqueue_styles_child_theme() {

  $parent_style = 'twentytwentyone';
  $child_style  = 'twentytwentyone-child';

  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

  wp_enqueue_style( $child_style,
    get_stylesheet_directory_uri() . '/style.css',
    array( $parent_style ),
    wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles_child_theme' );

function PHPcode ($atts) {
  include( TEMPLATEPATH . "/scripts/prueba.php" );
}
add_shortcode( 'pruebaphp', 'PHPcode' );

function twentytwentyone_child_widgets_init() {

  // New widget zone added
  register_sidebar(
    array(
      'name'          => esc_html__( 'Header', 'twentytwentyone-child' ),
      'id'            => 'sidebar-2',
      'description'   => esc_html__( 'Add widgets here to appear in your header.', 'twentytwentyone-child' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array(
      'name'          => esc_html__( 'Footer', 'twentytwentyone-child' ),
      'id'            => 'sidebar-1',
      'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone-child' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

}
add_action( 'widgets_init', 'twentytwentyone_child_widgets_init' );
