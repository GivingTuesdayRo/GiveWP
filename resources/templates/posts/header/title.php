<?php
$pageType = get_post_type();
$pageId = get_the_ID();
$metaName = 'givewp_'.$pageType.'_options_header_style';
if (metadata_exists('post', $pageId, $metaName)) {
    $value = get_post_meta($pageId, $metaName, true);
}
if ($value == 'hide') {
    return;
}
?>
<header class="entry-header">
    <?php
    if (is_singular()) :
        the_title('<h1 class="entry-title">', '</h1>');
    else :
        the_title('<h2 class="entry-title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></h2>');
    endif;

    if ('post' === get_post_type()) : ?>
        <div class="entry-meta">
            <?php givingtuesday_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php
    endif; ?>
</header><!-- .entry-header -->