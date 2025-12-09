<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Tenant\Services\TenantService;

use function Safe\file_get_contents;

use Webmozart\Assert\Assert;

class PrivacyPolicy extends Component
{
    /**
     * Show the terms of service for the application.
     */
    public function render(): View
    {
        Assert::string($policyFile = TenantService::localizedMarkdownPath('policy.md'), 'wip');
        /**
         * @phpstan-var view-string
         */
        $view_name = 'filament-jet::livewire.privacy-policy';
        $view_params = [
            'terms' => Str::markdown(file_get_contents($policyFile)),
        ];
        $view = view($view_name, $view_params);

<<<<<<< HEAD
        $view->layout('filament::components.layouts.base', [
            'title' => __('filament-jet::registration.privacy_policy'),
        ]);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $view->layout('filament::components.layouts.base', [
            'title' => __('filament-jet::registration.privacy_policy'),
        ]);
=======
=======
>>>>>>> origin/develop
        $view->layout(
            'filament::components.layouts.base',
            [
                'title' => __('filament-jet::registration.privacy_policy'),
            ]
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $view->layout('filament::components.layouts.base', [
            'title' => __('filament-jet::registration.privacy_policy'),
        ]);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        return $view;
    }
}
