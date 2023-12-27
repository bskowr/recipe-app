<?php

return [
    'messages' => [
        'successes' => [
            'soft_delete' => [
                'title' => 'Deleted',
                'description' => 'Deleted recipe category :name',
            ],
            'restore' => [
                'title' => 'Restored',
                'description' => 'Restored recipe category :name',
            ],
        ],
    ],
    'dialogs' => [
        'soft_delete' => [
            'title' => 'Delete confirmation',
            'description' => 'Are you sure you\'d like to delete recipe category :name?',
        ],
        'restore' => [
            'title' => 'Restore confirmation',
            'description' => 'Are you sure you\'d like to restore recipe category :name?',
        ],
    ],
    'labels' => [
        'create_form_title' => 'Create recipe category',
        'edit_form_title' => 'Edit recipe category',
    ],
    'actions' => [
        'create' => "Add recipe category",
        'edit' => 'Edit recipe category',
        'soft_delete' => 'Delete recipe category',
        'restore' => 'Restore recipe category',
    ],
    'attributes' => [
        'name' => 'Category name',
    ],
];