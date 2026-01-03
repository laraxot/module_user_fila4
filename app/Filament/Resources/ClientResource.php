<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Facades\Filament;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Laravel\Passport\Client;
use Laravel\Passport\Passport;
use Modules\User\Application\UseCases\Owners\GetAllOwnersRelationshipUseCaseContract;
use Modules\User\Application\UseCases\Owners\SaveOwnershipRelationUseCaseContract;
use Modules\User\Filament\Resources\ClientResource\Pages;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ClientResource extends XotBaseResource
{
    // use HasResourceFormComponents;

    protected static ?string $recordTitleAttribute = 'name';
    protected static string|\UnitEnum|null $navigationGroup = 'filament-passport-ui::passport-ui.navigation.group';
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedKey;
    protected static ?string $modelLabel = 'OAuth Client';
    protected static ?string $pluralModelLabel = 'OAuth Clients';

    /**
     * Get the form schema for the resource (XotBaseResource pattern).
     *
     * @return array<string, \Filament\Forms\Components\Field>
     */
    public static function getFormSchema(): array
    {
        $components = [
            'name' => \Filament\Forms\Components\TextInput::make('name')
                ->unique('clients', 'name')
                ->required()
                ->maxLength(255),
            'owner' => \Filament\Forms\Components\Select::make('owner')
                ->options(function (): Collection {
                    /** @var GetAllOwnersRelationshipUseCaseContract $useCase */
                    $useCase = app(GetAllOwnersRelationshipUseCaseContract::class);
                    return $useCase->execute();
                })
                ->saveRelationshipsUsing(function (Client $record, array $data): void {
                    /** @var SaveOwnershipRelationUseCaseContract $useCase */
                    $useCase = app(SaveOwnershipRelationUseCaseContract::class);
                    $useCase->execute(
                        client: $record,
                        ownerId: (int) $data['owner'],
                        actor: Filament::auth()->user()
                    );
                })
                ->searchable()
                ->required(),
        ];

        /*
         * merge getResourceFormComponents if enabled
         */
        if (static::isResourceFormComponentsEnabled()) {
            $additionalComponents = static::getResourceFormComponents();
            /** @var array<string, \Filament\Forms\Components\Field> $additionalComponents */
            /** @var array<string, \Filament\Forms\Components\Field> $components */
            $components = array_merge($components, $additionalComponents);
        }

        /** @var array<string, \Filament\Forms\Components\Field> $components */
        return $components;
    }

    /**
     * Build the table for the resource.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->formatStateUsing(fn (string $state): string => Str::headline($state))
                    ->searchable(),
                TextColumn::make('owner.name')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime(),
                TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }

    /**
     * Get the model class for the resource from Passport.
     */
    public static function getModel(): string
    {
        return Passport::clientModel();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'view' => Pages\ViewClient::route('/{record}'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
            'create' => Pages\CreateClient::route('/create'),
        ];
    }

    /**
     * Check if resource form components are enabled.
     */
    protected static function isResourceFormComponentsEnabled(): bool
    {
        return false;
    }

    /**
     * Get resource form components.
     */
    protected static function getResourceFormComponents(): array
    {
        return [];
    }
}