<?php

namespace Marketplaceful\Commands;

use Illuminate\Console\Command;

class MarketplacefulCommand extends Command
{
    public $signature = 'marketplaceful';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
