<?php

declare(strict_types=1);

<<<<<<< HEAD
use Tests\TestCase;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
=======
<<<<<<< HEAD
use Tests\TestCase;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Support\Facades\Hash;
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Modules\User\Models\User;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

uses(TestCase::class);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;
=======
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\{actingAs, post};
>>>>>>> a12f125f4a (.)
=======

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;
>>>>>>> b93ef594b4 (.)

uses(TestCase::class);
=======
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\{actingAs, post};

uses(Tests\TestCase::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

test('can change profile password', function (): void {
    // Crea un utente e un profilo
    /** @var UserContract&Authenticatable&Model $user */
    $user = User::factory()->create([
        'password' => bcrypt('old_password'),
    ]);

    $profileClass = XotData::make()->getProfileClass();
    /** @var ProfileContract $profile */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    $profile = $profileClass::factory()
        ->create([
            'user_id' => $user->id,
        ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    $profile = $profileClass::factory()->create([
        'user_id' => $user->id,
    ]);
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    $profile = $profileClass::factory()->create([
        'user_id' => $user->id,
    ]);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    // Simula l'autenticazione
    actingAs($user);

    // Esegui il cambio password
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    $response = post(
        route('filament.resources.profiles.change-password', [
            'record' => $profile->id,
        ]),
        [
            'current_password' => 'old_password',
            'new_password' => 'new_password',
            'new_password_confirmation' => 'new_password',
        ],
    );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
    $response = post(route('filament.resources.profiles.change-password', [
        'record' => $profile->id,
    ]), [
        'current_password' => 'old_password',
        'new_password' => 'new_password',
        'new_password_confirmation' => 'new_password',
    ]);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    // Verifica che la risposta sia di successo
    $response->assertSuccessful();

    // Verifica che la password sia stata aggiornata
<<<<<<< HEAD
    expect(Hash::check('new_password', $user->fresh()?->password))->toBeTrue();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    expect(Hash::check('new_password', $user->fresh()?->password))->toBeTrue();
=======
    expect(Hash::check('new_password', $user->fresh()->password))->toBeTrue();
>>>>>>> a12f125f4a (.)
=======
    expect(Hash::check('new_password', $user->fresh()?->password))->toBeTrue();
>>>>>>> b93ef594b4 (.)
=======
    expect(Hash::check('new_password', $user->fresh()->password))->toBeTrue();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('cannot change password with wrong current password', function (): void {
    // Crea un utente e un profilo
    /** @var UserContract&Authenticatable&Model $user */
    $user = User::factory()->create([
        'password' => bcrypt('old_password'),
    ]);

    $profileClass = XotData::make()->getProfileClass();
    /** @var ProfileContract $profile */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    $profile = $profileClass::factory()
        ->create([
            'user_id' => $user->id,
        ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    $profile = $profileClass::factory()->create([
        'user_id' => $user->id,
    ]);
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    $profile = $profileClass::factory()->create([
        'user_id' => $user->id,
    ]);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    // Simula l'autenticazione
    actingAs($user);

    // Prova a cambiare la password con la password corrente errata
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    $response = post(
        route('filament.resources.profiles.change-password', [
            'record' => $profile->id,
        ]),
        [
            'current_password' => 'wrong_password',
            'new_password' => 'new_password',
            'new_password_confirmation' => 'new_password',
        ],
    );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
    $response = post(route('filament.resources.profiles.change-password', [
        'record' => $profile->id,
    ]), [
        'current_password' => 'wrong_password',
        'new_password' => 'new_password',
        'new_password_confirmation' => 'new_password',
    ]);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    // Verifica che la risposta contenga un errore
    $response->assertSessionHasErrors('current_password');

    // Verifica che la password non sia stata cambiata
<<<<<<< HEAD
    expect(Hash::check('old_password', $user->fresh()?->password))->toBeTrue();
});
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    expect(Hash::check('old_password', $user->fresh()?->password))->toBeTrue();
});
=======
    expect(Hash::check('old_password', $user->fresh()->password))->toBeTrue();
}); 
>>>>>>> a12f125f4a (.)
=======
    expect(Hash::check('old_password', $user->fresh()?->password))->toBeTrue();
});
>>>>>>> b93ef594b4 (.)
=======
    expect(Hash::check('old_password', $user->fresh()->password))->toBeTrue();
}); 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
