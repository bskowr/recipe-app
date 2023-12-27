<?php

return [
    'messages' => [
        'successes' => [
            'soft_delete' => [
                'title' => 'Deleted',
                'description' => 'Deleted ingredient category :name',
            ],
            'restore' => [
                'title' => 'Restored',
                'description' => 'Restored ingredient category :name',
            ],
        ],
    ],
    'dialogs' => [
        'soft_delete' => [
            'title' => 'Delete confirmation',
            'description' => 'Are you sure you\'d like to delete ingredent category :name?',
        ],
        'restore' => [
            'title' => 'Restore confirmation',
            'description' => 'Are you sure you\d like to restore ingredent category :name?',
        ],
    ],
    'labels' => [
        'create_form_title' => 'Create ingredent category',
        'edit_form_title' => 'Edit ingredient category',
    ],
    'actions' => [
        'create' => "Add ingredient category",
        'edit' => 'Edit ingredient category',
        'soft_delete' => 'Delete ingredient category',
        'restore' => 'Restore ingredient category',
    ],
    'attributes' => [
        'name' => 'Category name',
    ],
];