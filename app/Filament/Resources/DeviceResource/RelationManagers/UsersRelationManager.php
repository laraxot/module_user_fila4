<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\DeviceResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> laraxot/develop
=======
>>>>>>> a382d4f1 (.)

class UsersRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'users';

    /**
     * @return array<string, Component>
     */
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'device' => TextInput::make('device')->required()->maxLength(255),
        ];
    }

    #[\Override]
    public function table(Table $table): Table
    {
        return UserResource::table($table);
    }
}
