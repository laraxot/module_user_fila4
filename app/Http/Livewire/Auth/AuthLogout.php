<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

<<<<<<< HEAD
use Illuminate\Contracts\View\View;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
=======
<<<<<<< HEAD
use Illuminate\Contracts\View\View;
use Exception;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
=======
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
>>>>>>> b93ef594b4 (.)
=======
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class AuthLogout extends Component
{
    public function mount(): void
    {
        Auth::logout();
    }

<<<<<<< HEAD
    public function render(): View
    {
=======
<<<<<<< HEAD
    public function render(): View
    {
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $view = 'livewire.auth.logout';
        //@phpstan-ignore-next-line
        if (!view()->exists($view)) {
            throw new Exception("View {$view} not found");
        }
        $view_params = [];
        return view($view, $view_params);
<<<<<<< HEAD
=======
=======
        $view='livewire.auth.logout';
=======
        $view = 'livewire.auth.logout';
>>>>>>> b93ef594b4 (.)
        //@phpstan-ignore-next-line
        if (!view()->exists($view)) {
            throw new Exception("View {$view} not found");
        }
<<<<<<< HEAD
        $view_params=[];
        return view($view,$view_params);
>>>>>>> a12f125f4a (.)
=======
        $view_params = [];
        return view($view, $view_params);
>>>>>>> b93ef594b4 (.)
=======
    public function render(): \Illuminate\Contracts\View\View
    {
        $view='livewire.auth.logout';
        //@phpstan-ignore-next-line
        if(!view()->exists($view)){
            throw new \Exception("View $view not found");
        }
        $view_params=[];
        return view($view,$view_params);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
