<?php

return [
    'messages' => [
        'successes' => [
            'soft_delete' => [
                'title' => 'Usunięto',
                'description' => 'Usunięto kategorię składnika :name',
            ],
            'restore' => [
                'title' => 'Usunięto',
                'description' => 'Przywrócono kategorię składnika :name',
            ],
        ],
    ],
    'dialogs' => [
        'soft_delete' => [
            'title' => 'Potwierdzenie usunięcia',
            'description' => 'Czy na pewno usunąć kategorię składnika :name?',
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
    ],
    'attributes' => [
        'name' => 'Nazwa kategorii',
    ],
];