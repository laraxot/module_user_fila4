<?php
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

declare(strict_types=1);


<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Livewire\Volt\Component;

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use function Laravel\Folio\render;
use function Laravel\Folio\withTrashed;
<<<<<<< HEAD
=======
=======
use Livewire\Volt\Component;

use function Laravel\Folio\{withTrashed, middleware, name, render};
>>>>>>> a12f125f4a (.)
=======
use Livewire\Volt\Component;

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use function Laravel\Folio\render;
use function Laravel\Folio\withTrashed;
>>>>>>> b93ef594b4 (.)
=======
use Livewire\Volt\Component;

use function Laravel\Folio\{withTrashed, middleware, name, render};
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

//withTrashed();
middleware(['auth']);
name('errors.password-expired');
//Expression "new class extends \Livewire\Volt\Component…" on a separate line does not do anything.
// @phpstan-ignore expr.resultUnused
<<<<<<< HEAD
new class() extends Component {};
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
new class() extends Component {};
=======
new class () extends Component {};
>>>>>>> a12f125f4a (.)
=======
new class() extends Component {};
>>>>>>> b93ef594b4 (.)
=======
new class () extends Component {};
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

?>
<x-layouts.marketing>
    {{--  
    @volt('errors.password-expired')
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 py-12">
        <h1>..</h1>
        
        
    </div>
    @endvolt
    --}}
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-md">

            @livewire(\Modules\User\Filament\Widgets\PasswordExpiredWidget::class)
        </div>
    </div>
</x-layouts.marketing>
