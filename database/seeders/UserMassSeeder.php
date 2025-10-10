<?php

declare(strict_types=1);

namespace Modules\User\Database\Seeders;

<<<<<<< HEAD
use Exception;
=======
<<<<<<< HEAD
use Exception;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\Device;
use Modules\User\Models\Permission;
use Modules\User\Models\Profile;
use Modules\User\Models\Role;
use Modules\User\Models\SocialProvider;
use Modules\User\Models\Team;
use Modules\User\Models\User;
<<<<<<< HEAD
=======
=======
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
=======
>>>>>>> b93ef594b4 (.)
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\Device;
use Modules\User\Models\Permission;
use Modules\User\Models\Profile;
use Modules\User\Models\Role;
use Modules\User\Models\SocialProvider;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Modules\User\Models\User;
use Modules\User\Models\Role;
use Modules\User\Models\Permission;
use Modules\User\Models\Team;
use Modules\User\Models\Profile;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\Device;
use Modules\User\Models\SocialProvider;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

/**
 * Seeder per creare grandi quantità di dati per il modulo User.
 */
class UserMassSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Esegue il seeding del database.
     */
    public function run(): void
    {
        $this->command->info('🚀 Inizializzazione seeding di massa per modulo User...');
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        $startTime = microtime(true);

        try {
            // 1. Creazione ruoli e permessi avanzati
            $this->createAdvancedRolesAndPermissions();

            // 2. Creazione team specializzati
            $this->createSpecializedTeams();

            // 3. Creazione utenti con profili completi
            $this->createUsersWithProfiles();

            // 4. Creazione log di autenticazione
            $this->createAuthenticationLogs();

            // 5. Creazione dispositivi utente
            $this->createUserDevices();

            // 6. Creazione provider social
            $this->createSocialProviders();

            $endTime = microtime(true);
            $executionTime = round($endTime - $startTime, 2);

            $this->command->info("🎉 Seeding modulo User completato in {$executionTime} secondi!");
            $this->displaySummary();
        } catch (Exception $e) {
            $this->command->error('❌ Errore durante il seeding: ' . $e->getMessage());
            throw $e;
        }
    }

<<<<<<< HEAD
=======
=======
        
=======

>>>>>>> b93ef594b4 (.)
        $startTime = microtime(true);

        try {
            // 1. Creazione ruoli e permessi avanzati
            $this->createAdvancedRolesAndPermissions();

            // 2. Creazione team specializzati
            $this->createSpecializedTeams();

            // 3. Creazione utenti con profili completi
            $this->createUsersWithProfiles();

            // 4. Creazione log di autenticazione
            $this->createAuthenticationLogs();

            // 5. Creazione dispositivi utente
            $this->createUserDevices();

            // 6. Creazione provider social
            $this->createSocialProviders();

            $endTime = microtime(true);
            $executionTime = round($endTime - $startTime, 2);

            $this->command->info("🎉 Seeding modulo User completato in {$executionTime} secondi!");
            $this->displaySummary();
        } catch (Exception $e) {
            $this->command->error('❌ Errore durante il seeding: ' . $e->getMessage());
            throw $e;
        }
    }
<<<<<<< HEAD
    
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
        $startTime = microtime(true);
        
        try {
            // 1. Creazione ruoli e permessi avanzati
            $this->createAdvancedRolesAndPermissions();
            
            // 2. Creazione team specializzati
            $this->createSpecializedTeams();
            
            // 3. Creazione utenti con profili completi
            $this->createUsersWithProfiles();
            
            // 4. Creazione log di autenticazione
            $this->createAuthenticationLogs();
            
            // 5. Creazione dispositivi utente
            $this->createUserDevices();
            
            // 6. Creazione provider social
            $this->createSocialProviders();
            
            $endTime = microtime(true);
            $executionTime = round($endTime - $startTime, 2);
            
            $this->command->info("🎉 Seeding modulo User completato in {$executionTime} secondi!");
            $this->displaySummary();
            
        } catch (\Exception $e) {
            $this->command->error("❌ Errore durante il seeding: " . $e->getMessage());
            throw $e;
        }
    }
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    /**
     * Crea ruoli e permessi avanzati.
     */
    private function createAdvancedRolesAndPermissions(): void
    {
        $this->command->info('🔐 Creazione ruoli e permessi avanzati...');
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Permessi avanzati
        $advancedPermissions = [
            'manage-system-settings',
            'view-system-logs',
            'manage-backups',
            'manage-api-keys',
            'view-analytics',
            'manage-notifications',
            'manage-webhooks',
            'manage-integrations',
            'view-financial-data',
            'manage-billing',
            'manage-subscriptions',
            'view-audit-trail',
            'manage-data-export',
            'manage-data-import',
        ];
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        foreach ($advancedPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        
        foreach ($advancedPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        foreach ($advancedPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Ruoli avanzati
        $advancedRoles = [
            'system-architect' => [
                'manage-system-settings',
                'view-system-logs',
                'manage-backups',
                'manage-api-keys',
                'view-analytics',
                'manage-integrations',
                'view-audit-trail',
            ],
            'data-analyst' => [
                'view-analytics',
                'view-financial-data',
                'view-audit-trail',
                'manage-data-export',
                'manage-data-import',
            ],
            'billing-manager' => [
                'view-financial-data',
                'manage-billing',
                'manage-subscriptions',
                'view-audit-trail',
            ],
            'integration-specialist' => [
                'manage-integrations',
                'manage-webhooks',
                'manage-api-keys',
                'view-system-logs',
            ],
        ];
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        foreach ($advancedRoles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

        $this->command->info(
            '✅ Creati ' .
            count($advancedPermissions) .
                ' permessi avanzati e ' .
                count($advancedRoles) .
                ' ruoli specializzati',
        );
<<<<<<< HEAD
    }

=======
<<<<<<< HEAD
    }

=======
=======
>>>>>>> origin/develop
        
        $this->command->info("✅ Creati " . count($advancedPermissions) . " permessi avanzati e " . count($advancedRoles) . " ruoli specializzati");
    }
    
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    }

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    /**
     * Crea team specializzati.
     */
    private function createSpecializedTeams(): void
    {
        $this->command->info('👥 Creazione team specializzati...');
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        $specializedTeams = [
            [
                'name' => 'Sviluppo',
                'display_name' => 'Team di Sviluppo',
                'description' => 'Team per lo sviluppo software',
            ],
            [
                'name' => 'DevOps',
                'display_name' => 'Team DevOps',
                'description' => 'Team per infrastruttura e deployment',
            ],
            ['name' => 'QA', 'display_name' => 'Team Quality Assurance', 'description' => 'Team per test e qualità'],
            ['name' => 'Design', 'display_name' => 'Team Design', 'description' => 'Team per design e UX/UI'],
            [
                'name' => 'Marketing',
                'display_name' => 'Team Marketing',
                'description' => 'Team per marketing e comunicazione',
            ],
            [
                'name' => 'Vendite',
                'display_name' => 'Team Vendite',
                'description' => 'Team per vendite e business development',
            ],
            [
                'name' => 'Supporto',
                'display_name' => 'Team Supporto',
                'description' => 'Team per supporto tecnico e clienti',
            ],
            ['name' => 'Finanza', 'display_name' => 'Team Finanza', 'description' => 'Team per gestione finanziaria'],
            [
                'name' => 'Risorse Umane',
                'display_name' => 'Team HR',
                'description' => 'Team per gestione risorse umane',
            ],
            [
                'name' => 'Legale',
                'display_name' => 'Team Legale',
                'description' => 'Team per questioni legali e compliance',
            ],
        ];

        foreach ($specializedTeams as $teamData) {
            Team::firstOrCreate(['name' => $teamData['name']], $teamData);
        }

        $this->command->info('✅ Creati ' . count($specializedTeams) . ' team specializzati');
    }

<<<<<<< HEAD
=======
=======
        
=======

>>>>>>> b93ef594b4 (.)
        $specializedTeams = [
            [
                'name' => 'Sviluppo',
                'display_name' => 'Team di Sviluppo',
                'description' => 'Team per lo sviluppo software',
            ],
            [
                'name' => 'DevOps',
                'display_name' => 'Team DevOps',
                'description' => 'Team per infrastruttura e deployment',
            ],
            ['name' => 'QA', 'display_name' => 'Team Quality Assurance', 'description' => 'Team per test e qualità'],
            ['name' => 'Design', 'display_name' => 'Team Design', 'description' => 'Team per design e UX/UI'],
            [
                'name' => 'Marketing',
                'display_name' => 'Team Marketing',
                'description' => 'Team per marketing e comunicazione',
            ],
            [
                'name' => 'Vendite',
                'display_name' => 'Team Vendite',
                'description' => 'Team per vendite e business development',
            ],
            [
                'name' => 'Supporto',
                'display_name' => 'Team Supporto',
                'description' => 'Team per supporto tecnico e clienti',
            ],
            ['name' => 'Finanza', 'display_name' => 'Team Finanza', 'description' => 'Team per gestione finanziaria'],
            [
                'name' => 'Risorse Umane',
                'display_name' => 'Team HR',
                'description' => 'Team per gestione risorse umane',
            ],
            [
                'name' => 'Legale',
                'display_name' => 'Team Legale',
                'description' => 'Team per questioni legali e compliance',
            ],
        ];

        foreach ($specializedTeams as $teamData) {
            Team::firstOrCreate(['name' => $teamData['name']], $teamData);
        }

        $this->command->info('✅ Creati ' . count($specializedTeams) . ' team specializzati');
    }
<<<<<<< HEAD
    
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
        $specializedTeams = [
            ['name' => 'Sviluppo', 'display_name' => 'Team di Sviluppo', 'description' => 'Team per lo sviluppo software'],
            ['name' => 'DevOps', 'display_name' => 'Team DevOps', 'description' => 'Team per infrastruttura e deployment'],
            ['name' => 'QA', 'display_name' => 'Team Quality Assurance', 'description' => 'Team per test e qualità'],
            ['name' => 'Design', 'display_name' => 'Team Design', 'description' => 'Team per design e UX/UI'],
            ['name' => 'Marketing', 'display_name' => 'Team Marketing', 'description' => 'Team per marketing e comunicazione'],
            ['name' => 'Vendite', 'display_name' => 'Team Vendite', 'description' => 'Team per vendite e business development'],
            ['name' => 'Supporto', 'display_name' => 'Team Supporto', 'description' => 'Team per supporto tecnico e clienti'],
            ['name' => 'Finanza', 'display_name' => 'Team Finanza', 'description' => 'Team per gestione finanziaria'],
            ['name' => 'Risorse Umane', 'display_name' => 'Team HR', 'description' => 'Team per gestione risorse umane'],
            ['name' => 'Legale', 'display_name' => 'Team Legale', 'description' => 'Team per questioni legali e compliance'],
        ];
        
        foreach ($specializedTeams as $teamData) {
            Team::firstOrCreate(['name' => $teamData['name']], $teamData);
        }
        
        $this->command->info("✅ Creati " . count($specializedTeams) . " team specializzati");
    }
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    /**
     * Crea utenti con profili completi.
     */
    private function createUsersWithProfiles(): void
    {
        $this->command->info('👤 Creazione utenti con profili completi...');
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // Crea 200 utenti generici
        $users = User::factory()
            ->count(200)
            ->create([
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
            ]);

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        
        // Crea 200 utenti generici
        $users = User::factory()->count(200)->create([
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now()->subDays(rand(1, 365)),
        ]);
        
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        // Crea 200 utenti generici
        $users = User::factory()
            ->count(200)
            ->create([
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
            ]);

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Crea profili per tutti gli utenti
        foreach ($users as $user) {
            Profile::factory()->create([
                'user_id' => $user->id,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ]);
        }
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Assegna ruoli casuali
        $roles = Role::all();
        foreach ($users as $user) {
            $randomRole = $roles->random();
            $user->assignRole($randomRole);
        }
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        $this->command->info('✅ Creati ' . $users->count() . ' utenti con profili completi');
    }

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        
        $this->command->info("✅ Creati " . $users->count() . " utenti con profili completi");
    }
    
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        $this->command->info('✅ Creati ' . $users->count() . ' utenti con profili completi');
    }

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    /**
     * Crea log di autenticazione.
     */
    private function createAuthenticationLogs(): void
    {
        $this->command->info('📝 Creazione log di autenticazione...');
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // Crea 1000 log di autenticazione
        $logs = AuthenticationLog::factory()
            ->count(1000)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
            ]);

        $this->command->info('✅ Creati ' . $logs->count() . ' log di autenticazione');
    }

<<<<<<< HEAD
=======
=======
        
=======

>>>>>>> b93ef594b4 (.)
        // Crea 1000 log di autenticazione
        $logs = AuthenticationLog::factory()
            ->count(1000)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
            ]);

        $this->command->info('✅ Creati ' . $logs->count() . ' log di autenticazione');
    }
<<<<<<< HEAD
    
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
        // Crea 1000 log di autenticazione
        $logs = AuthenticationLog::factory()->count(1000)->create([
            'created_at' => Carbon::now()->subDays(rand(1, 30)),
        ]);
        
        $this->command->info("✅ Creati " . $logs->count() . " log di autenticazione");
    }
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    /**
     * Crea dispositivi utente.
     */
    private function createUserDevices(): void
    {
        $this->command->info('📱 Creazione dispositivi utente...');
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // Crea 500 dispositivi
        $devices = Device::factory()
            ->count(500)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 90)),
            ]);

        $this->command->info('✅ Creati ' . $devices->count() . ' dispositivi utente');
    }

<<<<<<< HEAD
=======
=======
        
=======

>>>>>>> b93ef594b4 (.)
        // Crea 500 dispositivi
        $devices = Device::factory()
            ->count(500)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 90)),
            ]);

        $this->command->info('✅ Creati ' . $devices->count() . ' dispositivi utente');
    }
<<<<<<< HEAD
    
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
        // Crea 500 dispositivi
        $devices = Device::factory()->count(500)->create([
            'created_at' => Carbon::now()->subDays(rand(1, 90)),
        ]);
        
        $this->command->info("✅ Creati " . $devices->count() . " dispositivi utente");
    }
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    /**
     * Crea provider social.
     */
    private function createSocialProviders(): void
    {
        $this->command->info('🔗 Creazione provider social...');
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // Crea 100 provider social
        $providers = SocialProvider::factory()
            ->count(100)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 180)),
            ]);

        $this->command->info('✅ Creati ' . $providers->count() . ' provider social');
    }

<<<<<<< HEAD
=======
=======
        
=======

>>>>>>> b93ef594b4 (.)
        // Crea 100 provider social
        $providers = SocialProvider::factory()
            ->count(100)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 180)),
            ]);

        $this->command->info('✅ Creati ' . $providers->count() . ' provider social');
    }
<<<<<<< HEAD
    
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
        // Crea 100 provider social
        $providers = SocialProvider::factory()->count(100)->create([
            'created_at' => Carbon::now()->subDays(rand(1, 180)),
        ]);
        
        $this->command->info("✅ Creati " . $providers->count() . " provider social");
    }
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    /**
     * Mostra un riassunto dei dati creati.
     */
    private function displaySummary(): void
    {
        $this->command->info('📊 RIASSUNTO DATI CREATI PER MODULO USER:');
        $this->command->info('┌─────────────────────────────────────┐');
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        try {
            // Conta utenti
            $totalUsers = User::count();
            $verifiedUsers = User::whereNotNull('email_verified_at')->count();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

            $this->command->info('│ 👥 Utenti totali:           ' .
            str_pad((string) $totalUsers, 6, ' ', STR_PAD_LEFT) .
                ' │');
            $this->command->info('│    - Verificati:             ' .
            str_pad((string) $verifiedUsers, 6, ' ', STR_PAD_LEFT) .
                ' │');

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            // Conta profili
            $totalProfiles = Profile::count();

            $this->command->info('│ 👤 Profili totali:          ' .
            str_pad((string) $totalProfiles, 6, ' ', STR_PAD_LEFT) .
                ' │');

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
            
            $this->command->info("│ 👥 Utenti totali:           " . str_pad((string)$totalUsers, 6, ' ', STR_PAD_LEFT) . " │");
            $this->command->info("│    - Verificati:             " . str_pad((string)$verifiedUsers, 6, ' ', STR_PAD_LEFT) . " │");
            
            // Conta profili
            $totalProfiles = Profile::count();
            
            $this->command->info("│ 👤 Profili totali:          " . str_pad((string)$totalProfiles, 6, ' ', STR_PAD_LEFT) . " │");
            
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            // Conta profili
            $totalProfiles = Profile::count();

            $this->command->info('│ 👤 Profili totali:          ' .
            str_pad((string) $totalProfiles, 6, ' ', STR_PAD_LEFT) .
                ' │');

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // Conta ruoli e permessi
            $totalRoles = Role::count();
            $totalPermissions = Permission::count();
            $totalTeams = Team::count();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

            $this->command->info('│ 🔐 Ruoli:                  ' .
            str_pad((string) $totalRoles, 6, ' ', STR_PAD_LEFT) .
                ' │');
            $this->command->info('│ 🔑 Permessi:               ' .
            str_pad((string) $totalPermissions, 6, ' ', STR_PAD_LEFT) .
                ' │');
            $this->command->info('│ 👥 Team:                   ' .
            str_pad((string) $totalTeams, 6, ' ', STR_PAD_LEFT) .
                ' │');

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
            
            $this->command->info("│ 🔐 Ruoli:                  " . str_pad((string)$totalRoles, 6, ' ', STR_PAD_LEFT) . " │");
            $this->command->info("│ 🔑 Permessi:               " . str_pad((string)$totalPermissions, 6, ' ', STR_PAD_LEFT) . " │");
            $this->command->info("│ 👥 Team:                   " . str_pad((string)$totalTeams, 6, ' ', STR_PAD_LEFT) . " │");
            
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // Conta log e dispositivi
            $totalLogs = AuthenticationLog::count();
            $totalDevices = Device::count();
            $totalProviders = SocialProvider::count();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

            $this->command->info('│ 📝 Log autenticazione:      ' .
            str_pad((string) $totalLogs, 6, ' ', STR_PAD_LEFT) .
                ' │');
            $this->command->info('│ 📱 Dispositivi:             ' .
            str_pad((string) $totalDevices, 6, ' ', STR_PAD_LEFT) .
                ' │');
            $this->command->info('│ 🔗 Provider social:         ' .
            str_pad((string) $totalProviders, 6, ' ', STR_PAD_LEFT) .
                ' │');
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        } catch (Exception $e) {
            $this->command->info('│ ❌ Errore nel conteggio: ' . $e->getMessage());
        }

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
            
            $this->command->info("│ 📝 Log autenticazione:      " . str_pad((string)$totalLogs, 6, ' ', STR_PAD_LEFT) . " │");
            $this->command->info("│ 📱 Dispositivi:             " . str_pad((string)$totalDevices, 6, ' ', STR_PAD_LEFT) . " │");
            $this->command->info("│ 🔗 Provider social:         " . str_pad((string)$totalProviders, 6, ' ', STR_PAD_LEFT) . " │");
            
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
        } catch (Exception $e) {
            $this->command->info('│ ❌ Errore nel conteggio: ' . $e->getMessage());
        }
<<<<<<< HEAD
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        } catch (\Exception $e) {
            $this->command->info("│ ❌ Errore nel conteggio: " . $e->getMessage());
        }
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $this->command->info('└─────────────────────────────────────┘');
        $this->command->info('');
    }
}
