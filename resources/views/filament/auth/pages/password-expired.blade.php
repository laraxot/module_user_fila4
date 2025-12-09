<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
<?php

declare(strict_types=1);

?>
<x-filament-panels::page>
    
    <x-filament-schemas::form wire:submit="resetPassword">
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-schemas::form>
<<<<<<< HEAD
=======
<x-filament-panels::page>
    
    <x-filament-panels::form wire:submit="resetPassword">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-panels::form>
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    
</x-filament-panels::page>
