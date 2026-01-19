<?php

declare(strict_types=1);

namespace Modules\User\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Xot\Tests\CreatesApplication;

/**
 * Base test case for User module.
 *
 * Uses MySQL from .env.testing (NOT SQLite).
 * Uses DatabaseTransactions instead of RefreshDatabase for modular environment.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    use DatabaseTransactions;

    /**
     * Connections that should be wrapped in transactions.
     *
     * @var array<int, string>
     */
    protected $connectionsToTransact = [
        'user',
        'media',
        'xot',
        'activity',
        'geo',
        'notify',
        'lang',
        'cms',
        'tenant',
    ];

    protected function setUp(): void
    {
        // Explicitly refresh the application to ensure $this->app and 'config' are available
        // BEFORE parent::setUp() which boots DatabaseTransactions.
        if (! $this->app) {
            $this->refreshApplication();
        }

        // Ensure ALL modular connections use the same physical database for unified transactions.
        // This is crucial for transaction isolation with DatabaseTransactions.
        $defaultConfig = config('database.connections.mysql');
        $conns = ['user', 'media', 'xot', 'activity', 'geo', 'notify', 'lang', 'cms', 'tenant'];
        foreach ($conns as $conn) {
            config(["database.connections.$conn" => $defaultConfig]);
            \Illuminate\Support\Facades\DB::purge($conn);
        }

        // Ensure Spatie uses the correctly configured modular media model.
        config(['media-library.media_model' => \Modules\Media\Models\Media::class]);

        // Run necessary migrations for the test environment
        $this->artisan('migrate', ['--path' => 'Modules/Xot/database/migrations', '--force' => true]);
        $this->artisan('migrate', ['--path' => 'Modules/User/database/migrations', '--force' => true]);
        $this->artisan('migrate', ['--path' => 'Modules/Media/database/migrations', '--force' => true]);

        parent::setUp();
    }
}
