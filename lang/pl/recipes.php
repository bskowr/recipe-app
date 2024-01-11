<?php

return [
    'show' => 'Informacje o przepisie',
    'messages' => [
        'successes' => [
            'soft_delete' => [
                'title' => 'Usunięto',
                'description' => 'Usunięto przepis :name',
            ],
            'restore' => [
                'title' => 'Przywrócono',
                'description' => 'Przywrócono przepis :name',
            ],
            'image_delete' => [
                'title' => 'Usunięto zdjęcie przepisu',
                'description' => 'Usunięto zdjecie przepisu :name',
            ],
        ],
        'errors' => [
            'image_delete' => [
                'title' => 'Usuwanie zdjęcia przepisu zakończone niepowodzeniem',
                'description' => 'Nie udało się usunąć zdjęcia dla przepisu :name',
            ],
        ],
    ],
    'dialogs' => [
        'soft_delete' => [
            'title' => 'Potwierdzenie usunięcia',
            'description' => 'Czy na pewno usunąć przepisu :name?',
        ],
        'restore' => [
            'title' => 'Potwierdzenie przywrocenia',
            'description' => 'Czy na pewno przywrócić przepisu :name?',
        ],
    ],
    'labels' => [
        'create_form_title' => 'Utwórz przepis',
        'edit_form_title' => 'Edytuj przepis',
    ],
    'actions' => [
        'create' => "Dodaj przepis",
        'edit' => 'Edytuj przepis',
        'soft_delete' => 'Usuń przepis',
        'restore' => 'Przywróć przepis',
        'show' => 'Pokaż szczegóły'
    ],
    'attributes' => [
        'name' => 'Nazwa przepisu',
        'description' => 'Opis przepisu',
        'recipe_category_id' => 'Kategoria przepisu',
        'estimated_time' => 'Przewidywany czas wykonywania',
        'portions' => 'Przygotowywane porcje',
        'image' => 'Zdjęcie tytułowe przepisu',
    ],
];