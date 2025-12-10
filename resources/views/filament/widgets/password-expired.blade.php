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
<x-filament-widgets::widget>
    <div class="text-center mb-4">
        <div class="flex justify-center">
            <x-filament::icon
               icon="heroicon-o-exclamation-circle"
               class="h-16 w-16 text-red-500 dark:text-red-400 mt-4" 
            />
        </div>
        <h1 class="mt-4 text-2xl font-bold text-gray-800">{{ __('user::password_expired.title') }}</h1>
        <p class="mt-2 text-gray-600">{{ __('user::password_expired.sub_heading') }}</p>
    </div>
    
<<<<<<< HEAD
    <x-filament-schemas::form wire:submit="resetPassword">
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    <x-filament-schemas::form wire:submit="resetPassword">
=======
    <x-filament-panels::form wire:submit="resetPassword">
>>>>>>> a12f125f4a (.)
=======
    <x-filament-schemas::form wire:submit="resetPassword">
>>>>>>> b93ef594b4 (.)
=======
    <x-filament-panels::form wire:submit="resetPassword">
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        {{ $this->form }}
        
        <x-filament::button type="submit" class="mt-4">
            @lang('user::password_expired.actions.reset_password.label') <x-filament::loading-indicator class="h-5 w-5" wire:loading wire:target="submit"/>
        </x-filament::button>
<<<<<<< HEAD
    </x-filament-schemas::form>
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    </x-filament-schemas::form>
=======
    </x-filament-panels::form>
>>>>>>> a12f125f4a (.)
=======
    </x-filament-schemas::form>
>>>>>>> b93ef594b4 (.)
=======
    </x-filament-panels::form>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
</x-filament-widgets::widget>
