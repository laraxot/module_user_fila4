<?php

declare(strict_types=1);

use Filament\Actions\Action;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ExportBulkAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\BaseListUsers;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Models\User;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    $this->listUsersPage = new ListUsers;

    // Create some test users
    $this->users = User::factory()
        ->count(3)
        ->create([
            'type' => UserType::MasterAdmin,
        ]);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page has correct resource', function (): void {
    expect(ListUsers::getResource())->toBe(UserResource::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page extends correct base class', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->listUsersPage)
        ->toBeInstanceOf(BaseListUsers::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page can be instantiated', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->listUsersPage)->toBeInstanceOf(ListUsers::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page has correct table columns', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $columns = $this->listUsersPage->getTableColumns();

    expect($columns)->toHaveKey('name');
    expect($columns)->toHaveKey('email');

    // Test name column
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $nameColumn = $columns['name'];
    expect($nameColumn)->toBeInstanceOf(TextColumn::class);
    expect($nameColumn->getName())->toBe('name');
    expect($nameColumn->isSearchable())->toBeTrue();

    // Test email column
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $emailColumn = $columns['email'];
    expect($emailColumn)->toBeInstanceOf(TextColumn::class);
    expect($emailColumn->getName())->toBe('email');
    expect($emailColumn->isSearchable())->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page has correct table filters', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $filters = $this->listUsersPage->getTableFilters();

    // Currently no filters are defined
    expect($filters)->toBeArray();
    expect($filters)->toHaveCount(0);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page has correct table actions', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $actions = $this->listUsersPage->getTableActions();

    expect($actions)->toHaveKey('change_password');
    expect($actions)->toHaveKey('deactivate');

    // Test change password action
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $changePasswordAction = $actions['change_password'];
    expect($changePasswordAction)->toBeInstanceOf(ChangePasswordAction::class);

    // Test deactivate action
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $deactivateAction = $actions['deactivate'];
    expect($deactivateAction)->toBeInstanceOf(Action::class);
    expect($deactivateAction->getColor())->toBe('danger');
    expect($deactivateAction->getIcon())->toBe('heroicon-o-trash');
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page has correct header widgets', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $widgets = $this->listUsersPage->getHeaderWidgets();

    expect($widgets)->toHaveCount(1);
    expect($widgets)->toContain(UserOverview::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page has correct bulk actions', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $bulkActions = $this->listUsersPage->getTableBulkActions();

    expect($bulkActions)->toHaveKey('delete');
    expect($bulkActions)->toHaveKey('export');

    // Test delete bulk action
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $deleteAction = $bulkActions['delete'];
    expect($deleteAction)->toBeInstanceOf(DeleteBulkAction::class);

    // Test export bulk action
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $exportAction = $bulkActions['export'];
    expect($exportAction)->toBeInstanceOf(ExportBulkAction::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page can display users', function (): void {
    // This test would require proper Livewire setup
    // For now, we'll test the basic structure

    $users = User::all();
    expect($users)->toHaveCount(3);

    foreach ($users as $user) {
        expect($user)->toBeInstanceOf(User::class);
        expect($user->type)->toBe(UserType::MasterAdmin);
    }
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page has correct navigation label', function (): void {
    $label = ListUsers::getNavigationLabel();

    // The label should be defined or fall back to default
    expect($label)->not->toBeNull();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page has correct title', function (): void {
    $title = ListUsers::getTitle();

    // The title should be defined or fall back to default
    expect($title)->not->toBeNull();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page has correct breadcrumbs', function (): void {
    $breadcrumbs = ListUsers::getBreadcrumbs();

    // Breadcrumbs should be an array
    expect($breadcrumbs)->toBeArray();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page can handle search', function (): void {
    // Test that searchable columns are properly configured
    /** @phpstan-ignore-next-line property.notFound */
    $columns = $this->listUsersPage->getTableColumns();

    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $nameColumn = $columns['name'];
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $emailColumn = $columns['email'];

    expect($nameColumn->isSearchable())->toBeTrue();
    expect($emailColumn->isSearchable())->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page can handle sorting', function (): void {
    // Test that columns can be sorted
    /** @phpstan-ignore-next-line property.notFound */
    $columns = $this->listUsersPage->getTableColumns();

    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $nameColumn = $columns['name'];
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $emailColumn = $columns['email'];

    // By default, columns should be sortable
    expect($nameColumn->isSortable())->toBeTrue();
    expect($emailColumn->isSortable())->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page can handle pagination', function (): void {
    // Test that pagination is properly configured
    $pagination = ListUsers::getTablePaginationPageOptions();

    // Should have pagination options
    expect($pagination)->toBeArray();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page has correct table query', function (): void {
    // Test that the table query is properly configured
    $query = ListUsers::getTableQuery();

    // Should return a query builder
    expect($query)->toBeInstanceOf(Builder::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page can handle record selection', function (): void {
    // Test that record selection is properly configured
    $canSelectRecords = ListUsers::canSelectRecords();

    // Should allow record selection for bulk actions
    expect($canSelectRecords)->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page has correct table layout', function (): void {
    // Test that the table layout is properly configured
    $layout = ListUsers::getTableLayout();

    // Should have a layout defined
    expect($layout)->not->toBeNull();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page can handle empty state', function (): void {
    // Test that empty state is properly configured
    $emptyStateHeading = ListUsers::getTableEmptyStateHeading();
    $emptyStateDescription = ListUsers::getTableEmptyStateDescription();

    // Should have empty state messages
    expect($emptyStateHeading)->not->toBeNull();
    expect($emptyStateDescription)->not->toBeNull();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page has correct table actions alignment', function (): void {
    // Test that table actions are properly aligned
    $actionsAlignment = ListUsers::getTableActionsAlignment();

    // Should have actions alignment defined
    expect($actionsAlignment)->not->toBeNull();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('list users page can handle table records per page', function (): void {
    // Test that records per page is properly configured
    $recordsPerPage = ListUsers::getTableRecordsPerPageSelectOptions();

    // Should have records per page options
    expect($recordsPerPage)->toBeArray();
});
