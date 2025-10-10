<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
use Filament\Actions\BulkAction;
use Filament\Tables\Filters\BaseFilter;
use Override;
use Filament\Actions\Action;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ExportBulkAction;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Query\Builder;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\BaseListUsers;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
<<<<<<< HEAD
=======
use Filament\Actions\Action;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ExportBulkAction;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Query\Builder;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Contracts\UserContract;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\User\Filament\Resources\UserResource\Pages\BaseListUsers;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class ListUsers extends BaseListUsers
{
    protected static string $resource = UserResource::class;

<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> fbc8f8e (.)
=======
    #[Override]
>>>>>>> 6d20fbe (.)
    public function getTableColumns(): array
    {
        return [
            //'id' => TextColumn::make('id'),
<<<<<<< HEAD
<<<<<<< HEAD
            'name' => TextColumn::make('name')->searchable(),
            'email' => TextColumn::make('email')->searchable(),
=======
            'name' => TextColumn::make('name')
                ->searchable(),
            'email' => TextColumn::make('email')
                ->searchable(),
>>>>>>> fbc8f8e (.)
=======
            'name' => TextColumn::make('name')->searchable(),
            'email' => TextColumn::make('email')->searchable(),
>>>>>>> 6d20fbe (.)
            //'email_verified_at' => TextColumn::make('email_verified_at')
            //    ->dateTime(),
            //'created_at' => TextColumn::make('created_at')
            //    ->dateTime(),
        ];
    }

    /**
     * @return array<BaseFilter>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> fbc8f8e (.)
=======
    #[Override]
>>>>>>> 6d20fbe (.)
    public function getTableFilters(): array
    {
        return [
            /*
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
             * Filter::make('verified')
             * ->query(static fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
             * Filter::make('unverified')
             * ->query(static fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
             */
<<<<<<< HEAD
=======
            Filter::make('verified')
                ->query(static fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
            Filter::make('unverified')
                ->query(static fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
            */
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        ];
    }

    /**
     * @phpstan-ignore-next-line
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> fbc8f8e (.)
=======
    #[Override]
>>>>>>> 6d20fbe (.)
    public function getTableActions(): array
    {
        /** @phpstan-ignore-next-line */
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'change_password' => ChangePasswordAction::make()->tooltip('Cambio Password')->iconButton(),
=======
            'change_password' => ChangePasswordAction::make()
                ->tooltip('Cambio Password')
                ->iconButton(),
>>>>>>> fbc8f8e (.)
=======
            'change_password' => ChangePasswordAction::make()->tooltip('Cambio Password')->iconButton(),
>>>>>>> 6d20fbe (.)
            ...parent::getTableActions(),
            'deactivate' => Action::make('deactivate')
                ->tooltip(__('filament-actions::delete.single.label'))
                ->color('danger')
                ->icon('heroicon-o-trash')
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
                ->action(static fn(UserContract $user) => $user->delete()),
        ];
    }

    #[Override]
<<<<<<< HEAD
=======
                ->action(static fn (UserContract $user) => $user->delete()),
        ];
    }

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    protected function getHeaderWidgets(): array
    {
        return [
            UserOverview::class,
        ];
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<string, BulkAction>
     */
    #[Override]
=======
     * @return array<string, \Filament\Actions\BulkAction>
     */
>>>>>>> fbc8f8e (.)
=======
     * @return array<string, BulkAction>
     */
    #[Override]
>>>>>>> 6d20fbe (.)
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
            'export' => ExportBulkAction::make(),
        ];
    }
}
