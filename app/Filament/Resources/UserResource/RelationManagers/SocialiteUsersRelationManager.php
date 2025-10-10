<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> fbc8f8e (.)
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> 6d20fbe (.)
use Filament\Forms\Components\TextInput;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\User\Models\SocialiteUser;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Traits\HasXotTable;

<<<<<<< HEAD
<<<<<<< HEAD
=======








>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
/**
 * Class Modules\User\Filament\Resources\UserResource\RelationManagers\SocialiteUsersRelationManager.
 */
class SocialiteUsersRelationManager extends XotBaseRelationManager
{
    use HasXotTable;

    protected static string $relationship = 'socialiteUsers';

    /**
     * Configure the form schema for managing Socialite User data.
     */
    /**
     * Define form fields in a dedicated method for reusability.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<Component>
     */
    #[Override]
=======
     * @return array<\Filament\Schemas\Components\Component>
     */
>>>>>>> fbc8f8e (.)
=======
     * @return array<Component>
     */
    #[Override]
>>>>>>> 6d20fbe (.)
    public function getFormSchema(): array
    {
        return [
            TextInput::make('provider')
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
                ->required()
                ->maxLength(255)
                ->placeholder(__('Enter provider name, e.g., Google, Facebook')),
            TextInput::make('provider_id')
                ->required()
                ->maxLength(255)
                ->placeholder(__('Enter the provider ID for the user')),
            TextInput::make('name')
                ->maxLength(255)
                ->placeholder(__('User’s name associated with the provider')),
            TextInput::make('email')
                ->email()
                ->maxLength(255)
                ->placeholder(__('User’s email associated with the provider')),
            TextInput::make('avatar')
<<<<<<< HEAD
=======

                ->required()
                ->maxLength(255)
                ->placeholder(__('Enter provider name, e.g., Google, Facebook')),

            TextInput::make('provider_id')

                ->required()
                ->maxLength(255)
                ->placeholder(__('Enter the provider ID for the user')),

            TextInput::make('name')

                ->maxLength(255)
                ->placeholder(__('User’s name associated with the provider')),

            TextInput::make('email')

                ->email()
                ->maxLength(255)
                ->placeholder(__('User’s email associated with the provider')),

            TextInput::make('avatar')

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
                ->url()
                ->maxLength(512)
                ->placeholder(__('URL of the user’s avatar image')),
        ];
    }

    /**
     * Define table columns in a separate, strongly-typed method.
     *
     * @return array<TextColumn|ImageColumn>
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    #[Override]
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('provider')->searchable(),
            TextColumn::make('provider_id')->searchable(),
            TextColumn::make('name')->searchable(),
            TextColumn::make('email')->searchable(),
            ImageColumn::make('avatar')->size(40),
<<<<<<< HEAD
=======
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('provider')

                ->searchable(),

            TextColumn::make('provider_id')

                ->searchable(),

            TextColumn::make('name')

                ->searchable(),

            TextColumn::make('email')

                ->searchable(),

            ImageColumn::make('avatar')

                ->size(40),
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        ];
    }

    //  * Query scope to apply conditions to the relation manager.
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    // protected function applyTableQueryScope(Builder $query): Builder
    // {
    //     return $query->when(
    //         in_array(SoftDeletingScope::class, class_uses_recursive(SocialiteUser::class)),
    //         fn (Builder $query) => $query->withTrashed()
    //     );
    // }
}
