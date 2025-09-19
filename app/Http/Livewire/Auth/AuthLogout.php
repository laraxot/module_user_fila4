<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Exception;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
=======
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
>>>>>>> fbc8f8e (.)
=======
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
>>>>>>> 6d20fbe (.)

class AuthLogout extends Component
{
    public function mount(): void
    {
        Auth::logout();
    }

    public function render(): View
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        $view = 'livewire.auth.logout';
        //@phpstan-ignore-next-line
        if (!view()->exists($view)) {
            throw new Exception("View {$view} not found");
        }
        $view_params = [];
        return view($view, $view_params);
<<<<<<< HEAD
=======
        $view='livewire.auth.logout';
        //@phpstan-ignore-next-line
        if(!view()->exists($view)){
            throw new Exception("View $view not found");
        }
        $view_params=[];
        return view($view,$view_params);
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    }
}
