<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package GivingTuesday
 */

get_header(); ?>

    <section id="primary" class="container content-area">
        <?php
        if (have_posts()) : ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    /* translators: %s: search query. */
                    printf(
                        esc_html__('Search Results for: %s', GIVEWP_THEME_TEXT_DOMAIN),
                        '<span>'.get_search_query().'</span>'
                    );
                    ?>
                </h1>
            </header><!-- .page-header -->

            <?php
            get_template_part('resources/templates/posts/loop');
        else :
            get_template_part('resources/templates/posts/content/content', 'none');

        endif; ?>
    </section><!-- #primary -->

<?php
get_footer();
