<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

abstract class BaseAuthWidget extends Widget
{
<<<<<<< HEAD
    public null|array $data = [];
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public null|array $data = [];
=======
    public ?array $data = [];
>>>>>>> a12f125f4a (.)
=======
    public null|array $data = [];
>>>>>>> b93ef594b4 (.)
=======
    public ?array $data = [];
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    public function mount(): void
    {
        if (Auth::check()) {
            redirect()->intended(route('dashboard'));
        }
    }

    /**
     * Restituisce i dati per la view.
     * In Filament v3/Xot, il form va gestito tramite getFormSchema().
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [
            'form' => $this->getFormSchema(),
        ];
    }

    /**
     * Restituisce lo schema del form per l'autenticazione.
     * Deve essere implementato dalle classi concrete.
     *
     * @return array<mixed>
     */
    abstract protected function getFormSchema(): array;
}
