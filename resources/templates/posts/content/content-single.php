<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GivingTuesday
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if (!has_post_thumbnail()) {
        get_template_part('resources/templates/posts/header/title');
    }
    ?>

    <div class="entry-content" style="<?php echo $headerStyle == 'hide' ? 'margin-top: 0' : '' ?>">
        <?php
        the_content(sprintf(
            wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'givingtuesday'),
                [
                    'span' => [
                        'class' => [],
                    ],
                ]
            ),
            get_the_title()
        ));

        wp_link_pages([
            'before' => '<div class="page-links">'.esc_html__('Pages:', 'givingtuesday'),
            'after' => '</div>',
        ]);
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php givingtuesday_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
