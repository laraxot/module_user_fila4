<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\ClientResource\Widgets;

use Filament\Forms\Schema;
use Laravel\Passport\Client;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class ClientHeader extends XotBaseWidget
{
    protected string $view = 'user::filament.resources.client-resource.widgets.client-header';

    public Client $client;

    protected int | string | array $columnSpan = 'full';

    public function mount(): void
    {
        $this->client = $this->record;
    }

    public function getFormSchema(): array
    {
        return [];
    }
}