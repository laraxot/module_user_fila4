<?php

/**
 * @see https://medium.com/@laravelprotips/filament-streamline-multiple-widgets-with-one-dynamic-livewire-filter-ed05c978a97f
 */

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Widgets\UsersChartWidget;
use Modules\User\Filament\Widgets\RecentLoginsWidget;
=======
<<<<<<< HEAD
use Modules\User\Filament\Widgets\UsersChartWidget;
use Modules\User\Filament\Widgets\RecentLoginsWidget;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Override;
use Filament\Forms\Components\DatePicker;
<<<<<<< HEAD
use Filament\Schemas\Components\Section;
=======
use Filament\Forms\Components\Section;
>>>>>>> 4b219c8 (.)
use Filament\Schemas\Schema;
use Filament\Forms\Get;
use Filament\Pages\Dashboard as BaseBashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use Modules\User\Filament\Widgets;
use Modules\Xot\Filament\Pages\XotBaseDashboard;

class Dashboard extends XotBaseDashboard
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';

<<<<<<< HEAD
=======
=======
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Widgets\Widget;
use Modules\User\Filament\Widgets;
use Filament\Forms\Components\Section;
=======
use Override;
>>>>>>> b93ef594b4 (.)
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard as BaseBashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use Modules\User\Filament\Widgets;
use Modules\Xot\Filament\Pages\XotBaseDashboard;

class Dashboard extends XotBaseDashboard
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Widgets\Widget;
use Modules\User\Filament\Widgets;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Widgets\WidgetConfiguration;
use Filament\Pages\Dashboard as BaseBashboard;
use Modules\Xot\Filament\Pages\XotBaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends XotBaseDashboard
{
    

    protected static ?string $navigationIcon = 'heroicon-o-home';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            UsersChartWidget::make(['chart_id' => 'bb']),
            // Widgets\UsersChartWidget::make(['chart_id' => 'aa']),
            RecentLoginsWidget::class,
        ];
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function getFiltersFormSchema(): array
    {
        return [
            DatePicker::make('startDate')->native(false),
<<<<<<< HEAD
            // ->maxDate(fn (\Filament\Schemas\Components\Utilities\Get $get) => $get('endDate') ?: now()),
            DatePicker::make('endDate')->native(false),
            // ->minDate(fn (\Filament\Schemas\Components\Utilities\Get $get) => $get('startDate') ?: now())
=======
            // ->maxDate(fn (Get $get) => $get('endDate') ?: now()),
            DatePicker::make('endDate')->native(false),
            // ->minDate(fn (Get $get) => $get('startDate') ?: now())
>>>>>>> 4b219c8 (.)
            // ->maxDate(now()),
        ];
    }
<<<<<<< HEAD
=======
=======
    public function getFiltersFormSchema():array{
=======
    #[Override]
    public function getFiltersFormSchema(): array
    {
>>>>>>> b93ef594b4 (.)
        return [
            DatePicker::make('startDate')->native(false),
            // ->maxDate(fn (Get $get) => $get('endDate') ?: now()),
            DatePicker::make('endDate')->native(false),
            // ->minDate(fn (Get $get) => $get('startDate') ?: now())
            // ->maxDate(now()),
        ];
    }
<<<<<<< HEAD

    
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
            Widgets\UsersChartWidget::make(['chart_id' => 'bb']),
            // Widgets\UsersChartWidget::make(['chart_id' => 'aa']),
            Widgets\RecentLoginsWidget::class,
        ];
    }

    public function getFiltersFormSchema():array{
        return [
            DatePicker::make('startDate')
                            ->native(false)
                        // ->maxDate(fn (Get $get) => $get('endDate') ?: now()),
                        ,
                        DatePicker::make('endDate')
                            ->native(false)
                        // ->minDate(fn (Get $get) => $get('startDate') ?: now())
                        // ->maxDate(now()),
                        ,
        ];
    }

    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
