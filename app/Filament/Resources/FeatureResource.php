<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Override;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\User\Filament\Resources\FeatureResource\Pages\CreateFeature;
use Modules\User\Filament\Resources\FeatureResource\Pages\EditFeature;
use Modules\User\Filament\Resources\FeatureResource\Pages\ListFeatures;
use Modules\User\Models\Feature;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Resources\XotBaseResource;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Resources\XotBaseResource;
=======
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> a12f125f4a (.)
=======
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Resources\XotBaseResource;
>>>>>>> b93ef594b4 (.)
=======
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

/**
 * @property Feature $record
 */
class FeatureResource extends XotBaseResource
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    protected static null|string $model = Feature::class;

    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'type' => TextInput::make('type')->required()->maxLength(255),
            'active' => Toggle::make('active')->required(),
        ];
    }

    #[Override]
<<<<<<< HEAD
=======
=======
    protected static ?string $model = Feature::class;
=======
    protected static null|string $model = Feature::class;
>>>>>>> b93ef594b4 (.)

    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'type' => TextInput::make('type')->required()->maxLength(255),
            'active' => Toggle::make('active')->required(),
        ];
    }

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
    protected static ?string $model = Feature::class;

    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
            'type' => TextInput::make('type')
                ->required()
                ->maxLength(255),
            'active' => Toggle::make('active')
                ->required(),
        ];
    }

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public static function getRelations(): array
    {
        return [];
    }

<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public static function getPages(): array
    {
        return [
            'index' => ListFeatures::route('/'),
            'create' => CreateFeature::route('/create'),
            'edit' => EditFeature::route('/{record}/edit'),
        ];
    }
}
