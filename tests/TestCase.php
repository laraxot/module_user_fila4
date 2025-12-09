<?php

declare(strict_types=1);

namespace Modules\User\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Xot\Tests\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        // Set up any module-specific test configuration here
        $this->artisan('module:migrate', ['module' => 'User']);
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> fbc8f8e (.)
=======
}
>>>>>>> 6d20fbe (.)
