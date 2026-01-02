<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthAccessTokenResource\Pages;

use Filament\Actions\CreateAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * Class ListOauthAccessTokens.
 */
class ListOauthAccessTokens extends XotBaseListRecords
{
    protected static string $resource = \Modules\User\Filament\Resources\OauthAccessTokenResource::class;

    /**
     * @return array<int, \Filament\Actions\ActionInterface>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            // OAuth tokens are typically created through the OAuth flow, so no create action
            // CreateAction::make(),
        ];
    }
}
