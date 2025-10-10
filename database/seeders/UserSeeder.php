<?php

declare(strict_types=1);

namespace Modules\User\Database\Seeders;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\Team;

/**
 * Seeder per il modulo User.
 *
<<<<<<< HEAD
=======
=======
use Illuminate\Database\Seeder;
=======
>>>>>>> b93ef594b4 (.)
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\Team;

/**
 * Seeder per il modulo User.
<<<<<<< HEAD
 * 
>>>>>>> a12f125f4a (.)
=======
 *
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Modules\User\Models\Role;
use Modules\User\Models\Permission;
use Modules\User\Models\Team;
use Illuminate\Support\Facades\DB;

/**
 * Seeder per il modulo User.
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * Popola il database con dati di base per:
 * - Ruoli e permessi di sistema
 * - Team di default
 */
class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Esegue il seeding del database.
     */
    public function run(): void
    {
        $this->command->info('👤 Inizializzazione seeding User...');

        // Disabilita i controlli di foreign key (solo per MySQL)
        if (DB::getDriverName() !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        try {
            $this->seedSystemRolesAndPermissions();
            $this->seedSystemTeams();
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
            $this->command->info('✅ Seeding User completato con successo!');
        } finally {
            // Riabilita i controlli di foreign key (solo per MySQL)
            if (DB::getDriverName() !== 'sqlite') {
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
        }
    }

    /**
     * Crea ruoli e permessi di sistema.
     */
    private function seedSystemRolesAndPermissions(): void
    {
        $this->command->info('🔐 Creazione ruoli e permessi di sistema...');

        // Permessi di sistema
        $systemPermissions = [
            // User management
            'manage users',
            'create users',
            'edit users',
            'delete users',
            'view users',
            'impersonate users',
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
            // Role management
            'manage roles',
            'create roles',
            'edit roles',
            'delete roles',
            'view roles',
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
            // Permission management
            'manage permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',
            'view permissions',
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
            // Team management
            'manage teams',
            'create teams',
            'edit teams',
            'delete teams',
            'view teams',
            'join teams',
            'leave teams',
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
            // System settings
            'manage system settings',
            'view system settings',
            'manage modules',
            'view system logs',
            'manage backups',
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
            // Analytics and reporting
            'view analytics',
            'export data',
            'generate reports',
        ];

        foreach ($systemPermissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // Ruoli di sistema
        $superAdminRole = Role::firstOrCreate([
            'name' => 'super-admin',
            'guard_name' => 'web',
        ]);

        $systemAdminRole = Role::firstOrCreate([
            'name' => 'system-admin',
            'guard_name' => 'web',
        ]);

        $moderatorRole = Role::firstOrCreate([
            'name' => 'moderator',
            'guard_name' => 'web',
        ]);

        $userRole = Role::firstOrCreate([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        // Assegna permessi ai ruoli
        $superAdminRole->givePermissionTo(Permission::all());
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
        $systemAdminRole->givePermissionTo([
            'manage users',
            'create users',
            'edit users',
            'view users',
            'manage roles',
            'view roles',
            'manage teams',
            'view teams',
            'view system settings',
            'view analytics',
            'generate reports',
        ]);

        $moderatorRole->givePermissionTo([
            'view users',
            'edit users',
            'view roles',
            'view teams',
            'join teams',
            'leave teams',
            'view analytics',
        ]);

        $userRole->givePermissionTo([
            'view users',
            'view teams',
            'join teams',
            'leave teams',
        ]);

<<<<<<< HEAD
        $this->command->info('   ✓ Creati ' . count($systemPermissions) . ' permessi di sistema');
        $this->command->info('   ✓ Creati 4 ruoli di sistema (super-admin, system-admin, moderator, user)');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('   ✓ Creati ' . count($systemPermissions) . ' permessi di sistema');
        $this->command->info('   ✓ Creati 4 ruoli di sistema (super-admin, system-admin, moderator, user)');
=======
        $this->command->info("   ✓ Creati " . count($systemPermissions) . " permessi di sistema");
        $this->command->info("   ✓ Creati 4 ruoli di sistema (super-admin, system-admin, moderator, user)");
>>>>>>> a12f125f4a (.)
=======
        $this->command->info('   ✓ Creati ' . count($systemPermissions) . ' permessi di sistema');
        $this->command->info('   ✓ Creati 4 ruoli di sistema (super-admin, system-admin, moderator, user)');
>>>>>>> b93ef594b4 (.)
=======
        $this->command->info("   ✓ Creati " . count($systemPermissions) . " permessi di sistema");
        $this->command->info("   ✓ Creati 4 ruoli di sistema (super-admin, system-admin, moderator, user)");
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Crea team di sistema.
     */
    private function seedSystemTeams(): void
    {
        $this->command->info('👥 Creazione team di sistema...');

        // Team di amministrazione
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        $adminTeam = Team::factory()->create([
            'name' => 'Amministratori',
            'personal_team' => false,
        ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // Team di sviluppo
        $devTeam = Team::factory()->create([
            'name' => 'Sviluppatori',
            'personal_team' => false,
        ]);

        // Team di supporto
        $supportTeam = Team::factory()->create([
            'name' => 'Supporto Clienti',
            'personal_team' => false,
        ]);

        // Team di marketing
        $marketingTeam = Team::factory()->create([
            'name' => 'Marketing',
            'personal_team' => false,
        ]);

        // Team generale
        $generalTeam = Team::factory()->create([
            'name' => 'Team Generale',
            'personal_team' => false,
        ]);

        $this->command->info('   ✓ Creati 5 team di sistema');
    }
}
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $adminTeam = Team::factory()
            ->create([
                'name' => 'Amministratori',
                'personal_team' => false,
            ]);
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)

        // Team di sviluppo
        $devTeam = Team::factory()->create([
            'name' => 'Sviluppatori',
            'personal_team' => false,
        ]);

        // Team di supporto
        $supportTeam = Team::factory()->create([
            'name' => 'Supporto Clienti',
            'personal_team' => false,
        ]);

        // Team di marketing
        $marketingTeam = Team::factory()->create([
            'name' => 'Marketing',
            'personal_team' => false,
        ]);

        // Team generale
        $generalTeam = Team::factory()->create([
            'name' => 'Team Generale',
            'personal_team' => false,
        ]);

        $this->command->info('   ✓ Creati 5 team di sistema');
    }
}
<<<<<<< HEAD

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======

        // Team di sviluppo
        $devTeam = Team::factory()
            ->create([
                'name' => 'Sviluppatori',
                'personal_team' => false,
            ]);

        // Team di supporto
        $supportTeam = Team::factory()
            ->create([
                'name' => 'Supporto Clienti',
                'personal_team' => false,
            ]);

        // Team di marketing
        $marketingTeam = Team::factory()
            ->create([
                'name' => 'Marketing',
                'personal_team' => false,
            ]);

        // Team generale
        $generalTeam = Team::factory()
            ->create([
                'name' => 'Team Generale',
                'personal_team' => false,
            ]);

        $this->command->info("   ✓ Creati 5 team di sistema");
    }
}

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
