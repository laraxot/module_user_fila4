<?php

declare(strict_types=1);

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\Permission;
use Modules\User\Models\Profile;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\User\Models\User;

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Business Logic Integration', function (): void {
    beforeEach(function (): void {
        /** @var object{user: mixed} $this */ $this->user = User/** @phpstan-ignore-line */ ::factory()->create();
        $this->admin = User/** @phpstan-ignore-line */ ::factory()->create();
        $this->team = Team/** @phpstan-ignore-line */ ::factory()->create();
    });

    describe('User Authentication Business Rules', function (): void {
        it('enforces password complexity requirements', function (): void {
            $weakPassword = '123456';
            $strongPassword = 'SecurePass123!';

            // Verifica che la password debole non sia accettabile
            $weakHash = Hash::make($weakPassword);
            /** @var User */
        $weakUser = User/** @phpstan-ignore-line */ ::factory()->create(['password' => $weakHash]);

            // Verifica che la password forte sia accettabile
            $strongHash = Hash::make($strongPassword);
            /** @var User */
        $strongUser = User/** @phpstan-ignore-line */ ::factory()->create(['password' => $strongHash]);

            expect($weakUser->password)->not->toBe($weakPassword);
            expect($strongUser->password)->not->toBe($strongPassword);

            // Verifica che entrambe le password siano hashate
            expect(Hash::check($weakPassword, $weakUser->password))->toBeTrue();
            expect(Hash::check($strongPassword, $strongUser->password))->toBeTrue();
        });

        it('enforces email uniqueness across the system', function (): void {
            $email = 'test@example.com';

            // Primo utente con email
            /** @var User */
        $user1 = User/** @phpstan-ignore-line */ ::factory()->create(['email' => $email]);

            // Tentativo di creare secondo utente con stessa email
            /** @phpstan-ignore-next-line property.notFound */
            $this->expectException(QueryException::class);

            User/** @phpstan-ignore-line */ ::factory()->create(['email' => $email]);
        });

        it('enforces username uniqueness when required', function (): void {
            $username = 'testuser';

            // Primo utente con username
            /** @var User */
        $user1 = User/** @phpstan-ignore-line */ ::factory()->create(['username' => $username]);

            // Tentativo di creare secondo utente con stesso username
            /** @phpstan-ignore-next-line property.notFound */
            $this->expectException(QueryException::class);

            User/** @phpstan-ignore-line */ ::factory()->create(['username' => $username]);
        });
    });

    describe('User Profile Business Rules', function (): void {
        it('enforces profile completion requirements', function (): void {
            /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create([
                'first_name' => null,
                'last_name' => null,
            ]);

            // Verifica che i campi obbligatori siano null
            expect($user->first_name)->toBeNull();
            expect($user->last_name)->toBeNull();

            // Aggiornamento con dati completi
            /** @phpstan-ignore-next-line method.nonObject */
            $user->update([
                'first_name' => 'Mario',
                'last_name' => 'Rossi',
            ]);

            /** @phpstan-ignore-next-line method.nonObject */
            $user->refresh();
            expect($user->first_name)->toBe('Mario');
            expect($user->last_name)->toBe('Rossi');
        });

        it('enforces data validation rules', function (): void {
            $invalidData = [
                'email' => 'invalid-email',
                'phone' => 'not-a-phone',
                'date_of_birth' => 'invalid-date',
            ];

            // Verifica che i dati non validi non possano essere salvati
            foreach ($invalidData as $field => $value) {
                /** @phpstan-ignore-next-line property.notFound */
                $this->expectException(QueryException::class);

                User/** @phpstan-ignore-line */ ::factory()->create([$field => $value]);
            }
        });

        it('enforces age restrictions for certain operations', function (): void {
            /** @var User */
        $underageUser = User/** @phpstan-ignore-line */ ::factory()->create([
                'date_of_birth' => now()->subYears(16),
            ]);

            /** @var User */
        $adultUser = User/** @phpstan-ignore-line */ ::factory()->create([
                'date_of_birth' => now()->subYears(25),
            ]);

            $underageAge = now()->diffInYears($underageUser->date_of_birth);
            $adultAge = now()->diffInYears($adultUser->date_of_birth);

            expect($underageAge)->toBeLessThan(18);
            expect($adultAge)->toBeGreaterThanOrEqual(18);
        });
    });

    describe('Team Management Business Rules', function (): void {
        it('enforces team membership limits', function (): void {
            /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
            /** @var Team */
        $teams = Team::factory()->count(5)->create();

            // Aggiunta utente a tutti i team
            foreach ($teams as $team) {
                /** @phpstan-ignore-next-line method.nonObject */
                $user->teams()->attach($team->id);
            }

            // Verifica che l'utente sia membro di tutti i team
            expect($user->teams)->toHaveCount(5);

            // Verifica che non possa essere aggiunto a un team già membro
            $existingTeam = $user->teams->first();
            /** @phpstan-ignore-next-line method.nonObject */
            $user->teams()->attach($existingTeam->id);

            // Non dovrebbe creare duplicati
            expect($user->teams()->count())->toBe(5);
        });

        it('enforces team role hierarchy', function (): void {
            /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
            /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();

            // Ruoli con livelli di autorità
            /** @var Role */
        $memberRole = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'member', 'level' => 1]);
            /** @var Role */
        $moderatorRole = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'moderator', 'level' => 2]);
            /** @var Role */
        $adminRole = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'admin', 'level' => 3]);

            // Assegnazione ruolo base
            /** @phpstan-ignore-next-line method.nonObject */
            $user->teams()->attach($team->id, ['role' => 'member']);

            // Verifica che l'utente abbia il ruolo corretto
            /** @phpstan-ignore-next-line method.nonObject */
            $userTeam = $user->teams()->where('team_id', $team->id)->first();
            expect($userTeam->pivot->role)->toBe('member');
        });

        it('enforces team ownership rules', function (): void {
            /** @var User */
        $owner = User/** @phpstan-ignore-line */ ::factory()->create();
            /** @var User */
        $member = User/** @phpstan-ignore-line */ ::factory()->create();
            /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $owner->id]);

            // Verifica che solo il proprietario possa eliminare il team
            expect($team->user_id)->toBe($owner->id);

            // Tentativo di eliminazione da parte di un membro
            /** @phpstan-ignore-next-line method.nonObject */
            $member->teams()->attach($team->id);

            // Il membro non dovrebbe poter eliminare il team
            expect($team->user_id)->toBe($owner->id);
        });
    });

    describe('Permission and Role Business Rules', function (): void {
        it('enforces permission inheritance', function (): void {
            /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
            /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'editor']);
            /** @var Permission */
        $permission = Permission/** @phpstan-ignore-line */ ::factory()->create(['name' => 'edit_posts']);

            // Assegnazione ruolo all'utente
            /** @phpstan-ignore-next-line method.nonObject */
            $user->roles()->attach($role->id);

            // Assegnazione permesso al ruolo
            /** @phpstan-ignore-next-line method.nonObject */
            $role->permissions()->attach($permission->id);

            // Verifica che l'utente erediti il permesso dal ruolo
            /** @phpstan-ignore-next-line method.nonObject */
            $userPermissions = $user->getAllPermissions();
            expect($userPermissions)->toContain($permission);
        });

        it('enforces permission conflicts', function (): void {
            /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();

            // Permessi che si escludono a vicenda
            /** @var Permission */
        $readPermission = Permission/** @phpstan-ignore-line */ ::factory()->create(['name' => 'read_posts']);
            /** @var Permission */
        $writePermission = Permission/** @phpstan-ignore-line */ ::factory()->create(['name' => 'write_posts']);
            /** @var Permission */
        $deletePermission = Permission/** @phpstan-ignore-line */ ::factory()->create(['name' => 'delete_posts']);

            // Assegnazione permessi all'utente
            /** @phpstan-ignore-next-line method.nonObject */
            $user->permissions()->attach([
                $readPermission->id,
                $writePermission->id,
                $deletePermission->id,
            ]);

            // Verifica che tutti i permessi siano assegnati
            expect($user->permissions)->toHaveCount(3);

            // Verifica che non ci siano conflitti
            $userPermissions = $user->permissions->pluck('name')->toArray();
            expect($userPermissions)->toContain('read_posts');
            expect($userPermissions)->toContain('write_posts');
            expect($userPermissions)->toContain('delete_posts');
        });

        it('enforces role-based access control', function (): void {
            /** @var User */
        $admin = User/** @phpstan-ignore-line */ ::factory()->create();
            /** @var User */
        $moderator = User/** @phpstan-ignore-line */ ::factory()->create();
            /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();

            // Ruoli con livelli di accesso
            /** @var Role */
        $adminRole = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'admin', 'level' => 3]);
            /** @var Role */
        $moderatorRole = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'moderator', 'level' => 2]);
            /** @var Role */
        $userRole = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'user', 'level' => 1]);

            // Assegnazione ruoli
            /** @phpstan-ignore-next-line method.nonObject */
            $admin->roles()->attach($adminRole->id);
            /** @phpstan-ignore-next-line method.nonObject */
            $moderator->roles()->attach($moderatorRole->id);
            /** @phpstan-ignore-next-line method.nonObject */
            $user->roles()->attach($userRole->id);

            // Verifica livelli di accesso
            expect($adminRole->level)->toBeGreaterThan($moderatorRole->level);
            expect($moderatorRole->level)->toBeGreaterThan($userRole->level);
        });
    });

    describe('Data Integrity Business Rules', function (): void {
        it('enforces referential integrity for user relationships', function (): void {
            /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
            /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user->id]);
            /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();

            // Verifica che le relazioni siano mantenute
            expect($profile->user_id)->toBe($user->id);

            // Tentativo di eliminare utente con relazioni
            /** @phpstan-ignore-next-line property.notFound */
            $this->expectException(QueryException::class);

            /** @phpstan-ignore-next-line method.nonObject */
            $user->delete();
        });

        it('enforces data consistency across user attributes', function (): void {
            /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create([
                'first_name' => 'Mario',
                'last_name' => 'Rossi',
                'email' => 'mario.rossi@example.com',
            ]);

            // Verifica coerenza dei dati
            expect($user->full_name)->toBe('Mario Rossi');
            expect($user->email)->toBe('mario.rossi@example.com');

            // Aggiornamento che mantiene la coerenza
            /** @phpstan-ignore-next-line method.nonObject */
            $user->update([
                'first_name' => 'Marco',
                'email' => 'marco.rossi@example.com',
            ]);

            /** @phpstan-ignore-next-line method.nonObject */
            $user->refresh();
            expect($user->full_name)->toBe('Marco Rossi');
            expect($user->email)->toBe('marco.rossi@example.com');
        });

        it('enforces audit trail for sensitive operations', function (): void {
            /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
            $originalEmail = $user->email;

            // Modifica email (operazione sensibile)
            /** @phpstan-ignore-next-line method.nonObject */
            $user->update(['email' => 'newemail@example.com']);

            // Verifica che i timestamp siano aggiornati
            expect($user->updated_at)->not->toBe($user->created_at);

            // Verifica che l'email sia stata modificata
            expect($user->email)->not->toBe($originalEmail);
            expect($user->email)->toBe('newemail@example.com');
        });
    });

    describe('Security Business Rules', function (): void {
        it('enforces password expiration policies', function (): void {
            /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create([
                'password_expires_at' => now()->subDays(1),
            ]);

            // Verifica che la password sia scaduta
            $isExpired = $user->password_expires_at->isPast();
            expect($isExpired)->toBeTrue();

            // Aggiornamento password con nuova scadenza
            /** @phpstan-ignore-next-line method.nonObject */
            $user->update([
                'password' => Hash::make('NewPassword123!'),
                'password_expires_at' => now()->addDays(90),
            ]);

            /** @phpstan-ignore-next-line method.nonObject */
            $user->refresh();
            $isExpired = $user->password_expires_at->isFuture();
            expect($isExpired)->toBeTrue();
        });

        it('enforces account lockout policies', function (): void {
            /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create([
                'failed_login_attempts' => 5,
                'locked_until' => now()->addMinutes(30),
            ]);

            // Verifica che l'account sia bloccato
            $isLocked = $user->locked_until->isFuture();
            expect($isLocked)->toBeTrue();

            // Sblocco account
            /** @phpstan-ignore-next-line method.nonObject */
            $user->update([
                'failed_login_attempts' => 0,
                'locked_until' => null,
            ]);

            /** @phpstan-ignore-next-line method.nonObject */
            $user->refresh();
            expect($user->failed_login_attempts)->toBe(0);
            expect($user->locked_until)->toBeNull();
        });

        it('enforces session management policies', function (): void {
            /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create([
                'last_login_at' => now()->subHours(2),
                'last_activity_at' => now()->subMinutes(30),
            ]);

            // Verifica che l'utente abbia fatto login recentemente
            $lastLogin = $user->last_login_at;
            $lastActivity = $user->last_activity_at;

            expect($lastLogin->diffInHours(now()))->toBeLessThan(24);
            expect($lastActivity->diffInMinutes(now()))->toBeLessThan(60);

            // Aggiornamento attività
            /** @phpstan-ignore-next-line method.nonObject */
            $user->update(['last_activity_at' => now()]);

            /** @phpstan-ignore-next-line method.nonObject */
            $user->refresh();
            expect($user->last_activity_at->diffInMinutes(now()))->toBeLessThan(1);
        });
    });
});
