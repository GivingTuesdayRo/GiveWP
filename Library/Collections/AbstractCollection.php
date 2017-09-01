<?php

namespace GivingTuesdayWp\Library\Collections;

use ArrayAccess;
use ArrayIterator;
use IteratorAggregate;

/**
 * Class MetaboxCollection
 * @package GivingTuesdayWp\Library\Metabox
 */
class AbstractCollection implements ArrayAccess, IteratorAggregate
{
    /**
     * @var
     */
    protected $items = [];

    protected $index = 0;

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->items[$key] = $value;
    }


    /**
     * @param $key
     * @param null $default
     * @return null|mixed
     */
    public function get($key, $default = null)
    {
        return $this->exists($key) ? $this->items[$key] : $default;
    }


    /**
     * @param $key
     * @return bool
     */
    public function exists($key)
    {
        return isset($this->items[$key]);
    }

    /**
     * @inheritdoc
     */
    public function offsetExists($offset)
    {
        return $this->exists($offset);
    }

    /**
     * @inheritdoc
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * @inheritdoc
     */
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }
}
