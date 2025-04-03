<?php

namespace App\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class UninstallCommand extends Command
{
    public $signature = 'uninstall';

    public $description = 'Uninstall git hooks';

    public function handle(): int
    {
        Process::run('git config --unset core.hooksPath')->throw();

        return self::SUCCESS;
    }
}
