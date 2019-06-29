<?php
/**
 * Sell eBooks functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sell eBooks
 */

if ( ! function_exists( 'sell_ebooks_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sell_ebooks_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sell eBooks, use a find and replace
	 * to change 'Sell eBooks' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sell-ebooks', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-header' );
  add_theme_support( 'title-tag' );
  /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */

  /*default header image*/
  $sell_ebooks_defaults = array(
      'default-image'          => get_template_directory_uri().'/images/sell-ebooks-bg.jpg',
      'width'                  => 0,
      'height'                 => 0,
      'flex-height'            => 1400,
      'flex-width'             => 800,
      'uploads'                => true,
      'random-default'         => false,
      'header-text'            => true,
      'default-text-color'     => '',
      'wp-head-callback'       => '',
      'admin-head-callback'    => '',
      'admin-preview-callback' => '',
    );
  register_default_headers( array(
    'default-image' => array(
        'url'           => get_template_directory_uri().'/images/sell-ebooks-bg.jpg',
        'thumbnail_url' => get_template_directory_uri().'/images/sell-ebooks-bg.jpg',
        'description'   => __( 'Default Header Image', 'sell-ebooks' )
    ),
  ) );
  add_theme_support('custom-header',$sell_ebooks_defaults);
	add_theme_support( 'post-thumbnails' );
  add_theme_support('custom-logo', array( 'width' => 300, 'height' => 150, 'flex-width'  => true, ));
  add_image_size( 'sell-ebooks-thumbnail-image', 260, 165, true );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Top Header Menu', 'sell-ebooks' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(	'comment-form',		'comment-list',		'gallery',		'caption',	) );
  /**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sell_ebooks_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'sell_ebooks_content_width', 640 );
}
add_action( 'after_setup_theme', 'sell_ebooks_content_width', 0 );

add_filter('siteorigin_widgets_active_widgets', 'sell_ebooks_active_widgets');
	function sell_ebooks_active_widgets($active){
		//Theme widgets
  	
    //Bundled Widgets
    $active['video'] = true;
    $active['testimonial'] = true;
    $active['taxonomy'] = true;
    $active['social-media-buttons'] = true;
    $active['simple-masonry'] = true;
    $active['slider'] = true;
    $active['cta'] = true;
    $active['contact'] = true;
    $active['features'] = true;
    $active['headline'] = true;
    $active['hero'] = true;
    $active['icon'] = true;
    $active['image-grid'] = true;
    $active['price-table'] = true;
    $active['layout-slider'] = true;
  	$active['key-features-widget'] = true;
  	$active['showcase-image-widget'] = true;
  	return $active;
  }
}
endif;
add_action( 'after_setup_theme', 'sell_ebooks_setup' );
/*
* TGM plugin activation register hook 
*/
add_action( 'tgmpa_register', 'sell_ebooks_action_tgm_plugin_active_register_required_plugins' );
function sell_ebooks_action_tgm_plugin_active_register_required_plugins() {
    if(class_exists('TGM_Plugin_Activation')){
      $plugins = array(
        array(
           'name'      => __('Page Builder by SiteOrigin','sell-ebooks'),
           'slug'      => 'siteorigin-panels',
           'required'  => false,
        ),
        array(
           'name'      => __('SiteOrigin Widgets Bundle','sell-ebooks'),
           'slug'      => 'so-widgets-bundle',
           'required'  => false,
        ),
        array(
           'name'      => __('Contact Form 7','sell-ebooks'),
           'slug'      => 'contact-form-7',
           'required'  => false,
        ),
      );
      $config = array(
        'default_path' => '',
        'menu'         => 'sell-ebooks-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
           'page_title'                      => __( 'Install Recommended Plugins', 'sell-ebooks' ),
           'menu_title'                      => __( 'Install Plugins', 'sell-ebooks' ),
           'installing'                      => __( 'Installing Plugin: %s', 'sell-ebooks' ), 
           'oops'                            => __( 'Something went wrong with the plugin API.', 'sell-ebooks' ),
           'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','sell-ebooks' ), 
           'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','sell-ebooks' ), 
           'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','sell-ebooks' ), 
           'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','sell-ebooks' ), 
           'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','sell-ebooks' ), 
           'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','sell-ebooks' ), 
           'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','sell-ebooks' ), 
           'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','sell-ebooks' ), 
           'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','sell-ebooks' ),
           'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','sell-ebooks' ),
           'return'                          => __( 'Return to Required Plugins Installer', 'sell-ebooks' ),
           'plugin_activated'                => __( 'Plugin activated successfully.', 'sell-ebooks' ),
           'complete'                        => __( 'All plugins installed and activated successfully. %s', 'sell-ebooks' ), 
           'nag_type'                        => 'updated'
        )
      );
      tgmpa( $plugins, $config );
    }
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sell_ebooks_widgets_init() {
	register_sidebar(array(
    'name' => __('Main Sidebar', 'sell-ebooks'),
    'id' => 'sidebar-1',
    'description' => __('Main sidebar that appears on the right.', 'sell-ebooks'),
    'before_widget' => '<aside id="%1$s" class="widget widget_recent_entries %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5>',
    'after_title' => '</h5>',
  ));
  register_sidebar(array(
    'name' => __('Footer Area One', 'sell-ebooks'),
    'id' => 'footer-1',
    'description' => __('Footer Area One that appears on footer.', 'sell-ebooks'),
    'before_widget' => '<aside id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
  ));
  register_sidebar(array(
    'name' => __('Footer Area Two', 'sell-ebooks'),
    'id' => 'footer-2',
    'description' => __('Footer Area Two that appears on footer.', 'sell-ebooks'),
    'before_widget' => '<aside id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
  ));
  register_sidebar(array(
    'name' => __('Footer Area Three', 'sell-ebooks'),
    'id' => 'footer-3',
    'description' => __('Footer Area Three that appears on footer.', 'sell-ebooks'),
    'before_widget' => '<aside id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
  ));
  register_sidebar(array(
    'name' => __('Footer Area Four', 'sell-ebooks'),
    'id' => 'footer-4',
    'description' => __('Footer Area Four that appears on footer.', 'sell-ebooks'),
    'before_widget' => '<aside id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
  ));
}
add_action( 'widgets_init', 'sell_ebooks_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sell_ebooks_scripts() {
  
  wp_enqueue_style( 'sell-ebooks-font-cantata-one', '//fonts.googleapis.com/css?family=Cantata+One:400', array(),null);
  wp_enqueue_style( 'sell-ebooks-font-imprima', '//fonts.googleapis.com/css?family=Imprima:400', array(),null);
 
  wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style( 'font-awsome', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style( 'sell-ebooks-default', get_template_directory_uri().'/css/default.css',false,null);
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css');
	wp_enqueue_style( 'sell-ebooks-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
  
  $fixed_header = get_theme_mod('fixed_header',0);  
  $credits_link = esc_url('https://wpdigipro.com/wordpress-themes/sell-ebooks/');
  $credits_text = __('Sell eBooks WordPress Theme','sell-ebooks');
  $power_text = __('Powered by ','sell-ebooks');

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '', true);
  wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '', true);
  wp_enqueue_script( 'sell-ebooks-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true);

  wp_localize_script('sell-ebooks-custom', 'sell_ebooks_script',array('fixed_header'=>$fixed_header,'credits_link' => $credits_link,'credits_text' => $credits_text,'power_text' => $power_text));
  
  sell_ebooks_custom_css();
}
add_action( 'wp_enqueue_scripts', 'sell_ebooks_scripts' );

function sell_ebooks_hex_to_rgba($color, $opacity) {
  $default = 'rgb(0,0,0)';
  if(empty($color))
          return $default; 
        if ($color[0] == '#' ) 
        {
          $color = substr( $color, 1 );
        }
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
        $rgb =  array_map('hexdec', $hex);
        if($opacity){
          if(abs($opacity) > 1)
            $opacity = 1.0;
          $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
          $output = 'rgb('.implode(",",$rgb).')';
        }
        return $output;
}
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function sell_ebooks_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
  }
}
add_action( 'wp_head', 'sell_ebooks_pingback_header' );

add_action( 'admin_menu', 'sell_ebooks_admin_menu');
function sell_ebooks_admin_menu( ) {
    add_theme_page( __('WPDigiPro Suite','sell-ebooks'), __('WPDigiPro Suite','sell-ebooks'), 'manage_options', 'sell-ebooks-pro-buynow', 'sell_ebooks_pro_buy_now', 300 ); 
  
}
function sell_ebooks_pro_buy_now(){ ?>  
  <div class="sell_ebooks_pro_version">
  <a href="<?php echo esc_url('https://wpdigipro.com/?utm_source=wordpress&utm_medium=sell-ebooks-theme'); ?>" target="_blank">
    <img src ="<?php echo esc_url('http://d3itwt1jzx3aw2.cloudfront.net/wpdigipro-infographic.jpg') ?>" width="100%" height="auto" />
  </a>
</div>
<?php }


require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/theme-customization.php';