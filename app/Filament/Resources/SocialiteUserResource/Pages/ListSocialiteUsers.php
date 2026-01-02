<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialiteUserResource\Pages;

use Filament\Actions\CreateAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * Class ListSocialiteUsers.
 */
class ListSocialiteUsers extends XotBaseListRecords
{

    protected static string $resource = \Modules\User\Filament\Resources\SocialiteUserResource::class;

    /**
     * @return array<int, \Filament\Actions\ActionInterface>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            // Socialite users are typically created through authentication, so no create action
            // CreateAction::make(),
        ];
    }
}