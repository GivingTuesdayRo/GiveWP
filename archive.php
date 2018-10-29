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

                <div class="post-loop">
                    <div class="container">
                        <div class="row">
                            <?php
                            $i = 0;
                            /* Start the Loop */
                            while (have_posts()) : the_post();
                                $i++;
                                ?>
                                <div class="col-sm-6">
                                    <?php
                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part('resources/templates/posts/boxes/generic', get_post_format());
                                    ?>
                                </div>
                                <?php echo (fmod($i, 2) == 0) ? '<div class="w-100"></div>' : ''; ?>
                            <?php
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>

                <?php
                // Previous/next page navigation.
                the_posts_pagination([
                    'prev_text' => __('Previous page', 'twentyfifteen'),
                    'next_text' => __('Next page', 'twentyfifteen'),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">'.__('Page',
                            'twentyfifteen').' </span>',
                ]);
            else :
                get_template_part('template-parts/content', 'none');
            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_sidebar();
get_footer();
