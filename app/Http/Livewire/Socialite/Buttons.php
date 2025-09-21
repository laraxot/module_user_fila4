<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Socialite;

use Illuminate\View\View;
use Livewire\Component;

class Buttons extends Component
{
    /**
     * Renders the Livewire component for socialite login buttons.
     *
     * @return View the view to be rendered
     */
    public function render(): View
    {
        // $providers = FilamentSocialite::getProviderButtons();
        // Fetch the list of socialite providers from the configuration file.
        $providers = config('filament-socialite.providers');

        // If the providers configuration is not an array, initialize it as an empty array.
<<<<<<< HEAD
        if (!is_array($providers)) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (!is_array($providers)) {
=======
        if (! is_array($providers)) {
>>>>>>> a12f125f4a (.)
=======
        if (!is_array($providers)) {
>>>>>>> b93ef594b4 (.)
=======
        if (! is_array($providers)) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            $providers = [];
        }

        // Return the view with the list of providers.
<<<<<<< HEAD
        return view('user::livewire.socialite.buttons', [
            'providers' => $providers,
        ]);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return view('user::livewire.socialite.buttons', [
            'providers' => $providers,
        ]);
=======
=======
>>>>>>> origin/develop
        return view(
            'user::livewire.socialite.buttons',
            [
                'providers' => $providers,
            ]
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        return view('user::livewire.socialite.buttons', [
            'providers' => $providers,
        ]);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
