<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialiteUserResource\Pages;

use Filament\Actions\DeleteAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

/**
 * Class EditSocialiteUser.
 */
class EditSocialiteUser extends XotBaseEditRecord
{

    protected static string $resource = \Modules\User\Filament\Resources\SocialiteUserResource::class;

    /**
     * @return array<int, \Filament\Actions\ActionInterface>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}