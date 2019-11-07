<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package GivingTuesday
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <?php get_template_part('resources/templates/posts/header/header'); ?>
        <?php get_template_part('resources/templates/layouts/right-sidebar'); ?>
    </div><!-- #primary -->
<?php
get_footer();
