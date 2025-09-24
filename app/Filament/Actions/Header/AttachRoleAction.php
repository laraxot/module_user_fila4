<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\User\Filament\Actions\Header;

use Filament\Actions\Action;
use Modules\Xot\Datas\XotData;
use Filament\Actions\AttachAction;
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Filament\Forms\Components\Select;
use Modules\Xot\Contracts\UserContract;

use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Validation\Rules\Password;

class AttachRoleAction extends AttachAction
{
    protected function setUp(): void
    {
        $xotData = XotData::make();
        parent::setUp();
        $this->icon('heroicon-o-link')
                ->iconButton()
                ->schema(static function (AttachAction $action) use ($xotData): array {
                    return [
                        $action->getRecordSelect(),
                        Select::make('team_id')->options($xotData->getTeamClass()::get()->pluck('name', 'id')),
                    ];
                });
    }

    public static function getDefaultName(): ?string
    {
        return 'attachRole';
    }
}


