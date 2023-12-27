<?php

return [
    'messages' => [
        'successes' => [
            'soft_delete' => [
                'title' => 'Usunięto',
                'description' => 'Usunięto kategorię przepisu :name',
            ],
            'restore' => [
                'title' => 'Przywrócono',
                'description' => 'Przywrócono kategorię przepisu :name',
            ],
        ],
    ],
    'dialogs' => [
        'soft_delete' => [
            'title' => 'Potwierdzenie usunięcia',
            'description' => 'Czy na pewno usunąć kategorię przepisu :name?',
        ],
        'restore' => [
            'title' => 'Potwierdzenie przywrocenia',
            'description' => 'Czy na pewno przywrócić kategorię przepisu :name?',
        ],
    ],
    'labels' => [
        'create_form_title' => 'Utwórz kategorię przepisu',
        'edit_form_title' => 'Edytuj kategorię przepisu',
    ],
    'actions' => [
        'create' => "Dodaj kategorię przepisu",
        'edit' => 'Edytuj kategorię przepisu',
        'soft_delete' => 'Usuń kategorię przepisu',
        'restore' => 'Przywróć kategorię przepisu',
    ],
    'attributes' => [
        'name' => 'Nazwa kategorii',
    ],
];