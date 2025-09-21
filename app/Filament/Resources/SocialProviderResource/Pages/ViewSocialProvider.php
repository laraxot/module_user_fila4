<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialProviderResource\Pages;

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
use Filament\Actions;
use Filament\Infolists\Components\TextEntry;
use Modules\User\Filament\Resources\SocialProviderResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
<<<<<<< HEAD

use function Safe\json_encode;

class ViewSocialProvider extends XotBaseViewRecord
=======
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
use function Safe\json_encode;

class ViewSocialProvider extends XotBaseViewRecord
=======
use Filament\Actions;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Modules\User\Filament\Resources\SocialProviderResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use function Safe\json_encode;

class ViewSocialProvider extends \Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
{
    protected static string $resource = SocialProviderResource::class;

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
    protected function getInfolistSchema(): array
    {
        return [
            Section::make()->schema([
                TextEntry::make('id'),
                TextEntry::make('name'),
                TextEntry::make('scopes')->formatStateUsing(function ($state): string {
                    if (is_array($state)) {
                        return json_encode($state);
                    }
                    return is_string($state) ? $state : ((string) $state);
                }),
                TextEntry::make('parameters')->formatStateUsing(function ($state): string {
                    if (is_array($state)) {
                        return json_encode($state);
                    }
                    return is_string($state) ? $state : ((string) $state);
                }),
                TextEntry::make('stateless')->badge()->color(fn(bool $state): string => $state ? 'success' : 'danger'),
                TextEntry::make('active')->badge()->color(fn(bool $state): string => $state ? 'success' : 'danger'),
                TextEntry::make('socialite')->badge()->color(fn(bool $state): string => $state ? 'success' : 'danger'),
                TextEntry::make('svg')->html(),
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
    protected function getInfolistSchema(): array
    {
        return [
            Section::make()->schema([
                TextEntry::make('id'),
                TextEntry::make('name'),
                TextEntry::make('scopes')->formatStateUsing(function ($state): string {
                    if (is_array($state)) {
                        return json_encode($state);
                    }
                    return is_string($state) ? $state : ((string) $state);
                }),
                TextEntry::make('parameters')->formatStateUsing(function ($state): string {
                    if (is_array($state)) {
                        return json_encode($state);
                    }
                    return is_string($state) ? $state : ((string) $state);
                }),
                TextEntry::make('stateless')->badge()->color(fn(bool $state): string => $state ? 'success' : 'danger'),
                TextEntry::make('active')->badge()->color(fn(bool $state): string => $state ? 'success' : 'danger'),
                TextEntry::make('socialite')->badge()->color(fn(bool $state): string => $state ? 'success' : 'danger'),
                TextEntry::make('svg')->html(),
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
    protected function getInfolistSchema(): array
    {
        return [
            Section::make()
                ->schema([
                    TextEntry::make('id'),
                    TextEntry::make('name'),
                    TextEntry::make('scopes')
                        ->formatStateUsing(function ($state): string {
                            if (is_array($state)) {
                                return json_encode($state);
                            }
                            return is_string($state) ? $state : (string) $state;
                        }),
                    TextEntry::make('parameters')
                        ->formatStateUsing(function ($state): string {
                            if (is_array($state)) {
                                return json_encode($state);
                            }
                            return is_string($state) ? $state : (string) $state;
                        }),
                    TextEntry::make('stateless')
                        ->badge()
                        ->color(fn (bool $state): string => $state ? 'success' : 'danger'),
                    TextEntry::make('active')
                        ->badge()
                        ->color(fn (bool $state): string => $state ? 'success' : 'danger'),
                    TextEntry::make('socialite')
                        ->badge()
                        ->color(fn (bool $state): string => $state ? 'success' : 'danger'),
                    TextEntry::make('svg')
                        ->html(),
                    TextEntry::make('created_at'),
                    TextEntry::make('updated_at'),
                ])
        ];
    }

    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
