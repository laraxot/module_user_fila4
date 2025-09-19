<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
use Filament\Schemas\Components\Component;
use Filament\Tables\Columns\Column;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
<<<<<<< HEAD
=======
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\Column;
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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
=======
    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @return array<\Filament\Schemas\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            TextInput::make('email')
                ->email()
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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

            DateTimePicker::make('email_verified_at')
                ->nullable(),

            TextInput::make('password')
                ->password()
                ->required(fn ($context) => $context === 'create')
                ->minLength(8)
                ->same('password_confirmation')
                ->dehydrated(fn ($state) => filled($state))
                ->dehydrateStateUsing(fn ($state) => bcrypt($state)),

            TextInput::make('password_confirmation')
                ->password()
                ->required(fn ($context) => $context === 'create')
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
                ->minLength(8),
        ];
    }

    /**
     * @return array<string, Column>
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    #[Override]
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable()->toggleable(),
<<<<<<< HEAD
=======
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->sortable()
                ->toggleable(),

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->toggleable(),
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            'email' => TextColumn::make('email')
                ->searchable()
                ->sortable()
                ->toggleable(),
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            'email_verified_at' => TextColumn::make('email_verified_at')
                ->dateTime()
                ->sortable()
                ->toggleable(),
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(),
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(),
        ];
    }
}
