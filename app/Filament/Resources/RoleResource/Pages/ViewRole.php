<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
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
use Filament\Infolists\Components\TextEntry;
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Pages\Actions\EditAction;
use Modules\User\Filament\Resources\RoleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

<<<<<<< HEAD
class ViewRole extends XotBaseViewRecord
{
    protected static string $resource = RoleResource::class;
=======
<<<<<<< HEAD
class ViewRole extends XotBaseViewRecord
{
    protected static string $resource = RoleResource::class;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    /**
     * @return array<Component>
     */
    #[Override]
    protected function getInfolistSchema(): array
    {
        return [
            Section::make()->schema([
                TextEntry::make('id'),
                TextEntry::make('name'),
                TextEntry::make('guard_name'),
                TextEntry::make('team_id'),
                TextEntry::make('uuid'),
                TextEntry::make('created_at'),
                TextEntry::make('updated_at'),
            ]),
<<<<<<< HEAD
=======
=======
    
=======

>>>>>>> b93ef594b4 (.)
    /**
     * @return array<Component>
     */
    #[Override]
    protected function getInfolistSchema(): array
    {
        return [
<<<<<<< HEAD
=======
class ViewRole extends \Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord
{
    protected static string $resource = RoleResource::class;
    
    /**
     * @return array<\Filament\Infolists\Components\Component>
     */
    protected function getInfolistSchema(): array
    {
        return [
>>>>>>> origin/develop
            Section::make()
                ->schema([
                    TextEntry::make('id'),
                    TextEntry::make('name'),
                    TextEntry::make('guard_name'),
                    TextEntry::make('team_id'),
                    TextEntry::make('uuid'),
                    TextEntry::make('created_at'),
                    TextEntry::make('updated_at'),
                ])
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            Section::make()->schema([
                TextEntry::make('id'),
                TextEntry::make('name'),
                TextEntry::make('guard_name'),
                TextEntry::make('team_id'),
                TextEntry::make('uuid'),
                TextEntry::make('created_at'),
                TextEntry::make('updated_at'),
            ]),
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }
}
