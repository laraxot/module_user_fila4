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
>>>>>>> 81efa49 (.)
<x-filament-panels::page>
    <x-filament-schemas::form wire:submit="updateProfile">
        {{ $this->editProfileForm }}

        <x-filament::actions :actions="$this->getUpdateProfileFormActions()" />
    </x-filament-schemas::form>

    <x-filament-schemas::form wire:submit="updatePassword">
        {{ $this->editPasswordForm }}

        <x-filament::actions :actions="$this->getUpdatePasswordFormActions()" />
    </x-filament-schemas::form>
<<<<<<< HEAD
=======
=======
=======
>>>>>>> b93ef594b4 (.)
<x-filament-panels::page>
    <x-filament-schemas::form wire:submit="updateProfile">
        {{ $this->editProfileForm }}

        <x-filament::actions :actions="$this->getUpdateProfileFormActions()" />
    </x-filament-schemas::form>

    <x-filament-schemas::form wire:submit="updatePassword">
        {{ $this->editPasswordForm }}

<<<<<<< HEAD
        <x-filament-panels::form.actions :actions="$this->getUpdatePasswordFormActions()" />
    </x-filament-panels::form>
>>>>>>> a12f125f4a (.)
=======
        <x-filament::actions :actions="$this->getUpdatePasswordFormActions()" />
    </x-filament-schemas::form>
>>>>>>> b93ef594b4 (.)
=======
<x-filament-panels::page>
    <x-filament-panels::form wire:submit="updateProfile">
        {{ $this->editProfileForm }}

        <x-filament-panels::form.actions :actions="$this->getUpdateProfileFormActions()" />
    </x-filament-panels::form>

    <x-filament-panels::form wire:submit="updatePassword">
        {{ $this->editPasswordForm }}

        <x-filament-panels::form.actions :actions="$this->getUpdatePasswordFormActions()" />
    </x-filament-panels::form>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
</x-filament-panels::page>
