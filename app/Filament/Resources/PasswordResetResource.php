<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder; // Added
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
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copied'),

                TextColumn::make('token')
                    ->searchable()
                    ->limit(20)
                    ->tooltip(fn (\Modules\User\Models\PasswordReset $record): string => $record->token)
                    ->copyable()
                    ->copyMessage('Token copied'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Filter by date range
                \Filament\Tables\Filters\Filter::make('created_date')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                function (Builder $q, mixed $date): Builder {
                                    if (is_string($date) || $date instanceof \DateTimeInterface) {
                                        return $q->whereDate('created_at', '>=', $date);
                                    }
<<<<<<< HEAD

=======
>>>>>>> cf5d6db (.)
                                    return $q;
                                }
                            )
                            ->when(
                                $data['created_until'],
                                function (Builder $q, mixed $date): Builder {
                                    if (is_string($date) || $date instanceof \DateTimeInterface) {
                                        return $q->whereDate('created_at', '<=', $date);
                                    }
<<<<<<< HEAD

=======
>>>>>>> cf5d6db (.)
                                    return $q;
                                }
                            );
                    }),
            ])
            ->actions([
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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

    /**
<<<<<<< HEAD
     * @return array<string, Component>
=======
     * @return array<string, \Filament\Schemas\Components\Component>
>>>>>>> cf5d6db (.)
     */
    public static function getFormSchema(): array
    {
        return [
            'password_reset_info' => Section::make('Password Reset Information')
                ->schema([
                    'email' => TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),

                    'token' => TextInput::make('token')
                        ->required()
                        ->maxLength(255),
                ]),
        ];
    }
}
