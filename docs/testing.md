# Testing Documentation

## Overview

This document provides testing guidelines and examples for the User module in Laraxot.

## Test Structure

### Directory Structure

```
Modules/User/tests/
├── Feature/
│   ├── UserModelBasicTest.php
│   ├── UserModelTest.php
│   ├── UserModelSimpleTest.php
│   └── Pest.php
├── Unit/
│   └── (unit tests)
├── TestCase.php
```

### Test Files

- **TestCase.php** - Base test case with database configuration
- **Pest.php** - Pest configuration and extensions
- **UserModelBasicTest.php** - Basic model functionality tests
- **UserModelTest.php** - Comprehensive model tests
- **UserModelSimpleTest.php** - Simplified tests for debugging

## Testing Configuration

### TestCase Configuration

The User TestCase extends the base testing configuration and provides:
- Database connection setup
- Module-specific configuration
- Test environment setup
- Database cleanup

### Database Configuration

User module uses the following database connections:
- `user` - Main User module connection
- `mysql` - Default connection
- All connections configured to use test database

## Testing Best Practices

### 1. Safe Functions Usage

Use Safe functions for safer operations that throw exceptions instead of returning false:

```php
use function Safe\json_decode;
use function Safe\json_encode;
use function Safe\file_get_contents;
use function Safe\file_put_contents;

// Instead of native functions that might return false
$data = json_decode($jsonString, true); // Safe version throws exception on error
```

### 2. Webmozarts Assert

Use Webmozarts Assert for better type checking and validation:

```php
use Webmozart\Assert\Assert;

// Instead of manual checks
Assert::string($value, 'Expected string, got: %s');
Assert::integer($value, 'Expected integer, got: %s');
Assert::isArray($array, 'Expected array, got: %s');
Assert::keyExists($array, 'key', 'Key "key" does not exist in array');
```

### 3. Database Transactions

Use database transactions for test isolation:

```php
use Illuminate\Foundation\Testing\DatabaseTransactions;
```

### 4. Test Isolation

Each test should be independent:

```php
protected function tearDown(): void
{
    parent::tearDown();
    // Clean up test data
    User::query()->delete();
}
```

### 5. Module Configuration

Configure User-specific settings:

```php
protected function setUp(): void
{
    $this->createApplication();
    parent::setUp();
    
    // Use Zero theme for testing
    config(['xra.pub_theme' => 'Zero']);
    config(['xra.main_module' => 'User']);

    \Modules\Xot\Datas\XotData::make()->update([
        'pub_theme' => 'Zero',
        'main_module' => 'User',
    ]);
}
```

## Test Examples

### Basic Model Test

```php
test('user model can be created', function () {
    $userData = [
        'name' => 'Test User',
        'email' => 'test-' . uniqid() . '@example.com',
        'password' => bcrypt('password'),
        'lang' => 'it',
        'is_active' => true,
    ];

    $user = User::create($userData);

    expect($user)->toBeInstanceOf(User::class));
    expect($user->name)->toBe('Test User');
    expect($user->email)->toBe($userData['email']));
    expect($user->lang)->toBe('it'));
    expect($user->is_active)->toBe(true);
});
```

### Model Connection Test

```php
test('user model can access connection', function () {
    $user = new User();
    
    expect($user->getConnectionName())->toBe('user');
});
```

### Model Query Test

```php
test('user model can query records', function () {
    User::create([
        'name' => 'User 1',
        'email' => 'user1-' . uniqid() . '@example.com',
        'password' => bcrypt('password'),
    ]);
    User::create([
        'name' => 'User 2',
        'email' => 'user2-' . uniqid() . '@example.com',
        'password' => bcrypt('password'),
    ]);

    $users = User::all();
    
    expect($users)->toHaveCount(2);
});
```

### Model Filter Test

```php
test('user model can filter records', function () {
    User::create([
        'name' => 'Active User',
        'is_active' => true,
        'email' => 'active-' . uniqid() . '@example.com',
        'password' => bcrypt('password'),
    ]);
    User::create([
        'name' => 'Inactive User',
        'is_active' => false,
        'email' => 'inactive-' . uniqid() . '@example.com',
        'password' => bcrypt('password'),
    ]);

    $activeUsers = User::where('is_active', true)->get();
    
    expect($activeUsers)->toHaveCount(1);
    expect($activeUsers->first()->name)->toBe('Active User'));
});
```

### Model Update Test

```php
test('user model can update records', function () {
    $user = User::create([
        'name' => 'Original Name',
        'email' => 'original-' . uniqid() . '@example.com',
        'password' => bcrypt('password'),
    ]);

    $user->name = 'Updated Name';
    $user->save();

    expect($user->name)->toBe('Updated Name'));
});
```

## Testing Commands

### Running Tests

```bash
# Run all User module tests
./vendor/bin/pest Modules/User/tests

# Run tests with coverage
./vendor/bin/pest Modules/User/tests --coverage

# Run specific test
./vendor/bin/pest Modules/User/tests/Feature/UserModelBasicTest.php

# Run tests with verbose output
./vendor/bin/pest Modules/User/tests --verbose
```

### Quality Checks

```bash
# Run PHPStan on User module
./vendor/bin/phpstan analyze Modules/User

# Run PHPMD on User module
./vendor/bin/phpmd Modules/User/src

# Run PHPInsights on User module
./vendor/bin/phpinsights analyse Modules/User
```

## Testing Issues and Solutions

### 1. Connection Resolver Errors

**Problem**: Tests fail with "Call to a member function connection() on null"

**Symptoms**:
```
Error: Call to a member function connection() on null
```

**Root Causes**:
- Application not properly bootstrapped
- Database connection not configured
- Model not properly instantiated

**Solutions**:
1. Ensure application is bootstrapped before parent setUp
2. Configure all database connections to use test database
3. Verify model bootstrapping

### 2. Database Cleanup Issues

**Problem**: Tests find existing data in test database

**Symptoms**:
```
Failed asserting that actual size 29 matches expected size 2
Failed asserting that actual size 28 matches expected size 1
```

**Root Causes**:
- No cleanup between test runs
- Previous test data persists

**Solutions**:
1. Add database cleanup in tearDown
2. Use database transactions
3. Clean up specific tables

### 3. Factory System Issues

**Problem**: Factory calls fail with connection resolver errors

**Symptoms**:
```
Error: Call to a member function connection() on null
```

**Root Causes**:
- Models not properly bootstrapped
- Factory not properly configured
- Database connection not available

**Solutions**:
1. Use direct model creation instead of factories
2. Ensure proper model bootstrapping
3. Verify database configuration

### 4. RefreshDatabase Trait Issues

**Problem**: Never use `use Illuminate\Foundation\Testing\RefreshDatabase;`

**Reasons**:
- Breaks multi-tenant architecture by truncating all tables
- Causes data pollution across tests
- Interferes with tenant isolation
- Resets database connections unexpectedly

**Solutions**:
1. Use `use Illuminate\Foundation\Testing\DatabaseTransactions;` instead
2. Manually clean up test data in tearDown
3. Use specific table truncation when needed

**Example**:
```php
// DON'T do this in multi-tenant apps
use Illuminate\Foundation\Testing\RefreshDatabase;

// DO this instead
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserModelTest extends TestCase
{
    use DatabaseTransactions;
    
    protected function tearDown(): void
    {
        parent::tearDown();
        User::truncate(); // Clean specific tables if needed
    }
}
```

### 5. Class Not Found Errors

**Problem**: Tests fail with "Class not found" errors

**Symptoms**:
```
Error: Class "Modules\User\Tests\User" not found
```

**Root Causes**:
- Incorrect namespace in test files
- Missing imports
- Wrong autoloading configuration

**Solutions**:
1. Check namespace in test files
2. Add proper imports
3. Verify autoloading configuration

## Testing Goals

### Coverage Requirements

- Aim for 100% code coverage
- Test all public methods
- Test all edge cases
- Test all error scenarios

### Performance Requirements

- Tests should run in <200ms each
- Use database transactions for isolation
- Optimize database queries
- Minimize test data

### Quality Requirements

- All tests must pass PHPStan level 9+
- All tests must follow DRY, KISS, SOLID principles
- All tests must be maintainable
- All tests must be robust

## Testing Workflow

### 1. Setup Phase

1. Configure testing environment
2. Set up database connections
3. Install testing dependencies
4. Verify configuration

### 2. Development Phase

1. Write tests for new features
2. Update existing tests
3. Add regression tests
4. Maintain test coverage

### 3. Quality Assurance

1. Run tests
2. Run quality checks
3. Fix any issues
4. Update documentation

### 4. Deployment Phase

1. Ensure all tests pass
2. Verify coverage requirements
3. Update documentation
4. Commit changes

## Testing Documentation

### Module Documentation

- Update this file when adding new tests
- Document any special testing requirements
- Add examples for new test types
- Keep documentation current

### Root Documentation

- Update root documentation when module testing changes
- Add backlinks to this file
- Keep documentation consistent
- Update troubleshooting guides

## Testing Resources

### External Resources

- [Laravel 12.x Testing Documentation](https://laravel.com/docs/12.x/testing)
- [Pest Installation Guide](https://pestphp.com/docs/installation)
- [PHPStan Documentation](https://phpstan.org/user-guide/getting-started)
- [Safe Functions Library](https://github.com/thecodingmachine/safe)
- [PHPStan Safe Rule](https://github.com/thecodingmachine/phpstan-safe-rule)
- [Webmozarts Assert Library](https://github.com/webmozarts/assert)
- [Spatie Testing Laravel with Pest Course](https://spatie.be/courses/testing-laravel-with-pest)

### Internal Resources

- [Testing Setup Guide](../../docs/testing-setup.md)
- [Testing Best Practices](../../docs/testing-best-practices.md)
- [Troubleshooting Guide](../../docs/troubleshooting.md)

## Testing Examples

### Safe Functions Usage

```php
use function Safe\json_decode;
use function Safe\json_encode;
use function Safe\file_get_contents;
use function Safe\file_put_contents;

test('safe functions prevent errors', function () {
    $json = '{"name": "Test User", "email": "test@example.com"}';
    
    // Safe version throws exception on error instead of returning false
    $data = json_decode($json, true);
    
    expect($data['name'])->toBe('Test User');
    expect($data['email'])->toBe('test@example.com');
});

test('file operations with safe functions', function () {
    $content = 'Test file content';
    $filename = '/tmp/test_file_' . uniqid() . '.txt';
    
    // Safe version throws exception on error
    file_put_contents($filename, $content);
    $readContent = file_get_contents($filename);
    
    expect($readContent)->toBe($content);
    
    // Clean up
    if (file_exists($filename)) {
        unlink($filename);
    }
});
```

### Webmozarts Assert Usage

```php
use Webmozart\Assert\Assert;

test('webmozarts assert provides better validation', function () {
    $data = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'age' => 25,
        'settings' => ['theme' => 'dark']
    ];
    
    // Better type checking
    Assert::string($data['name'], 'Name must be string, got: %s');
    Assert::string($data['email'], 'Email must be string, got: %s');
    Assert::integer($data['age'], 'Age must be integer, got: %s');
    Assert::isArray($data['settings'], 'Settings must be array, got: %s');
    Assert::keyExists($data, 'name', 'Required key "name" is missing');
    Assert::keyExists($data['settings'], 'theme', 'Required key "settings.theme" is missing');
    
    expect($data['name'])->toBe('Test User');
});
```

### Model Tests

```php
test('user model can be created', function () {
    $userData = [
        'name' => 'Test User',
        'email' => 'test-' . uniqid() . '@example.com',
        'password' => bcrypt('password'), // Note: Need proper hash service in test environment
        'lang' => 'it',
        'is_active' => true,
    ];

    $user = User::create($userData);

    expect($user)->toBeInstanceOf(User::class));
    expect($user->name)->toBe('Test User'));
    expect($user->email)->toBe($userData['email']));
    expect($user->lang)->toBe('it'));
    expect($user->is_active)->toBe(true));
});
```

### Relationship Tests

```php
test('user has profile relationship', function () {
    expect($user->profile())->toBeInstanceOf(HasOne::class);
});

test('user has teams relationship', function () {
    expect($user->teams())->toBeInstanceOf(BelongsToMany::class);
});
```

### Service Tests

```php
test('user service can create user', function () {
    $userData = [
        'name' => 'Test User',
        'email' => 'test-' . uniqid() . '@example.com',
        'password' => bcrypt('password'),
        'lang' => 'it',
        'is_active' => true,
    ];

    $user = User::create($userData);

    expect($user)->toBeInstanceOf(User::class));
    expect($user->name)->toBe('Test User'));
});
```

### API Tests

```php
test('user can be created via API', function () {
    $userData = [
        'name' => 'Test User',
        'email' => 'test-' . uniqid() . '@example.com',
        'password' => bcrypt('password'),
        'lang' => 'it',
        'is_active' => true,
    ];

    $response = $this->post('/api/users', $userData);
    $response->assertStatus(201);
    $response->assertJson([
        'id' => $user->id,
        'name' => 'Test User',
        'email' => $userData['email'],
    ]);
});
```

## Testing Checklist

### Before Writing Tests

- [ ] Understand the feature to test
- [ ] Review existing tests
- [ ] Plan test scenarios
- [ ] Prepare test data

### While Writing Tests

- [ ] Use descriptive test names
- [ ] Use proper assertions
- [ ] Clean up test data
- [ ] Document tests

### After Writing Tests

- [ ] Run tests
- [ ] Check coverage
- [ ] Run quality checks
- [ ] Update documentation

### Before Committing

- [ ] All tests pass
- [ ] Coverage requirements met
- [ ] Quality checks pass
- [ ] Documentation updated

## Testing Conclusion

Following these guidelines will ensure your User module tests are:
- Fast and reliable
- Maintainable and scalable
- Comprehensive and thorough
- Consistent and robust

Remember: Good tests are the foundation of reliable software development.

---

*Last updated: January 2025*