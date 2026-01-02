<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamInvitationResource\Pages;

use Filament\Actions\CreateAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * Class ListTeamInvitations.
 */
class ListTeamInvitations extends XotBaseListRecords
{

    protected static string $resource = \Modules\User\Filament\Resources\TeamInvitationResource::class;

    /**
     * @return array<int, \Filament\Actions\ActionInterface>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}