<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
use Filament\Forms\Components\TextInput;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> b93ef594b4 (.)
use Filament\Forms\Components\TextInput;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\User\Models\SocialiteUser;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Traits\HasXotTable;

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
 * Class Modules\User\Filament\Resources\UserResource\RelationManagers\SocialiteUsersRelationManager.
 */
class SocialiteUsersRelationManager extends XotBaseRelationManager
{
    use HasXotTable;

    protected static string $relationship = 'socialiteUsers';

    /**
     * Configure the form schema for managing Socialite User data.
     */
<<<<<<< HEAD
    /**
     * Define form fields in a dedicated method for reusability.
     *
     * @return array<Component>
     */
    #[Override]
=======
<<<<<<< HEAD
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
>>>>>>> a12f125f4a (.)
=======
     * @return array<Component>
     */
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public function getFormSchema(): array
    {
        return [
            TextInput::make('provider')
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
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
=======

=======
>>>>>>> b93ef594b4 (.)
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

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======


    /**
     * Define form fields in a dedicated method for reusability.
     *
     * @return array<Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('provider')

                ->required()
                ->maxLength(255)
                ->placeholder(__('Enter provider name, e.g., Google, Facebook')),

            Forms\Components\TextInput::make('provider_id')

                ->required()
                ->maxLength(255)
                ->placeholder(__('Enter the provider ID for the user')),

            Forms\Components\TextInput::make('name')

                ->maxLength(255)
                ->placeholder(__('User’s name associated with the provider')),

            Forms\Components\TextInput::make('email')

                ->email()
                ->maxLength(255)
                ->placeholder(__('User’s email associated with the provider')),

            Forms\Components\TextInput::make('avatar')

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
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
=======
=======
>>>>>>> origin/develop
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
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('provider')->searchable(),
            TextColumn::make('provider_id')->searchable(),
            TextColumn::make('name')->searchable(),
            TextColumn::make('email')->searchable(),
            ImageColumn::make('avatar')->size(40),
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    //  * Query scope to apply conditions to the relation manager.
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
    // protected function applyTableQueryScope(Builder $query): Builder
    // {
    //     return $query->when(
    //         in_array(SoftDeletingScope::class, class_uses_recursive(SocialiteUser::class)),
    //         fn (Builder $query) => $query->withTrashed()
    //     );
    // }
}
