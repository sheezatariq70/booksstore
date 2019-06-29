<?php
/*
 * default footer file
 */
$footer_option = 1;
$footer_widget_style = get_theme_mod('footer_widget_style',4);
$hide_footer_widget_bar = get_theme_mod('hide_footer_widget_bar',1); ?>
<?php if($footer_option != 0) : ?>
    <footer>
        <div class="back-to-top">
            <a class="go-top" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a>
        </div>
        <?php if(($hide_footer_widget_bar == 1)) : 
            $footer_widget_style = $footer_widget_style+1;
            $footer_column_value = floor(12/($footer_widget_style)); ?>
            <div class="footer-box">
                <div class="container">
                    <div class="row">
                        <?php $k = 1; $flag_footer_widget=true;
                        for( $i=0; $i<$footer_widget_style; $i++) {
                            if (is_active_sidebar('footer-'.$k)) { $flag_footer_widget=false;?>
                                <div class="col-md-<?php echo esc_attr($footer_column_value); ?> col-sm-<?php echo esc_attr($footer_column_value); ?> col-xs-12"><?php dynamic_sidebar('footer-'.$k); ?></div>
                            <?php }
                            $k++;
                        } if($flag_footer_widget){

                            $footer_widget=array(
                            'before_widget' => '<aside id="custom_footer_widget" class="footer-widget widget custom_footer_widget"><div class="col-md-'.esc_attr($footer_column_value).' col-sm-'.esc_attr($footer_column_value).' col-xs-12">',

                            'after_widget' => '</div></aside>',

                            'before_title' => '<div class="widget-title">',

                            'after_title' => '</div>', );                            

                            the_widget('WP_Widget_Calendar', 'title='.__('Calendar','sell-ebooks'), $footer_widget);

                            the_widget('WP_Widget_Categories', null, $footer_widget);

                            the_widget('WP_Widget_Pages', null, $footer_widget);

                            the_widget('WP_Widget_Archives', null, $footer_widget);
                       
                        } ?>
                    </div>                    
                </div>
            </div>
            <?php endif; ?>            
                <div class="footer-wrap style2">
                    <div class="container">
                        <div class="row">
                        <?php if(get_theme_mod('footer_logo') != '') : ?>
                            <div class="footer-logo fadeIn animated">
                                <?php $footer_logo=get_theme_mod('footer_logo'); $footer_logo=wp_get_attachment_url($footer_logo);?>
                                <img class="img-responsive" src="<?php echo esc_url($footer_logo); ?>" alt="<?php esc_attr_e('Footer Logo','sell-ebooks');?>">
                            </div>
                        <?php endif; ?>
                        
                        <div class="footer-social-icon fadeIn animated">
                            <ul>
                                <?php for($i=1; $i<=6; $i++) :
                                    if(get_theme_mod('sell_ebooks_social_icon'.$i) != '' && get_theme_mod('sell_ebooks_social_icon_links'.$i) != '' ): ?>
                                        <li>
                                            <a href="<?php echo esc_url(get_theme_mod('sell_ebooks_social_icon_links'.$i)); ?>" class="fb" title="" target="_blank">
                                                <i class="fa <?php echo esc_attr(get_theme_mod('sell_ebooks_social_icon'.$i)); ?>"></i>
                                            </a>
                                        </li>
                                    <?php endif;
                                endfor; ?>
                            </ul>
                        </div>
                        <div class="copyright fadeIn animated">
                            <?php if(get_theme_mod('copyright_area_text') != '') : ?>
                                <p><?php echo wp_kses_post(get_theme_mod('copyright_area_text')); ?></p>
                            <?php endif; ?>
                           
                        </div>
                    </div>
                    </div>
                </div>
    </footer>
<?php endif;
wp_footer(); ?>
</body>
</html>