<?php

<<<<<<< HEAD
declare(strict_types=1);


=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);


=======
>>>>>>> a12f125f4a (.)
=======
declare(strict_types=1);


>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
return [
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'help' => 'Il nome dell\'utente',
            'validation' => [
                'required' => 'Il nome è obbligatorio',
<<<<<<< HEAD
                'max' => 'Il nome non può superare i 255 caratteri',
            ],
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                'max' => 'Il nome non può superare i 255 caratteri',
            ],
=======
                'max' => 'Il nome non può superare i 255 caratteri'
            ]
>>>>>>> a12f125f4a (.)
=======
                'max' => 'Il nome non può superare i 255 caratteri',
            ],
>>>>>>> b93ef594b4 (.)
=======
                'max' => 'Il nome non può superare i 255 caratteri'
            ]
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ],
        'last_name' => [
            'label' => 'Cognome',
            'placeholder' => 'Inserisci il cognome',
            'help' => 'Il cognome dell\'utente',
            'validation' => [
                'required' => 'Il cognome è obbligatorio',
<<<<<<< HEAD
                'max' => 'Il cognome non può superare i 255 caratteri',
            ],
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                'max' => 'Il cognome non può superare i 255 caratteri',
            ],
=======
                'max' => 'Il cognome non può superare i 255 caratteri'
            ]
>>>>>>> a12f125f4a (.)
=======
                'max' => 'Il cognome non può superare i 255 caratteri',
            ],
>>>>>>> b93ef594b4 (.)
=======
                'max' => 'Il cognome non può superare i 255 caratteri'
            ]
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ],
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Inserisci l\'email',
            'help' => 'L\'email dell\'utente',
            'validation' => [
                'required' => 'L\'email è obbligatoria',
                'email' => 'Inserisci un\'email valida',
                'max' => 'L\'email non può superare i 255 caratteri',
<<<<<<< HEAD
                'unique' => 'Questa email è già registrata',
            ],
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                'unique' => 'Questa email è già registrata',
            ],
=======
                'unique' => 'Questa email è già registrata'
            ]
>>>>>>> a12f125f4a (.)
=======
                'unique' => 'Questa email è già registrata',
            ],
>>>>>>> b93ef594b4 (.)
=======
                'unique' => 'Questa email è già registrata'
            ]
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Inserisci la password',
            'help' => 'La password deve essere di almeno 8 caratteri',
            'validation' => [
                'required' => 'La password è obbligatoria',
                'min' => 'La password deve essere di almeno 8 caratteri',
<<<<<<< HEAD
                'max' => 'La password non può superare i 255 caratteri',
            ],
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                'max' => 'La password non può superare i 255 caratteri',
            ],
=======
                'max' => 'La password non può superare i 255 caratteri'
            ]
>>>>>>> a12f125f4a (.)
=======
                'max' => 'La password non può superare i 255 caratteri',
            ],
>>>>>>> b93ef594b4 (.)
=======
                'max' => 'La password non può superare i 255 caratteri'
            ]
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ],
        'password_confirmation' => [
            'label' => 'Conferma Password',
            'placeholder' => 'Conferma la password',
            'help' => 'Reinserisci la password per confermare',
            'validation' => [
                'required' => 'La conferma della password è obbligatoria',
                'min' => 'La password deve essere di almeno 8 caratteri',
                'max' => 'La password non può superare i 255 caratteri',
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                'same' => 'Le password non coincidono',
            ],
        ],
        'remember_me' => [
            'label' => 'Ricordami',
            'help' => 'Mantieni la sessione attiva',
        ],
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
                'same' => 'Le password non coincidono'
            ]
        ],
        'remember_me' => [
            'label' => 'Ricordami',
            'help' => 'Mantieni la sessione attiva'
        ]
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
                'same' => 'Le password non coincidono',
            ],
        ],
        'remember_me' => [
            'label' => 'Ricordami',
            'help' => 'Mantieni la sessione attiva',
        ],
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    ],
    'actions' => [
        'create' => [
            'label' => 'Nuovo Utente',
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            'tooltip' => 'Crea un nuovo utente',
        ],
        'edit' => [
            'label' => 'Modifica',
            'tooltip' => 'Modifica l\'utente',
        ],
        'delete' => [
            'label' => 'Elimina',
            'tooltip' => 'Elimina l\'utente',
        ],
<<<<<<< HEAD
=======
=======
            'tooltip' => 'Crea un nuovo utente'
=======
            'tooltip' => 'Crea un nuovo utente',
>>>>>>> b93ef594b4 (.)
        ],
        'edit' => [
            'label' => 'Modifica',
            'tooltip' => 'Modifica l\'utente',
        ],
        'delete' => [
            'label' => 'Elimina',
<<<<<<< HEAD
            'tooltip' => 'Elimina l\'utente'
        ]
>>>>>>> a12f125f4a (.)
=======
            'tooltip' => 'Elimina l\'utente',
        ],
>>>>>>> b93ef594b4 (.)
=======
            'tooltip' => 'Crea un nuovo utente'
        ],
        'edit' => [
            'label' => 'Modifica',
            'tooltip' => 'Modifica l\'utente'
        ],
        'delete' => [
            'label' => 'Elimina',
            'tooltip' => 'Elimina l\'utente'
        ]
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    ],
    'teams' => [
        'personal_team' => [
            'label' => 'Team Personale',
<<<<<<< HEAD
            'help' => 'Il team personale dell\'utente',
        ],
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            'help' => 'Il team personale dell\'utente',
        ],
=======
            'help' => 'Il team personale dell\'utente'
        ]
>>>>>>> a12f125f4a (.)
=======
            'help' => 'Il team personale dell\'utente',
        ],
>>>>>>> b93ef594b4 (.)
=======
            'help' => 'Il team personale dell\'utente'
        ]
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    ],
    'devices' => [
        'fields' => [
            'uuid' => [
                'label' => 'UUID',
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                'help' => 'Identificativo univoco del dispositivo',
            ],
            'mobile_id' => [
                'label' => 'Mobile ID',
                'help' => 'Identificativo del dispositivo mobile',
            ],
            'languages' => [
                'label' => 'Lingue',
                'help' => 'Le lingue supportate dal dispositivo',
            ],
            'device_name' => [
                'label' => 'Nome Dispositivo',
                'help' => 'Il nome del dispositivo',
            ],
        ],
<<<<<<< HEAD
=======
=======
                'help' => 'Identificativo univoco del dispositivo'
=======
                'help' => 'Identificativo univoco del dispositivo',
>>>>>>> b93ef594b4 (.)
            ],
            'mobile_id' => [
                'label' => 'Mobile ID',
                'help' => 'Identificativo del dispositivo mobile',
            ],
            'languages' => [
                'label' => 'Lingue',
                'help' => 'Le lingue supportate dal dispositivo',
            ],
            'device_name' => [
                'label' => 'Nome Dispositivo',
<<<<<<< HEAD
                'help' => 'Il nome del dispositivo'
            ]
        ]
>>>>>>> a12f125f4a (.)
=======
                'help' => 'Il nome del dispositivo',
            ],
        ],
>>>>>>> b93ef594b4 (.)
=======
                'help' => 'Identificativo univoco del dispositivo'
            ],
            'mobile_id' => [
                'label' => 'Mobile ID',
                'help' => 'Identificativo del dispositivo mobile'
            ],
            'languages' => [
                'label' => 'Lingue',
                'help' => 'Le lingue supportate dal dispositivo'
            ],
            'device_name' => [
                'label' => 'Nome Dispositivo',
                'help' => 'Il nome del dispositivo'
            ]
        ]
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    ],
    'permissions' => [
        'fields' => [
            'name' => [
                'label' => 'Nome',
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                'help' => 'Il nome del permesso',
            ],
            'guard_name' => [
                'label' => 'Guard Name',
                'help' => 'Il nome della guardia',
            ],
            'active' => [
                'label' => 'Attivo',
                'help' => 'Stato di attivazione del permesso',
            ],
            'created_at' => [
                'label' => 'Data Creazione',
                'help' => 'Data di creazione del permesso',
            ],
        ],
<<<<<<< HEAD
=======
=======
                'help' => 'Il nome del permesso'
=======
                'help' => 'Il nome del permesso',
>>>>>>> b93ef594b4 (.)
            ],
            'guard_name' => [
                'label' => 'Guard Name',
                'help' => 'Il nome della guardia',
            ],
            'active' => [
                'label' => 'Attivo',
                'help' => 'Stato di attivazione del permesso',
            ],
            'created_at' => [
                'label' => 'Data Creazione',
<<<<<<< HEAD
                'help' => 'Data di creazione del permesso'
            ]
        ]
>>>>>>> a12f125f4a (.)
=======
                'help' => 'Data di creazione del permesso',
            ],
        ],
>>>>>>> b93ef594b4 (.)
=======
                'help' => 'Il nome del permesso'
            ],
            'guard_name' => [
                'label' => 'Guard Name',
                'help' => 'Il nome della guardia'
            ],
            'active' => [
                'label' => 'Attivo',
                'help' => 'Stato di attivazione del permesso'
            ],
            'created_at' => [
                'label' => 'Data Creazione',
                'help' => 'Data di creazione del permesso'
            ]
        ]
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    ],
    'widgets' => [
        'recent_logins' => [
            'fields' => [
                'user' => [
                    'label' => 'Utente',
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                    'help' => 'L\'utente che ha effettuato l\'accesso',
                ],
                'login_at' => [
                    'label' => 'Data Accesso',
                    'help' => 'Data e ora dell\'accesso',
                ],
                'ip_address' => [
                    'label' => 'Indirizzo IP',
                    'help' => 'L\'indirizzo IP dell\'utente',
                ],
                'user_agent' => [
                    'label' => 'User Agent',
                    'help' => 'Il browser dell\'utente',
                ],
            ],
        ],
    ],
<<<<<<< HEAD
=======
=======
                    'help' => 'L\'utente che ha effettuato l\'accesso'
=======
                    'help' => 'L\'utente che ha effettuato l\'accesso',
>>>>>>> b93ef594b4 (.)
                ],
                'login_at' => [
                    'label' => 'Data Accesso',
                    'help' => 'Data e ora dell\'accesso',
                ],
                'ip_address' => [
                    'label' => 'Indirizzo IP',
                    'help' => 'L\'indirizzo IP dell\'utente',
                ],
                'user_agent' => [
                    'label' => 'User Agent',
<<<<<<< HEAD
=======
                    'help' => 'L\'utente che ha effettuato l\'accesso'
                ],
                'login_at' => [
                    'label' => 'Data Accesso',
                    'help' => 'Data e ora dell\'accesso'
                ],
                'ip_address' => [
                    'label' => 'Indirizzo IP',
                    'help' => 'L\'indirizzo IP dell\'utente'
                ],
                'user_agent' => [
                    'label' => 'User Agent',
>>>>>>> origin/develop
                    'help' => 'Il browser dell\'utente'
                ]
            ]
        ]
    ]
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
                    'help' => 'Il browser dell\'utente',
                ],
            ],
        ],
    ],
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
];
