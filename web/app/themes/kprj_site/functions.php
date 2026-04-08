<?php

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/inc/landing-data.php';

function kprj_site_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'kprj-site'),
    ]);
}
add_action('after_setup_theme', 'kprj_site_theme_setup');

function kprj_site_theme_assets(): void
{
    wp_enqueue_style(
        'kprj-site-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap',
        [],
        null
    );
    wp_enqueue_style('kprj-site-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
    wp_enqueue_script(
        'kprj-site-script',
        get_template_directory_uri() . '/script.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'kprj_site_theme_assets');
