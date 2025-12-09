<?php

declare(strict_types=1);

return [
    'name' => 'User',
    'description' => 'Modulo per la gestione degli utenti e autorizzazioni',
    'icon' => 'heroicon-o-users',
    'navigation' => [
        'enabled' => true,
        'sort' => 100,
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
        'Modules\\User\\Providers\\UserServiceProvider',
    ],

    /**
     * Automatically create a personal team for new users.
     *
     * When enabled, a personal team will be created automatically
     * when a new user is created via the UserObserver.
     */
    'create_personal_team' => env('USER_CREATE_PERSONAL_TEAM', false),

    /**
     * Automatically set current team after user creation.
     *
     * When enabled, the user's current_team_id will be set to their
     * personal team (if exists) or first available team.
     */
    'auto_set_current_team' => env('USER_AUTO_SET_CURRENT_TEAM', false),
];
