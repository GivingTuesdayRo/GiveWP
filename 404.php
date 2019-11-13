<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package GivingTuesday
 */

get_header();
?>

    <div id="primary" class="container content-area">
        <div id="post-not-found" class="jumbotron ">
            <header>
                <div class="hero-unit">
                    <h1><?php _e("Epic 404 - Article Not Found", GIVEWP_THEME_TEXT_DOMAIN); ?></h1>
                    <p><?php _e("This is embarassing. We can't find what you were looking for.",
                            GIVEWP_THEME_TEXT_DOMAIN); ?></p>
                </div>
            </header> <!-- end article header -->

            <section class="post_content">
                <p>
                    <?php _e("Whatever you were looking for was not found, but maybe try looking again or search using the form below.",
                        GIVEWP_THEME_TEXT_DOMAIN); ?>
                </p>

                <div class="row">
                    <div class="col col-lg-12">
                        <?php get_search_form(); ?>
                    </div>
                </div>

            </section> <!-- end article section -->

            <footer>

            </footer> <!-- end article footer -->

        </div> <!-- end article -->
    </div><!-- #primary -->

<?php
get_footer();
