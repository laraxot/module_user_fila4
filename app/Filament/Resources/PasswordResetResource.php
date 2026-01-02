<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Filament\Resources\PasswordResetResource\Pages;
use Modules\Xot\Filament\Resources\XotBaseResource;

class PasswordResetResource extends XotBaseResource
{
    protected static ?string $model = \Modules\User\Models\PasswordReset::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-key';

    protected static \UnitEnum|string|null $navigationGroup = 'Security';

    protected static ?int $navigationSort = 4;

    public static function getNavigationLabel(): string
    {
        return __('Password Resets');
    }

    public static function getPluralLabel(): string
    {
        return __('Password Resets');
    }

    public static function getModelLabel(): string
    {
        return __('Password Reset');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copied'),

                TextColumn::make('token')
                    ->label('Token')
                    ->searchable()
                    ->limit(20)
                    ->tooltip(fn ($record) => $record->token)
                    ->copyable()
                    ->copyMessage('Token copied'),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Filter by date range
                \Filament\Tables\Filters\Filter::make('created_date')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('created_from')
                            ->label('Created From'),
                        \Filament\Forms\Components\DatePicker::make('created_until')
                            ->label('Created Until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['created_from'], fn ($query, $date) => $query->whereDate('created_at', '>=', $date))
                            ->when($data['created_until'], fn ($query, $date) => $query->whereDate('created_at', '<=', $date));
                    }),
            ])
            ->actions([
                DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\BulkActionGroup::make([
                    \Filament\Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPasswordResets::route('/'),
            'view' => Pages\ViewPasswordReset::route('/{record}'),
        ];
    }

    public static function getFormSchema(): array
    {
        return [
            Section::make('Password Reset Information')
                ->schema([
                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->maxLength(255),

                    TextInput::make('token')
                        ->label('Token')
                        ->required()
                        ->maxLength(255),
                ]),
        ];
    }
}