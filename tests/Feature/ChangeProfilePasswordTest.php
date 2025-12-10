<?php

declare(strict_types=1);

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> fbc8f8e (.)
=======
use Illuminate\Support\Facades\Hash;
>>>>>>> 6d20fbe (.)
use Modules\User\Models\User;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
<<<<<<< HEAD

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;
=======
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\{actingAs, post};
>>>>>>> fbc8f8e (.)
=======

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;
>>>>>>> 6d20fbe (.)

use Tests\TestCase;
use Tests\TestCase;

uses(TestCase::class);

test('can change profile password', function (): void {
    // Crea un utente e un profilo
    /** @var UserContract&Authenticatable&Model $user */
    $user = User::factory()->create([
        'password' => bcrypt('old_password'),
    ]);

    $profileClass = XotData::make()->getProfileClass();
    /** @var ProfileContract $profile */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    $profile = $profileClass::factory()
        ->create([
            'user_id' => $user->id,
        ]);
<<<<<<< HEAD
=======
    $profile = $profileClass::factory()->create([
        'user_id' => $user->id,
    ]);
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

    // Simula l'autenticazione
    actingAs($user);

    // Esegui il cambio password
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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
    $response = post(route('filament.resources.profiles.change-password', [
        'record' => $profile->id,
    ]), [
        'current_password' => 'old_password',
        'new_password' => 'new_password',
        'new_password_confirmation' => 'new_password',
    ]);
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

    // Verifica che la risposta sia di successo
    $response->assertSuccessful();

    // Verifica che la password sia stata aggiornata
<<<<<<< HEAD
<<<<<<< HEAD
    expect(Hash::check('new_password', $user->fresh()?->password))->toBeTrue();
=======
    expect(Hash::check('new_password', $user->fresh()->password))->toBeTrue();
>>>>>>> fbc8f8e (.)
=======
    expect(Hash::check('new_password', $user->fresh()?->password))->toBeTrue();
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    $profile = $profileClass::factory()
        ->create([
            'user_id' => $user->id,
        ]);
<<<<<<< HEAD
=======
    $profile = $profileClass::factory()->create([
        'user_id' => $user->id,
    ]);
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

    // Simula l'autenticazione
    actingAs($user);

    // Prova a cambiare la password con la password corrente errata
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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
    $response = post(route('filament.resources.profiles.change-password', [
        'record' => $profile->id,
    ]), [
        'current_password' => 'wrong_password',
        'new_password' => 'new_password',
        'new_password_confirmation' => 'new_password',
    ]);
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

    // Verifica che la risposta contenga un errore
    $response->assertSessionHasErrors('current_password');

    // Verifica che la password non sia stata cambiata
<<<<<<< HEAD
<<<<<<< HEAD
    expect(Hash::check('old_password', $user->fresh()?->password))->toBeTrue();
});
=======
    expect(Hash::check('old_password', $user->fresh()->password))->toBeTrue();
}); 
>>>>>>> fbc8f8e (.)
=======
    expect(Hash::check('old_password', $user->fresh()?->password))->toBeTrue();
});
>>>>>>> 6d20fbe (.)
