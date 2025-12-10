<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
declare(strict_types=1);


use Filament\Notifications\Actions\Action;
use Filament\Notifications\Livewire\Notifications;
use Filament\Notifications\Notification;
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
use function Laravel\Folio\{middleware, name};
use Filament\Notifications\Notification;
use Filament\Notifications\Livewire\Notifications;
use Filament\Notifications\Actions\Action;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
declare(strict_types=1);


use Filament\Notifications\Actions\Action;
use Filament\Notifications\Livewire\Notifications;
use Filament\Notifications\Notification;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\VerticalAlignment;
use Livewire\Volt\Component;
use Modules\Tenant\Services\TenantService;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

/** @var array */
//$middleware=TenantService::config('middleware');
//$base_middleware=Arr::get($middleware,'base',[]);
$base_middleware = [];
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
/** @var array */
//$middleware=TenantService::config('middleware');
//$base_middleware=Arr::get($middleware,'base',[]);
$base_middleware=[];
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

/** @var array */
//$middleware=TenantService::config('middleware');
//$base_middleware=Arr::get($middleware,'base',[]);
$base_middleware = [];
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

name('home');
middleware($base_middleware);

<<<<<<< HEAD
new class extends Component {};
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
new class extends Component {};
=======
=======
>>>>>>> origin/develop


new class extends Component
{
   
};
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
new class extends Component {};
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

?>

<x-layouts.marketing>
    <div>
        {!! $_theme->showPageContent('home') !!}
    </div>
</x-layouts.marketing>
