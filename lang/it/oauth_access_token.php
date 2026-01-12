<?php

declare(strict_types=1);

return [
    'navigation' => [
<<<<<<< HEAD
        'label' => 'Token di accesso OAuth',
        'group' => 'OAuth',
        'icon' => 'heroicon-o-key',
        'sort' => 33,
    ],
    'label' => 'Token di accesso OAuth',
    'plural_label' => 'Token di accesso OAuth',
    'fields' => [
        'id' => [
            'label' => 'ID',
        ],
        'user_id' => [
            'label' => 'Utente',
        ],
        'client_id' => [
            'label' => 'Client',
        ],
        'name' => [
            'label' => 'Nome',
        ],
        'scopes' => [
            'label' => 'Ambiti',
        ],
        'revoked' => [
            'label' => 'Revocato',
        ],
        'expires_at' => [
            'label' => 'Scade il',
        ],
    ],
    'actions' => [
        'revoke' => [
            'label' => 'Revoca',
        ],
        'refresh' => [
            'label' => 'Aggiorna',
        ],
=======
        'label' => 'OAuth Access Tokens',
        'group' => 'API',
        'icon' => 'heroicon-o-key',
        'sort' => 62,
>>>>>>> 32e772a8 (.)
    ],
    'actions' => [
        'logout' => [
            'tooltip' => 'logout',
        ],
    ],
];
