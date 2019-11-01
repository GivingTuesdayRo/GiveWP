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

    <?php if ('' !== get_the_post_thumbnail() && !is_single()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <div class="img-content">
                    <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
                </div>
            </a>
        </div><!-- .post-thumbnail -->
    <?php endif; ?>
    
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></h2>');
        endif;
        ?>
        <div class="entry-meta">
            Cand: <?php echo get_post_meta(get_the_ID(), 'givewp_initiative_options_initiative_date', true); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        $return = [];
        $terms = get_the_terms($pageId, 'initiative-type');
        foreach ($terms as $term) {
            $return[] = '<span class="badge badge-primary">'.$term->name.'</span>';
        }
        echo implode(', ', $return);
        ?>
        <?php
        $categories_list = get_the_category_list(esc_html__(', ', 'givingtuesday'));
        if ($categories_list) {
            /* translators: 1: list of categories. */
            printf('<span class="cat-links">'.esc_html__('Posted in %1$s', 'givingtuesday').'</span>',
                $categories_list); // WPCS: XSS OK.
        }
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
