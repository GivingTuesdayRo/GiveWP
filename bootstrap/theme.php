<?php

define('GIVEWP_THEME_DIR', dirname(__DIR__));
define('GIVEWP_THEME_TEXT_DOMAIN', 'givingtuesday');

// REGISTER AUTOLOADER
require_once GIVEWP_THEME_DIR.'/Library/Autoload/Autoload.php';
$autoloader = new GivingTuesdayWp\Library\Autoload\Autoload();

require_once GIVEWP_THEME_DIR.'/app/helpers.php';

require_once GIVEWP_THEME_DIR.'/app/Http/assets.php';

//require_once GIVEWP_THEME_DIR.'/../Library/Nav/BootstrapWalker.php';

require_once GIVEWP_THEME_DIR.'/app/Setup/supports.php';

require_once GIVEWP_THEME_DIR.'/app/Structure/navs.php';
require_once GIVEWP_THEME_DIR.'/app/Structure/sidebars.php';
require_once GIVEWP_THEME_DIR.'/app/Structure/metaboxes.php';
