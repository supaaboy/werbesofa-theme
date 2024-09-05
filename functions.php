<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_enqueue_scripts', 'theme_slug_enqueue_styles');

function theme_slug_enqueue_styles()
{
    wp_enqueue_style(
        'werbesofa-style',
        get_stylesheet_uri()
    );
}
