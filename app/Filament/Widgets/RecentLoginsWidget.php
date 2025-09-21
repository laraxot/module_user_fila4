<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
>>>>>>> a12f125f4a (.)
=======
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\User\Models\AuthenticationLog;

class RecentLoginsWidget extends BaseWidget
{
<<<<<<< HEAD
    protected static null|string $heading = 'Recent Logins'; // Rendi static la proprietà
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|string $heading = 'Recent Logins'; // Rendi static la proprietà
=======
    protected static ?string $heading = 'Recent Logins'; // Rendi static la proprietà
>>>>>>> a12f125f4a (.)
=======
    protected static null|string $heading = 'Recent Logins'; // Rendi static la proprietà
>>>>>>> b93ef594b4 (.)
=======
    protected static ?string $heading = 'Recent Logins'; // Rendi static la proprietà
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    protected int|string|array $columnSpan = 'full';

    /**
     * Define the query to fetch recent logins.
     */
    protected function getTableQuery(): Builder|Relation|null
    {
        return AuthenticationLog::query()
            ->where('login_successful', true)
            ->orderBy('login_at', 'desc')
            ->limit(10); // Mostra gli ultimi 10 logins
    }

    /**
     * Define the columns to display in the table.
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            TextColumn::make('user'),
            TextColumn::make('login_at'),
            TextColumn::make('ip_address'),
            TextColumn::make('user_agent'),
<<<<<<< HEAD
=======
=======
            \Filament\Tables\Columns\TextColumn::make('user'),
            \Filament\Tables\Columns\TextColumn::make('login_at'),
            \Filament\Tables\Columns\TextColumn::make('ip_address'),
            \Filament\Tables\Columns\TextColumn::make('user_agent'),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
     * Optionally configure additional table settings.
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     *
     * @return array<string, Action|ActionGroup>
     */
    public function getTableActions(): array
    {
<<<<<<< HEAD
        return [];
=======
<<<<<<< HEAD
<<<<<<< HEAD
        return [];
=======
        return [
        ];
>>>>>>> a12f125f4a (.)
=======
        return [];
>>>>>>> b93ef594b4 (.)
=======
     * 
     * @return array<string, \Filament\Tables\Actions\Action|\Filament\Tables\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
        ];
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
