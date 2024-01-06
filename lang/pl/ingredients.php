<?php

return [
    'messages' => [
        'successes' => [
            'soft_delete' => [
                'title' => 'Usunięto',
                'description' => 'Usunięto składnik :name',
            ],
            'restore' => [
                'title' => 'Przywrócono',
                'description' => 'Przywrócono składnik :name',
            ],
            'image_delete' => [
                'title' => 'Usunięto zdjęcie składnika',
                'description' => 'Usunięto zdjecie składnika :name',
            ],
        ],
        'errors' => [
            'image_delete' => [
                'title' => 'Usuwanie zdjęcia składnika zakończone niepowodzeniem',
                'description' => 'Nie udało się usunąć zdjęcia dla składnika :name',
            ],
        ],
    ],
    'dialogs' => [
        'soft_delete' => [
            'title' => 'Potwierdzenie usunięcia',
            'description' => 'Czy na pewno usunąć składnik :name?',
        ],
        'restore' => [
            'title' => 'Potwierdzenie przywrocenia',
            'description' => 'Czy na pewno przywrócić składnik :name?',
        ],
    ],
    'labels' => [
        'create_form_title' => 'Utwórz składnik',
        'edit_form_title' => 'Edytuj składnik',
    ],
    'actions' => [
        'create' => "Dodaj składnik",
        'edit' => 'Edytuj składnik',
        'soft_delete' => 'Usuń składnik',
        'restore' => 'Przywróć składnik',
    ],
    'attributes' => [
        'name' => 'Nazwa składnika',
        'description' => 'Opis składnika',
        'ingredient_category_id' => 'Kategoria składnika',
        'price' => 'Cena składnika',
        'owned_amount' => 'Posiadana ilość składnika',
        'unit' => 'Jednostka składnika',
    ],
];