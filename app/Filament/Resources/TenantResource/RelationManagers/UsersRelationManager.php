<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Schemas\Components\Component;
use Filament\Tables\Columns\Column;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
<<<<<<< HEAD
=======
=======
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\Column;
>>>>>>> a12f125f4a (.)
=======
use Filament\Schemas\Components\Component;
use Filament\Tables\Columns\Column;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Traits\HasXotTable;

class UsersRelationManager extends XotBaseRelationManager
{
    use HasXotTable;

    protected static string $relationship = 'users';

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    protected static null|string $recordTitleAttribute = 'name';

    /**
     * @return array<Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required()->maxLength(255),
<<<<<<< HEAD
            TextInput::make('email')
=======
=======
    protected static ?string $recordTitleAttribute = 'name';
=======
    protected static null|string $recordTitleAttribute = 'name';
>>>>>>> b93ef594b4 (.)

    /**
     * @return array<Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
            TextInput::make('name')
                ->required()
                ->maxLength(255),

>>>>>>> a12f125f4a (.)
=======
            TextInput::make('name')->required()->maxLength(255),
>>>>>>> b93ef594b4 (.)
            TextInput::make('email')
=======
    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @return array<Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ->email()
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            DateTimePicker::make('email_verified_at')->nullable(),
            TextInput::make('password')
                ->password()
                ->required(fn($context) => $context === 'create')
                ->minLength(8)
                ->same('password_confirmation')
                ->dehydrated(filled(...))
                ->dehydrateStateUsing(bcrypt(...)),
            TextInput::make('password_confirmation')
                ->password()
                ->required(fn($context) => $context === 'create')
<<<<<<< HEAD
=======
=======

            DateTimePicker::make('email_verified_at')
                ->nullable(),

=======
            DateTimePicker::make('email_verified_at')->nullable(),
>>>>>>> b93ef594b4 (.)
            TextInput::make('password')
                ->password()
                ->required(fn($context) => $context === 'create')
                ->minLength(8)
                ->same('password_confirmation')
                ->dehydrated(filled(...))
                ->dehydrateStateUsing(bcrypt(...)),
            TextInput::make('password_confirmation')
                ->password()
<<<<<<< HEAD
                ->required(fn ($context) => $context === 'create')
>>>>>>> a12f125f4a (.)
=======
                ->required(fn($context) => $context === 'create')
>>>>>>> b93ef594b4 (.)
=======

            Forms\Components\DateTimePicker::make('email_verified_at')
                ->nullable(),

            Forms\Components\TextInput::make('password')
                ->password()
                ->required(fn ($context) => $context === 'create')
                ->minLength(8)
                ->same('password_confirmation')
                ->dehydrated(fn ($state) => filled($state))
                ->dehydrateStateUsing(fn ($state) => bcrypt($state)),

            Forms\Components\TextInput::make('password_confirmation')
                ->password()
                ->required(fn ($context) => $context === 'create')
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ->minLength(8),
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, Column>
     */
=======
<<<<<<< HEAD
     * @return array<string, Column>
     */
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable()->toggleable(),
<<<<<<< HEAD
=======
=======
=======
     * @return array<string, \Filament\Tables\Columns\Column>
     */
>>>>>>> origin/develop
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->sortable()
                ->toggleable(),

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable()->toggleable(),
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->toggleable(),
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
            'email' => TextColumn::make('email')
                ->searchable()
                ->sortable()
                ->toggleable(),
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
            'email_verified_at' => TextColumn::make('email_verified_at')
                ->dateTime()
                ->sortable()
                ->toggleable(),
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
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(),
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
            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(),
        ];
    }
}
