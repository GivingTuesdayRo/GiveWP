<?php

global $pagename;

use GivingTuesdayWp\Library\Metadata\PostMetadata;

$page = get_page_by_path($pagename);

$pageType = $page->post_type;
$pageType = ($pageType == 'initiative') ? 'page' : $pageType;
$pageId = $page->ID;

$layoutType = PostMetadata::get($pageType, $pageId, PostMetadata::compileOptionName($pageType, 'layout'));
?>
<?php
get_header(); ?>

    <div id="primary" class="container content-area">
        <div class="row">
            <main id="main" class="site-main <?php $layoutType != 'full-width' ? 'col-md-9' : 'col-md-12'; ?>">
                <?php
                get_template_part('resources/templates/posts/loop', get_post_format());

                get_template_part('resources/templates/posts/navigation/pagination', get_post_format());
                ?>
            </main><!-- #main -->

            <?php
            if ($layoutType != 'full-width') {
                get_template_part('resources/templates/sidebars/right');
            }
            ?>
        </div>
    </div><!-- #primary -->

<?php
get_footer();
