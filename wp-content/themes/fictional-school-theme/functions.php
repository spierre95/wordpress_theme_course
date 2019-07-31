<?php 

function load_styles(){
    wp_enqueue_style('main_styles', get_stylesheet_uri());
    wp_enqueue_style('font_awesome', get_stylesheet_uri());
    wp_enqueue_style('google_fonts', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'load_styles');
