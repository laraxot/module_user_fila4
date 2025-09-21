<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Tests\TestCase;
use Modules\User\Filament\Resources\UserResource\Pages\BaseListUsers;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ExportBulkAction;
use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Support\Facades\Hash;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Models\User;
<<<<<<< HEAD
=======
=======
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Modules\User\Filament\Resources\UserResource;
=======
use Illuminate\Support\Facades\Hash;
use Modules\User\Enums\UserType;
>>>>>>> b93ef594b4 (.)
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Models\User;
<<<<<<< HEAD
use Modules\User\Enums\UserType;
use Illuminate\Support\Facades\Hash;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

uses(TestCase::class);

beforeEach(function (): void {
    $this->listUsersPage = new ListUsers();

    // Create some test users
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    $this->users = User::factory()
        ->count(3)
        ->create([
            'type' => UserType::MasterAdmin,
        ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    $this->users = User::factory()->count(3)->create([
        'type' => UserType::MasterAdmin,
    ]);
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Models\User;
use Modules\User\Enums\UserType;
use Illuminate\Support\Facades\Hash;

uses(Tests\TestCase::class);

beforeEach(function (): void {
    $this->listUsersPage = new ListUsers();
    
    // Create some test users
    $this->users = User::factory()->count(3)->create([
        'type' => UserType::MasterAdmin,
    ]);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('list users page has correct resource', function (): void {
    expect(ListUsers::getResource())->toBe(UserResource::class);
});

test('list users page extends correct base class', function (): void {
<<<<<<< HEAD
    expect($this->listUsersPage)
        ->toBeInstanceOf(BaseListUsers::class);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    expect($this->listUsersPage)
        ->toBeInstanceOf(BaseListUsers::class);
=======
    expect($this->listUsersPage)->toBeInstanceOf(BaseListUsers::class);
>>>>>>> a12f125f4a (.)
=======
    expect($this->listUsersPage)
        ->toBeInstanceOf(BaseListUsers::class);
>>>>>>> b93ef594b4 (.)
=======
    expect($this->listUsersPage)->toBeInstanceOf(\Modules\User\Filament\Resources\UserResource\Pages\BaseListUsers::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('list users page can be instantiated', function (): void {
    expect($this->listUsersPage)->toBeInstanceOf(ListUsers::class);
});

test('list users page has correct table columns', function (): void {
    $columns = $this->listUsersPage->getTableColumns();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    expect($columns)->toHaveKey('name');
    expect($columns)->toHaveKey('email');

    // Test name column
    $nameColumn = $columns['name'];
    expect($nameColumn)->toBeInstanceOf(TextColumn::class);
    expect($nameColumn->getName())->toBe('name');
    expect($nameColumn->isSearchable())->toBeTrue();

    // Test email column
    $emailColumn = $columns['email'];
    expect($emailColumn)->toBeInstanceOf(TextColumn::class);
<<<<<<< HEAD
=======
=======
    
    expect($columns)->toHaveKey('name');
    expect($columns)->toHaveKey('email');
    
    // Test name column
    $nameColumn = $columns['name'];
    expect($nameColumn)->toBeInstanceOf(\Filament\Tables\Columns\TextColumn::class);
    expect($nameColumn->getName())->toBe('name');
    expect($nameColumn->isSearchable())->toBeTrue();
    
    // Test email column
    $emailColumn = $columns['email'];
    expect($emailColumn)->toBeInstanceOf(\Filament\Tables\Columns\TextColumn::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($emailColumn->getName())->toBe('email');
    expect($emailColumn->isSearchable())->toBeTrue();
});

test('list users page has correct table filters', function (): void {
    $filters = $this->listUsersPage->getTableFilters();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Currently no filters are defined
    expect($filters)->toBeArray();
    expect($filters)->toHaveCount(0);
});

test('list users page has correct table actions', function (): void {
    $actions = $this->listUsersPage->getTableActions();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    expect($actions)->toHaveKey('change_password');
    expect($actions)->toHaveKey('deactivate');

    // Test change password action
    $changePasswordAction = $actions['change_password'];
    expect($changePasswordAction)->toBeInstanceOf(ChangePasswordAction::class);

    // Test deactivate action
    $deactivateAction = $actions['deactivate'];
    expect($deactivateAction)->toBeInstanceOf(Action::class);
<<<<<<< HEAD
=======
=======
    
    expect($actions)->toHaveKey('change_password');
    expect($actions)->toHaveKey('deactivate');
    
    // Test change password action
    $changePasswordAction = $actions['change_password'];
    expect($changePasswordAction)->toBeInstanceOf(ChangePasswordAction::class);
    
    // Test deactivate action
    $deactivateAction = $actions['deactivate'];
    expect($deactivateAction)->toBeInstanceOf(\Filament\Tables\Actions\Action::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($deactivateAction->getColor())->toBe('danger');
    expect($deactivateAction->getIcon())->toBe('heroicon-o-trash');
});

test('list users page has correct header widgets', function (): void {
    $widgets = $this->listUsersPage->getHeaderWidgets();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($widgets)->toHaveCount(1);
    expect($widgets)->toContain(UserOverview::class);
});

test('list users page has correct bulk actions', function (): void {
    $bulkActions = $this->listUsersPage->getTableBulkActions();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    expect($bulkActions)->toHaveKey('delete');
    expect($bulkActions)->toHaveKey('export');

    // Test delete bulk action
    $deleteAction = $bulkActions['delete'];
    expect($deleteAction)->toBeInstanceOf(DeleteBulkAction::class);

    // Test export bulk action
    $exportAction = $bulkActions['export'];
    expect($exportAction)->toBeInstanceOf(ExportBulkAction::class);
<<<<<<< HEAD
=======
=======
    
    expect($bulkActions)->toHaveKey('delete');
    expect($bulkActions)->toHaveKey('export');
    
    // Test delete bulk action
    $deleteAction = $bulkActions['delete'];
    expect($deleteAction)->toBeInstanceOf(\Filament\Tables\Actions\DeleteBulkAction::class);
    
    // Test export bulk action
    $exportAction = $bulkActions['export'];
    expect($exportAction)->toBeInstanceOf(\Filament\Tables\Actions\ExportBulkAction::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('list users page can display users', function (): void {
    // This test would require proper Livewire setup
    // For now, we'll test the basic structure
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    $users = User::all();
    expect($users)->toHaveCount(3);

<<<<<<< HEAD
=======
=======
    
    $users = User::all();
    expect($users)->toHaveCount(3);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    foreach ($users as $user) {
        expect($user)->toBeInstanceOf(User::class);
        expect($user->type)->toBe(UserType::MasterAdmin);
    }
});

test('list users page has correct navigation label', function (): void {
    $label = ListUsers::getNavigationLabel();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // The label should be defined or fall back to default
    expect($label)->not->toBeNull();
});

test('list users page has correct title', function (): void {
    $title = ListUsers::getTitle();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // The title should be defined or fall back to default
    expect($title)->not->toBeNull();
});

test('list users page has correct breadcrumbs', function (): void {
    $breadcrumbs = ListUsers::getBreadcrumbs();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Breadcrumbs should be an array
    expect($breadcrumbs)->toBeArray();
});

test('list users page can handle search', function (): void {
    // Test that searchable columns are properly configured
    $columns = $this->listUsersPage->getTableColumns();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    $nameColumn = $columns['name'];
    $emailColumn = $columns['email'];

<<<<<<< HEAD
=======
=======
    
    $nameColumn = $columns['name'];
    $emailColumn = $columns['email'];
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($nameColumn->isSearchable())->toBeTrue();
    expect($emailColumn->isSearchable())->toBeTrue();
});

test('list users page can handle sorting', function (): void {
    // Test that columns can be sorted
    $columns = $this->listUsersPage->getTableColumns();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    $nameColumn = $columns['name'];
    $emailColumn = $columns['email'];

<<<<<<< HEAD
=======
=======
    
    $nameColumn = $columns['name'];
    $emailColumn = $columns['email'];
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // By default, columns should be sortable
    expect($nameColumn->isSortable())->toBeTrue();
    expect($emailColumn->isSortable())->toBeTrue();
});

test('list users page can handle pagination', function (): void {
    // Test that pagination is properly configured
    $pagination = ListUsers::getTablePaginationPageOptions();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Should have pagination options
    expect($pagination)->toBeArray();
});

test('list users page has correct table query', function (): void {
    // Test that the table query is properly configured
    $query = ListUsers::getTableQuery();
<<<<<<< HEAD

    // Should return a query builder
    expect($query)->toBeInstanceOf(Builder::class);
=======
<<<<<<< HEAD

    // Should return a query builder
    expect($query)->toBeInstanceOf(Builder::class);
=======
    
    // Should return a query builder
    expect($query)->toBeInstanceOf(\Illuminate\Database\Eloquent\Builder::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('list users page can handle record selection', function (): void {
    // Test that record selection is properly configured
    $canSelectRecords = ListUsers::canSelectRecords();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Should allow record selection for bulk actions
    expect($canSelectRecords)->toBeTrue();
});

test('list users page has correct table layout', function (): void {
    // Test that the table layout is properly configured
    $layout = ListUsers::getTableLayout();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Should have a layout defined
    expect($layout)->not->toBeNull();
});

test('list users page can handle empty state', function (): void {
    // Test that empty state is properly configured
    $emptyStateHeading = ListUsers::getTableEmptyStateHeading();
    $emptyStateDescription = ListUsers::getTableEmptyStateDescription();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Should have empty state messages
    expect($emptyStateHeading)->not->toBeNull();
    expect($emptyStateDescription)->not->toBeNull();
});

test('list users page has correct table actions alignment', function (): void {
    // Test that table actions are properly aligned
    $actionsAlignment = ListUsers::getTableActionsAlignment();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Should have actions alignment defined
    expect($actionsAlignment)->not->toBeNull();
});

test('list users page can handle table records per page', function (): void {
    // Test that records per page is properly configured
    $recordsPerPage = ListUsers::getTableRecordsPerPageSelectOptions();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Should have records per page options
    expect($recordsPerPage)->toBeArray();
});
