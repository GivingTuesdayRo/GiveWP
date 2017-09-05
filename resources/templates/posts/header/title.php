<?php
use GivingTuesdayWp\Library\Metabox\MetaboxManager;
$headerStyle = MetaboxManager::instance()->getFieldValue('page_options', 'header_style');
if ($headerStyle == 'hide') {
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