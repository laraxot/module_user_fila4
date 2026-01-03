<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthAuthCodeResource\Pages;

use Filament\Actions\CreateAction;
use Modules\User\Filament\Resources\OauthAuthCodeResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListOauthAuthCodes extends XotBaseListRecords
{
    protected static string $resource = OauthAuthCodeResource::class;

    /**
     * @return array<string, \Filament\Actions\Action>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            // No CreateAction for auth codes as they are generated automatically
        ];
    }
}
