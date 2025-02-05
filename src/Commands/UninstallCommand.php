<?php

namespace Code16\PintConfig\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class UninstallCommand extends Command
{
    public $signature = 'pint-config:uninstall';

    public $description = 'Uninstall git hooks';

    public function handle(): int
    {
        Process::run('git config --unset core.hooksPath');

        return self::SUCCESS;
    }
}
