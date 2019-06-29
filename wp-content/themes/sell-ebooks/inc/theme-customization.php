<?php
/**
* Sell eBooks Customization options
**/
//get categories
function sell_ebooks_customize_register( $wp_customize ) {
	
	// GENERAL PANEL 
	$wp_customize->add_panel(
   'sell_ebooks_general',
   array(
     'title' => esc_html__( 'General Settings', 'sell-ebooks' ),
     'description' => esc_html__('General options','sell-ebooks'),
     'priority' => 20, 
     )
   ); 
	$wp_customize->get_section('title_tagline')->panel = 'sell_ebooks_general'; 
  $wp_customize->get_section('header_image')->panel = 'sell_ebooks_theme_settings'; 
  $wp_customize->get_section('static_front_page')->panel = 'sell_ebooks_theme_settings';
  
	// END GENERAL PANEL
  $wp_customize->add_panel(
   'sell_ebooks_theme_settings',
   array(
     'title' => esc_html__( 'Theme Settings', 'sell-ebooks' ),
     'description' => esc_html__('Theme options','sell-ebooks'),
     'priority' => 25, 
     )
   ); 

  //Add Blog Settings
  $wp_customize->add_section( 'blog_settings' , array(
    'title'       => __( 'Blog Page Settings', 'sell-ebooks' ),
    'description' => __( 'These settings work for default blog pages like 404, search and etc., but it will not work with "Posts page". You can change "Posts page" settings by page option.','sell-ebooks' ),
    'priority'    => 30,
    'capability'     => 'edit_theme_options',
    
    ) );
  $wp_customize->add_setting(
    'blog_title',
    array(
      'default' => __('Blog', 'sell-ebooks'),
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
      )
    );
  $wp_customize->add_control(
    'blog_title',
    array(
      'section' => 'blog_settings',
      'label'      => __('Blog Title', 'sell-ebooks'),
      'type'       => 'text',
      )
    );
  $wp_customize->add_setting(
    'sidebar_style',
    array(
      'default' => 'no_sidebar',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sell_ebooks_field_sanitize_select',
      )
    );
  $wp_customize->add_control(
    'sidebar_style',
    array(
      'section' => 'blog_settings',
      'label'      => __('Blog Sidebar Style', 'sell-ebooks'),
      'type'       => 'select',
      'choices' => array(
        'no_sidebar'  => __('No Sidebar','sell-ebooks'),
        'right_sidebar'  => __('Right Sidebar','sell-ebooks'),
        'left_sidebar'  => __('Left Sidebar','sell-ebooks'),
        ),
      )
    );
  //Add Blog Settings
  $wp_customize->add_setting(
    'single_sidebar_style',
    array(
      'default' => 'right_sidebar',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sell_ebooks_field_sanitize_select',
      )
    );
  $wp_customize->add_control(
    'single_sidebar_style',
    array(
      'section' => 'blog_settings',
      'label'      => __('Single Blog Sidebar Style', 'sell-ebooks'),
      'type'       => 'select',
      'choices' => array(
        'no_sidebar'  => __('No Sidebar','sell-ebooks'),
        'right_sidebar'  => __('Right Sidebar','sell-ebooks'),
        'left_sidebar'  => __('Left Sidebar','sell-ebooks'),
        ),
      )
    );
  /** Add PreLoader **/
  $wp_customize->add_setting(
    'preloader',
    array(
      'default' => '1',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sell_ebooks_field_sanitize_select',
      'priority' => 20,
      )
    );
  $wp_customize->add_section( 'preloader_section' , array(
    'title'       => __( 'Preloader', 'sell-ebooks' ),
    'priority'    => 32,
    'capability'     => 'edit_theme_options',
    'panel' => 'sell_ebooks_general'
    ) );
  $wp_customize->add_control(
    'preloader',
    array(
      'section' => 'preloader_section',                
      'label'   => __('Preloader','sell-ebooks'),
      'type'    => 'radio',
      'choices'        => array(
        "1"   => esc_html__( "On ", 'sell-ebooks' ),
        "2"   => esc_html__( "Off", 'sell-ebooks' ),
        ),
      )
    ); 
  /** End Preloader **/
//All our sections, settings, and controls will be added here
  $wp_customize->add_section(
    'sell_ebooks_social_links',
    array(
      'title' => __('Social Accounts', 'sell-ebooks'),
      'priority' => 120,
      'description' => __('Enter the URL of your social accounts. Leave it empty to hide the icon.', 'sell-ebooks'),
      'panel' => 'footer'
      )
    );
 $sell_ebooks_social_icon = array();
for($i=1;$i <= 10;$i++):  
    $sell_ebooks_social_icon[] =  array( 'slug'=>sprintf('sell_ebooks_social_icon%d',$i),   
      'default' => '',   
      'label' => esc_html__( 'Social Account ', 'sell-ebooks' ) . $i,
      'priority' => sprintf('%d',$i) );  
  endfor;
foreach($sell_ebooks_social_icon as $sell_ebooks_social_icons){
    $wp_customize->add_setting(
        $sell_ebooks_social_icons['slug'],
        array(
          'default' => '',
          'capability'     => 'edit_theme_options',
          'type' => 'theme_mod',
          'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        $sell_ebooks_social_icons['slug'],
        array(
            'input_attrs' => array( 'placeholder' => esc_attr__('Enter Icon','sell-ebooks') ),
            'section' => 'sell_ebooks_social_links',
            'label'      =>   $sell_ebooks_social_icons['label'],
            'priority' => $sell_ebooks_social_icons['priority']
        )
    );
}
$sell_ebooks_social_icon_links = array();
for($i=1;$i <= 10;$i++):  
    $sell_ebooks_social_icon_links[] =  array( 'slug'=>sprintf('sell_ebooks_social_icon_links%d',$i),   
      'default' => '',   
      'label' => esc_html__( 'Social Link ', 'sell-ebooks' ) . $i,   
      'priority' => sprintf('%d',$i) );  
  endfor;

foreach($sell_ebooks_social_icon_links as $sell_ebooks_social_icons){
    $wp_customize->add_setting(
        $sell_ebooks_social_icons['slug'],
        array(

            'default' => '',
            'capability'     => 'edit_theme_options',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        $sell_ebooks_social_icons['slug'],
        array(
            'input_attrs' => array( 'placeholder' => esc_attr__('Enter URL','sell-ebooks') ),
            'section' => 'sell_ebooks_social_links',
            'priority' => $sell_ebooks_social_icons['priority']
        )
    );
}

/*
 * Multiple logo upload code
 */
$wp_customize->add_setting(
  'sell_ebooks_dark_logo',
  array(
    'default' => '',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    )
  );
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'sell_ebooks_dark_logo', array(
  'section'     => 'title_tagline',
  'label'       => __( 'Upload Dark Logo' ,'sell-ebooks'),
  'flex_width'  => true,
  'flex_height' => true,
  'width'       => 120,
  'height'      => 50,
  'priority'    => 40,
  'default-image' => '',
  ) ) );
$wp_customize->add_setting(
  'logo_height',
  array(
    'default' => '50',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
  );
$wp_customize->add_control(
  'logo_height',
  array(
    'section' => 'title_tagline',
    'label'      => __('Enter Logo Size', 'sell-ebooks'),
    'description' => __("Use if you want to increase or decrease logo size (optional) Don't add 'px' in the string. e.g. 20 (default: 10px)",'sell-ebooks'),
    'type'       => 'text',
    'priority'  => 50,
    )
  );
$wp_customize->add_setting(
  'fixed_header',
  array(
    'default'    => false,
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sell_ebooks_field_sanitize_checkbox',
    )
  );
$wp_customize->add_control(
  'fixed_header',
  array(
    'section' => 'title_tagline',
    'label'      => __('Fixed Header', 'sell-ebooks'),
    'type'       => 'checkbox',
    'priority'  => 55,
    )
  );


$wp_customize->add_setting(
  'theme_color',
  array(
    'default' => '#444a9a',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'theme_color',
    array(
      'label'      => __('Theme Color ', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 10
      )
    )
  );
$wp_customize->add_setting(
  'secondary_color',
  array(
    'default' => '#212122',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'secondary_color',
    array(
      'label'      => __('Secondary Color', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );
//Menu Background Color
$wp_customize->add_setting(
  'menu_background_color',
  array(
    'default' => '',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'menu_background_color',
    array(
      'label'      => __('Menu Background Color', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );
    //Menu Text Color
$wp_customize->add_setting(
  'menu_text_color',
  array(
    'default' => '#ffffff',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'menu_text_color',
    array(
      'label'      => __('Menu Text Color', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );
    //Menu Text hover Color
$wp_customize->add_setting(
  'menu_text_hover_color',
  array(
    'default' => '#d4d4d4',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'menu_text_hover_color',
    array(
      'label'      => __('Menu Text Hover Color', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );

    //Menu Background Color (Scroll)
$wp_customize->add_setting(
  'menu_background_color_scroll',
  array(
    'default' => '#444a9a',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'menu_background_color_scroll',
    array(
      'label'      => __('Menu Background Color (after scroll)', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );
    //Menu Text Color scroll
$wp_customize->add_setting(
  'menu_text_color_scroll',
  array(
    'default' => '#ffffff',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'menu_text_color_scroll',
    array(
      'label'      => __('Menu Text Color(after scroll)', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );
    //Menu Text hover Color after scroll
$wp_customize->add_setting(
  'menu_text_hover_color_scroll',
  array(
    'default' => '#d4d4d4',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'menu_text_hover_color_scroll',
    array(
      'label'      => __('Menu Text Hover Color(after scroll)', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );

    //Body Background Color
$wp_customize->add_setting(
  'body_background_color',
  array(
    'default' => '#ffffff',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'body_background_color',
    array(
      'label'      => __('Body Background Color', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );
    //Body Text Color
$wp_customize->add_setting(
  'body_text_color',
  array(
    'default' => '#424242',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'body_text_color',
    array(
      'label'      => __('Body Text Color', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );
    //Footer Background Color
$wp_customize->add_setting(
  'footer_background_color',
  array(
    'default' => '#2c3e50',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'footer_background_color',
    array(
      'label'      => __('Footer Background Color', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );
    //Footer Text Color
$wp_customize->add_setting(
  'footer_text_color',
  array(
    'default' => '#2c3e55',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'footer_text_color',
    array(
      'label'      => __('Footer Text Color', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );
    //Footer Link Color
$wp_customize->add_setting(
  'footer_link_color',
  array(
    'default' => '#2c3e55',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'footer_link_color',
    array(
      'label'      => __('Footer Link Color', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );
    //Footer Link Hover Color
$wp_customize->add_setting(
  'footer_link_hover_color',
  array(
    'default' => '#444a9a',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
  );
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'footer_link_hover_color',
    array(
      'label'      => __('Footer Link Hover Color', 'sell-ebooks'),
      'section' => 'colors',
      'priority' => 11
      )
    )
  );
    //Copyright Background Color

//Footer Section
$wp_customize->add_panel(
  'footer',
  array(
    'title' => __( 'Footer', 'sell-ebooks' ),
    'description' => __('Footer options','sell-ebooks'),
    'priority' => 35, 
    )
  );
$wp_customize->add_section( 'footer_widget_area' , array(
  'title'       => __( 'Footer Widget Area', 'sell-ebooks' ),
  'priority'    => 135,
  'capability'     => 'edit_theme_options',
  'panel' => 'footer'
  ) );
$wp_customize->add_section( 'footer_social_section' , array(
  'title'       => __( 'Social Settings', 'sell-ebooks' ),
  'description' => __( 'In first input box, you need to add FONT AWESOME shortcode which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a> and in second input box, you need to add your social media profile URL.' , 'sell-ebooks'),
  'priority'    => 135,
  'capability'     => 'edit_theme_options',
  'panel' => 'footer'
  ) );
$wp_customize->add_section( 'footer_copyright' , array(
  'title'       => __( 'Footer Copyright Area', 'sell-ebooks' ),
  'priority'    => 135,
  'capability'     => 'edit_theme_options',
  'panel' => 'footer'
  ) );
$wp_customize->add_setting(
  'hide_footer_widget_bar',
  array(
    'default' => '1',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sell_ebooks_field_sanitize_select',
    'priority' => 20, 
    )
  );
$wp_customize->add_control(
  'hide_footer_widget_bar',
  array(
    'section' => 'footer_widget_area',                
    'label'   => __('Hide Widget Area','sell-ebooks'),
    'type'    => 'select',
    'choices'        => array(
      "1"   => esc_html__( "Show", 'sell-ebooks' ),
      "2"   => esc_html__( "Hide", 'sell-ebooks' ),
      ),
    )
  );
$wp_customize->add_setting(
  'footer_widget_style',
  array(
    'default' => '3',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sell_ebooks_field_sanitize_select',
    'priority' => 20, 
    )
  );
$wp_customize->add_control(
  'footer_widget_style',
  array(
    'section' => 'footer_widget_area',                
    'label'   => __('Select Widget Area','sell-ebooks'),
    'type'    => 'select',
    'choices'        => array(
      "1"   => esc_html__( "2 column", 'sell-ebooks' ),
      "2"   => esc_html__( "3 column", 'sell-ebooks' ),
      "3"   => esc_html__( "4 column", 'sell-ebooks' )
      ),
    )
  );
//Footer Section
$wp_customize->add_panel(
  'footer',
  array(
    'title' => __( 'Footer', 'sell-ebooks' ),
    'description' => __('Footer options','sell-ebooks'),
    'priority' => 120, 
    )
  );
$wp_customize->add_section( 'footer_widget_area' , array(
  'title'       => __( 'Footer Widget Area', 'sell-ebooks' ),
  'priority'    => 135,
  'capability'     => 'edit_theme_options',
  'panel' => 'footer'
  ) );

$wp_customize->add_section( 'footer_social_section' , array(
  'title'       => __( 'Social Settings', 'sell-ebooks' ),
  'description' => __( 'In first input box, you need to add FONT AWESOME shortcode which you can find <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">here</a> and in second input box, you need to add your social media profile URL.' , 'sell-ebooks'),
  'priority'    => 135,
  'capability'     => 'edit_theme_options',
  'panel' => 'footer'
  ) );
$wp_customize->add_section( 'footer_copyright' , array(
  'title'       => __( 'Footer Copyright Area', 'sell-ebooks' ),
  'priority'    => 135,
  'capability'     => 'edit_theme_options',
  'panel' => 'footer'
  ) );
$wp_customize->add_setting(
  'copyright_area_text',
  array(
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
    'priority' => 20, 
    )
  );
$wp_customize->add_control(
  'copyright_area_text',
  array(
    'section' => 'footer_copyright',                
    'label'   => __('Enter Copyright Text','sell-ebooks'),
    'type'    => 'textarea',
    )
  );
// Text Panel Starts Here 

$wp_customize->add_section( 'color' , array(
  'title'       => __( 'Colors', 'sell-ebooks' ),
  'priority'    => 31,
  'capability'     => 'edit_theme_options',
  ) );

}
add_action( 'customize_register', 'sell_ebooks_customize_register' );
//add_action('wp_head','sell_ebooks_custom_css',900);
function sell_ebooks_custom_css(){ 

wp_enqueue_style( 'sell-ebooks-style', get_stylesheet_uri() );
  $custom_css='';

  $custom_css .='
  body{
    background: '.esc_attr(get_theme_mod('body_background_color', '#ffffff')).';
  }
  body, p, time,ul, li{
    color: '.esc_attr(get_theme_mod('body_text_color','#424242')).';
  }
  .header-logo .logo-light h4,.header-logo .logo-light h6{    
    color: '.esc_attr(get_theme_mod('secondary_color','#212122')).';
  }
  ';  
  /* Preloader */
  if(get_theme_mod('custom_preloader') != '' && get_theme_mod('preloader') != 2 ) : 
    $custom_css .='.preloader-block .preloader-custom-gif, .preloader-block .preloader-gif{  background: url('.esc_url(get_theme_mod('custom_preloader')).'); background-repeat: no-repeat; }';
  endif; 
  /* end Preloader */
  /*Color System*/
  $custom_css .='.site-title,
  .site-description,
  #cssmenu > ul > li > a,
  #cssmenu ul ul li a,
  .themesnav #cssmenu>ul>li.current_page_item>a:after,.themesnav #cssmenu>ul>li>a:after{
    color: '.esc_attr(get_theme_mod('menu_text_color','#ffffff')).';
  }
  #cssmenu #menu-button.menu-opened::after,
  #cssmenu #menu-button.menu-opened::before,
  #cssmenu #menu-button::before,
  #cssmenu #menu-button::after{
    border-color: '.esc_attr(get_theme_mod('menu_text_color','#ffffff')).';
  }
  #cssmenu > ul > li:hover > a, #cssmenu > ul > li:hover > a, #cssmenu > ul > li.active > a, #cssmenu ul ul li:hover > a, #cssmenu ul ul li a:hover,
  .themesnav #cssmenu>ul>li.current_page_item:hover>a:after,.themesnav #cssmenu>ul>li:hover>a:after {
    color: '.esc_attr(get_theme_mod('menu_text_hover_color','#ffffff')).';
  }
  .themesnav #cssmenu.style1>ul>li.current_page_item>a:before,
  .themesnav #cssmenu.style1>ul>li>a:before{
    border-color: '.esc_attr(get_theme_mod('menu_text_hover_color','#ffffff')).';
  }
  .fixed-header #cssmenu.style1>ul>li.current_page_item>a:before, .fixed-header #cssmenu.style1>ul>li>a:before,
  .headerChange #cssmenu.style1>ul>li.current_page_item>a:before, .headerChange #cssmenu.style1>ul>li>a:before{
    border-color: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#ffffff')).';
  }
  .themesnav #cssmenu.style2 > ul > li:hover > a:before,
  .themesnav #cssmenu.style2 > ul > li.current_page_item > a:before,
  .themesnav #cssmenu.style3 > ul > li:hover > a:before,
  .themesnav #cssmenu.style3 > ul > li.current_page_item > a:before{
    background: '.esc_attr(get_theme_mod('menu_text_hover_color','#ffffff')).';
  }
  .fixed-header #cssmenu > ul > li:hover > a,
  .fixed-header #cssmenu > ul > li:hover > a,
  .fixed-header #cssmenu > ul > li.active > a,
  .fixed-header #cssmenu ul ul li:hover > a,
  .fixed-header #cssmenu ul ul li a:hover{
    color: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#ffffff')).';
  }
  .fixed-header #cssmenu.style1>ul>li.current_page_item:hover>a:after,.fixed-header #cssmenu.style1>ul>li:hover>a:after{
    border-color: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#ffffff')).';
  }

  .fixed-header #cssmenu #menu-button.menu-opened::after,
  .fixed-header #cssmenu #menu-button.menu-opened::before,
  .fixed-header #cssmenu #menu-button::before,
  .fixed-header #cssmenu #menu-button::after{
    border-color: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#ffffff')).';
  }  
  /* style - 2 */
  .fixed-header #cssmenu.style2 > ul > li:hover > a:before{
    border-color: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#ffffff')).';
  }
  .fixed-header #cssmenu.style2 > ul > li:hover > a:before,
  .fixed-header #cssmenu.style2 > ul > li.current_page_item > a:before{
    background: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#ffffff')).';
  }
  /* style - 3 */
  .headerChange #cssmenu.style3 > ul > li:hover > a:before,
  .fixed-header #cssmenu.style3 > ul > li:hover > a:before,
  .fixed-header #cssmenu.style3 > ul > li:hover > a:before,
  .fixed-header #cssmenu.style3 > ul > li.current_page_item > a:before{
    background: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#ffffff')).';
  }
  /* style - 4 */
  .themesnav #cssmenu.style4 > ul > li:hover > a,
  .themesnav #cssmenu.style4 > ul > li.current_page_item > a{color: '.esc_attr(get_theme_mod('menu_text_hover_color','#ffffff')).';  }
  .fixed-header #cssmenu.style4 > ul > li:hover > a,
  .fixed-header #cssmenu.style4 > ul > li.current_page_item > a{color: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#ffffff')).';}
  /* style - 5 */
  .themesnav #cssmenu.style5>ul>li.current_page_item>a{
    color: '.esc_attr(get_theme_mod('menu_text_hover_color','#ffffff')).';
  }
  .fixed-header #cssmenu.style5>ul>li.current_page_item>a{
    color: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#ffffff')).';
  }
  #cssmenu.style5 .submenu-button::after, #cssmenu.style5 .submenu-button::before{background: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#ffffff')).';}
  /* style - 5 end */ 
  a:hover,a:hover h3,.blog-content a.btn-light:hover,.title-data a.blogTitle:hover,.title-data a:hover h1,.page-numbers.current{
    color: '.esc_attr(get_theme_mod('theme_color','#0e76bc')).';
  }
  .comment .comment-reply-link, .comment-reply-title small a,.button.openModal,.blog-content a.btn-light:hover,
  .blog-style-two .page-numbers.current, .blog-style-two .page-numbers:hover {
    color: '.esc_attr(get_theme_mod('theme_color','#0e76bc')).';
    border-color: '.esc_attr(get_theme_mod('theme_color','#0e76bc')).';
  }
  .comment .comment-reply-link:hover, .comment-reply-title small a:hover,.button.openModal:hover{
    background: '.esc_attr(get_theme_mod('theme_color','#0e76bc')).';
  }
  a.readMore:hover, .blog-content .readMore:hover{
    color: '.esc_attr(get_theme_mod('theme_color','#0e76bc')).';
    border-color: '.esc_attr(get_theme_mod('theme_color','#0e76bc')).';
  }
  #cssmenu .submenu-button::after,
  #cssmenu .submenu-button::before {
    background-color: '.esc_attr(get_theme_mod('menu_text_color_scroll','#ffffff')).';
  } 
  .home  .themesnav{
      background-color: transparent;
  }
  ';
  if(get_theme_mod('menu_background_color') == '') : 
    $custom_css .='.themesnav{
      background-color: transparent;
    }';
      if(!is_front_page()) : 
    $theme_color = get_theme_mod('menu_background_color','#ffffff');
    $rgba_theme_color = sell_ebooks_hex_to_rgba($theme_color,1);
    endif;
  else :
    $theme_color = get_theme_mod('menu_background_color');
    $rgba_theme_color = sell_ebooks_hex_to_rgba($theme_color,1);
    $custom_css .='.themesnav{
      background: '.esc_attr(get_theme_mod('menu_background_color')).';
    }';
   endif;
  if(get_theme_mod('menu_dropdown_color') == '') : 
    $custom_css .='.themesnav #cssmenu ul ul li a, .themesnav #cssmenu.style5>ul .current_page_item:hover a,
    .themesnav #cssmenu.style5>ul>li:hover a, .themesnav #cssmenu.style5>ul .current_page_item a{
      background: '.esc_attr(sell_ebooks_hex_to_rgba(get_theme_mod('menu_background_color','#ffffff'),0.3)).';
    }';
  else:
    $custom_css .='.themesnav #cssmenu ul ul li a, .themesnav #cssmenu.style5>ul .current_page_item:hover a,
    .themesnav #cssmenu.style5>ul>li:hover a, .themesnav #cssmenu.style5>ul .current_page_item a{
      background: '.esc_attr(get_theme_mod('menu_dropdown_color')).';
    }';
  endif;
  $home_fixed_class = (get_theme_mod('menu_background_color_scroll') == '')?'#ebebeb': esc_attr(get_theme_mod('menu_background_color_scroll'));
    $custom_css .='.header-logo .custom-logo, .header-logo .logo-dark,
      .themesnav.headerChange .logo-light{
        max-height: '.esc_attr(get_theme_mod('logo_height','45')).'px;
      }
      .home-fixed-class {
        background: '.$home_fixed_class.' ;
      }';
    $theme_color = get_theme_mod('menu_background_color_scroll','#ffffff');
    $rgba_theme_color = sell_ebooks_hex_to_rgba($theme_color,1);

    $fixed_header = ($theme_color == '')?'#ebebeb':esc_attr($rgba_theme_color);
    $custom_css .='.fixed-header,.home .fixed-header{
      background: '.$fixed_header.';
    }
    .fixed-header #cssmenu ul ul li a,
    .fixed-header #cssmenu.style5>ul .current_page_item:hover a,
    .fixed-header #cssmenu.style5>ul>li:hover a, .fixed-header #cssmenu.style5>ul .current_page_item a,
    .headerChange #cssmenu ul ul li a,
    .headerChange #cssmenu.style5>ul .current_page_item:hover a,
    .headerChange #cssmenu.style5>ul>li:hover a, .headerChange #cssmenu.style5>ul .current_page_item a{
      background: '.esc_attr(sell_ebooks_hex_to_rgba(get_theme_mod('menu_background_color_scroll','#ffffff'),1)).';
    }
    .navbar-fixed-top.fixed-header{
      background-color: '.esc_attr(get_theme_mod('menu_background_color_scroll','#ffffff')).';
    }
    .fixed-header .site-title,.fixed-header .site-description,.fixed-header #cssmenu > ul > li > a,.fixed-header #cssmenu ul ul li a,
    .fixed-header #cssmenu>ul>li.current_page_item>a:after,.fixed-header #cssmenu>ul>li>a:after{
      color: '.esc_attr(get_theme_mod('menu_text_color_scroll','#000')).';
    }
    .page-numbers.current,.leave_form input:focus, .leave_form input:hover, .leave_form textarea:focus, .leave_form textarea:hover,.comment-form input:focus, .comment-form textarea:focus,
    .search-field:hover:focus,.page-numbers:hover,.btn-default:focus, .btn-default:hover, .button.blog_read:focus, .button.blog_read:hover{
      border-color: '.esc_attr(get_theme_mod('theme_color','#0e76bc')).'
    }
    .blog-style-one .main-sidebar .tagcloud>a:hover{background-color: '.esc_attr(get_theme_mod('theme_color','#0e76bc')).'}
    .blog-style-two .main-sidebar ul li a:hover, .blog-style-one .main-sidebar ul li a:hover{color: '.esc_attr(get_theme_mod('theme_color','#0e76bc')).'}    
    .under-footer{
      background:'.esc_attr(get_theme_mod('copyright_area_background_color')).';
    }    
    .themesnav.headerChange #cssmenu #menu-button::before,
    .themesnav.headerChange #cssmenu ul ul li a,
    .themesnav.headerChange #cssmenu #menu-button::after{
      border-color: '.esc_attr(get_theme_mod('menu_text_color_scroll','#000000')).';
    }
    .themesnav.headerChange #cssmenu ul ul li a,    
    .themesnav.headerChange #cssmenu>ul>li.current_page_item>a:after,.themesnav.headerChange #cssmenu>ul>li>a:after{
      color: '.esc_attr(get_theme_mod('menu_text_color_scroll','#000000')).';
    }
    .themesnav.headerChange #cssmenu ul ul li:hover a,
    .themesnav.headerChange #cssmenu > ul > li:hover > a,.themesnav.headerChange #cssmenu ul ul li:hover a,
    .fixed-header #cssmenu>ul>li.current_page_item:hover>a:after,.fixed-header #cssmenu>ul>li:hover>a:after,
    .themesnav.headerChange #cssmenu>ul>li.current_page_item:hover>a:after,.themesnav.headerChange #cssmenu>ul>li:hover>a:after{
      color: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#000000')).';
    }
    .themesnav.headerChange #cssmenu ul ul li a{
      border-color: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#00000')).';
    }
    .footer-wrap{
      background: '.esc_attr(get_theme_mod('copyright_background_color','#e1e1e1')).';
    }
    .footer-box{
      background:'.esc_attr(get_theme_mod('footer_background_color','#2c3e50')).';
    }
    .footer-box div,.footer-box .widget-title,.footer-box p,.footer-box div,.footer-box h1,.footer-box h2,.footer-box h3,.footer-box h4,.footer-box h5,.footer-box h6,
    .footer-box .footer-widget ul li,.footer-box .calendar_wrap caption {
      color: '.esc_attr(get_theme_mod('footer_text_color','#000000')).' !important;
    }
    .footer-box .footer-widget ul li a,.footer-widget .tagcloud a,.footer-box a,.footer-box td a,
    .footer-box .widget-title a{
      color:'.esc_attr(get_theme_mod('footer_link_color','#000000')).';
    }
    .footer-box a:hover,
    .footer-box .widget-title a:hover{
      color:'.esc_attr(get_theme_mod('footer_link_hover_color','#0e76bc')).';
    }
    .footer-box .footer-widget ul li a:hover, .footer-widget .tagcloud a:hover{
      color:'.esc_attr(get_theme_mod('footer_link_hover_color','#0e76bc')).';
    }
    .footer-box .tagcloud>a{
      border-color: '.esc_attr(get_theme_mod('footer_link_color','#0e76bc')).';
    }
    .footer-box .tagcloud > a:hover{
      background:'.esc_attr(get_theme_mod('footer_link_hover_color','#0e76bc')).';
      color :'.esc_attr(get_theme_mod('footer_link_color','#0e76bc')).';
    }
    .footer-wrap .copyright p,.footer-wrap, .footer-wrap p{
      color: '.esc_attr(get_theme_mod('copyright_text_color', '#000')).';
    }
    .footer-wrap a,.footer-wrap.style2 .footer-nav ul li a{
      color: '.esc_attr(get_theme_mod('copyright_link_color', '#000')).';
    }
    .footer-wrap .copyright a:hover,.footer-wrap a:hover,.footer-wrap.style2 .footer-nav ul li a:hover,.footer-wrap.style2 .copyright a:hover,.footer-wrap.style1 .copyright a:hover{
      color: '.esc_attr(get_theme_mod('copyright_link_hover_color', '#5164cf')).';
    }';

    if(wp_get_attachment_url(get_theme_mod('footer_background_image'))!=''):
      $custom_css .= '.footer-box{
        background: url('.esc_url(wp_get_attachment_url(get_theme_mod('footer_background_image'))).');
        background-size: cover;
      }';
    endif;

    $custom_css .= '.back-to-top a,
    .btn-default:focus, .btn-default:hover, .button.blog_read:focus, .button.blog_read:hover,
    .main-sidebar .tagcloud>a:hover{
      background: '.esc_attr(get_theme_mod('theme_color')).'
    }
    .sow-contact-form .sow-submit-styled input[type="submit"].sow-submit,
    input[type="submit"],.contact-me.darkForm input[type=submit],
    .contact-me.lightForm input[type=submit], button[type=submit],
    input[type=submit],#commentform input[type=submit], .comment .comment-reply-link {      
      border-color: '.esc_attr(get_theme_mod('theme_color','#0e76bc')).';      
      color: '.esc_attr(get_theme_mod('theme_color','#0e76bc')).';
      text-shadow: 0 0 0 rgba(0,0,0,0);
      max-width: 100%;
      text-align: center;
      line-height: 1;
    }
    .sow-contact-form .sow-submit-styled input[type="submit"]:hover.sow-submit, input[type="submit"]:hover,.contact-me.darkForm input[type=submit]:hover, .contact-me.lightForm input[type=submit]:hover, button[type=submit]:hover, input[type=submit]:hover,#commentform input[type=submit]:hover{
      background: '.esc_attr(get_theme_mod('theme_color','#0e76bc')).'
    }';

    $theme_color = get_theme_mod('menu_background_color_scroll','#ffffff');
    $rgba_theme_color = sell_ebooks_hex_to_rgba($theme_color,get_theme_mod('mobile_transparent'));

    $custom_css .= '@media only screen and (max-width:1024px) {      
      #cssmenu ul{
        background: '.esc_attr($rgba_theme_color).';
      }
      .site-title, .site-description, #cssmenu > ul > li > a, #cssmenu ul ul li a{
        color: '.esc_attr(get_theme_mod('menu_text_color_scroll','#000')).'
      }
      #cssmenu > ul > li:hover > a, #cssmenu > ul > li:hover > a, #cssmenu > ul > li.active > a, #cssmenu ul ul li:hover > a, #cssmenu ul ul li a:hover {
        color: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#ffffff')).';
      }
      .themesnav #cssmenu ul ul li a,.fixed-header #cssmenu ul ul li a{
        background: transparent;
      }
      .themesnav #cssmenu.style1>ul>li.current_page_item>a:before, .themesnav #cssmenu.style1>ul>li>a:before{
        border-color: transparent;
      }
      /* style - 5 */
      .themesnav #cssmenu.style5>ul>li:hover a{background: rgba(221, 189, 139, 0);}
      .themesnav #cssmenu.style5>ul>li.current_page_item>a,.fixed-header #cssmenu.style5>ul>li.current_page_item>a{
       color: '.esc_attr(get_theme_mod('menu_text_hover_color_scroll','#ffffff')).';
      }';
      
      if(get_theme_mod('menu_dropdown_color') == '') :
          $custom_css .= '.themesnav #cssmenu.style5>ul li.current_page_item a:hover ,
          .themesnav #cssmenu.style5>ul>li a:hover , .themesnav #cssmenu.style5>ul li.current_page_item a,.themesnav #cssmenu.style5 ul ul li a:hover{
            background: '.esc_attr(get_theme_mod('menu_dropdown_color_scroll','#ffffff')).';
          }';
      else:
          $custom_css .= '.themesnav #cssmenu.style5>ul li.current_page_item a:hover ,
          .themesnav #cssmenu.style5>ul>li a:hover , .themesnav #cssmenu.style5>ul li.current_page_item a,.themesnav #cssmenu.style5 ul ul li a:hover
          {
            background: '.esc_attr(get_theme_mod('menu_dropdown_color_scroll')).';
          }';
      endif;
    $custom_css .= '}';
    if(get_header_image()):
      $custom_css .= '.heading-image {
       background:rgba(0, 0, 0, 0) url("'.esc_url(get_header_image()).'") repeat scroll 0 0;
      }';
      
    endif; 
  wp_add_inline_style('sell-ebooks-style',$custom_css);
 }


function sell_ebooks_field_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

function sell_ebooks_field_sanitize_select( $input, $setting ) {
  
  $input = sanitize_key( $input );
 
  $choices = $setting->manager->get_control( $setting->id )->choices;
 
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}