<?php

namespace GivingTuesdayWp\Theme\Structure;

use GivingTuesdayWp\Library\Metabox\MetaboxManager;

$metabox = MetaboxManager::instance()->newMetabox([
    'id' => 'post_options',
    'title' => 'Post options',
    'context' => 'side',
]);
$metabox->addField([
    'name' => 'cover_style',
    'label' => 'Cover Style',
    'type' => 'radioGroup',
    'value' => 'cover',
])->setOptionsValues([
    'regular' => 'Regular',
    'cover' => 'Cover'
]);
