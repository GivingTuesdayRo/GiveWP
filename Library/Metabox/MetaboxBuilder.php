<?php

namespace GivingTuesdayWp\Library\Metabox;

/**
 * Class MetaboxBuilder
 * @package GivingTuesdayWp\Library\Metabox
 */
class MetaboxBuilder
{

    /**
     * @param $settings
     * @return Metabox
     */
    public static function create($settings)
    {
        $settings = self::checkSettings($settings);
        $metabox = new Metabox($settings);
        return $metabox;
    }

    /**
     * @param $settings
     * @return mixed
     */
    public static function checkSettings($settings)
    {
        if (empty($settings['id'])) {
            $settings['id'] = uniqid('metabox_');
        }
        return $settings;
    }
}
