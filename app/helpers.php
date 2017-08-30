<?php

namespace GivingTuesdayWp\Theme;

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return get_template_directory_uri() . '/public/'. $asset;
}