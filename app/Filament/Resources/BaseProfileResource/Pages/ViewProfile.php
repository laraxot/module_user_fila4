<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

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
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Infolists\Components\ImageEntry;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Actions\DeleteAction;
use Filament\Infolists\Components;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Modules\User\Filament\Resources\BaseProfileResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
class ViewProfile extends XotBaseViewRecord
{
    protected static string $resource = BaseProfileResource::class;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    /**
     * @return array<string, Component>
     */
    #[Override]
    public function getInfolistSchema(): array
    {
        return [
            'profile_info' => Section::make()->schema([
                Flex::make([
                    Grid::make(2)->schema([
                        Group::make([
                            TextEntry::make('email'),
                            TextEntry::make('first_name'),
                            TextEntry::make('last_name'),
                            TextEntry::make('created_at')
                                ->badge()
                                ->date()
                                ->color('success'),
                        ]),
                        /*
                         * Components\Group::make([
                         * Components\TextEntry::make('author.name'),
                         * Components\TextEntry::make('category.name'),
                         * Components\TextEntry::make('tags')
                         * ->badge()
                         * ->getStateUsing(fn () => ['one', 'two', 'three', 'four']),
                         * ]),
                         */
                    ]),
                    ImageEntry::make('image')->hiddenLabel()->grow(false),
                ])->from('lg'),
            ]),
<<<<<<< HEAD
            'content' => Section::make('Content')
=======
=======

=======
>>>>>>> b93ef594b4 (.)
    /**
     * @return array<string, Component>
     */
    #[Override]
    public function getInfolistSchema(): array
    {
        return [
<<<<<<< HEAD
            'profile_info' => Section::make()
                ->schema([
                    Flex::make([
                        Grid::make(2)
                            ->schema([
                                Group::make([
=======
class ViewProfile extends \Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord
{
    protected static string $resource = BaseProfileResource::class;


    /**
     * @return array<string, \Filament\Infolists\Components\Component>
     */
    public function getInfolistSchema(): array
    {
        return [
            'profile_info' => Components\Section::make()
                ->schema([
                    Components\Split::make([
                        Components\Grid::make(2)
                            ->schema([
                                Components\Group::make([
>>>>>>> origin/develop
                                    TextEntry::make('email'),
                                    TextEntry::make('first_name'),
                                    TextEntry::make('last_name'),
                                    TextEntry::make('created_at')
                                        ->badge()
                                        ->date()
                                        ->color('success'),
                                ]),
                                /*
                                Components\Group::make([
                                    Components\TextEntry::make('author.name'),
                                    Components\TextEntry::make('category.name'),
                                    Components\TextEntry::make('tags')
                                        ->badge()
                                        ->getStateUsing(fn () => ['one', 'two', 'three', 'four']),
                                ]),
                                */
                            ]),
<<<<<<< HEAD
                        ImageEntry::make('image')
=======
                        Components\ImageEntry::make('image')
>>>>>>> origin/develop
                            ->hiddenLabel()
                            ->grow(false),
                    ])->from('lg'),
                ]),
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            'profile_info' => Section::make()->schema([
                Flex::make([
                    Grid::make(2)->schema([
                        Group::make([
                            TextEntry::make('email'),
                            TextEntry::make('first_name'),
                            TextEntry::make('last_name'),
                            TextEntry::make('created_at')
                                ->badge()
                                ->date()
                                ->color('success'),
                        ]),
                        /*
                         * Components\Group::make([
                         * Components\TextEntry::make('author.name'),
                         * Components\TextEntry::make('category.name'),
                         * Components\TextEntry::make('tags')
                         * ->badge()
                         * ->getStateUsing(fn () => ['one', 'two', 'three', 'four']),
                         * ]),
                         */
                    ]),
                    ImageEntry::make('image')->hiddenLabel()->grow(false),
                ])->from('lg'),
            ]),
>>>>>>> b93ef594b4 (.)
            'content' => Section::make('Content')
=======
            'content' => Components\Section::make('Content')
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ->schema([
                    TextEntry::make('content')
                        ->prose()
                        ->markdown()
                        ->hiddenLabel(),
                ])
                ->collapsible(),
        ];
    }
}
