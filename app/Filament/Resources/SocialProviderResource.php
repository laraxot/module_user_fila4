<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

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
use Modules\User\Filament\Resources\SocialProviderResource\Pages\ListSocialProviders;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\CreateSocialProvider;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\ViewSocialProvider;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\EditSocialProvider;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\User\Filament\Resources\SocialProviderResource\Pages;
use Modules\User\Models\SocialProvider;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * @property SocialProvider $record
 *                                  -------
 */
class SocialProviderResource extends XotBaseResource
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    protected static null|string $model = SocialProvider::class;

    /**
     * @return array<string, Component>
     */
    #[Override]
<<<<<<< HEAD
=======
=======
    protected static ?string $model = SocialProvider::class;
=======
    protected static null|string $model = SocialProvider::class;
>>>>>>> b93ef594b4 (.)

    /**
     * @return array<string, Component>
     */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
    protected static ?string $model = SocialProvider::class;

    /**
     * @return array<string, \Filament\Forms\Components\Component>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->placeholder(static::trans('fields.name.placeholder'))
                ->helperText(static::trans('fields.name.helper_text')),
<<<<<<< HEAD
            'scopes' => KeyValue::make('scopes')
                // ->placeholder(static::trans('fields.scopes.placeholder'))
                ->helperText(static::trans('fields.scopes.helper_text')),
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            'scopes' => KeyValue::make('scopes')
                // ->placeholder(static::trans('fields.scopes.placeholder'))
                ->helperText(static::trans('fields.scopes.helper_text')),
=======
=======
>>>>>>> origin/develop

            'scopes' => KeyValue::make('scopes')
                // ->placeholder(static::trans('fields.scopes.placeholder'))
                ->helperText(static::trans('fields.scopes.helper_text')),

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            'scopes' => KeyValue::make('scopes')
                // ->placeholder(static::trans('fields.scopes.placeholder'))
                ->helperText(static::trans('fields.scopes.helper_text')),
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'client_id' => TextInput::make('client_id')
                ->required()
                ->maxLength(255)
                ->placeholder(static::trans('fields.client_id.placeholder'))
                ->helperText(static::trans('fields.client_id.helper_text')),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'client_secret' => TextInput::make('client_secret')
                ->required()
                ->maxLength(1024)
                ->placeholder(static::trans('fields.client_secret.placeholder'))
                ->helperText(static::trans('fields.client_secret.helper_text')),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'redirect' => TextInput::make('redirect')
                ->required()
                ->maxLength(255)
                ->placeholder(static::trans('fields.redirect.placeholder'))
                ->helperText(static::trans('fields.redirect.helper_text')),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            'parameters' => KeyValue::make('parameters')
                // ->placeholder(static::trans('fields.parameters.placeholder'))
                ->helperText(static::trans('fields.parameters.helper_text')),
            'additional_params' => Textarea::make('additional_params'),
            'stateless' => Toggle::make('stateless')->helperText(static::trans('fields.stateless.helper_text')),
            'active' => Toggle::make('active')->helperText(static::trans('fields.active.helper_text')),
            'socialite' => Toggle::make('socialite')->helperText(static::trans('fields.socialite.helper_text')),
            'enabled' => Toggle::make('enabled'),
<<<<<<< HEAD
=======
=======

=======
>>>>>>> b93ef594b4 (.)
            'parameters' => KeyValue::make('parameters')
                // ->placeholder(static::trans('fields.parameters.placeholder'))
                ->helperText(static::trans('fields.parameters.helper_text')),
            'additional_params' => Textarea::make('additional_params'),
            'stateless' => Toggle::make('stateless')->helperText(static::trans('fields.stateless.helper_text')),
            'active' => Toggle::make('active')->helperText(static::trans('fields.active.helper_text')),
            'socialite' => Toggle::make('socialite')->helperText(static::trans('fields.socialite.helper_text')),
            'enabled' => Toggle::make('enabled'),
<<<<<<< HEAD

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======

            'parameters' => KeyValue::make('parameters')
                // ->placeholder(static::trans('fields.parameters.placeholder'))
                ->helperText(static::trans('fields.parameters.helper_text')),

            'additional_params' => Textarea::make('additional_params'),

            'stateless' => Toggle::make('stateless')
                ->helperText(static::trans('fields.stateless.helper_text')),

            'active' => Toggle::make('active')
                ->helperText(static::trans('fields.active.helper_text')),

            'socialite' => Toggle::make('socialite')
                ->helperText(static::trans('fields.socialite.helper_text')),

            'enabled' => Toggle::make('enabled'),

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'svg' => Textarea::make('svg')
                ->columnSpanFull()
                ->placeholder(static::trans('fields.svg.placeholder'))
                ->helperText(static::trans('fields.svg.helper_text')),
        ];
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[Override]
<<<<<<< HEAD
=======
=======
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
    public static function getRelations(): array
    {
        return [];
    }

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public static function getPages(): array
    {
        return [
            'index' => ListSocialProviders::route('/'),
            'create' => CreateSocialProvider::route('/create'),
            'view' => ViewSocialProvider::route('/{record}'),
            'edit' => EditSocialProvider::route('/{record}/edit'),
<<<<<<< HEAD
=======
=======
    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocialProviders::route('/'),
            'create' => Pages\CreateSocialProvider::route('/create'),
            'view' => Pages\ViewSocialProvider::route('/{record}'),
            'edit' => Pages\EditSocialProvider::route('/{record}/edit'),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }
}
