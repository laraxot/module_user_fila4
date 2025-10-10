<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\BaseFilter;
=======
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\BaseFilter;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
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
=======
=======
use Override;
>>>>>>> b93ef594b4 (.)
use Filament\Tables;
use Filament\Tables\Actions\Action;
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
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
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
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

abstract class BaseListUsers extends XotBaseListRecords
{
    protected static string $resource = UserResource::class;

    /**
     * Get table columns for user records.
     *
<<<<<<< HEAD
     * @return array<string, Column>
     */
=======
<<<<<<< HEAD
     * @return array<string, Column>
     */
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
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
=======
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable(),
            'email' => TextColumn::make('email')->searchable(),
        ];
    }

<<<<<<< HEAD
     /**
>>>>>>> a12f125f4a (.)
=======
    /**
>>>>>>> b93ef594b4 (.)
=======
     * @return array<string, \Filament\Tables\Columns\Column>
     */
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
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * Get the header actions.
     *
     * @return array<string, Action>
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            'export_xls' => ExportXlsAction::make('export_xls'),
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    protected function getHeaderActions(): array
    {
        return [
           'export_xls' => ExportXlsAction::make('export_xls'),
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            'export_xls' => ExportXlsAction::make('export_xls'),
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
     * Get table filters for user records.
     *
<<<<<<< HEAD
     * @return array<BaseFilter>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return array<BaseFilter>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return array<Tables\Filters\BaseFilter>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getTableFilters(): array
    {
        return [
            // Filtri disabilitati per ora, abilitare se necessario
            /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
             * Filter::make('verified')
             * ->query(static fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
             * Filter::make('unverified')
             * ->query(static fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
             */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
            Filter::make('verified')
                ->query(static fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
            Filter::make('unverified')
                ->query(static fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
            */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
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
=======
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
    public function getTableActions(): array
    {
        $actions = [
            'change_password' => ChangePasswordAction::make()->tooltip('Cambio Password')->iconButton(),
        ];

        // Add parent actions - merge arrays
        $parentActions = parent::getTableActions();
        $actions = array_merge($actions, $parentActions);

        /*
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
>>>>>>> origin/develop
        // Add deactivate action
        $actions['deactivate'] = Action::make('deactivate')
            ->tooltip(__('filament-actions::delete.single.label'))
            ->color('danger')
            ->icon('heroicon-o-trash')
            ->action(static fn (UserContract $user) => $user->delete());
        */   
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
         * // Add deactivate action
         * $actions['deactivate'] = Action::make('deactivate')
         * ->tooltip(__('filament-actions::delete.single.label'))
         * ->color('danger')
         * ->icon('heroicon-o-trash')
         * ->action(static fn (UserContract $user) => $user->delete());
         */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
}
