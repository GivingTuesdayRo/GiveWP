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
    <div class="entry-content" style="<?php echo $headerStyle == 'hide' ? 'margin-top: 0' : '' ?>">
        <?php
        if (get_post_type() == 'initiative') {
            get_template_part('resources/templates/posts/header/details-initiative');
        }
        ?>
        <?php
        the_content(sprintf(
            wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', GIVEWP_THEME_TEXT_DOMAIN),
                [
                    'span' => [
                        'class' => [],
                    ],
                ]
            ),
            get_the_title()
        ));

        wp_link_pages([
            'before' => '<div class="page-links">'.esc_html__('Pages:', GIVEWP_THEME_TEXT_DOMAIN),
            'after' => '</div>',
        ]);
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php givingtuesday_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
