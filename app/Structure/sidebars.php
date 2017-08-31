<?php

namespace GivingTuesdayWp\Theme\Structure;


/*
|-----------------------------------------------------------
| Theme Sidebars
|-----------------------------------------------------------
|
| This file is for registering your theme sidebars,
| Creates widgetized areas, which an administrator
| of the site can customize and assign widgets.
|
*/

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

add_action('widgets_init', function ()
{
    register_sidebar([
        'name' => esc_html__('Sidebar Right', 'givingtuesday'),
        'id' => 'sidebar-right',
        'description' => esc_html__('Add widgets here.', 'givingtuesday'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ]);

    foreach ([1,2,3,4] as $item) {
        register_sidebar([
            'name' => esc_html__('Footer ' . $item, 'givingtuesday'),
            'id' => 'footer-' . $item,
            'description' => esc_html__('Add widgets here.', 'givingtuesday'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ]);
    }
});
