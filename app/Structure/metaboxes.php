<?php

namespace GivingTuesdayWp\Theme\Structure;

use GivingTuesdayWp\Library\Metabox\MetaboxManager;

MetaboxManager::instance()->newMetabox([
    'id' => 'post_options',
    'title' => 'Post options',
    'context' => 'side',
    'fields' => [
        [
            'name' => 'cover_style',
            'label' => 'Cover Style',
            'type' => 'radioGroup',
            'value' => 'cover',
            'optionsValues' => [
                'regular' => 'Regular',
                'cover' => 'Cover',
                'title' => 'Title'
            ]
        ]
    ]
]);

MetaboxManager::instance()->newMetabox([
    'id' => 'page_options',
    'title' => 'Page options',
    'postType' => ['page', 'initiative'],
    'context' => 'side',
    'fields' => [
        [
            'name' => 'header_style',
            'label' => 'Header Style',
            'type' => 'radioGroup',
            'value' => 'show',
            'optionsValues' => [
                'show' => 'Show header',
                'hide' => 'Hide Header'
            ]
        ],
        [
            'name' => 'cover_style',
            'label' => 'Cover Style',
            'type' => 'radioGroup',
            'value' => 'regular',
            'optionsValues' => [
                'regular' => 'Regular',
                'cover' => 'Cover',
                'title' => 'Title'
            ]
        ],
        [
            'name' => 'layout',
            'label' => 'Layout',
            'type' => 'radioGroup',
            'value' => 'right-sidebar',
            'optionsValues' => [
                'full-width' => 'Full Width',
                'container' => 'Container width',
                'right-sidebar' => 'Right Sidebar',
            ]
        ]
    ]
]);
