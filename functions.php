<?php
/*
 * REF: https://codex.wordpress.org/Child_Themes
 * Important notes: See README.md
 */

/**
 * //TODO: Rename my_theme
 */
function my_theme_enqueue_styles() {
    $parent_name    = 'parent-name';

    wp_enqueue_style( $parent_name . '-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( $parent_name . '-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        [   //dependencies
            $parent_name . '-style',
        ],
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' ); //TODO: Rename my_theme