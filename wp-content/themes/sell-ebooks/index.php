<?php
/**
 * The main template file
 **/
get_header(); ?>
<div class="heading-image">
    <div class="image-layer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="title">
						<?php if(is_archive()): ?>
                        <h1><?php the_archive_title(); ?></h1>
                    	<?php else : ?>
                        <h1><?php echo esc_html(get_theme_mod('blog_title','Blog')); ?></h1>
                    	<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_template_part('template-parts/content');
get_footer(); ?>