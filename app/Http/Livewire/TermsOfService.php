<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class TermsOfService extends Component
{
    public bool $accepted = false;

    /**
     * Show the terms of service for the application.
     */
    public function render(): View
    {
        // $this->accepted = true;
        $text = null;
        if (config('terms-of-service')) {
            $text = config('terms-of-service.text');
        }

<<<<<<< HEAD
        return view('user::livewire.terms-of-service', [
            'text' => $text,
        ]);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return view('user::livewire.terms-of-service', [
            'text' => $text,
        ]);
=======
=======
>>>>>>> origin/develop
        return view(
            'user::livewire.terms-of-service',
            [
                'text' => $text,
            ]
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        return view('user::livewire.terms-of-service', [
            'text' => $text,
        ]);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function testfunction(): void
    {
        dddx('wip');
    }
}
