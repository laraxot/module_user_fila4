<?php

<<<<<<< HEAD
declare(strict_types=1);


use Filament\Notifications\Actions\Action;
use Filament\Notifications\Livewire\Notifications;
use Filament\Notifications\Notification;
=======
use function Laravel\Folio\{middleware, name};
use Filament\Notifications\Notification;
use Filament\Notifications\Livewire\Notifications;
use Filament\Notifications\Actions\Action;
>>>>>>> fbc8f8e (.)
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\VerticalAlignment;
use Livewire\Volt\Component;
use Modules\Tenant\Services\TenantService;

<<<<<<< HEAD
use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

/** @var array */
//$middleware=TenantService::config('middleware');
//$base_middleware=Arr::get($middleware,'base',[]);
$base_middleware = [];
=======
/** @var array */
//$middleware=TenantService::config('middleware');
//$base_middleware=Arr::get($middleware,'base',[]);
$base_middleware=[];
>>>>>>> fbc8f8e (.)

name('home');
middleware($base_middleware);

<<<<<<< HEAD
new class extends Component {};
=======


new class extends Component
{
   
};
>>>>>>> fbc8f8e (.)

?>

<x-layouts.marketing>
    <div>
        {!! $_theme->showPageContent('home') !!}
    </div>
</x-layouts.marketing>
