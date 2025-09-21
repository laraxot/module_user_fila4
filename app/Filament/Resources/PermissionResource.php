<?php

/**
 * @see https://github.com/Althinect/filament-spatie-roles-permissions/tree/2.x
 * @see https://github.com/phpsa/filament-authentication/blob/main/src/resources/PermissionResource.php
 */

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
use Modules\User\Filament\Resources\PermissionResource\Pages\CreatePermission;
use Modules\User\Filament\Resources\PermissionResource\Pages\EditPermission;
use Modules\User\Filament\Resources\PermissionResource\Pages\ListPermissions;
use Modules\User\Models\Permission;
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
>>>>>>> 81efa49 (.)

class PermissionResource extends XotBaseResource
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-lock-closed';

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    protected static null|string $model = Permission::class;

    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'guard_name' => TextInput::make('guard_name')->required()->maxLength(255),
            'active' => Toggle::make('active')->required(),
        ];
    }

    #[Override]
<<<<<<< HEAD
=======
=======
    protected static ?string $model = Permission::class;
=======
    protected static null|string $model = Permission::class;
>>>>>>> b93ef594b4 (.)

    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'guard_name' => TextInput::make('guard_name')->required()->maxLength(255),
            'active' => Toggle::make('active')->required(),
        ];
    }

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class PermissionResource extends XotBaseResource
{
    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';

    protected static ?string $model = Permission::class;

    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
            'guard_name' => TextInput::make('guard_name')
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
            'index' => ListPermissions::route('/'),
            'create' => CreatePermission::route('/create'),
            'edit' => EditPermission::route('/{record}/edit'),
        ];
    }
}
