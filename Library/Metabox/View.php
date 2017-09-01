<?php

namespace GivingTuesdayWp\Library\Metabox;

use WP_Post;

/**
 * Class View
 * @package GivingTuesdayWp\Library\Metabox
 */
class View
{

    protected $data = [];

    /** @noinspection PhpInconsistentReturnPointsInspection
     *
     * @param $view
     * @param array $variables
     * @param bool $return
     * @return string|null
     */
    public function load($view, $variables = [], $return = true)
    {
        $html = $this->getContents($view, $variables);
        if ($return === true) {
            return $html;
        }
        echo $html;
    }

    /**
     * @param $view
     * @param array $variables
     * @return string
     */
    public function getContents($view, $variables = [])
    {
        extract($variables);
        $path = $this->buildPath($view);
        unset($view, $variables);
        ob_start();
        /** @noinspection PhpIncludeInspection */
        include($path);
        $html = ob_get_contents();
        ob_end_clean();

        return $html;
    }


    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * @param $name
     * @param $value
     * @return View
     */
    public function __set($name, $value)
    {
        return $this->set($name, $value);
    }

    /**
     * @param  string $name
     * @return mixed|null
     */
    public function get($name)
    {
        if ($this->has($name)) {
            return $this->data[$name];
        } else {
            return null;
        }
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function set($name, $value)
    {
        $this->data[$name] = $value;

        return $this;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * @param $name
     */
    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    /**
     * @param $view
     * @return string
     */
    public function buildPath($view)
    {
        return $this->getBasePath().DIRECTORY_SEPARATOR.ltrim($view, "/").'.php';
    }

    /**
     * @return string
     */
    public function getBasePath()
    {
        return __DIR__.DIRECTORY_SEPARATOR.'Views';
    }
}
