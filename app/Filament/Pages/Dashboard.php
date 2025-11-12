<?php

/**
 * @see https://medium.com/@laravelprotips/filament-streamline-multiple-widgets-with-one-dynamic-livewire-filter-ed05c978a97f
 */

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use Modules\User\Filament\Widgets;
use Modules\User\Filament\Widgets\RecentLoginsWidget;
use Modules\User\Filament\Widgets\UsersChartWidget;
use Modules\Xot\Filament\Pages\XotBaseDashboard;
use Override;

class Dashboard extends XotBaseDashboard
{
    
}
