<?php

use GivingTuesdayWp\Library\Metabox\MetaboxManager;
use GivingTuesdayWp\Library\Metadata\PostMetadata;

$headerStyle = MetaboxManager::instance()->getFieldValue('page_options', 'header_style');
if ($headerStyle == 'hide') {
    return;
}

$pageType = get_post_type();
$pageType = ($pageType == 'initiative') ? 'page' : $pageType;
$pageId = get_the_ID();

$coverStyle = PostMetadata::get($pageType, $pageId, PostMetadata::compileOptionName($pageType, 'cover_style'));
?>
<header class="entry-header entry-<?php echo $pageType ?> entry-header-<?php echo $coverStyle ?>">
    <?php
    if (has_post_thumbnail() && $coverStyle != 'title') {
        get_template_part('resources/templates/posts/header/header-cover');
    } else {
        get_template_part('resources/templates/posts/header/header-title');
    }
    ?>
</header>