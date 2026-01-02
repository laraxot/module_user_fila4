<?php

/**
 * --.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class DomainsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'domains';

    protected static ?string $recordTitleAttribute = 'domain';

    /**
     * @return array<string, Component>
     */
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'domain' => TextInput::make('domain')
                ->required()
                ->prefix('http(s)://')
                ->suffix('.'.request()->getHost())
                ->maxLength(255),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'domain' => TextColumn::make('domain'),
            'full-domain' => TextColumn::make('full-domain')->getStateUsing(
                static fn ($record) => is_object($record) && isset($record->domain) && is_string($record->domain) ?
                    Str::of($record->domain)->append('.')->append(request()->getHost()) : '',
            ),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Actions\Action>
     */
    #[\Override]
    public function getTableHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Actions\Action>
     */
    #[\Override]
    public function getTableActions(): array
    {
        return [
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Actions\BulkAction>
     */
    #[\Override]
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
        ];
    }
}
