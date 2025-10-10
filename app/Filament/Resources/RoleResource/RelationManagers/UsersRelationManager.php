<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Filters\BaseFilter;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
<<<<<<< HEAD
=======
=======
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Filters\BaseFilter;
>>>>>>> a12f125f4a (.)
=======
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Filters\BaseFilter;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\TransTrait;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop








<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
/**
 * UsersRelationManager.
 *
 * Manages the relationship between users and roles, providing functionality
 * for viewing, filtering, and managing users associated with a specific role.
 */
final class UsersRelationManager extends XotBaseRelationManager
{
<<<<<<< HEAD
    protected static string $relationship = 'users';

    protected static null|string $inverseRelationship = 'roles';
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static string $relationship = 'users';

    protected static null|string $inverseRelationship = 'roles';
=======
=======
>>>>>>> origin/develop

    protected static string $relationship = 'users';

    protected static ?string $inverseRelationship = 'roles';





<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    protected static string $relationship = 'users';

    protected static null|string $inverseRelationship = 'roles';
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Returns the form schema structure, defining the input fields for user data.
     *
<<<<<<< HEAD
     * @return array<\Filament\Schemas\Components\Component>
     */
=======
<<<<<<< HEAD
     * @return array<\Filament\Schemas\Components\Component>
     */
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required()->maxLength(255),
<<<<<<< HEAD
=======
=======
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required()->maxLength(255),
>>>>>>> b93ef594b4 (.)
=======
     * @return array<Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // Additional fields can be added here as necessary
        ];
    }

    /**
     * Defines the columns displayed in the users list table.
     *
<<<<<<< HEAD
     * @return array<Tables\Columns\Column|Component>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return array<Tables\Columns\Column|Component>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return array<Tables\Columns\Column|Tables\Columns\Layout\Component>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
=======

=======
>>>>>>> b93ef594b4 (.)
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
<<<<<<< HEAD

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======

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

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    /**
     * Configures available filters for the table, enabling users to refine their view.
     *
<<<<<<< HEAD
     * @return array<BaseFilter>
     */
=======
<<<<<<< HEAD
     * @return array<BaseFilter>
     */
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function getTableFilters(): array
    {
        return [
            Filter::make('active')->query(fn(Builder $query): Builder => $query->where('is_active', true))->toggle(),
            Filter::make('created_at')
<<<<<<< HEAD
=======
=======
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
    public function getTableFilters(): array
    {
        return [
            Filter::make('active')->query(fn(Builder $query): Builder => $query->where('is_active', true))->toggle(),
            Filter::make('created_at')
<<<<<<< HEAD

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                ->schema([
                    DatePicker::make('created_from'),
                    DatePicker::make('created_until'),
                ])
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                ->query(fn(Builder $query, array $data): Builder => $query->when($data['created_from'], fn(
                    Builder $query,
                    $date,
                ) => $query->whereDate('created_at', '>=', $date))->when($data['created_until'], fn(
                    Builder $query,
                    $date,
                ) => $query->whereDate('created_at', '<=', $date)))
<<<<<<< HEAD
                ->columns(2),
        ];
    }
=======
<<<<<<< HEAD
                ->columns(2),
        ];
    }
=======
=======
     * @return array<Tables\Filters\BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [
            Filter::make('active')

                ->query(fn (Builder $query): Builder => $query->where('is_active', true))
                ->toggle(),

            Filter::make('created_at')

                ->form([
                    Forms\Components\DatePicker::make('created_from'),
                    Forms\Components\DatePicker::make('created_until'),
                ])
>>>>>>> origin/develop
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when($data['created_from'], fn (Builder $query, $date) => $query->whereDate('created_at', '>=', $date))
                        ->when($data['created_until'], fn (Builder $query, $date) => $query->whereDate('created_at', '<=', $date));
                })
                ->columns(2),
        ];
    }






<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
                ->columns(2),
        ];
    }
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
