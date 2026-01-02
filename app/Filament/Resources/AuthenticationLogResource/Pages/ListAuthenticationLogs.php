<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\AuthenticationLogResource\Pages;

use Filament\Actions\CreateAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * Class ListAuthenticationLogs.
 */
class ListAuthenticationLogs extends XotBaseListRecords
{
    protected static string $resource = \Modules\User\Filament\Resources\AuthenticationLogResource::class;

    /**
     * @return array<int, \Filament\Actions\ActionInterface>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            // Authentication logs are typically system-generated, so no create action
            // CreateAction::make(),
        ];
    }
}