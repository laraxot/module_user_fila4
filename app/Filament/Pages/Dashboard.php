<?php

/**
 * @see https://medium.com/@laravelprotips/filament-streamline-multiple-widgets-with-one-dynamic-livewire-filter-ed05c978a97f
 */

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\DatePicker;
=======
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use Modules\User\Filament\Widgets\RecentLoginsWidget;
use Modules\User\Filament\Widgets\UsersChartWidget;
use Modules\Xot\Filament\Pages\XotBaseDashboard;
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop

class Dashboard extends XotBaseDashboard
{
    // protected static string $routePath = 'finance';
    // protected static ?string $title = 'Finance dashboard';
    // protected static ?int $navigationSort = 15;

    // protected static string $view = 'user::filament.pages.dashboard';

    /**
     * @return array<class-string<Widget>|WidgetConfiguration>
     */
    public function getWidgets(): array
    {
        return [
            UsersChartWidget::make(['chart_id' => 'bb']),
            // Widgets\UsersChartWidget::make(['chart_id' => 'aa']),
            RecentLoginsWidget::class,
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD

    #[Override]
    public function getFiltersFormSchema(): array
    {
        return [
            DatePicker::make('startDate')->native(false),
            // ->maxDate(fn (\Filament\Schemas\Components\Utilities\Get $get) => $get('endDate') ?: now()),
            DatePicker::make('endDate')->native(false),
            // ->minDate(fn (\Filament\Schemas\Components\Utilities\Get $get) => $get('startDate') ?: now())
            // ->maxDate(now()),
        ];
    }
=======
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop
}
