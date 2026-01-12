<?php

declare(strict_types=1);

return [
    'navigation' => [
<<<<<<< HEAD
        'label' => 'Membro del team',
        'group' => 'Team',
        'icon' => 'heroicon-o-users',
        'sort' => 38,
    ],
    'label' => 'Membro del team',
    'plural_label' => 'Membri del team',
    'fields' => [
        'id' => [
            'label' => 'ID',
        ],
        'user_id' => [
            'label' => 'Utente',
        ],
        'team_id' => [
            'label' => 'Team',
        ],
        'role' => [
            'label' => 'Ruolo',
        ],
        'joined_at' => [
            'label' => 'Iscritto il',
        ],
    ],
    'actions' => [
        'change_role' => [
            'label' => 'Cambia ruolo',
        ],
        'remove_user' => [
            'label' => 'Rimuovi utente',
        ],
=======
        'name' => 'Utente Team',
        'plural' => 'Utenti Team',
        'label' => 'Utenti Team',
        'group' => [
            'name' => 'Teams',
            'description' => 'Gestione degli utenti associati ai team',
        ],
        'sort' => 65,
        'icon' => 'heroicon-o-user-group',
>>>>>>> 32e772a8 (.)
    ],
];
