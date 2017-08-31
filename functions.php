<?php
/**
 * GivingTuesday functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GivingTuesday
 */

/*
 |------------------------------------------------------------------
 | Bootstraping a Theme
 |------------------------------------------------------------------\
 |
 */


$theme = require_once __DIR__ . '/bootstrap/theme.php';


use function GivingTuesdayWp\asset_path;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function givingtuesday_content_width()
{
    $GLOBALS['content_width'] = apply_filters('givingtuesday_content_width', 640);
}

add_action('after_setup_theme', 'givingtuesday_content_width', 0);


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}
