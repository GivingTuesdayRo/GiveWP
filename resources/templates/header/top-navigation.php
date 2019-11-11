<nav id="site-top-navigation" class="top-links-navigation d-md-block d-none ml-md-auto" role="navigation">
    <?php
    wp_nav_menu([
        'theme_location' => 'top-navigation',
        'menu_id' => 'top-links-menu',
        'menu_class' => 'nav navbar-nav ml-auto',
        'container_class' => 'menu-new-top-links-container d-flex',
        'walker' => new \GivingTuesdayWp\Library\Nav\BootstrapWalker(),
    ]);
    ?>
</nav>