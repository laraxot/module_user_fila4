<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Pages;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Modules\User\Filament\Resources\TeamResource;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class EditTeam extends XotBaseEditRecord
=======
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

=======
=======
use Filament\Actions\DeleteAction;
use Filament\Pages\Actions\ViewAction;
use Modules\User\Filament\Resources\TeamResource;
>>>>>>> origin/develop




use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;





<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

>>>>>>> b93ef594b4 (.)
class EditTeam extends XotBaseEditRecord
=======
class EditTeam extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
{
    // //
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
