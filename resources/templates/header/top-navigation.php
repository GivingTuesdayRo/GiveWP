<?php
$topMenu = wp_nav_menu([
    'echo' => false,
    'fallback_cb' => '__return_false',
    'theme_location' => 'top-navigation',
    'menu_id' => 'top-links-menu',
    'menu_class' => 'nav navbar-nav ml-auto',
    'container_class' => 'menu-new-top-links-container d-flex',
    'walker' => new \GivingTuesdayWp\Library\Nav\BootstrapWalker(),
]);
if (empty ($menu)) {
    return;
}
?>

<nav id="site-top-navigation" class="top-links-navigation d-md-block d-none ml-md-auto" role="navigation">
    <?php echo $topMenu; ?>
</nav>