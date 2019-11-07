<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GivingTuesday
 */
get_header(); ?>

    <div id="primary" class="container content-area">
        <div class="row">
            <main id="main" class="site-main col-md-9">
                <?php
                get_template_part('resources/templates/posts/loop', get_post_format());

                get_template_part('resources/templates/posts/navigation/pagination', get_post_format());
                ?>
            </main><!-- #main -->

            <?php get_template_part('resources/templates/sidebars/right'); ?>
        </div>
    </div><!-- #primary -->

<?php
get_footer();
