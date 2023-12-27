<?php

return [
    'messages' => [
        'successes' => [
            'soft_delete' => [
                'title' => 'Usunięto',
                'description' => 'Usunięto kategorię składnika :name',
            ],
            'restore' => [
                'title' => 'Przywrócono',
                'description' => 'Przywrócono kategorię składnika :name',
            ],
        ],
    ],
    'dialogs' => [
        'soft_delete' => [
            'title' => 'Potwierdzenie usunięcia',
            'description' => 'Czy na pewno usunąć kategorię składnika :name?',
        ],
        'restore' => [
            'title' => 'Potwierdzenie przywrocenia',
            'description' => 'Czy na pewno przywrócić kategorię składnika :name?',
        ],
    ],
    'labels' => [
        'create_form_title' => 'Utwórz kategorię składnika',
        'edit_form_title' => 'Edytuj kategorię składnika',
    ],
    'actions' => [
        'create' => "Dodaj kategorię składnika",
        'edit' => 'Edytuj kategorię składnika',
        'soft_delete' => 'Usuń kategorię składnika',
        'restore' => 'Przywróć kategorię składnika',
    ],
    'attributes' => [
        'name' => 'Nazwa kategorii',
    ],
];