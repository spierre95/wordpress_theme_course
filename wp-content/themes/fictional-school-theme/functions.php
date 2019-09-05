<?php

function load_styles()
{
    wp_enqueue_style('google_fonts', "//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i");
    wp_enqueue_style('font_awesome', "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    wp_enqueue_style('main_styles', get_stylesheet_uri());
}

function load_scripts()
{
    //remove micro time in production, this is used to prevent caching of just this file. 
    wp_enqueue_script('main_js', get_theme_file_uri('/js/scripts-bundled.js'), null, microtime(), true);
}

function load_features()
{
    //adds custom title for each page in word press;
    add_theme_support('title-tag');

    // adds dynamic menu options in theme
    // register_nav_menus([
    //     'headerMenuLocation' => 'Header Menu Location',
    //     'footerLocationOne' => 'Footer Location One',
    //     'footerLocationTwo' => 'Footer Location Two'
    // ]);
}



add_action('wp_enqueue_scripts', 'load_styles');
add_action('wp_enqueue_scripts', 'load_scripts');
add_action('after_setup_theme', 'load_features');

// removes prefix from function output ( i.e. Author:) and adds custom title for author 
add_filter('get_the_archive_title', function ($title) {
    if (is_author()) {
        $title = 'Posted By ' . get_the_author();
    }
    return preg_replace('/^\w+: /', '', $title);
});