<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> fbc8f8e (.)
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> 6d20fbe (.)
use Modules\User\Filament\Resources\SocialProviderResource\Pages\ListSocialProviders;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\CreateSocialProvider;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\ViewSocialProvider;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\EditSocialProvider;
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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    protected static null|string $model = SocialProvider::class;

    /**
     * @return array<string, Component>
     */
    #[Override]
<<<<<<< HEAD
=======
    protected static ?string $model = SocialProvider::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->placeholder(static::trans('fields.name.placeholder'))
                ->helperText(static::trans('fields.name.helper_text')),
<<<<<<< HEAD
<<<<<<< HEAD
            'scopes' => KeyValue::make('scopes')
                // ->placeholder(static::trans('fields.scopes.placeholder'))
                ->helperText(static::trans('fields.scopes.helper_text')),
=======

            'scopes' => KeyValue::make('scopes')
                // ->placeholder(static::trans('fields.scopes.placeholder'))
                ->helperText(static::trans('fields.scopes.helper_text')),

>>>>>>> fbc8f8e (.)
=======
            'scopes' => KeyValue::make('scopes')
                // ->placeholder(static::trans('fields.scopes.placeholder'))
                ->helperText(static::trans('fields.scopes.helper_text')),
>>>>>>> 6d20fbe (.)
            'client_id' => TextInput::make('client_id')
                ->required()
                ->maxLength(255)
                ->placeholder(static::trans('fields.client_id.placeholder'))
                ->helperText(static::trans('fields.client_id.helper_text')),
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            'client_secret' => TextInput::make('client_secret')
                ->required()
                ->maxLength(1024)
                ->placeholder(static::trans('fields.client_secret.placeholder'))
                ->helperText(static::trans('fields.client_secret.helper_text')),
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            'redirect' => TextInput::make('redirect')
                ->required()
                ->maxLength(255)
                ->placeholder(static::trans('fields.redirect.placeholder'))
                ->helperText(static::trans('fields.redirect.helper_text')),
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            'svg' => Textarea::make('svg')
                ->columnSpanFull()
                ->placeholder(static::trans('fields.svg.placeholder'))
                ->helperText(static::trans('fields.svg.helper_text')),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    #[Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[Override]
<<<<<<< HEAD
=======
    public static function getRelations(): array
    {
        return [
        ];
    }

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    public static function getPages(): array
    {
        return [
            'index' => ListSocialProviders::route('/'),
            'create' => CreateSocialProvider::route('/create'),
            'view' => ViewSocialProvider::route('/{record}'),
            'edit' => EditSocialProvider::route('/{record}/edit'),
        ];
    }
}
