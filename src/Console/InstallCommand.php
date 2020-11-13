<?php

namespace Marketplaceful\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
    public $signature = 'marketplaceful:install';

    public $description = 'Install the Marketplaceful resources';

    public function handle()
    {
        // Publish...
        $this->callSilent('vendor:publish', ['--tag' => 'marketplaceful-config']);
        $this->callSilent('vendor:publish', ['--tag' => 'marketplaceful-providers']);
        $this->callSilent('vendor:publish', ['--tag' => 'marketplaceful-migrations', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'marketplaceful-dashboard', '--force' => true]);

        $this->installMarketplacefulServiceProvider();

        $this->info('Marketplaceful installed successfully.');
    }

    protected function installFortifyServiceProvider()
    {
        if (! Str::contains($appConfig = file_get_contents(config_path('app.php')), 'App\\Providers\\FortifyServiceProvider::class')) {
            file_put_contents(config_path('app.php'), str_replace(
                "App\\Providers\RouteServiceProvider::class,",
                "App\\Providers\RouteServiceProvider::class,".PHP_EOL."        App\Providers\FortifyServiceProvider::class,",
                $appConfig
            ));
        }
    }

    protected function installMarketplacefulServiceProvider()
    {
        if (! Str::contains($appConfig = file_get_contents(config_path('app.php')), 'App\\Providers\\MarketplacefulServiceProvider::class')) {
            file_put_contents(config_path('app.php'), str_replace(
                "App\\Providers\FortifyServiceProvider::class,",
                "App\\Providers\FortifyServiceProvider::class,".PHP_EOL."        App\Providers\MarketplacefulServiceProvider::class,",
                $appConfig
            ));
        }
    }
}
