<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sell eBooks
 */ ?>
 <div class="heading-image">
    <div class="image-layer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-wrapper">
    <div class="section">
        <div class="container">
            <div id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
                <div class=""></div>
                <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                	<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'sell-ebooks' ); ?></h1>
					</header>
                    <div class="page-content">
						<?php if ( is_search() ) : ?>
							<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sell-ebooks' ); ?></p>
							<?php  get_search_form();
    						else : ?>
							<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sell-ebooks' ); ?></p>
							<?php  get_search_form();
    						endif; ?>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>