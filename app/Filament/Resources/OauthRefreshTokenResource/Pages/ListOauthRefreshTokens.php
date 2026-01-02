<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthRefreshTokenResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\User\Filament\Resources\OauthRefreshTokenResource;

class ListOauthRefreshTokens extends XotBaseListRecords
{
    protected static string $resource = OauthRefreshTokenResource::class;

    /**
     * @return array<int, \Filament\Actions\ActionInterface>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            // No CreateAction for refresh tokens as they are generated automatically
        ];
    }
}