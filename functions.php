<?php

if (!defined('ABSPATH')) {
    exit;
}

$theme_data = wp_get_theme();

$plugin_prefix = 'WERBESOFA';

// Constants
define($plugin_prefix . '_DIR', get_template_directory());
define($plugin_prefix . '_BASE', $theme_data->get_stylesheet());
define($plugin_prefix . '_PATH', get_template_directory() . '/');
define($plugin_prefix . '_VER', $theme_data->get('Version'));
define($plugin_prefix . '_CACHE_KEY', 'werbesofa-cache-key-for-theme');
define($plugin_prefix . '_REMOTE_URL', 'https://www.werbesofa.de/wp-content/uploads/downloads/63/info.json');

require constant($plugin_prefix . '_PATH') . 'inc/update.php';

new DPUpdateChecker(
    constant($plugin_prefix . '_BASE'),
    constant($plugin_prefix . '_VER'),
    constant($plugin_prefix . '_CACHE_KEY'),
    constant($plugin_prefix . '_REMOTE_URL'),
    'theme'
);

// Load front-end assets.
add_action('wp_enqueue_scripts', 'werbesofa_assets');

function werbesofa_assets()
{
    $asset = include get_theme_file_path('public/css/screen.asset.php');

    wp_enqueue_style(
        'werbesofa-style',
        get_theme_file_uri('public/css/screen.css'),
        $asset['dependencies'],
        $asset['version']
    );
}

// Load editor stylesheets.
add_action('after_setup_theme', 'werbesofa_editor_styles');

function werbesofa_editor_styles()
{
    add_editor_style([
        get_theme_file_uri('public/css/screen.css')
    ]);
}

// Load editor scripts.
add_action('enqueue_block_editor_assets', 'werbesofa_editor_assets');

function werbesofa_editor_assets()
{
    $script_asset = include get_theme_file_path('public/js/editor.asset.php');
    $style_asset  = include get_theme_file_path('public/css/editor.asset.php');

    wp_enqueue_script(
        'werbesofa-editor',
        get_theme_file_uri('public/js/editor.js'),
        $script_asset['dependencies'],
        $script_asset['version'],
        true
    );

    wp_enqueue_style(
        'werbesofa-editor',
        get_theme_file_uri('public/css/editor.css'),
        $style_asset['dependencies'],
        $style_asset['version']
    );
}
