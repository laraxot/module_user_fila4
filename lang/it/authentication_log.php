<?php

declare(strict_types=1);

return [
    'navigation' => [
<<<<<<< HEAD
        'label' => 'Log di autenticazione',
        'group' => 'Sicurezza',
        'icon' => 'heroicon-o-lock-closed',
        'sort' => 36,
    ],
    'label' => 'Log di autenticazione',
    'plural_label' => 'Log di autenticazione',
    'fields' => [
        'id' => [
            'label' => 'ID',
        ],
        'user_id' => [
            'label' => 'Utente',
        ],
        'ip_address' => [
            'label' => 'Indirizzo IP',
        ],
        'user_agent' => [
            'label' => 'User Agent',
        ],
        'login_at' => [
            'label' => 'Accesso il',
        ],
        'logout_at' => [
            'label' => 'Disconnessione il',
        ],
        'login_method' => [
            'label' => 'Metodo di accesso',
        ],
        'success' => [
            'label' => 'Successo',
        ],
=======
        'label' => 'Authentication Logs',
        'group' => 'Authentication',
        'icon' => 'heroicon-o-shield-check',
        'sort' => 5,
>>>>>>> 32e772a8 (.)
    ],
    'actions' => [
        'view_details' => [
            'label' => 'Visualizza dettagli',
        ],
        'export_logs' => [
            'label' => 'Esporta log',
        ],
    ],
];
