<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GivingTuesday
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <?php get_template_part('resources/templates/header/head'); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <?php if (1 == 2) { ?>
        <a class="skip-link screen-reader-text" href="#content">
            <?php esc_html_e('Skip to content', 'givingtuesday'); ?>
        </a>
    <?php } ?>

    <header id="masthead" class="site-header navbar navbar-expand navbar-light flex-column flex-md-row bd-navbar">
        <?php get_template_part('resources/templates/header/brand'); ?>
        <?php get_template_part('resources/templates/header/top-navigation'); ?>
        <?php get_template_part('resources/templates/header/main-navigation'); ?>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
