<?php

return [
    'messages' => [
        'successes' => [
            'soft_delete' => [
                'title' => 'Usunięto',
                'description' => 'Usunięto kategorię prepisów :name',
            ],
        ],
    ],
    'dialogs' => [
        'soft_delete' => [
            'title' => 'Potwierdzenie usunięcia',
            'description' => 'Czy na pewno usunąć kategorię przepisów :name?',
        ],
    ],
    'labels' => [
        'create_form_title' => 'Utwórz kategorię przepisu',
        'edit_form_title' => 'Edytuj kategorię przepisu',
    ],
    'actions' => [
        'create' => "Dodaj kategorię przepisów",
        'edit' => 'Edytuj kategorię przepisów',
        'soft_delete' => 'Usuń kategorię przepisów',
    ],
    'attributes' => [
        'name' => 'Nazwa kategorii',
    ],
];