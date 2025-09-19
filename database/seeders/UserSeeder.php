<?php

declare(strict_types=1);

namespace Modules\User\Database\Seeders;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Modules\User\Models\Role;
use Modules\User\Models\Permission;
use Modules\User\Models\Team;
use Illuminate\Support\Facades\DB;

/**
 * Seeder per il modulo User.
 * 
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD

=======
            
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
=======
            
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            // Role management
            'manage roles',
            'create roles',
            'edit roles',
            'delete roles',
            'view roles',
<<<<<<< HEAD
<<<<<<< HEAD
=======
            
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            // Permission management
            'manage permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',
            'view permissions',
<<<<<<< HEAD
<<<<<<< HEAD
=======
            
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            // Team management
            'manage teams',
            'create teams',
            'edit teams',
            'delete teams',
            'view teams',
            'join teams',
            'leave teams',
<<<<<<< HEAD
<<<<<<< HEAD
=======
            
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            // System settings
            'manage system settings',
            'view system settings',
            'manage modules',
            'view system logs',
            'manage backups',
<<<<<<< HEAD
<<<<<<< HEAD
=======
            
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD

=======
        
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
        $this->command->info('   ✓ Creati ' . count($systemPermissions) . ' permessi di sistema');
        $this->command->info('   ✓ Creati 4 ruoli di sistema (super-admin, system-admin, moderator, user)');
=======
        $this->command->info("   ✓ Creati " . count($systemPermissions) . " permessi di sistema");
        $this->command->info("   ✓ Creati 4 ruoli di sistema (super-admin, system-admin, moderator, user)");
>>>>>>> fbc8f8e (.)
=======
        $this->command->info('   ✓ Creati ' . count($systemPermissions) . ' permessi di sistema');
        $this->command->info('   ✓ Creati 4 ruoli di sistema (super-admin, system-admin, moderator, user)');
>>>>>>> 6d20fbe (.)
    }

    /**
     * Crea team di sistema.
     */
    private function seedSystemTeams(): void
    {
        $this->command->info('👥 Creazione team di sistema...');

        // Team di amministrazione
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        $adminTeam = Team::factory()->create([
            'name' => 'Amministratori',
            'personal_team' => false,
        ]);

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
        $adminTeam = Team::factory()
            ->create([
                'name' => 'Amministratori',
                'personal_team' => false,
            ]);

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

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
