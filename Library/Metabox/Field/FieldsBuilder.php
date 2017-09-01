<?php

namespace GivingTuesdayWp\Library\Metabox\Field;

/**
 * Class FieldsBuilder
 * @package GivingTuesdayWp\Library\Metabox\Fields
 */
class FieldsBuilder
{

    /**
     * @param array $settings
     * @return AbstractField
     */
    public static function create($settings)
    {
        $settings = self::checkSettings($settings);
        $class = self::fieldClass($settings['type']);
        $field = new $class($settings);

        return $field;
    }

    /**
     * @param $settings
     * @return mixed
     */
    public static function checkSettings($settings)
    {
        if (empty($settings['type'])) {
            $settings['type'] = 'text';
        }

        return $settings;
    }

    /**
     * @param $type
     * @return string
     */
    public static function fieldClass($type)
    {
        $class = __NAMESPACE__.'\Fields\\';
        $class .= ucfirst($type).'Field';

        return $class;
    }
}
