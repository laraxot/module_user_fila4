<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\DeviceResource\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\DeleteAction;
use Modules\User\Filament\Resources\DeviceResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class EditDevice extends XotBaseEditRecord
=======
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\DeleteAction;
use Modules\User\Filament\Resources\DeviceResource;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

=======
=======
use Filament\Actions\DeleteAction;
use Modules\User\Filament\Resources\DeviceResource;
>>>>>>> origin/develop




use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;





<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

>>>>>>> b93ef594b4 (.)
class EditDevice extends XotBaseEditRecord
=======
class EditDevice extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
{
    protected static string $resource = DeviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
