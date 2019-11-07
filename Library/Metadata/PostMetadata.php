<?php

namespace GivingTuesdayWp\Library\Metadata;

/**
 * Class PostMetadata
 * @package GivingTuesdayWp\Library\Metadata
 */
class PostMetadata
{
    protected static $data = [];

    /**
     * @param $meta_type
     * @param $object_id
     * @param $meta_key
     * @return mixed
     */
    public static function get($meta_type, $object_id, $meta_key)
    {
        if (!isset(static::$data[$meta_type][$object_id][$meta_key])) {
            static::$data[$meta_type][$object_id][$meta_key] = static::fetchValue($meta_type, $object_id, $meta_key);
        }

        return static::$data[$meta_type][$object_id][$meta_key];
    }

    /**
     * @param $meta_type
     * @param $object_id
     * @param $meta_key
     * @return mixed|null
     */
    protected function fetchValue($meta_type, $object_id, $meta_key)
    {
        if (metadata_exists('post', $object_id, $meta_key)) {
            return get_post_meta($object_id, $meta_key, true);
        }

        return null;
    }

    /**
     * @param $type
     * @param $name
     * @return string
     */
    public static function compileOptionName($type, $name)
    {
        return 'givewp_'.$type.'_options_'.$name;
    }
}
