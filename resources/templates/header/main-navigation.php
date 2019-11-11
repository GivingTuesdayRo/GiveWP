<nav id="main-navigation" class="main-navigation navbar ml-md-auto pr-0">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'menu_id' => 'primary-menu',
            'menu_class' => 'nav navbar-nav ml-auto',
            'container_class' => '',
            'walker' => new \GivingTuesdayWp\Library\Nav\BootstrapWalker(),
        ]);
        ?>
</nav>
