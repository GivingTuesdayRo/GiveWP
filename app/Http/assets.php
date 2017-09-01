<?php

namespace GivingTuesdayWp\Theme\Http;

/*
|-----------------------------------------------------------------
| Theme Assets
|-----------------------------------------------------------------
|
| This file is for registering your theme stylesheets and scripts.
| In here you should also deregister all unwanted assets which
| can be shiped with various third-parity plugins.
|
*/

use function GivingTuesdayWp\Theme\asset_path;

/**
 * Registers theme stylesheet files.
 */

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('app', asset_path('styles/app.css'));
});

/**
 * Registers theme script files.
 */

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('app', asset_path('scripts/app.js'), ['jquery'], null, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
});

/**
 * Registers editor stylesheets.
 */
add_action('admin_init', function () {
    add_editor_style(asset_path('styles/admin.css'));
});

/**
 * Moves front-end jQuery script to the footer.=
 */
add_action(
    'wp_default_scripts',
    function ($wp_scripts) {
        if (!is_admin()) {
            /** @var \WP_Scripts $wp_scripts */
            $wp_scripts->add_data('jquery', 'group', 1);
            $wp_scripts->add_data('jquery-core', 'group', 1);
            $wp_scripts->add_data('jquery-migrate', 'group', 1);
        }
    }
);
