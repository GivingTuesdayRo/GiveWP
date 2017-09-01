<?php

namespace GivingTuesdayWp\Library\Autoload;

/**
 * Class Autoload
 * @package GivingTuesdayWp\Library\Autoload
 */
class Autoload
{
    private $cachedPaths = [];

    /**
     * Autoload constructor.
     */
    public function __construct()
    {
        spl_autoload_register([$this, 'autoload']);
    }


    /**
     * @param $className
     */
    protected function autoload($className)
    {
        // Not a GivingTuesdayWp file, early exit.
        if (0 !== stripos($className, 'GivingTuesdayWp')) {
            return;
        }

        // Check if we've got it cached and ready.
        if (isset($this->cachedPaths[$className]) && file_exists($this->cachedPaths[$className])) {
            /** @noinspection PhpIncludeInspection */
            include_once $this->cachedPaths[$className];

            return;
        }

        $path = $this->getPath($className);
        if (file_exists($path)) {
            $this->cachedPaths[$className] = $path;
            include_once $path;

            return;
        }
    }

    /**
     * Get an array of possible paths for the file.
     *
     * @param string $className The name of the class we're trying to load.
     * @return string
     */
    protected function getPath($className)
    {
        $className = str_replace('GivingTuesdayWp', '', $className);

        if (0 !== stripos($className, '\Theme')) {
            $className = str_replace('\Theme', '\app', $className);
        }

        $class = str_replace('\\', DIRECTORY_SEPARATOR, $className);

        # Create the actual file-path
        return GIVEWP_THEME_DIR.DIRECTORY_SEPARATOR.$class.'.php';
    }
}
