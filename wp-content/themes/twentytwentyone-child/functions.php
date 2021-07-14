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

function normalize_attributes($atts) {
  foreach ($atts as $key => $value) {
    if (is_int($key)) {
      $atts[$value] = true;
      unset( $atts[$key] );
    }
  }

  return $atts;
}

function PHPcode ($atts, $content = '') {
  #include( TEMPLATEPATH . "/scripts/prueba.php" );
  $atts = normalize_attributes($atts);
  $current_user = wp_get_current_user();
  $atts = shortcode_atts(
    array(
      'user_id'  => $current_user -> ID,
      'username' => $current_user -> user_login,
      'email'    => $current_user -> user_email
    ), $atts);
  #$response = file_get_contents('http://vtiger.talecsystem.com/berliCRM_webserviceexamples.php?user_name=' . $username . '&accessKey=' . $accessKey);
  #$username = $_POST['log'];
  #$accessKey = $_POST['pwd'];
  #$username = $_POST['user_login'];
  #$accessKey = $_POST['user_pass'];
  #$response = $username . ' ' . $accessKey;
  #return $response;
  return 'ID: ' . $atts['user_id'] . ' - Username: ' . $atts['username'] . ' - Email: ' . $atts['email'];
}
add_shortcode( 'pruebaphp', 'PHPcode' );

// Load all the available scripts in the child theme
$Directory = new RecursiveDirectoryIterator( get_template_directory() . 'scripts/' );
$Iterator = new RecursiveIteratorIterator( $Directory );
$Regex = new RegexIterator( $Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH );

foreach( $Regex as $yourfiles ) {
  include $yourfiles -> getPathname();
}

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
