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
        'top-navigation' => esc_html__('Top Navigation', 'givingtuesday'),
        'primary' => esc_html__('Primary Navigation', 'givingtuesday'),
    ]);
}

add_action('after_setup_theme', 'GivingTuesdayWp\Theme\Structure\register_navigation_areas');
