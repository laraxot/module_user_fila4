<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthClientResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Class ViewOauthClient.
 */
class ViewOauthClient extends XotBaseViewRecord
{
    protected static string $resource = \Modules\User\Filament\Resources\OauthClientResource::class;
}