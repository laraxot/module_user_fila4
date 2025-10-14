<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Override;

/**
 * UsersRelationManager.
 *
 * Manages the relationship between users and roles, providing functionality
 * for viewing, filtering, and managing users associated with a specific role.
 */
final class UsersRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'users';

    protected static ?string $inverseRelationship = 'roles';

    #[Override]
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->copyable(),
            TextColumn::make('email')
                ->searchable()
                ->sortable()
                ->copyable(),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(),
            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    #[Override]
    public function getTableFilters(): array
    {
        return [
            'active' => Filter::make('active')->query(fn (Builder $query): Builder => $query->where('is_active', true))->toggle(),
            'created_at' => Filter::make('created_at')
                ->schema([
                    DatePicker::make('created_from'),
                    DatePicker::make('created_until'),
                ])
                ->query(fn (Builder $query, array $data): Builder => $query
                    ->when(
                        $data['created_from'],
                        fn (Builder $query, mixed $date) => $query->whereDate('created_at', '>=', (string) $date)
                    )
                    ->when(
                        $data['created_until'],
                        fn (Builder $query, mixed $date) => $query->whereDate('created_at', '<=', (string) $date)
                    )
                )
                ->columns(2),
        ];
    }
}
