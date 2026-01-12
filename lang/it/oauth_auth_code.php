<?php

declare(strict_types=1);

return [
    'navigation' => [
<<<<<<< HEAD
        'label' => 'Codice di autorizzazione OAuth',
        'group' => 'OAuth',
        'icon' => 'heroicon-o-key',
        'sort' => 32,
    ],
    'label' => 'Codice di autorizzazione OAuth',
    'plural_label' => 'Codici di autorizzazione OAuth',
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
        'view_scopes' => [
            'label' => 'Visualizza ambiti',
        ],
=======
        'label' => 'OAuth Authorization Codes',
        'group' => 'API',
        'icon' => 'heroicon-o-code-bracket',
        'sort' => 31,
>>>>>>> 32e772a8 (.)
    ],
    'actions' => [
        'logout' => [
            'tooltip' => 'logout',
        ],
    ],
];
