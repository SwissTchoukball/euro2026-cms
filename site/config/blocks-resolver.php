<?php

use Kirby\Cms\Block;
use Kirby\Cms\File;
use Kirby\Content\Field;

return [
    // Custom resolves for `block:field`
    'resolvers' => [
        // Resolve permalinks (containing UUIDs) to URLs inside the
        // field `text` of the `text` block
        'text:text' => function (Field $field, Block $block) {
            return $field->permalinksToUrls()->value();
        },
        'richtext:text' => function (Field $field, Block $block) {
            return $field->kirbytext()->value();
        },
        'deadlines:deadlines' => function (Field $field, Block $block) {
            return $field->toStructure()->map(function ($item) {
                return [
                    'date' => $item->date()->value(),
                    'description' => $item->description()->kirbytext()->value(),
                    'clarification' => $item->clarification()->kirbytext()->value()
                ];
            })->values();
        }
    ],
    'defaultResolvers' => [
        'files' => fn (File $image) => [
            'url' => $image->url(),
            'width' => $image->width(),
            'height' => $image->height(),
            'srcset' => $image->srcset(),
            'alt' => $image->alt()->value(),
        ]
    ]
];
