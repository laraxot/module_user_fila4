<?php

declare(strict_types=1);

return [
    'navigation' => [
<<<<<<< HEAD
        'label' => 'Client OAuth',
        'group' => 'OAuth',
        'icon' => 'heroicon-o-key',
        'sort' => 46,
    ],
    'label' => 'Client OAuth',
    'plural_label' => 'Client OAuth',
    'fields' => [
        'id' => [
            'label' => 'ID',
        ],
        'user_id' => [
            'label' => 'Utente',
        ],
        'name' => [
            'label' => 'Nome',
        ],
        'secret' => [
            'label' => 'Segreto',
        ],
        'provider' => [
            'label' => 'Provider',
        ],
        'redirect' => [
            'label' => 'Reindirizza',
        ],
        'personal_access_client' => [
            'label' => 'Client per accesso personale',
        ],
        'password_client' => [
            'label' => 'Client per accesso con password',
        ],
        'revoked' => [
            'label' => 'Revocato',
        ],
        'created_at' => [
            'label' => 'Creato il',
        ],
        'updated_at' => [
            'label' => 'Aggiornato il',
        ],
    ],
    'actions' => [
        'create_client' => [
            'label' => 'Crea client',
        ],
        'revoke' => [
            'label' => 'Revoca',
=======
        'label' => 'OAuth Clients',
        'group' => 'API',
        'icon' => 'heroicon-o-key',
        'sort' => 89,
    ],
    'actions' => [
        'logout' => [
            'tooltip' => 'logout',
        ],
    ],
    'fields' => [
        'password_client' => [
            'description' => 'password_client',
>>>>>>> 32e772a8 (.)
        ],
    ],
];
