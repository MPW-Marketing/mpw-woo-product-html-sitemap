<?php
/*
Plugin Name: MPW Woo Products Sitemap
Description: List Products by category
Version: 0.1.0
Author: mpw
Text Domain: mpw_woo_map
*/

function print_sitemap_pages ($atts) {
	$atts = shortcode_atts(
		array(
			'product_cat' => '',
			'depth' => '',
		), $atts, 'print_sitemap_pages' );

	$args = array(
	        'posts_per_page' => -1,
	        'product_cat' => $atts['product_cat'],
	        'post_type' => 'product',
	        'orderby' => 'title',
	    );
		$the_query = new WP_Query( $args );
$cont = '<ul>';
		// The Loop
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$cont .= '<li>'.get_permalink().'</li>';
			//echo '' . get_the_title() . '<br />';
		}
		$cont .= '</ul>';
	// Restore original Post Data
	wp_reset_postdata();
}
add_shortcode( 'product_sitemap', 'print_sitemap_pages' );