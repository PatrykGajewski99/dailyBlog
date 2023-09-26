<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        if (env('RUN_MIGRATIONS', false)) {
            Artisan::call('migrate:fresh', [
                '--env' => 'testing',
            ]);
        }
    }
}
