<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
<?php

declare(strict_types=1);

?>
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
<x-filament-panels::page>
    <x-filament-panels::form wire:submit="updateProfile">
        {{ $this->editProfileForm }}

        <x-filament-panels::form.actions :actions="$this->getUpdateProfileFormActions()" />
    </x-filament-panels::form>

    <x-filament-panels::form wire:submit="updatePassword">
        {{ $this->editPasswordForm }}

        <x-filament-panels::form.actions :actions="$this->getUpdatePasswordFormActions()" />
    </x-filament-panels::form>
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
</x-filament-panels::page>
