<?php
/*
* Single Post template file
*/
get_header(); ?>
<div class="heading-image">
    <div class="image-layer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="title">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-wrapper">
    <div class="blog-section">
        <div class="container">
            <div id="post-<?php the_ID(); ?>" <?php post_class('row blog-style-one'); ?>>
                <div class=""></div>
                <?php $column_classes = (get_theme_mod('single_sidebar_style','right_sidebar') == 'no_sidebar')?'col-md-10 col-sm-12 col-xs-12 col-md-offset-1':'col-md-8 col-sm-12 col-xs-12';                 
                if(get_theme_mod('single_sidebar_style','right_sidebar') == 'left_sidebar'){ get_sidebar(); } ?>
                <div class="<?php echo esc_attr($column_classes); ?>">
                    <div class="blog-content-area fadeIn">
                        <?php if(have_posts()) :
                            while ( have_posts() ) : the_post(); ?>
                            <div class="blog-content">                                
                                <div class="title-data fadeIn">                                   
                                   <p><?php echo sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('F d, Y'))); 
                                       $tagList = get_the_tag_list('', ', #' );
                                   if(!empty($tagList)) { ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php the_tags(); } ?></p>
                                </div>
                                <?php if ( has_post_thumbnail() ) : ?>
                                 <div class="single-blog-images">
                                    <?php the_post_thumbnail('large',array( 'alt' => esc_attr(get_the_title()), 'class' => 'img-responsive')); ?>
                                </div>
                                <?php endif;
                                the_content(); ?>                                
                            </div>
                            <?php  if ( comments_open() || get_comments_number() ) {   comments_template();  }
                            wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Posts:', 'sell-ebooks' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                                'next_or_number' => 'next_and_number',
                                'pagelink'    => '<span class="screen-reader-text">' . __( 'Post', 'sell-ebooks' ) . ' </span>%',
                                'separator'   => '<span class="screen-reader-text">, </span>',
                            ) );
                            
                            endwhile;
                            the_post_navigation( array(
                                'prev_text'          => '<i class="fa fa-arrow-left"></i> '.esc_html__( 'Previous Post: %title', 'sell-ebooks' ),
                                'next_text'          => esc_html__( 'Next Post: %title', 'sell-ebooks' ).' <i class="fa fa-arrow-right"></i>',
                                'before_page_number' => '<span class="screen-reader-text">' . esc_html__( 'Post', 'sell-ebooks' ) . ' </span>',
                            ) );
                            wp_reset_postdata();
                            endif; ?>
                    </div>
                </div>
                <?php if(get_theme_mod('single_sidebar_style','right_sidebar') == 'right_sidebar'){ get_sidebar(); } ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();