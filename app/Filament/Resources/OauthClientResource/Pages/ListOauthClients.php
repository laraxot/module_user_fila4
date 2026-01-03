<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthClientResource\Pages;

use Filament\Actions\CreateAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * Class ListOauthClients.
 */
class ListOauthClients extends XotBaseListRecords
{
    protected static string $resource = \Modules\User\Filament\Resources\OauthClientResource::class;

    /**
     * Get the header actions.
     *
     * @return array<int, \Filament\Actions\ActionInterface>
     */
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}