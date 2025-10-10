<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\User\Providers\Filament;

<<<<<<< HEAD
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Override;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Navigation\MenuItem;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Modules\User\Filament\Pages\MyProfilePage;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'User';

<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function panel(Panel $panel): Panel
    {
        $panel = parent::panel($panel);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        FilamentView::registerRenderHook('panels::auth.login.form.after', static fn(): string => Blade::render(
            "@livewire('socialite.buttons')",
        ));

        /*-- moved into Gdpr
         * FilamentView::registerRenderHook(
         * 'panels::auth.login.form.after',
         * fn (): string => Blade::render('@livewire(\'terms-of-service\')'),
         * );
         */

        /* -- moved into Notify
         * DatabaseNotifications::trigger('notifications.database-notifications-trigger');
         * FilamentView::registerRenderHook(
         * 'panels::user-menu.before',
         * fn (): string => Blade::render('@livewire(\'database-notifications\')'),
         * );
         * //*/

        FilamentView::registerRenderHook('panels::user-menu.before', static fn(): string => Blade::render(
            "@livewire('team.change')",
        ));
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        FilamentView::registerRenderHook(
            'panels::auth.login.form.after',
            static fn (): string => Blade::render("@livewire('socialite.buttons')"),
        );
<<<<<<< HEAD
=======
        FilamentView::registerRenderHook('panels::auth.login.form.after', static fn(): string => Blade::render(
            "@livewire('socialite.buttons')",
        ));
>>>>>>> b93ef594b4 (.)

        /*-- moved into Gdpr
         * FilamentView::registerRenderHook(
         * 'panels::auth.login.form.after',
         * fn (): string => Blade::render('@livewire(\'terms-of-service\')'),
         * );
         */

        /* -- moved into Notify
         * DatabaseNotifications::trigger('notifications.database-notifications-trigger');
         * FilamentView::registerRenderHook(
         * 'panels::user-menu.before',
         * fn (): string => Blade::render('@livewire(\'database-notifications\')'),
         * );
         * //*/

<<<<<<< HEAD
=======

        /*-- moved into Gdpr
        FilamentView::registerRenderHook(
            'panels::auth.login.form.after',
            fn (): string => Blade::render('@livewire(\'terms-of-service\')'),
        );
        */

        /* -- moved into Notify
        DatabaseNotifications::trigger('notifications.database-notifications-trigger');
        FilamentView::registerRenderHook(
            'panels::user-menu.before',
            fn (): string => Blade::render('@livewire(\'database-notifications\')'),
        );
        //*/

>>>>>>> origin/develop
        FilamentView::registerRenderHook(
            'panels::user-menu.before',
            static fn (): string => Blade::render("@livewire('team.change')"),
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        FilamentView::registerRenderHook('panels::user-menu.before', static fn(): string => Blade::render(
            "@livewire('team.change')",
        ));
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        FilamentView::registerRenderHook(
            'panels::user-menu.before',
            // static fn (): string => View::make('user::badges.super-admin')->render(),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            static fn(): string => Blade::render("@livewire('profile.super-admin')"),
        );

        /*
         * $panel->renderHook(
         * 'panels::user-menu.before',
         * fn (): string => Blade::render('@livewire(\'team.change\')'),
         * );
         */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
            static fn (): string => Blade::render("@livewire('profile.super-admin')"),
        );

        /*
        $panel->renderHook(
            'panels::user-menu.before',
            fn (): string => Blade::render('@livewire(\'team.change\')'),
        );
        */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            static fn(): string => Blade::render("@livewire('profile.super-admin')"),
        );

        /*
         * $panel->renderHook(
         * 'panels::user-menu.before',
         * fn (): string => Blade::render('@livewire(\'team.change\')'),
         * );
         */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // $tenantId = request()->route()->parameter('tenant');
        // $profile_url = MyProfilePage::getUrl(panel: 'admin');
        // $panel->default();
        // $profile_url = MyProfilePage::getUrl(panel: 'admin');
        // $panel = $panel->pages([
        //     MyProfilePage::class,
        // ]);
        // $profile_url = '#';
        // $panel->userMenuItems([
        //     // 'account' => MenuItem::make()->url($profile_url),
        //     MenuItem::make()
<<<<<<< HEAD
        
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        
=======
        //
>>>>>>> a12f125f4a (.)
=======
        
>>>>>>> b93ef594b4 (.)
=======
        //
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        //         ->url(fn (): string => '#')
        //         ->icon('heroicon-m-cog-8-tooth'),
        // ]);

        return $panel;
    }
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
