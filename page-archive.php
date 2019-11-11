<?php
/**
* Template Name: Page Archive
*/
global $post;

?>
<?php
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
