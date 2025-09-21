<?php

/**
 * --.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
use Filament\Schemas\Components\Section;
use Filament\Actions;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> b93ef594b4 (.)
use Filament\Schemas\Components\Section;
use Filament\Actions;
=======
use Filament\Actions;
use Filament\Infolists\Components\Section;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Infolists\Components\TextEntry;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

<<<<<<< HEAD
class ViewTenant extends XotBaseViewRecord
=======
<<<<<<< HEAD
class ViewTenant extends XotBaseViewRecord
=======
class ViewTenant extends \Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
{
    protected static string $resource = TenantResource::class;

    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @return array<string, Component>
     */
    #[Override]
    public function getInfolistSchema(): array
    {
        return [
            'tenant_info' => Section::make()->schema([
                TextEntry::make('id'),
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('created_at')->dateTime(),
                TextEntry::make('updated_at')->dateTime(),
            ]),
        ];
    }
<<<<<<< HEAD
=======
=======
     * @return array<string, \Filament\Schemas\Components\Component>
=======
     * @return array<string, Component>
>>>>>>> b93ef594b4 (.)
     */
    #[Override]
    public function getInfolistSchema(): array
    {
        return [
            'tenant_info' => Section::make()->schema([
                TextEntry::make('id'),
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('created_at')->dateTime(),
                TextEntry::make('updated_at')->dateTime(),
            ]),
        ];
    }
<<<<<<< HEAD

    
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
     * @return array<string, \Filament\Infolists\Components\Component>
     */
    public function getInfolistSchema(): array
    {
        return [
            'tenant_info' => Section::make()
                ->schema([
                    TextEntry::make('id'),
                    TextEntry::make('name'),
                    TextEntry::make('slug'),
                    TextEntry::make('created_at')
                        ->dateTime(),
                    TextEntry::make('updated_at')
                        ->dateTime(),
                ]),
        ];
    }

    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
