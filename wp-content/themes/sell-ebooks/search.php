<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Sell eBooks
 */
get_header(); ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<div class="heading-image">
			    <div class="image-layer">
			        <div class="container">
			            <div class="row">
			                <div class="col-md-12 col-sm-12 col-xs-12">
			                    <div class="title">
			                        <h1><?php esc_html_e( 'Search Results for : ', 'sell-ebooks' );
			                        	echo get_search_query() ); ?></h1>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		<?php
			get_template_part('template-parts/content');
		 else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();