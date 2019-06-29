<?php
/**
*   The Header template for our theme
*/
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta charset="<?php bloginfo( 'charset' ); ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('menu_background_color_scroll','#444a9a')); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class();?>>
<div class="preloader-block" >
    <span class="preloader-gif"></span>
</div>
    <div class="master-header">
        <header>
            <nav class="themesnav <?php if( !is_front_page() && !is_home() && !is_page() && !is_archive() && !is_single() && !is_search() && !is_404()){ echo esc_attr('headerChange'); } ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 top-menu">
                            <?php if(get_bloginfo( 'description' ) != "") : endif; ?>
                            <div class="header-logo">
                                <?php if(has_custom_logo()){ 
                                        $attachment_meta_url = wp_get_attachment_url(get_theme_mod('custom_logo'));  ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" itemprop="url">
                                        <img class="img-responsive custom-logo" src="<?php echo esc_url($attachment_meta_url); ?>" title="<?php esc_attr_e('Custom Logo','sell-ebooks'); ?>" alt="<?php esc_attr_e('Logo','sell-ebooks'); ?>" >
                                    </a>
                                 <?php } 
                                    $scroll_logo=get_theme_mod('sell_ebooks_dark_logo');
                                    $sell_ebooks_dark_logo=wp_get_attachment_url($scroll_logo);
                                    if($sell_ebooks_dark_logo == ''){
                                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                                            $sell_ebooks_dark_logo = wp_get_attachment_url( $custom_logo_id , 'full' );
                                    }                                    
                                    if($sell_ebooks_dark_logo != ''){ ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" itemprop="url">
                                            <img class="img-responsive logo-dark" src="<?php echo esc_url($sell_ebooks_dark_logo); ?>" title="<?php esc_attr_e('Custom Logo','sell-ebooks'); ?>" alt="<?php esc_attr_e('Logo','sell-ebooks'); ?>" >
                                        </a>
                                    <?php } 
                                     if (display_header_text()==true){
                                        printf('<div class="logo-light "><a href="%s" rel="home"><h4 class="custom-logo">%s</h4></a><h6 class="custom-logo">%s</h6></div>',esc_url(home_url('/')),esc_attr(get_bloginfo('name')),esc_attr(get_bloginfo('description')));
                                    } ?>
                            </div>
                             <div id='cssmenu' class='pull-right style3'>
                                <?php                                
                                    $defaults = array(
                                        'theme_location' => 'primary',
                                        'container'       => false,
                                    );
                                    wp_nav_menu($defaults);                                        
                                 ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
</div>