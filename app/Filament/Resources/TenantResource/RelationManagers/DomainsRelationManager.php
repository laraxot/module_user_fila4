<?php

/**
 * --.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Override;

class DomainsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'domains';

    #[Override]
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('domain')
            ->columns([
                TextColumn::make('domain'),
                TextColumn::make('full-domain')->getStateUsing(
                    static function ($record) {
                        if (!is_object($record) || !property_exists($record, 'domain')) {
                            return '';
                        }

                        /** @var string $domain */
                        $domain = $record->domain ?? '';

                        return Str::of($domain)->append('.')->append(request()->getHost())->toString();
                    }
                ),
            ])
            ->filters([])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
