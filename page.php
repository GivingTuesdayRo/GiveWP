<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GivingTuesday
 */

$pageType = get_post_type();
$pageId   = get_the_ID();
$metaName = 'givewp_' . $pageType . '_options_layout';
if (metadata_exists('post', $pageId, $metaName)) {
    $layout = get_post_meta($pageId, $metaName, true);
}
get_header(); ?>
    <div id="primary" class="content-area">
        <?php get_template_part('resources/templates/posts/header/header'); ?>
        <?php
        switch ($layout) {
            case 'right-sidebar':
            case 'full-width':
                $layoutTemplate = $layout;
                break;
            default:
                $layoutTemplate = 'right-sidebar';
        }
        get_template_part('resources/templates/layouts/' . $layoutTemplate);
        ?>
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
