<?php

namespace GivingTuesdayWp\Theme\Structure;

/*
|----------------------------------------------------------------
| Theme Navigation Areas
|----------------------------------------------------------------
|
| This file is for registering your theme custom navigation areas
| where various menus can be assigned by site administrators.
|
*/

/**
 * Registers navigation areas.
 *
 * @return void
 */
function register_navigation_areas()
{
    register_nav_menus([
        'top-navigation' => esc_html__('Top Navigation', GIVEWP_THEME_TEXT_DOMAIN),
        'primary' => esc_html__('Primary Navigation', GIVEWP_THEME_TEXT_DOMAIN),
        'footer' => esc_html__('Footer Navigation', GIVEWP_THEME_TEXT_DOMAIN),
    ]);
}

add_action('after_setup_theme', 'GivingTuesdayWp\Theme\Structure\register_navigation_areas');
