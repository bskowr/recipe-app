<?php

return [
    'steps' => 'Kroki przepisu',
    'step' => 'Krok',
    'ingredients' => 'Składniki w przepisie',
    'messages' => [
        'successes' => [
            'soft_delete' => [
                'title' => 'Usunięto',
                'description' => 'Usunięto krok przepisu :name',
            ],
            'restore' => [
                'title' => 'Przywrócono',
                'description' => 'Przywrócono krok przepisu :name',
            ],
            'image_delete' => [
                'title' => 'Usunięto zdjęcie',
                'description' => 'Usunięto zdjecie z kroku :name',
            ],
        ],
        'errors' => [
            'image_delete' => [
                'title' => 'Usuwanie zdjęcia zakończone niepowodzeniem',
                'description' => 'Nie udało się usunąć zdjęcia dla kroku :name',
            ],
        ],
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Potwierdzenie usunięcia',
            'description' => 'Czy na pewno usunąć krok :name?',
        ],
    ],
    'labels' => [
        'create_form_title' => 'Dodaj krok do przepisu',
        'edit_form_title' => 'Edytuj krok w przepisie',
    ],
    'actions' => [
        'create' => "Dodaj krok",
        'edit' => 'Edytuj krok',
        'delete' => 'Usuń krok',
    ],
    'attributes' => [
        'name' => 'Nazwa kroku',
        'description' => 'Opis kroku',
        'recipe_id' => 'Przepis',
        'estimated_time' => 'Przewidywany czas wykonywania kroku',
        'image' => 'Zdjęcie dla kroku przepisu',
        'ingredients' => 'Składniki wykorzystywane w kroku',
        'step_number' => 'Numer kroku'
    ],
];