<?php

add_action( 'wp_enqueue_scripts', function(){

  wp_enqueue_style( 'main-css', get_stylesheet_directory_uri().'/assets/css/build/main.css', false, false, false );

  wp_enqueue_script( 'main-js', get_stylesheet_directory_uri().'/assets/js/build/main.js', false, false, true );

} );
