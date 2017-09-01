<?php
wp_nav_menu([
    'theme_location' => 'top-navigation',
    'menu_id' => 'top-links-menu',
    'menu_class' => 'navbar-nav ml-auto',
    'container_class' => 'd-flex ',
    'walker' => new \GivingTuesdayWp\Library\Nav\BootstrapWalker(),
]);
