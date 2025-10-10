<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\BaseFilter;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
use Override;
use Filament\Tables;
use Filament\Actions\Action;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Query\Builder;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
<<<<<<< HEAD
=======
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Query\Builder;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Contracts\UserContract;
use Filament\Tables\Actions\ExportBulkAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

abstract class BaseListUsers extends XotBaseListRecords
{
    protected static string $resource = UserResource::class;

    /**
     * Get table columns for user records.
     *
     * @return array<string, Column>
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    #[Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable(),
            'email' => TextColumn::make('email')->searchable(),
        ];
    }

    /**
<<<<<<< HEAD
=======
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')
                ->searchable(),
            'email' => TextColumn::make('email')
                ->searchable(),
        ];
    }

     /**
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
     * Get the header actions.
     *
     * @return array<string, Action>
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            'export_xls' => ExportXlsAction::make('export_xls'),
<<<<<<< HEAD
=======
    protected function getHeaderActions(): array
    {
        return [
           'export_xls' => ExportXlsAction::make('export_xls'),
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        ];
    }

    /**
     * Get table filters for user records.
     *
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
            // Filtri disabilitati per ora, abilitare se necessario
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
     * Get table actions for user records.
     *
     * @return array<string, \Filament\Tables\Actions\Action|\Filament\Tables\Actions\ActionGroup>
     * @phpstan-ignore-next-line
     */
    /** @phpstan-ignore-next-line */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    #[Override]
    public function getTableActions(): array
    {
        $actions = [
            'change_password' => ChangePasswordAction::make()->tooltip('Cambio Password')->iconButton(),
        ];

        // Add parent actions - merge arrays
        $parentActions = parent::getTableActions();
        $actions = array_merge($actions, $parentActions);

        /*
         * // Add deactivate action
         * $actions['deactivate'] = Action::make('deactivate')
         * ->tooltip(__('filament-actions::delete.single.label'))
         * ->color('danger')
         * ->icon('heroicon-o-trash')
         * ->action(static fn (UserContract $user) => $user->delete());
         */
<<<<<<< HEAD
=======
    public function getTableActions(): array
    {
        $actions = [
            'change_password' => ChangePasswordAction::make()
                ->tooltip('Cambio Password')
                ->iconButton(),
        ];
        
        // Add parent actions - merge arrays
        $parentActions = parent::getTableActions();
        $actions = array_merge($actions, $parentActions);
        
        /*
        // Add deactivate action
        $actions['deactivate'] = Action::make('deactivate')
            ->tooltip(__('filament-actions::delete.single.label'))
            ->color('danger')
            ->icon('heroicon-o-trash')
            ->action(static fn (UserContract $user) => $user->delete());
        */   
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        /** @phpstan-ignore-next-line */
        return $actions;
    }

    /**
     * Get header widgets for the user list page.
     *
     * @return array<class-string>
     */
    protected function getHeaderWidgets(): array
    {
        return [
            //UserOverview::class
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======

    
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
}
