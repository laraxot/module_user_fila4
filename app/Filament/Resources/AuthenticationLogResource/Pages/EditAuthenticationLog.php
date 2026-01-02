<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\AuthenticationLogResource\Pages;

use Filament\Actions\DeleteAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

/**
 * Class EditAuthenticationLog.
 */
class EditAuthenticationLog extends XotBaseEditRecord
{
    protected static string $resource = \Modules\User\Filament\Resources\AuthenticationLogResource::class;

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