<?php
/**
 * @version 1
 */
/*
Plugin Name: Get post
Author: Derejegi - Getu - Tadesse
Version: 1
*/

add_action( 'wp_enqueue_scripts', 'load_style_script' );
function load_style_script() {
    // charge style.css
    wp_enqueue_style( 'style', plugins_url( '/style.css', __FILE__ ) );

    // charge script.js
    wp_enqueue_script( 'script', plugins_url( '/project.js', __FILE__ ) );
}



function g(){

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => '10',
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'health'
            )
        )
    );

    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts()) {
        while ( $the_query->have_posts()) {
            $the_post = $the_query->the_post();
            $post_type = get_post_type();
            $post_id = get_the_ID();
            $post_title = get_the_title();
            $post_description = get_the_excerpt();
            $post_thumbnail = get_the_post_thumbnail_url(); 
            $post_link = get_permalink($post->ID);
            $post_date = get_the_date();
            $post_body = get_the_content();
            $post_category = get_the_category();


            $res .= '<div class="post-type-container">';
            $res .= '<div class="post-category-gen">';
            $res .= '<img src="'.$post_thumbnail.'" alt="'.$post_title.'" />';
            $res .= '<div class="post-category-gen-title">';
            $res .= '<a href="'.$post_link.'">'.$post_title.'</a>';
            $res .= '<p>'.$post_description.'</p>';
            $post_body .= '<p>'.$post_body.'</p>';
            $res .= '</div>';
            $res .= '</div>';
            $res .= '</div>';

        }

    }
    wp_reset_postdata();
    return $res;
}

add_shortcode('get_post', 'g');
