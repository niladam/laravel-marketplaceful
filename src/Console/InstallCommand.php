<?php

namespace Marketplaceful\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    public $signature = 'marketplaceful:install';

    public $description = 'Install the Marketplaceful resources';

    public function handle()
    {
        // Publish...
        $this->callSilent('vendor:publish', ['--tag' => 'marketplaceful-config', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'marketplaceful-migrations', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'marketplaceful-dashboard', '--force' => true]);

        $this->info('Marketplaceful installed successfully.');
    }
}
