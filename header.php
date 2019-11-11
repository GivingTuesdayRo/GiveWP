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
    <header id="masthead"
            class="site-header navbar navbar-light navbar-expand-md sticky-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header  col col-md-3 mr-auto">

                <div class="navbar-brand">
                    <?php get_template_part('resources/templates/header/brand'); ?>
                </div>

                <button class="navbar-toggler ml-auto mt-3" type="button"
                        data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse flex-column" id="navbarCollapse">
                <?php get_template_part('resources/templates/header/top-navigation'); ?>
                <?php get_template_part('resources/templates/header/main-navigation'); ?>
            </div>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
