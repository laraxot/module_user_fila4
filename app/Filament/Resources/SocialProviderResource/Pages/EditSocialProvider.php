<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialProviderResource\Pages;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions;
use Modules\User\Filament\Resources\SocialProviderResource;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class EditSocialProvider extends XotBaseEditRecord
=======
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

=======
=======
use Filament\Actions;
use Modules\User\Filament\Resources\SocialProviderResource;
>>>>>>> origin/develop




use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;





<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

>>>>>>> b93ef594b4 (.)
class EditSocialProvider extends XotBaseEditRecord
=======
class EditSocialProvider extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
{
    protected static string $resource = SocialProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            ViewAction::make(),
            DeleteAction::make(),
=======
<<<<<<< HEAD
            ViewAction::make(),
            DeleteAction::make(),
=======
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }
}
