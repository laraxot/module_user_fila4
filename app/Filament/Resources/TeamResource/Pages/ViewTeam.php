<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Pages;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
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
>>>>>>> 81efa49 (.)
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Modules\User\Filament\Resources\TeamResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewTeam extends XotBaseViewRecord
<<<<<<< HEAD
=======
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Modules\User\Filament\Resources\TeamResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewTeam extends \Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
{
    // //
    protected static string $resource = TeamResource::class;

    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @return array<Component>
     */
    #[Override]
    public function getInfolistSchema(): array
    {
        return [
            Section::make()->schema([
                TextEntry::make('id'),
                TextEntry::make('name'),
                TextEntry::make('display_name'),
                TextEntry::make('description'),
                TextEntry::make('created_at'),
                TextEntry::make('updated_at'),
            ]),
        ];
    }
<<<<<<< HEAD
=======
=======
     * @return array<\Filament\Schemas\Components\Component>
=======
     * @return array<Component>
>>>>>>> b93ef594b4 (.)
     */
    #[Override]
    public function getInfolistSchema(): array
    {
        return [
            Section::make()->schema([
                TextEntry::make('id'),
                TextEntry::make('name'),
                TextEntry::make('display_name'),
                TextEntry::make('description'),
                TextEntry::make('created_at'),
                TextEntry::make('updated_at'),
            ]),
        ];
    }
<<<<<<< HEAD

   
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
     * @return array<\Filament\Infolists\Components\Component>
     */
    public function getInfolistSchema(): array
    {
        return [
            Section::make()
                ->schema([
                    TextEntry::make('id'),
                    TextEntry::make('name'),
                    TextEntry::make('display_name'),
                    TextEntry::make('description'),
                    TextEntry::make('created_at'),
                    TextEntry::make('updated_at'),
                ])
        ];
    }

   
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
