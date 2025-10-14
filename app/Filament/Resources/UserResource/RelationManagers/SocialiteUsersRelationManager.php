<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\User\Models\SocialiteUser;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Traits\HasXotTable;
use Override;

/**
 * Class Modules\User\Filament\Resources\UserResource\RelationManagers\SocialiteUsersRelationManager.
 */
class SocialiteUsersRelationManager extends XotBaseRelationManager
{
    use HasXotTable;

    protected static string $relationship = 'socialiteUsers';

    #[Override]
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('provider')->searchable(),
            TextColumn::make('provider_id')->searchable(),
            TextColumn::make('name')->searchable(),
            TextColumn::make('email')->searchable(),
            ImageColumn::make('avatar')->size(40),
        ];
    }

    //  * Query scope to apply conditions to the relation manager.
    // protected function applyTableQueryScope(Builder $query): Builder
    // {
    //     return $query->when(
    //         in_array(SoftDeletingScope::class, class_uses_recursive(SocialiteUser::class)),
    //         fn (Builder $query) => $query->withTrashed()
    //     );
    // }
}
