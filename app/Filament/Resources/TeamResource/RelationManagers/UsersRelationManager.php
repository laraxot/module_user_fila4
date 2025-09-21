<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\RelationManagers;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Filament\Actions\BulkAction;
use Filament\Tables\Columns\Column;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Override;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Filament\Actions\AttachAction;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\DeleteBulkAction;
<<<<<<< HEAD
use Filament\Forms\Form;
use Filament\Tables;
=======
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Form;
use Filament\Tables;
=======
use Filament\Tables\Columns\Column;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Form;
>>>>>>> a12f125f4a (.)
=======
use Filament\Forms\Form;
use Filament\Tables;
>>>>>>> b93ef594b4 (.)
=======
use Filament\Forms\Form;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Tables;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
use Filament\Tables;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class UsersRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'users';

<<<<<<< HEAD
    protected static null|string $inverseRelationship = 'teams';

    protected static null|string $recordTitleAttribute = 'name';
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|string $inverseRelationship = 'teams';

    protected static null|string $recordTitleAttribute = 'name';
=======
    protected static ?string $inverseRelationship = 'teams';

    protected static ?string $recordTitleAttribute = 'name';
>>>>>>> a12f125f4a (.)
=======
    protected static null|string $inverseRelationship = 'teams';

    protected static null|string $recordTitleAttribute = 'name';
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

    /**
     * @return array<string, Column>
     */
<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
    protected static ?string $inverseRelationship = 'teams';

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name'),
            'email' => TextColumn::make('email'),
            'role' => TextColumn::make('role'),
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, Action>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return array<string, Action>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public function getTableHeaderActions(): array
    {
        return [
            'attach' => AttachAction::make(),
<<<<<<< HEAD
=======
=======
     * @return array<string, \Filament\Tables\Actions\Action>
     */
    public function getTableHeaderActions(): array
    {
        return [
            'attach' => Tables\Actions\AttachAction::make(),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, Action|ActionGroup>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return array<string, Action|ActionGroup>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public function getTableActions(): array
    {
        return [
            'view' => ViewAction::make(),
            'edit' => EditAction::make(),
            'detach' => DetachAction::make(),
            'delete' => DeleteAction::make(),
<<<<<<< HEAD
=======
=======
     * @return array<string, \Filament\Tables\Actions\Action|\Filament\Tables\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            'view' => Tables\Actions\ViewAction::make(),
            'edit' => Tables\Actions\EditAction::make(),
            'detach' => Tables\Actions\DetachAction::make(),
            'delete' => Tables\Actions\DeleteAction::make(),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, BulkAction>
     */
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<string, BulkAction>
     */
    #[Override]
=======
     * @return array<string, \Filament\Actions\BulkAction>
     */
>>>>>>> a12f125f4a (.)
=======
     * @return array<string, BulkAction>
     */
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public function getTableBulkActions(): array
    {
        return [
            'detach' => DetachBulkAction::make(),
            'delete' => DeleteBulkAction::make(),
<<<<<<< HEAD
=======
=======
     * @return array<string, \Filament\Tables\Actions\BulkAction>
     */
    public function getTableBulkActions(): array
    {
        return [
            'detach' => Tables\Actions\DetachBulkAction::make(),
            'delete' => Tables\Actions\DeleteBulkAction::make(),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }
}
