<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sell eBooks
 */ 

?>
<div class="blog-wrapper">
    <div class="blog-section">
        <div class="container">
            <div id="post-<?php the_ID(); ?>" <?php post_class('row blog-style-one'); ?>>                                
                <?php $column_classes = (get_theme_mod('sidebar_style','right_sidebar') == 'no_sidebar')?'col-md-12 col-sm-12 col-xs-12':'col-md-8 col-sm-12 col-xs-12';
                if(get_theme_mod('sidebar_style','right_sidebar') == 'left_sidebar'){ get_sidebar(); } ?>
                <div class="<?php echo esc_attr($column_classes); ?> blog-content-responsive">
                    <div class="blog-content-area fadeIn">
                        <?php if(have_posts()) :
                            while ( have_posts() ) : the_post(); ?>
                            <div class="blog-content">
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="post-thumbnail-img">
                                        <?php if(has_post_thumbnail()){ ?>
                                             <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                                           <?php  } else{  ?>
                                                <a href="<?php the_permalink();?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/images/no-image.jpg"></a>
                                           <?php  }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="title-data">
                                       <a class="blogTitle" href="<?php the_permalink();?>"><?php the_title(); ?></a>
                                       <p><?php echo sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('F d, Y')));
                                       $tagList = get_the_tag_list('', ', #' );
                                       if(!empty($tagList)) { ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php the_tags(); } ?></p>
                                    </div>
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink();?>" class="btn-light readMore"><?php esc_html_e('Read More','sell-ebooks'); ?></a>
                                
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); endif;
                        if(!is_front_page()):
                            the_posts_pagination( array(
                            'mid_size' => 10,
                            'Previous' => __( 'Back', 'sell-ebooks' ),
                            'Next' => __( 'Onward', 'sell-ebooks' ),
                        ) );
                        endif; ?>
                    </div>
                </div>
                <?php if(get_theme_mod('sidebar_style','right_sidebar') == 'right_sidebar'){ get_sidebar(); } ?>
            </div>
        </div>
    </div>
</div>