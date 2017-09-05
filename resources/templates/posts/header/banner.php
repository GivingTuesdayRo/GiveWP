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
    <div id="banner-picture" style="
            background: url(<?php the_post_thumbnail_url('large') ?>);
            background-repeat: no-repeat;background-size: cover;background-position: top center; ">
        <div class="banner-overlay">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </div>
    </div>

    <div class="entry-meta">
        <?php givingtuesday_posted_on(); ?>
    </div><!-- .entry-meta -->
</header>