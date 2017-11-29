<?php
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

function register_main_menu() {
  register_nav_menu('main-menu', 'Main Menu');
}
add_action( 'init', 'register_main_menu' );
?>
