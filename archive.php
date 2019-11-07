<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GivingTuesday
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            if (have_posts()) : ?>

                <div class="container">
                    <header class="page-header">
                        <?php
                        the_archive_title('<h1 class="page-title">', '</h1>');
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </header><!-- .page-header -->
                </div>

                <?php
                get_template_part('resources/templates/posts/loop', get_post_format());

                get_template_part('resources/templates/posts/navigation/pagination', get_post_format());
                ?>
                <?php
            else :
                get_template_part('template-parts/content', 'none');
            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_sidebar();
get_footer();
