<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditTeamProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Team profile';
    }

    /**
     * @return array<string, mixed>
     */
    /** @phpstan-ignore-next-line return.type */
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name'),
            // ...
        ];
    }
}
