<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
// // use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable; // Temporaneamente commentato per compatibilità Filament 4.x
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
// // use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable; // Temporaneamente commentato per compatibilità Filament 4.x
use Override;
=======
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;
>>>>>>> a12f125f4a (.)
=======
// // use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable; // Temporaneamente commentato per compatibilità Filament 4.x
use Override;
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\TextInput;
use Modules\User\Filament\Resources\BaseProfileResource\Pages\ListProfiles;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Filament\Resources\BaseProfileResource\Pages;
use Modules\User\Models\BaseProfile;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Resources\XotBaseResource;

abstract class BaseProfileResource extends XotBaseResource
{
    // // use Translatable; // Temporaneamente commentato per compatibilità Filament 4.x // Temporaneamente commentato per compatibilità Filament 4.x

    protected static null|string $model = BaseProfile::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';

    #[Override]
<<<<<<< HEAD
=======
=======
use Modules\Xot\Filament\Resources\XotBaseResource;




=======
>>>>>>> b93ef594b4 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Resources\XotBaseResource;

abstract class BaseProfileResource extends XotBaseResource
{
    // // use Translatable; // Temporaneamente commentato per compatibilità Filament 4.x // Temporaneamente commentato per compatibilità Filament 4.x

    protected static null|string $model = BaseProfile::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Filament\Resources\BaseProfileResource\Pages;
use Modules\User\Models\BaseProfile;
use Modules\Xot\Filament\Resources\XotBaseResource;




use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;





abstract class BaseProfileResource extends XotBaseResource
{
    use Translatable;

    protected static ?string $model = BaseProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public static function getFormSchema(): array
    {
        return [
            // Forms\Components\TextInput::make('user_id'),
            // Forms\Components\TextInput::make('user_id')->readonly(),
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            'user_name' => TextInput::make('user.name'),
            'email' => TextInput::make('email'),
            'first_name' => TextInput::make('first_name'),
            'last_name' => TextInput::make('last_name'),
<<<<<<< HEAD
=======
=======
            'user_name' => Forms\Components\TextInput::make('user.name'),
            'email' => Forms\Components\TextInput::make('email'),
            'first_name' => Forms\Components\TextInput::make('first_name'),
            'last_name' => Forms\Components\TextInput::make('last_name'),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'photo_profile' => SpatieMediaLibraryFileUpload::make('photo_profile')
                // ->image()
                // ->maxSize(5000)
                // ->multiple()
                // ->enableReordering()
                ->openable()
                ->downloadable()
                ->columnSpanFull()
                // ->collection('avatars')
                // ->conversion('thumbnail')
                ->disk('uploads')
                ->directory('photos')
                ->collection('photo_profile'),
        ];
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[Override]
<<<<<<< HEAD
=======
=======
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
    public static function getRelations(): array
    {
        return [];
    }

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public static function getPages(): array
    {
        return [
            'index' => ListProfiles::route('/'),
<<<<<<< HEAD
=======
=======
    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfiles::route('/'),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // 'create' => Pages\CreateProfile::route('/create'),
            // 'edit' => Pages\EditProfile::route('/{record}/edit'),
            // 'getcredits' => Pages\GetCreditProfile::route('/{record}/getcredits'),
        ];
    }
}
