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
<div>
@if (isset($profile) && $profile->isSuperAdmin())
    <x-filament::icon-button icon="fas-chess-king" class="h-5 w-5 text-gray-500 dark:text-gray-400"
        tooltip="Super Admin" wire:click="toggleSuperAdmin" />
@endif
@if (isset($profile) && $profile->isNegateSuperAdmin())
    <x-filament::icon-button icon="user-chess-king-negate" class="h-5 w-5 text-gray-500 dark:text-gray-400"
        tooltip="Negate Super Admin" wire:click="toggleSuperAdmin" />
@endif
</div>
