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

// Load front-end assets.
add_action('wp_enqueue_scripts', 'themeslug_assets');

function themeslug_assets()
{
    $asset = include get_theme_file_path('public/css/screen.asset.php');

    wp_enqueue_style(
        'themeslug-style',
        get_theme_file_uri('public/css/screen.css'),
        $asset['dependencies'],
        $asset['version']
    );
}

// Load editor stylesheets.
add_action('after_setup_theme', 'themeslug_editor_styles');

function themeslug_editor_styles()
{
    add_editor_style([
        get_theme_file_uri('public/css/screen.css')
    ]);
}

// Load editor scripts.
add_action('enqueue_block_editor_assets', 'themeslug_editor_assets');

function themeslug_editor_assets()
{
    $script_asset = include get_theme_file_path('public/js/editor.asset.php');
    $style_asset  = include get_theme_file_path('public/css/editor.asset.php');

    wp_enqueue_script(
        'themeslug-editor',
        get_theme_file_uri('public/js/editor.js'),
        $script_asset['dependencies'],
        $script_asset['version'],
        true
    );

    wp_enqueue_style(
        'themeslug-editor',
        get_theme_file_uri('public/css/editor.css'),
        $style_asset['dependencies'],
        $style_asset['version']
    );
}
