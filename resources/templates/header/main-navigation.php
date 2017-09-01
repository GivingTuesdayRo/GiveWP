<nav id="main-navigation" class="main-navigation">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbarContainer"
            aria-controls="mainNavbarContainer" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    wp_nav_menu([
        'theme_location' => 'primary',
        'menu_id' => 'primary-menu',
        'menu_class' => 'navbar-nav',
        'container_class' => 'collapse navbar-collapse',
        'container_id' => 'mainNavbarContainer',
        'walker' => new \GivingTuesdayWp\Library\Nav\BootstrapWalker(),
    ]);
    ?>
</nav>
