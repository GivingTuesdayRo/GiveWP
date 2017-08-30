<nav id="site-top-navigation" class="top-links-navigation navbar navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="pull-right">
            <div class="menu-top-links-container">
                <?php
                wp_nav_menu([
                    'theme_location' => 'top-navigation',
                    'menu_id' => 'top-links-menu',
                    'menu_class' => 'nav navbar-nav',
                ]);
                ?>
        </div>
    </div>
</nav><!-- #site-navigation -->