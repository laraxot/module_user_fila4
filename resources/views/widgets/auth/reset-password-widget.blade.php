<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
<?php

declare(strict_types=1);

?>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
@php
    $form = $getForm();
@endphp

<div class="space-y-6">
    <div class="text-center">
        <h2 class="text-2xl font-bold tracking-tight">
            {{ __('user::auth.reset-password.title') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            {{ __('user::auth.reset-password.subtitle') }}
        </p>
    </div>

    <form wire:submit="resetPassword" class="space-y-6">
        {{ $form }}

        <div>
            <x-filament::button
                type="submit"
                class="w-full"
            >
                {{ __('user::auth.reset-password.submit') }}
            </x-filament::button>
        </div>
    </form>
</div>
