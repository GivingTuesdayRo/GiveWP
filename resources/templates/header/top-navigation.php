<nav id="site-top-navigation" class="top-links-navigation navbar navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="pull-right">
            <?php
            wp_nav_menu([
                'theme_location' => 'top-navigation',
                'menu_id' => 'top-links-menu',
                'menu_class' => 'navbar-nav',
                'walker' => new \GivingTuesdayWp\Library\Nav\BootstrapWalker(),
            ]);
            ?>
        </div>
</nav><!-- #site-navigation -->