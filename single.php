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
        <?php
        if (has_post_thumbnail()) {
            get_template_part('resources/templates/posts/header/banner');
        }
        ?>
        <div class="container">
            <div class="row">
                <main id="main" class="site-main col-md-9">
                    <?php get_template_part('resources/templates/posts/single'); ?>
                </main><!-- #main -->
                <?php get_template_part('resources/templates/sidebars/right'); ?>
            </div><!-- #primary -->
        </div><!-- #primary -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
