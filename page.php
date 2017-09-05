<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GivingTuesday
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <?php
        if (has_post_thumbnail()) {
            get_template_part('resources/templates/posts/header/banner');
        }
        ?>
        <?php get_template_part('resources/templates/layouts/right-sidebar'); ?>
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
