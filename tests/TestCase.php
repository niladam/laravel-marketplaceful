<?php

namespace Marketplaceful\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Marketplaceful\MarketplacefulServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\SchemalessAttributes\SchemalessAttributesServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Marketplaceful\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            MarketplacefulServiceProvider::class,
            SchemalessAttributesServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        include_once __DIR__.'/../database/migrations/2020_09_08_172241_create_user_columns.php';
        include_once __DIR__.'/../database/migrations/2020_09_09_214440_create_tags_table.php';
        include_once __DIR__.'/../database/migrations/2020_09_17_234651_create_listings_table.php';
        (new \CreateUserColumns())->up();
        (new \CreateTagsTable())->up();
        (new \CreateListingsTable())->up();
    }
}
