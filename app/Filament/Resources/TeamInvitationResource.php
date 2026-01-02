<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\User\Filament\Resources\TeamInvitationResource\Pages;
use Modules\User\Models\TeamInvitation;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * Class TeamInvitationResource.
 */
class TeamInvitationResource extends XotBaseResource
{
    protected static ?string $model = TeamInvitation::class;

    protected static ?string $recordTitleAttribute = 'email';

    protected static ?string $modelLabel = 'Team Invitation';

    protected static ?string $pluralModelLabel = 'Team Invitations';

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-envelope';

    protected static \UnitEnum|string|null $navigationGroup = 'Teams';

    /**
     * Get the form schema for the resource.
     *
     * @return array<int, \Filament\Forms\Components\Component>
     */
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            Select::make('team_id')
                ->relationship('team', 'name')
                ->searchable()
                ->required(),
            TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            Select::make('role')
                ->options([
                    'admin' => 'Admin',
                    'member' => 'Member',
                    'viewer' => 'Viewer',
                    // Add other roles as defined in your application
                ])
                ->searchable()
                ->required(),
        ];
    }

    /**
     * Configure the table for the resource.
     */
    #[\Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('team.name')
                    ->label('Team')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('role')
                    ->label('Role')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'warning',
                        'member' => 'primary',
                        'viewer' => 'gray',
                        default => 'secondary',
                    }),
                TextColumn::make('created_at')
                    ->label('Invited At')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('expires_at')
                    ->label('Expires At')
                    ->dateTime()
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        if ($state instanceof Carbon) {
                            $now = Carbon::now();
                            if ($state->lt($now)) {
                                return $state->format('Y-m-d H:i:s').' (Expired)';
                            }
                        }

                        return $state instanceof Carbon ? $state->format('Y-m-d H:i:s') : 'N/A';
                    }),
            ])
            ->filters([
                // Add filters for role, team, expiration status
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    /**
     * Get the pages available for the resource.
     *
     * @return array<string, string>
     */
    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeamInvitations::route('/'),
            'edit' => Pages\EditTeamInvitations::route('/{record}/edit'),
        ];
    }

    /**
     * Modify the Eloquent query used to retrieve the records.
     */
    #[\Override]
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['team']);
    }
}
