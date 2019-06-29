<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sell eBooks
 */
?>
<div class="col-md-4 col-sm-12 col-xs-12 main-sidebar filter_category">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php 	}
	else {
		 $args = array(
			'name' => __( 'Main Sidebar Default', 'sell-ebooks' ),
			'id' => 'sidebar-default',
			'description' => __( 'The Secondary Widget Area Default', 'sell-ebooks' ),
			'before_widget' => '<aside class="widget widget_recent_entries ">',
			'after_widget' => '</aside>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		); the_widget('WP_Widget_Search', 'title=Search', $args);
		the_widget('WP_Widget_Recent_Posts', null, $args);
		the_widget('WP_Widget_Categories', null, $args);
		the_widget('WP_Widget_Archives', null, $args);
		the_widget('WP_Widget_Tag_Cloud', null, $args);
	} ?>
</div><!-- #secondary -->

